<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->column('city', __('City'));
        $grid->column('flat', __('Flat'));
        $grid->column('floor', __('Floor'));
        $grid->column('door', __('Door'));
        $grid->column('domofon', __('Domofon'));
        $grid->column('comment_delivery', __('Comment delivery'));
        $grid->column('user_id', __('User id'));
        $grid->column('transaction_id', __('Transaction id'));
        $grid->column('count', __('Count'));
        $grid->column('amount', __('Amount'));
        $grid->column('delivery_count', __('Delivery count'));
        $grid->column('status', __('Status'));
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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('city', __('City'));
        $show->field('flat', __('Flat'));
        $show->field('floor', __('Floor'));
        $show->field('door', __('Door'));
        $show->field('domofon', __('Domofon'));
        $show->field('comment_delivery', __('Comment delivery'));
        $show->field('user_id', __('User id'));
        $show->field('transaction_id', __('Transaction id'));
        $show->field('count', __('Count'));
        $show->field('amount', __('Amount'));
        $show->field('delivery_count', __('Delivery count'));
        $show->field('status', __('Status'));
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
        $form = new Form(new Order());

        $form->text('city', __('City'));
        $form->text('flat', __('Flat'));
        $form->number('floor', __('Floor'));
        $form->text('door', __('Door'));
        $form->text('domofon', __('Domofon'));
        $form->textarea('comment_delivery', __('Comment delivery'));
        $form->number('user_id', __('User id'));
        $form->text('transaction_id', __('Transaction id'));
        $form->number('count', __('Count'));
        $form->number('amount', __('Amount'));
        $form->number('delivery_count', __('Delivery count'));
        $form->text('status', __('Status'));

        return $form;
    }
}
