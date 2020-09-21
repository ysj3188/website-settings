<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\ShowUser;
use App\Admin\Forms\Setting;
use App\Admin\Repositories\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Widgets\Card;

class UserController extends AdminController
{

//    public function index(Content $content)
//    {
//        return $content
//            ->header('用户')
//            ->description("用户描述")
//            ->body(function (Row $row){
//            $row->column(6,function (Column $column){
//                $column->row(function (Row $row) {
//                    $row->column(6, ShowUser::make());
//                    $row->column(6, new \App\Admin\Metrics\Examples\NewUsers());
//                });
//            });
//        });
//    }

    public function setting(Content $content)
    {
        return $content
            ->title('网站设置')
            ->body(new Card(new Setting()));
}
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new User(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name')->filter();
            $grid->column('email');
            $grid->column('email_verified_at');
//            $grid->column('password');
//            $grid->column('remember_token');
            $grid->column('created_at')->filter(Grid\Column\Filter\Like::make()->datetime());
            $grid->column('updated_at')->sortable();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->between('created_at','创建日期')->datetime();

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
        return Show::make($id, new User(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('email');
            $show->field('email_verified_at');
            $show->field('password');
            $show->field('remember_token');
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
        return Form::make(new User(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('email');
            $form->text('email_verified_at');
            $form->password('password');
            $form->text('remember_token');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
