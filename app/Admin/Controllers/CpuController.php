<?php

namespace App\Admin\Controllers;

use App\Models\Cpu;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CpuController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Cpu';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Cpu());

        $grid->column('id', __('Id'));
        $grid->column('brand_id', __('Brand id'));
        $grid->column('name', __('Name'));
        $grid->column('socket_id', __('Socket id'));
        $grid->column('cores', __('Cores'));
        $grid->column('threads', __('Threads'));
        $grid->column('base_clock', __('Base clock'));
        $grid->column('turbo_clock', __('Turbo clock'));
        $grid->column('base_clock2', __('Base clock2'));
        $grid->column('turbo_clock2', __('Turbo clock2'));
        $grid->column('memory_id', __('Memory id'));
        $grid->column('memory_speed', __('Memory speed'));
        $grid->column('memory2_id', __('Memory2 id'));
        $grid->column('memory2_speed', __('Memory2 speed'));
        $grid->column('hyperthread_support', __('Hyperthread support'));
        $grid->column('caches', __('Caches'));
        $grid->column('tdp', __('Tdp'));
        $grid->column('max_temp', __('Max temp'));
        $grid->column('supported_os', __('Supported oc'));
        $grid->column('integrated_gpu', __('Integrated gpu'));
        $grid->column('gpu_frequency', __('Gpu frequency'));
        $grid->column('features', __('Features'));
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
        $show = new Show(Cpu::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('brand_id', __('Brand id'));
        $show->field('name', __('Name'));
        $show->field('socket_id', __('Socket id'));
        $show->field('cores', __('Cores'));
        $show->field('threads', __('Threads'));
        $show->field('base_clock', __('Base clock'));
        $show->field('turbo_clock', __('Turbo clock'));
        $show->field('base_clock2', __('Base clock2'));
        $show->field('turbo_clock2', __('Turbo clock2'));
        $show->field('memory_id', __('Memory id'));
        $show->field('memory_speed', __('Memory speed'));
        $show->field('memory2_id', __('Memory2 id'));
        $show->field('memory2_speed', __('Memory2 speed'));
        $show->field('hyperthread_support', __('Hyperthread support'));
        $show->field('caches', __('Caches'));
        $show->field('tdp', __('Tdp'));
        $show->field('max_temp', __('Max temp'));
        $show->field('supported_os', __('Supported oc'));
        $show->field('integrated_gpu', __('Integrated gpu'));
        $show->field('gpu_frequency', __('Gpu frequency'));
        $show->field('features', __('Features'));
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
        $form = new Form(new Cpu());

        $form->number('brand_id', __('Brand id'));
        $form->text('name', __('Name'));
        $form->number('socket_id', __('Socket id'));
        $form->text('cores', __('Cores'));
        $form->text('threads', __('Threads'));
        $form->decimal('base_clock', __('Base clock'));
        $form->decimal('turbo_clock', __('Turbo clock'));
        $form->decimal('base_clock2', __('Base clock2'));
        $form->decimal('turbo_clock2', __('Turbo clock2'));
        $form->number('memory_id', __('Memory id'));
        $form->number('memory_speed', __('Memory speed'));
        $form->number('memory2_id', __('Memory2 id'));
        $form->number('memory2_speed', __('Memory2 speed'));
        $form->switch('hyperthread_support', __('Hyperthread support'));
        $form->text('caches', __('Caches'));
        $form->decimal('tdp', __('Tdp'));
        $form->number('max_temp', __('Max temp'));
        $form->text('supported_os', __('Supported oc'));
        $form->text('integrated_gpu', __('Integrated gpu'));
        $form->number('gpu_frequency', __('Gpu frequency'));
        $form->textarea('features', __('Features'));
        $form->text('official_link', __('Official link'));

        return $form;
    }
}
