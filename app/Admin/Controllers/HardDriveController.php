<?php

namespace App\Admin\Controllers;

use App\Models\HardDrive;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class HardDriveController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'HardDrive';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new HardDrive());

        $grid->column('id', __('Id'));
        $grid->column('brand_id', __('Brand id'));
        $grid->column('name', __('Name'));
        $grid->column('interface_id', __('Interface id'));
        $grid->column('form_factor', __('Form factor'));
        $grid->column('capacity', __('Capacity'));
        $grid->column('rpm', __('Rpm'));
        $grid->column('cache', __('Cache'));
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
        $show = new Show(HardDrive::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('brand_id', __('Brand id'));
        $show->field('name', __('Name'));
        $show->field('interface_id', __('Interface id'));
        $show->field('form_factor', __('Form factor'));
        $show->field('capacity', __('Capacity'));
        $show->field('rpm', __('Rpm'));
        $show->field('cache', __('Cache'));
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
        $form = new Form(new HardDrive());

        $form->number('brand_id', __('Brand id'));
        $form->text('name', __('Name'));
        $form->number('interface_id', __('Interface id'));
        $form->decimal('form_factor', __('Form factor'));
        $form->text('capacity', __('Capacity'));
        $form->number('rpm', __('Rpm'));
        $form->number('cache', __('Cache'));
        $form->text('dimensions', __('Dimensions'));
        $form->textarea('features', __('Features'));
        $form->text('official_link', __('Official link'));

        return $form;
    }
}
