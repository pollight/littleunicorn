<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Категория';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {

        $grid = new Grid(new Category() );
        $grid->column('id', __('Id'));
        $grid->column('name', __('Наименование'));
        $grid->column('category_id', __('Родителькая категория'))->display(function ($name) {
            $parent_cat = Category::find($name);
            if($parent_cat != null){
                return $parent_cat->name;
            }
        })->sortable();
        $grid->column('img', __('Изображение'))->lightbox([
            'width' => 50,
            'height' => 50,
            'zooming' => true,
        ]);
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
        $show = new Show(Category::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('parent_id', __('Parent id'));
        $show->field('name', __('Name'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Category());
        $form->image('img', __('Изображение'));
        return $form;
    }
}
