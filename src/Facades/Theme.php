<?php

namespace Oxygen\Theme\Facades;

use Illuminate\Support\Facades\Facade;
use Oxygen\Theme\ThemeManager;

class Theme extends Facade {

    protected static function getFacadeAccessor() {
        return ThemeManager::class;
    }

}
