<?php

Route::group(['prefix' => 'post'], function() {

    Route::post('/', 'Api\Post\PostCreateController@create');
    Route::get('/', 'Api\Post\PostListController@list');

    Route::get('/{id}', 'Api\Post\PostViewController@view');
    Route::put('/{id}', 'Api\Post\PostUpdateController@update');
    Route::delete('/{id}', 'Api\Post\PostDeleteController@delete');

});
