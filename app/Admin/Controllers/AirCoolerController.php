<?php

namespace App\Admin\Controllers;

use App\Models\AirCooler;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AirCoolerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'AirCooler';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new AirCooler());

        $grid->column('id', __('Id'));
        $grid->column('brand_id', __('Brand id'));
        $grid->column('name', __('Name'));
        $grid->column('bearing', __('Bearing'));
        $grid->column('fans', __('Fans'));
        $grid->column('fan_mounting', __('Fan mounting'));
        $grid->column('consumption', __('Consumption'));
        $grid->column('power_connector', __('Power connector'));
        $grid->column('air_flow', __('Air flow'));
        $grid->column('rgb', __('Rgb'));
        $grid->column('dimensions', __('Dimensions'));
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
        $show = new Show(AirCooler::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('brand_id', __('Brand id'));
        $show->field('name', __('Name'));
        $show->field('bearing', __('Bearing'));
        $show->field('fans', __('Fans'));
        $show->field('fan_mounting', __('Fan mounting'));
        $show->field('consumption', __('Consumption'));
        $show->field('power_connector', __('Power connector'));
        $show->field('air_flow', __('Air flow'));
        $show->field('rgb', __('Rgb'));
        $show->field('dimensions', __('Dimensions'));
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
        $form = new Form(new AirCooler());

        $form->number('brand_id', __('Brand id'));
        $form->text('name', __('Name'));
        $form->text('bearing', __('Bearing'));
        $form->number('fans', __('Fans'));
        $form->text('fan_mounting', __('Fan mounting'));
        $form->decimal('consumption', __('Consumption'));
        $form->text('power_connector', __('Power connector'));
        $form->text('air_flow', __('Air flow'));
        $form->switch('rgb', __('Rgb'));
        $form->text('dimensions', __('Dimensions'));
        $form->textarea('features', __('Features'));
        $form->text('official_link', __('Official link'));

        return $form;
    }
}
