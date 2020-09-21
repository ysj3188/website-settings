<?php

use Dcat\Admin\Extension\WebsiteSettings\Http\Controllers;

Route::get('website-settings', Controllers\WebsiteSettingsController::class.'@index');