<?php

namespace App\Admin\Controllers;

use App\Models\M2SSD;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class M2SSDController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'M2SSD';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new M2SSD());

        $grid->column('id', __('Id'));
        $grid->column('brand_id', __('Brand id'));
        $grid->column('name', __('Name'));
        $grid->column('form_factor_id', __('Form factor id'));
        $grid->column('interface_id', __('Interface id'));
        $grid->column('capacity', __('Capacity'));
        $grid->column('max_read', __('Max read'));
        $grid->column('max_write', __('Max write'));
        $grid->column('mtbf', __('Mtbf'));
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
        $show = new Show(M2SSD::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('brand_id', __('Brand id'));
        $show->field('name', __('Name'));
        $show->field('form_factor_id', __('Form factor id'));
        $show->field('interface_id', __('Interface id'));
        $show->field('capacity', __('Capacity'));
        $show->field('max_read', __('Max read'));
        $show->field('max_write', __('Max write'));
        $show->field('mtbf', __('Mtbf'));
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
        $form = new Form(new M2SSD());

        $form->number('brand_id', __('Brand id'));
        $form->text('name', __('Name'));
        $form->number('form_factor_id', __('Form factor id'));
        $form->number('interface_id', __('Interface id'));
        $form->text('capacity', __('Capacity'));
        $form->number('max_read', __('Max read'));
        $form->number('max_write', __('Max write'));
        $form->number('mtbf', __('Mtbf'));
        $form->textarea('features', __('Features'));
        $form->text('official_link', __('Official link'));

        return $form;
    }
}
