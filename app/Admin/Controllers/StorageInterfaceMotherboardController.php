<?php

namespace App\Admin\Controllers;

use App\Models\StorageInterfaceMotherboard;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StorageInterfaceMotherboardController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'StorageInterfaceMotherboard';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new StorageInterfaceMotherboard());

        $grid->column('id', __('Id'));
        $grid->column('interface_id', __('Interface id'));
        $grid->column('board_id', __('Board id'));
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
        $show = new Show(StorageInterfaceMotherboard::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('interface_id', __('Interface id'));
        $show->field('board_id', __('Board id'));
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
        $form = new Form(new StorageInterfaceMotherboard());

        $form->number('interface_id', __('Interface id'));
        $form->number('board_id', __('Board id'));
        $form->number('amount', __('Amount'));

        return $form;
    }
}
