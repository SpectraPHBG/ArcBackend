<?php

namespace App\Admin\Controllers;

use App\Models\PCCase;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PCCaseController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'PCCase';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PCCase());

        $grid->column('id', __('Id'));
        $grid->column('brand_id', __('Brand id'));
        $grid->column('name', __('Name'));
        $grid->column('factor_id', __('Factor id'));
        $grid->column('io_ports', __('Io ports'));
        $grid->column('expansion_slots', __('Expansion slots'));
        $grid->column('storage_slots', __('Storage slots'));
        $grid->column('air_cooling_support', __('Air cooling support'));
        $grid->column('liquid_cooling_support', __('Liquid cooling support'));
        $grid->column('dust_filters', __('Dust filters'));
        $grid->column('included_fans', __('Included fans'));
        $grid->column('max_psu_length', __('Max psu length'));
        $grid->column('max_cooler_height', __('Max cooler height'));
        $grid->column('max_gpu_length', __('Max gpu length'));
        $grid->column('dimensions', __('Dimensions'));
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
        $show = new Show(PCCase::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('brand_id', __('Brand id'));
        $show->field('name', __('Name'));
        $show->field('factor_id', __('Factor id'));
        $show->field('io_ports', __('Io ports'));
        $show->field('expansion_slots', __('Expansion slots'));
        $show->field('storage_slots', __('Storage slots'));
        $show->field('air_cooling_support', __('Air cooling support'));
        $show->field('liquid_cooling_support', __('Liquid cooling support'));
        $show->field('dust_filters', __('Dust filters'));
        $show->field('included_fans', __('Included fans'));
        $show->field('max_psu_length', __('Max psu length'));
        $show->field('max_cooler_height', __('Max cooler height'));
        $show->field('max_gpu_length', __('Max gpu length'));
        $show->field('dimensions', __('Dimensions'));
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
        $form = new Form(new PCCase());

        $form->number('brand_id', __('Brand id'));
        $form->text('name', __('Name'));
        $form->number('factor_id', __('Factor id'));
        $form->text('io_ports', __('Io ports'));
        $form->number('expansion_slots', __('Expansion slots'));
        $form->text('storage_slots', __('Storage slots'));
        $form->textarea('air_cooling_support', __('Air cooling support'));
        $form->textarea('liquid_cooling_support', __('Liquid cooling support'));
        $form->text('dust_filters', __('Dust filters'));
        $form->switch('included_fans', __('Included fans'));
        $form->number('max_psu_length', __('Max psu length'));
        $form->number('max_cooler_height', __('Max cooler height'));
        $form->number('max_gpu_length', __('Max gpu length'));
        $form->text('dimensions', __('Dimensions'));

        return $form;
    }
}
