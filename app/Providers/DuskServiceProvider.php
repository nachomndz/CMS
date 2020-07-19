<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\Browser;
use Facebook\WebDriver\WebDriverBy;


class DuskServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //


        Browser::macro('chooseRandomRadioOption', function ($radioElement) {
            $radio_options = $this->driver->findElements(WebDriverBy::name($radioElement));
            $radio_options[array_rand($radio_options)]->click();
        });

        Browser::macro('elementExists', function ($element) {
            return count($this->driver->findElements(WebDriverBy::cssSelector($element))) > 0 ? true : false;
        });
    }
}
