<?php

namespace App\Admin\Controllers;

use App\Models\SataSSD;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SataSSDController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'SataSSD';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SataSSD());

        $grid->column('id', __('Id'));
        $grid->column('brand_id', __('Brand id'));
        $grid->column('name', __('Name'));
        $grid->column('interface_id', __('Interface id'));
        $grid->column('form_factor', __('Form factor'));
        $grid->column('capacity', __('Capacity'));
        $grid->column('max_read', __('Max read'));
        $grid->column('max_write', __('Max write'));
        $grid->column('mtbf', __('Mtbf'));
        $grid->column('terabyte_written', __('Terabytes Written'));
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
        $show = new Show(SataSSD::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('brand_id', __('Brand id'));
        $show->field('name', __('Name'));
        $show->field('interface_id', __('Interface id'));
        $show->field('form_factor', __('Form factor'));
        $show->field('capacity', __('Capacity'));
        $show->field('max_read', __('Max read'));
        $show->field('max_write', __('Max write'));
        $show->field('mtbf', __('Mtbf'));
        $show->field('terabyte_written', __('Terabytes Written'));
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
        $form = new Form(new SataSSD());

        $form->number('brand_id', __('Brand id'));
        $form->text('name', __('Name'));
        $form->number('interface_id', __('Interface id'));
        $form->decimal('form_factor', __('Form factor'));
        $form->text('capacity', __('Capacity'));
        $form->number('max_read', __('Max read'));
        $form->number('max_write', __('Max write'));
        $form->number('mtbf', __('Mtbf'));
        $form->number('terabyte_written', __('Terabytes Written'));
        $form->textarea('features', __('Features'));
        $form->text('official_link', __('Official link'));

        return $form;
    }
}
