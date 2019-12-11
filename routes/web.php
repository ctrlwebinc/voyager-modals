<?php

/**
 * Pages catch-all route.
 */
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
Route::group([
    'as' => 'voyager.modals.',
    'middleware' => ['web'],
    'namespace' => '\Ctrlweb\VoyagerModals\Http\Controllers',
], function () {
    Route::get('modal/{slug}', ['uses' => 'ModalController@getModal', 'as' => 'getModal']);
});
