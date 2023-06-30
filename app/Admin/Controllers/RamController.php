<?php

namespace App\Admin\Controllers;

use App\Models\Ram;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RamController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Ram';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Ram());

        $grid->column('id', __('Id'));
        $grid->column('brand_id', __('Brand id'));
        $grid->column('name', __('Name'));
        $grid->column('capacity', __('Capacity'));
        $grid->column('memory_type_id', __('Memory type id'));
        $grid->column('modules', __('Modules'));
        $grid->column('speed', __('Speed'));
        $grid->column('voltage', __('Voltage'));
        $grid->column('latency', __('Latency'));
        $grid->column('heat_spreader', __('Heat spreader'));
        $grid->column('rgb_support', __('Rgb support'));
        $grid->column('ecc_support', __('Ecc support'));
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
        $show = new Show(Ram::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('brand_id', __('Brand id'));
        $show->field('name', __('Name'));
        $show->field('capacity', __('Capacity'));
        $show->field('memory_type_id', __('Memory type id'));
        $show->field('modules', __('Modules'));
        $show->field('speed', __('Speed'));
        $show->field('voltage', __('Voltage'));
        $show->field('latency', __('Latency'));
        $show->field('heat_spreader', __('Heat spreader'));
        $show->field('rgb_support', __('Rgb support'));
        $show->field('ecc_support', __('Ecc support'));
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
        $form = new Form(new Ram());

        $form->number('brand_id', __('Brand id'));
        $form->text('name', __('Name'));
        $form->text('capacity', __('Capacity'));
        $form->number('memory_type_id', __('Memory type id'));
        $form->text('modules', __('Modules'));
        $form->number('speed', __('Speed'));
        $form->decimal('voltage', __('Voltage'));
        $form->text('latency', __('Latency'));
        $form->switch('heat_spreader', __('Heat spreader'));
        $form->switch('rgb_support', __('Rgb support'));
        $form->switch('ecc_support', __('Ecc support'));
        $form->textarea('features', __('Features'));
        $form->text('official_link', __('Official link'));

        return $form;
    }
}
