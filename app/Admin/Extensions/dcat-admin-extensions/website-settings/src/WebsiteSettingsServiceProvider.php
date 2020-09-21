<?php

namespace Dcat\Admin\Extension\WebsiteSettings;

use Illuminate\Support\ServiceProvider;

class WebsiteSettingsServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $extension = WebsiteSettings::make();

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, WebsiteSettings::NAME);
        }

        if ($lang = $extension->lang()) {
            $this->loadTranslationsFrom($lang, WebsiteSettings::NAME);
        }

        if ($migrations = $extension->migrations()) {
            $this->loadMigrationsFrom($migrations);
        }

        $this->app->booted(function () use ($extension) {
            $extension->routes(__DIR__.'/../routes/web.php');
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}