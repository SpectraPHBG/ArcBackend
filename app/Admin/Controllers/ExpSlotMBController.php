<?php

namespace App\Admin\Controllers;

use App\Models\ExpansionSlotMotherboard;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ExpSlotMBController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ExpansionSlotMotherboard';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ExpansionSlotMotherboard());

        $grid->column('id', __('Id'));
        $grid->column('slot_id', __('Slot id'));
        $grid->column('motherboard_id', __('Motherboard id'));
        $grid->column('amount', __('Amount'));
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
        $show = new Show(ExpansionSlotMotherboard::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('slot_id', __('Slot id'));
        $show->field('motherboard_id', __('Motherboard id'));
        $show->field('amount', __('Amount'));
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
        $form = new Form(new ExpansionSlotMotherboard());

        $form->number('slot_id', __('Slot id'));
        $form->number('motherboard_id', __('Motherboard id'));
        $form->number('amount', __('Amount'));

        return $form;
    }
}
