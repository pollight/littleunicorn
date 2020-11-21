<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Label;
use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->filter(function($filter){

            // Remove the default id filter
            $filter->disableIdFilter();

            // Add a column filter
            $filter->like('name', 'Имя');

        });

        $grid->column('id', __('Id'));
//        $grid->column('pathName', __('Категория'))->sortable();
        $grid->column('name', __('Имя'));
        $grid->column('externalCode', __('Артикул'));
        $grid->column('category_id','Категория')->display(function($cat) {
          return Category::find($cat)->name;
        });
//        $grid->column('label.title', __('Метка'))->sortable()->label('info');
        $grid->column('price', __('Цена'))->sortable()->editable('text');
        $grid->column('discount', __('Скидка(%)'))->editable('text');

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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product());

        $form->select('category_id','Категория')->options(Category::all()->pluck('name', 'id'));

        $form->column(12, function ($form) {
            $form->text('name', __('Заголовок'))
                ->creationRules('required|max:199');
        });

        $form->decimal('discount', __('Скидка'));
        $form->decimal('price', __('Цена'));

        $form->ckeditor('description','Описание')
            ->rules('required');
        $form->decimal('weight', __('Вес'))->help('Дробный разделитель "."');
        $form->column(12, function ($form) {
            $form->table('options','Цены', function ($table) {
//                $table->select( 'option','Опция' )->options(
//                    [1 => 'Цена']
//                );
                $table->text('value','Значение');
                $table->text('name','Имя');
            });
        });

        return $form;
    }
}
