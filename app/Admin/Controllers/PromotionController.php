<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use App\Models\Promotion;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PromotionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Promotion';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Promotion());

        $grid->column('id', __('Id'));
        $grid->column('products','Товары')->display(function ($roles) {
            $roles = array_map(function ($role) {
                if($role!=null){
                    $name = Product::find($role)->name;
                    return "<span class='label label-success'>{$name}</span>";
                }
            }, $roles);
            return join('&nbsp;', $roles);
        });
        $grid->column('promotion', __('Promotion'));




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
        $show = new Show(Promotion::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('products', __('Products'));
        $show->field('promotion', __('Promotion'));
        $show->field('slug', __('Slug'));
        $show->field('image', __('Image'));
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
        $form = new Form(new Promotion());
        $form->text('promotion', __('Название акции'));
        $form->multipleSelect('products')->options(function ($id) {
            $arr = [];
            $product = Product::find($id);
            if ($product) {
                foreach ($product as $prod){
                    $arr += [$prod->id => $prod->name];
                }
                return $arr;
            }
        })->ajax('/api/admin/promotions');


        return $form;
    }
}
