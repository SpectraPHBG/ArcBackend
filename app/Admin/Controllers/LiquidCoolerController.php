<?php

namespace App\Admin\Controllers;

use App\Models\LiquidCooler;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LiquidCoolerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'LiquidCooler';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new LiquidCooler());

        $grid->column('id', __('Id'));
        $grid->column('brand_id', __('Brand id'));
        $grid->column('name', __('Name'));
        $grid->column('radiator', __('Radiator'));
        $grid->column('fan_mounting', __('Fan mounting'));
        $grid->column('consumption', __('Consumption'));
        $grid->column('max_pressure', __('Max pressure'));
        $grid->column('power_connector_pins', __('Power connector pins'));
        $grid->column('air_flow', __('Air flow'));
        $grid->column('pump_rpm', __('Pump rpm'));
        $grid->column('pump_voltage', __('Pump voltage'));
        $grid->column('tube_length', __('Tube length'));
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
        $show = new Show(LiquidCooler::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('brand_id', __('Brand id'));
        $show->field('name', __('Name'));
        $show->field('radiator', __('Radiator'));
        $show->field('fan_mounting', __('Fan mounting'));
        $show->field('consumption', __('Consumption'));
        $show->field('max_pressure', __('Max pressure'));
        $show->field('power_connector_pins', __('Power connector pins'));
        $show->field('air_flow', __('Air flow'));
        $show->field('pump_rpm', __('Pump rpm'));
        $show->field('pump_voltage', __('Pump voltage'));
        $show->field('tube_length', __('Tube length'));
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
        $form = new Form(new LiquidCooler());

        $form->number('brand_id', __('Brand id'));
        $form->text('name', __('Name'));
        $form->number('radiator', __('Radiator'));
        $form->text('fan_mounting', __('Fan mounting'));
        $form->decimal('consumption', __('Consumption'));
        $form->decimal('max_pressure', __('Max pressure'));
        $form->number('power_connector_pins', __('Power connector pins'));
        $form->text('air_flow', __('Air flow'));
        $form->number('pump_rpm', __('Pump rpm'));
        $form->number('pump_voltage', __('Pump voltage'));
        $form->number('tube_length', __('Tube length'));
        $form->switch('rgb', __('Rgb'));
        $form->text('dimensions', __('Dimensions'));
        $form->textarea('features', __('Features'));
        $form->text('official_link', __('Official link'));

        return $form;
    }
}
