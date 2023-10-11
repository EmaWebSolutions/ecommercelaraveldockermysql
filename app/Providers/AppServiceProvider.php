<?php

namespace App\Providers;

use App\Models\Language;
use App\Models\Menu;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File; // Import the File class
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
      

            try {
                $language = Setting::where('slug', 'default_language')->first();
                if ($language) {
                    $locale = $language->value;

                    $lang = Language::where('locale', $locale)->first();
                    session(['APP_LOCALE' => $locale, 'lang_dir' => $lang->direction]);

                }
            } catch (\Exception $e) {
                //
            }

         if (File::exists(base_path('migrations_and_seeders_completed.flag'))) {
            // Code that relies on migrations and seeders here
            $all_menus = Menu::where('is_static', INACTIVE)->with('submenus')->latest()->get();
            $allsettings = allsetting();
            view()->share(['all_menus' => $all_menus, 'allsettings' => $allsettings]);
        }
    }
}
