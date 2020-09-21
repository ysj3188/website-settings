<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Setting;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class SettingController extends AdminController
{

    public function index(Content $content)
    {
        return Form::make(new Setting(), function (Form $form) {
            $form->title('网站设置');

            $form->display('id');
            $form->text('name','网站名称');
            $form->text('url','网站地址');
            $form->image('logo','网站logo')->saveFullUrl();
            $form->text('copyright','版权信息');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Setting(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('url');
            $grid->column('logo');
            $grid->column('copyright');
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
        return Show::make($id, new Setting(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('url');
            $show->field('logo');
            $show->field('copyright');
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
        return Form::make(new Setting(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('url');
            $form->text('logo');
            $form->text('copyright');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
