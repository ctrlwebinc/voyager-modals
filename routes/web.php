<?php

/**
 * Pages catch-all route.
 */
\Ctrlweb\VoyagerModals\Helpers\Routes::registerModalRoutes();

Route::group([
    'as' => 'voyager.modal-blocks.',
    'prefix' => 'admin/modal-blocks/',
    'middleware' => ['web', 'admin.user'],
    'namespace' => '\Ctrlweb\VoyagerModals\Http\Controllers',
], function () {
    Route::post('sort', ['uses' => 'ModalBlockController@sort', 'as' => 'sort']);
    Route::post('minimize', ['uses' => 'ModalBlockController@minimize', 'as' => 'minimize']);
});
Route::group([
    'as' => 'voyager.modal.',
    'prefix' => 'admin/modals/',
    'middleware' => ['web', 'admin.user'],
    'namespace' => '\Ctrlweb\VoyagerModals\Http\Controllers',
], function () {
    Route::get('all', ['uses' => 'ModalController@get_modals_for_select', 'as' => 'all']);
});
