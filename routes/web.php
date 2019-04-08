<?php

/**
 * Admin Routes
 */
Route::group([
    'as' => 'voyager.page-modals.',
    'prefix' => 'admin/page-modals/',
    'middleware' => ['web', 'admin.user'],
    'namespace' => '\Ctrlweb\VoyagerPageModals\Http\Controllers'
], function () {
});
