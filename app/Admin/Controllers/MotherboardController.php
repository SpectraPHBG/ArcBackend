<?php

namespace App\Admin\Controllers;

use App\Models\Motherboard;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MotherboardController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'MotherBoard';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Motherboard());

        $grid->column('id', __('Id'));
        $grid->column('brand_id', __('Brand id'));
        $grid->column('form_factor_id', __('Form factor id'));
        $grid->column('name', __('Name'));
        $grid->column('socket_id', __('Socket id'));
        $grid->column('chipset_id', __('Chipset id'));
        $grid->column('memory_type_id', __('Memory type id'));
        $grid->column('memories_support', __('Memories support'));
        $grid->column('max_memory', __('Max memory'));
        $grid->column('dual_ch_support', __('Dual ch support'));
        $grid->column('ecc_support', __('Ecc support'));
        $grid->column('buffer_support', __('Buffer support'));
        $grid->column('onboard_video', __('Onboard video'));
        $grid->column('onboard_audio', __('Onboard audio'));
        $grid->column('onboard_lan', __('Onboard lan'));
        $grid->column('io_ports', __('Io ports'));
        $grid->column('usb_ports', __('Usb ports'));
        $grid->column('dimensions', __('Dimensions'));
        $grid->column('features', __('Features'));
        $grid->column('led', __('Led'));
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
        $show = new Show(Motherboard::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('brand_id', __('Brand id'));
        $show->field('form_factor_id', __('Form factor id'));
        $show->field('name', __('Name'));
        $show->field('socket_id', __('Socket id'));
        $show->field('chipset_id', __('Chipset id'));
        $show->field('memory_type_id', __('Memory type id'));
        $show->field('memories_support', __('Memories support'));
        $show->field('max_memory', __('Max memory'));
        $show->field('dual_ch_support', __('Dual ch support'));
        $show->field('ecc_support', __('Ecc support'));
        $show->field('buffer_support', __('Buffer support'));
        $show->field('onboard_video', __('Onboard video'));
        $show->field('onboard_audio', __('Onboard audio'));
        $show->field('onboard_lan', __('Onboard lan'));
        $show->field('io_ports', __('Io ports'));
        $show->field('usb_ports', __('Usb ports'));
        $show->field('dimensions', __('Dimensions'));
        $show->field('features', __('Features'));
        $show->field('led', __('Led'));
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
        $form = new Form(new Motherboard());

        $form->number('brand_id', __('Brand id'));
        $form->number('form_factor_id', __('Form factor id'));
        $form->text('name', __('Name'));
        $form->number('socket_id', __('Socket id'));
        $form->number('chipset_id', __('Chipset id'));
        $form->number('memory_type_id', __('Memory type id'));
        $form->textarea('memories_support', __('Memories support'));
        $form->text('max_memory', __('Max memory'));
        $form->switch('dual_ch_support', __('Dual ch support'));
        $form->text('ecc_support', __('Ecc support'));
        $form->text('buffer_support', __('Buffer support'));
        $form->text('onboard_video', __('Onboard video'));
        $form->text('onboard_audio', __('Onboard audio'));
        $form->text('onboard_lan', __('Onboard lan'));
        $form->text('io_ports', __('Io ports'));
        $form->text('usb_ports', __('Usb ports'));
        $form->text('dimensions', __('Dimensions'));
        $form->textarea('features', __('Features'));
        $form->switch('led', __('Led'));
        $form->text('official_link', __('Official link'));

        return $form;
    }
}
