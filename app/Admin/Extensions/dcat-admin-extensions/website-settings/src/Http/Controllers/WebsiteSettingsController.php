<?php

namespace Dcat\Admin\Extension\WebsiteSettings\Http\Controllers;

use Dcat\Admin\Layout\Content;
use Illuminate\Routing\Controller;

class WebsiteSettingsController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('网站设置')
            ->description('修改网站基本设置')
            ->body(view('website-settings::index'));
    }
}
