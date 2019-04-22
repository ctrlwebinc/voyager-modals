<?php

namespace Ctrlweb\VoyagerModals\Helpers;

use Ctrlweb\VoyagerModals\Modal;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Request;

class Routes
{
    /**
     * Dynamically register pages.
     */
    public static function registerModalRoutes()
    {
        // Prevents error before our migration has run
        if (! Schema::hasTable('modals')) {
            return;
        }

        $modalController = '\Ctrlweb\VoyagerModals\Http\Controllers\ModalController';

        // Get all page slugs (note it's cached for 5mins)
        $modals = Cache::remember('modals/slugs', 5, function () {
            return Modal::all('slug');
        });

        $slug = str_replace('modal/','', Request::path());

        // When the current URI is known to be a page slug, let it be a route
        if ($modals->contains('slug', $slug)) {
            Route::get('/modal/{slug}', "$modalController@getModal")
                ->middleware('web')
                ->where('slug', '.+');
        }
    }
}
