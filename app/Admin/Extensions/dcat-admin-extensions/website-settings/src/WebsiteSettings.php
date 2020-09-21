<?php

namespace Dcat\Admin\Extension\WebsiteSettings;

use Dcat\Admin\Extension;

class WebsiteSettings extends Extension
{
    const NAME = 'website-settings';

    protected $serviceProvider = WebsiteSettingsServiceProvider::class;

    protected $composer = __DIR__.'/../composer.json';

//    protected $assets = __DIR__.'/../resources/assets';

    protected $views = __DIR__.'/../resources/views';

//    protected $lang = __DIR__.'/../resources/lang';

    protected $menu = [
        'title' => 'Websitesettings',
        'path'  => 'website-settings',
        'icon'  => '',
    ];
}
