<?php

namespace App\Admin\Controllers;

use App\Models\PCCaseMotherboard;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PCCaseMotherboardController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'PCCaseMotherboard';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PCCaseMotherboard());

        $grid->column('id', __('Id'));
        $grid->column('case_id', __('Case id'));
        $grid->column('factor_id', __('Factor id'));
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
        $show = new Show(PCCaseMotherboard::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('case_id', __('Case id'));
        $show->field('factor_id', __('Factor id'));
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
        $form = new Form(new PCCaseMotherboard());

        $form->number('case_id', __('Case id'));
        $form->number('factor_id', __('Factor id'));

        return $form;
    }
}
