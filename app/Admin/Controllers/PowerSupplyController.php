<?php

namespace App\Admin\Controllers;

use App\Models\PowerSupply;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PowerSupplyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'PowerSupply';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PowerSupply());

        $grid->column('id', __('Id'));
        $grid->column('brand_id', __('Brand id'));
        $grid->column('name', __('Name'));
        $grid->column('form_factor_id', __('Form factor id'));
        $grid->column('max_power', __('Max power'));
        $grid->column('fans', __('Fans'));
        $grid->column('certificate', __('Certificate'));
        $grid->column('connectors', __('Connectors'));
        $grid->column('input_voltage', __('Input voltage'));
        $grid->column('efficiency', __('Efficiency'));
        $grid->column('modular', __('Modular'));
        $grid->column('sli', __('Sli'));
        $grid->column('crossfire', __('Crossfire'));
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
        $show = new Show(PowerSupply::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('brand_id', __('Brand id'));
        $show->field('name', __('Name'));
        $show->field('form_factor_id', __('Form factor id'));
        $show->field('max_power', __('Max power'));
        $show->field('fans', __('Fans'));
        $show->field('certificate', __('Certificate'));
        $show->field('connectors', __('Connectors'));
        $show->field('input_voltage', __('Input voltage'));
        $show->field('efficiency', __('Efficiency'));
        $show->field('modular', __('Modular'));
        $show->field('sli', __('Sli'));
        $show->field('crossfire', __('Crossfire'));
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
        $form = new Form(new PowerSupply());

        $form->number('brand_id', __('Brand id'));
        $form->text('name', __('Name'));
        $form->number('form_factor_id', __('Form factor id'));
        $form->number('max_power', __('Max power'));
        $form->text('fans', __('Fans'));
        $form->text('certificate', __('Certificate'));
        $form->textarea('connectors', __('Connectors'));
        $form->text('input_voltage', __('Input voltage'));
        $form->decimal('efficiency', __('Efficiency'));
        $form->text('modular', __('Modular'));
        $form->text('sli', __('Sli'));
        $form->text('crossfire', __('Crossfire'));
        $form->text('dimensions', __('Dimensions'));
        $form->textarea('features', __('Features'));
        $form->text('official_link', __('Official link'));

        return $form;
    }
}
