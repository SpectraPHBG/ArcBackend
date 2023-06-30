<?php

namespace App\Admin\Controllers;

use App\Models\Gpu;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GpuController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Gpu';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Gpu());

        $grid->column('id', __('Id'));
        $grid->column('brand_id', __('Brand id'));
        $grid->column('name', __('Name'));
        $grid->column('expansion_slot_id', __('Expansion slot id'));
        $grid->column('form_factor_id', __('Form factor id'));
        $grid->column('clock_speeds', __('Clock speeds'));
        $grid->column('vram', __('Vram'));
        $grid->column('vram_id', __('Vram id'));
        $grid->column('memory_clock', __('Memory clock'));
        $grid->column('memory_bus', __('Memory bus'));
        $grid->column('3d_apis', __('3d apis'));
        $grid->column('ports', __('Ports'));
        $grid->column('max_resolution', __('Max resolution'));
        $grid->column('cooler', __('Cooler'));
        $grid->column('tdp', __('Tdp'));
        $grid->column('recommended_wattage', __('Recommended wattage'));
        $grid->column('power_connector', __('Power connector'));
        $grid->column('hdcp', __('Hdcp'));
        $grid->column('features', __('Features'));
        $grid->column('dimensions', __('Dimensions'));
        $grid->column('official_link', __('Official link'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Gpu::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('brand_id', __('Brand id'));
        $show->field('name', __('Name'));
        $show->field('expansion_slot_id', __('Expansion slot id'));
        $show->field('form_factor_id', __('Form factor id'));
        $show->field('clock_speeds', __('Clock speeds'));
        $show->field('vram', __('Vram'));
        $show->field('vram_id', __('Vram id'));
        $show->field('memory_clock', __('Memory clock'));
        $show->field('memory_bus', __('Memory bus'));
        $show->field('3d_apis', __('3d apis'));
        $show->field('ports', __('Ports'));
        $show->field('max_resolution', __('Max resolution'));
        $show->field('cooler', __('Cooler'));
        $show->field('tdp', __('Tdp'));
        $show->field('recommended_wattage', __('Recommended wattage'));
        $show->field('power_connector', __('Power connector'));
        $show->field('hdcp', __('Hdcp'));
        $show->field('features', __('Features'));
        $show->field('dimensions', __('Dimensions'));
        $show->field('official_link', __('Official link'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Gpu());

        $form->number('brand_id', __('Brand id'));
        $form->text('name', __('Name'));
        $form->number('expansion_slot_id', __('Expansion slot id'));
        $form->number('form_factor_id', __('Form factor id'));
        $form->textarea('clock_speeds', __('Clock speeds'));
        $form->number('vram', __('Vram'));
        $form->number('vram_id', __('Vram id'));
        $form->number('memory_clock', __('Memory clock'));
        $form->number('memory_bus', __('Memory bus'));
        $form->text('3d_apis', __('3d apis'));
        $form->text('ports', __('Ports'));
        $form->text('max_resolution', __('Max resolution'));
        $form->text('cooler', __('Cooler'));
        $form->text('tdp', __('Tdp'));
        $form->number('recommended_wattage', __('Recommended wattage'));
        $form->text('power_connector', __('Power connector'));
        $form->switch('hdcp', __('Hdcp'));
        $form->textarea('features', __('Features'));
        $form->text('dimensions', __('Dimensions'));
        $form->text('official_link', __('Official link'));

        return $form;
    }
}
