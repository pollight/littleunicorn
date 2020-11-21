<?php

namespace App\Admin\Controllers;

use App\Models\Label;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LabelController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Справочник товары/Метки';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Label());

        $grid->column('id', __('Id'));
        $grid->column('view','Опубликовать')->display(function($view) {
            $label = $view == 1 ? 'label-success' : 'label-danger';
            $word = $view == 1 ? 'да' : 'нет';
            return '<span class="label '.$label.'">'.$word.'</span>';
        });
        $grid->column('title', __('Метка'));

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
        $show = new Show(Label::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('slug', __('Slug'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Label());
        $states = [
            'on'  => ['value' => 1, 'text' => 'Да', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => 'Нет', 'color' => 'danger'],
        ];
        $form->switch('view','Опубликовать')
            ->states($states)
            ->default(0);
        $form->text('title', __('Метка'));

        return $form;
    }
}
