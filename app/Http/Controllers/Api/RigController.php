<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserPcCollection;
use App\Http\Support\CpuCompatibilityCheck;
use App\Http\Support\MotherboardCompatibilityCheck;
use App\Http\Support\PcBuilder;
use App\Http\Support\PCCaseCompatibilityCheck;
use App\Http\Support\PsuCompatibilityCheck;
use App\Http\Support\RamCompatibilityCheck;
use App\Http\Support\RigRetailCompiler;
use App\Models\UserPc;
use App\Models\UserPcHDD;
use App\Models\UserPcMSSD;
use App\Models\UserPcRam;
use App\Models\UserPcSSD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;

class RigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $userPcs = UserPc::where('user_id', $user->id)->get();

        return new UserPcCollection($userPcs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $userPC = new UserPc();
            $userPC->name = $request['name'];
            $userPC->user_id = $request['userId'];
            $userPC->case_id = $request['pcCase']['id'];
            $userPC->cpu_id = $request['cpu']['id'];
            $userPC->gpu_id = $request['gpu']['id'];
            $userPC->board_id = $request['motherboard']['id'];
            $userPC->air_cooler_id = $request['airCooler'] !== [] ? $request['airCooler']['id'] : null;
            $userPC->liquid_cooler_id = $request['liquidCooler'] !== [] ? $request['liquidCooler']['id'] : null;
            $userPC->psu_id = $request['psu']['id'];
            $userPC->created_at = Date::now();
            $userPC->updated_at = Date::now();

            $userPC->save();

            $userPCId = (UserPc::where('user_id', $request['userId'])->where('name', $request['name'])->first())->id;

            foreach ($request['rams'] as $ram) {
                $userPcRam = new UserPcRam();
                $userPcRam->pc_id = $userPCId;
                $userPcRam->ram_id = $ram['id'];
                $userPcRam->created_at = Date::now();
                $userPcRam->updated_at = Date::now();

                $userPcRam->save();
            }

            foreach ($request['hdds'] as $hdd) {
                $userPcHdd = new UserPcHDD();
                $userPcHdd->pc_id = $userPCId;
                $userPcHdd->hdd_id = $hdd['id'];
                $userPcHdd->created_at = Date::now();
                $userPcHdd->updated_at = Date::now();

                $userPcHdd->save();
            }

            foreach ($request['sataSSDs'] as $ssd) {
                $userPcSsd = new UserPcSSD();
                $userPcSsd->pc_id = $userPCId;
                $userPcSsd->ssd_id = $ssd['id'];
                $userPcSsd->created_at = Date::now();
                $userPcSsd->updated_at = Date::now();

                $userPcSsd->save();
            }

            foreach ($request['m2SSDs'] as $ssd) {
                $userPcMSsd = new UserPcMSSD();
                $userPcMSsd->pc_id = $userPCId;
                $userPcMSsd->ssd_id = $ssd['id'];
                $userPcMSsd->created_at = Date::now();
                $userPcMSsd->updated_at = Date::now();

                $userPcMSsd->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return response()->noContent();

    }

    /**
     * Checks rig resource for compatibility.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        $rig = $request['rig'];
        if ($rig) {
            $errors = array();
            $warnings = array();

            RamCompatibilityCheck::checkCpuFrequencySupport($rig, $warnings);
            RamCompatibilityCheck::checkRamSelected($rig, $warnings);
            RamCompatibilityCheck::checkMotherboardFrequencySupport($rig, $warnings);

            if (count($rig['m2SSDs']) > 0) {
                MotherboardCompatibilityCheck::checkM2SsdInterfaceCompatibility($rig, $warnings);
            }
            if (count($rig['hdds']) > 0 || count($rig['sataSSDs']) > 0) {
                MotherboardCompatibilityCheck::checkSataDriveCompatibility($rig, $warnings);
            }
            MotherboardCompatibilityCheck::checkGpuCompatibility($rig, $warnings);

            PsuCompatibilityCheck::checkOverallConsumption($rig, $warnings);
            PsuCompatibilityCheck::checkSataConnectorCompatibility($rig, $warnings);
            PsuCompatibilityCheck::checkGpuConnectorCompatibility($rig, $warnings);
            PsuCompatibilityCheck::checkCpuConnectorCompatibility($rig, $warnings);

            PCCaseCompatibilityCheck::checkSata25BayCompatibility($rig, $warnings);
            PCCaseCompatibilityCheck::checkSata35BayCompatibility($rig, $warnings);

            CpuCompatibilityCheck::checkGpuCompatibility($rig, $warnings);

            $rigRetail = RigRetailCompiler::compile($rig);

            return Response([
                'rigRetail' => $rigRetail,
                'warnings' => $warnings
            ], 201);
        } else {
            return Response([
                'errors' => 'PC Configuration not provided.'
            ], 401);
        }

    }

    /**
     * Checks rig resource for compatibility.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function build(Request $request)
    {
        try {

            if ($request['usage'] == 0) {
                if ($request['priority'] == 0) {
                    $rig = PcBuilder::buildLightGamingBudget($request['preferredCpu'], $request['preferredGpu'], $request['preferredCooling']);
                } else {
                    $rig = PcBuilder::buildLightGamingPower($request['preferredCpu'], $request['preferredGpu'], $request['preferredCooling']);
                }
            }
            if ($request['usage'] == 1) {
                if ($request['priority'] == 0) {
                    $rig = PcBuilder::buildSeriousGamingBudget($request['preferredCpu'], $request['preferredGpu'], $request['preferredCooling']);
                } else {
                    $rig = PcBuilder::buildSeriousGamingPower($request['preferredCpu'], $request['preferredGpu'], $request['preferredCooling']);
                }
            }
            if ($request['usage'] == 2) {
                if ($request['priority'] == 0) {
                    $rig = PcBuilder::buildStreamingLightGamingBudget($request['preferredCpu'], $request['preferredGpu'], $request['preferredCooling']);
                } else {
                    $rig = PcBuilder::buildStreamingLightGamingPower($request['preferredCpu'], $request['preferredGpu'], $request['preferredCooling']);
                }
            }
            if ($request['usage'] == 3) {
                if ($request['priority'] == 0) {
                    $rig = PcBuilder::buildStreamingSeriousGamingBudget($request['preferredCpu'], $request['preferredGpu'], $request['preferredCooling']);
                } else {
                    $rig = PcBuilder::buildStreamingSeriousGamingPower($request['preferredCpu'], $request['preferredGpu'], $request['preferredCooling']);
                }
            }
            if ($request['usage'] == 4) {
                if ($request['priority'] == 0) {
                    $rig = PcBuilder::buildNextGenGamingBudget($request['preferredCpu'], $request['preferredGpu'], $request['preferredCooling']);
                } else {
                    $rig = PcBuilder::buildNextGenGamingPower($request['preferredCpu'], $request['preferredGpu'], $request['preferredCooling']);
                }
            }
            if ($request['usage'] == 5) {
                if ($request['priority'] == 0) {
                    $rig = PcBuilder::buildEditingBudget($request['preferredCpu'], $request['preferredGpu'], $request['preferredCooling']);
                } else {
                    $rig = PcBuilder::buildEditingPower($request['preferredCpu'], $request['preferredGpu'], $request['preferredCooling']);
                }
            }
            $rigRetail = RigRetailCompiler::compile($rig);

            return Response([
                'rig' => $rig,
                'rigRetail' => $rigRetail
            ], 201);
        } catch (Throwable $e) {
            report($e);
            return Response([
                'errors' => 'PC Configuration could not be created.'
            ], 401);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            UserPcRam::where('pc_id', $id)->delete();
            UserPcHDD::where('pc_id', $id)->delete();
            UserPcSSD::where('pc_id', $id)->delete();
            UserPcMSSD::where('pc_id', $id)->delete();
            UserPc::where('id', $id)->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
