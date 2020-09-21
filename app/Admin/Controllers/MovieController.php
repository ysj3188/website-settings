<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Movie;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class MovieController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Movie(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('title');
            $grid->column('avatar')->image('asdads',40,'40');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Movie(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('title');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Movie(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('title');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
