<?php

namespace App\Admin\Forms;

use Dcat\Admin\Widgets\Form;
use Symfony\Component\HttpFoundation\Response;

class Setting extends Form
{
    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return Response
     */
    public function handle(array $input)
    {
        // dump($input);
        logger($input);
        // return $this->error('Your error message.');

        return $this->success('提交成功', '/setting');
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->confirm('您确定要提交表单吗', 'content');

        $this->text('name','网站名称')->required();
//        $this->email('email')->rules('email');
        $this->url('url','网站地址')->rules('url')->required();
        $this->image('logo','网站logo');
        $this->editor('copyright','网站版权')->required();
    }

    /**
     * The data of the form.
     *
     * @return array
     */
    public function default()
    {
        return [
//            'name' => 'John Doe',
//            'email' => 'John.Doe@gmail.com',
        ];
    }
}
