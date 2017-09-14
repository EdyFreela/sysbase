<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('guest.welcome');
});

Route::auth();

Route::group(['middleware' => ['auth']], function() {

	Route::get('admin/painel', 'AdminController@index');

	//Route::resource('admin/users','UserController');

	Route::get('admin/users',                     ['as'=>'users.index',             'uses'=>'UserController@index','middleware'              => ['permission:user-list|user-create|user-edit|user-delete']]);
	Route::get('admin/users/create',              ['as'=>'users.create',            'uses'=>'UserController@create','middleware'             => ['permission:user-create']]);
	Route::post('admin/users/create',             ['as'=>'users.store',             'uses'=>'UserController@store','middleware'              => ['permission:user-create']]);
	Route::get('admin/users/{id}',                ['as'=>'users.show',              'uses'=>'UserController@show']);
	Route::get('admin/users/{id}/edit',           ['as'=>'users.edit',              'uses'=>'UserController@edit','middleware'               => ['permission:user-edit']]);
	Route::patch('admin/users/{id}',              ['as'=>'users.update',            'uses'=>'UserController@update','middleware'             => ['permission:user-edit']]);
	Route::delete('admin/users/{id}',             ['as'=>'users.destroy',           'uses'=>'UserController@destroy','middleware'            => ['permission:user-delete']]);

	Route::get('admin/profile',                   ['as'=>'profile.index',           'uses'=>'ProfileController@index','middleware'           => ['permission:profile-list|profile-create|profile-edit|profile-delete']]);
	Route::get('admin/profile/edit',              ['as'=>'profile.edit',            'uses'=>'ProfileController@edit','middleware'            => ['permission:profile-edit']]);
	Route::patch('admin/profile/update',          ['as'=>'profile.update',          'uses'=>'ProfileController@update','middleware'          => ['permission:profile-edit']]);

	Route::get('admin/roles',                     ['as'=>'roles.index',             'uses'=>'RoleController@index','middleware'              => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('admin/roles/create',              ['as'=>'roles.create',            'uses'=>'RoleController@create','middleware'             => ['permission:role-create']]);
	Route::post('admin/roles/create',             ['as'=>'roles.store',             'uses'=>'RoleController@store','middleware'              => ['permission:role-create']]);
	Route::get('admin/roles/{id}',                ['as'=>'roles.show',              'uses'=>'RoleController@show']);
	Route::get('admin/roles/{id}/edit',           ['as'=>'roles.edit',              'uses'=>'RoleController@edit','middleware'               => ['permission:role-edit']]);
	Route::patch('admin/roles/{id}',              ['as'=>'roles.update',            'uses'=>'RoleController@update','middleware'             => ['permission:role-edit']]);
	Route::delete('admin/roles/{id}',             ['as'=>'roles.destroy',           'uses'=>'RoleController@destroy','middleware'            => ['permission:role-delete']]);

	Route::get('admin/permissions',               ['as'=>'permissions.index',       'uses'=>'PermissionController@index','middleware'        => ['permission:permission-list|permission-create|permission-edit|permission-delete']]);
	Route::get('admin/permissions/create',        ['as'=>'permissions.create',      'uses'=>'PermissionController@create','middleware'       => ['permission:permission-create']]);
	Route::post('admin/permissions/create',       ['as'=>'permissions.store',       'uses'=>'PermissionController@store','middleware'        => ['permission:permission-create']]);
	Route::get('admin/permissions/{id}',          ['as'=>'permissions.show',        'uses'=>'PermissionController@show']);
	Route::get('admin/permissions/{id}/edit',     ['as'=>'permissions.edit',        'uses'=>'PermissionController@edit','middleware'         => ['permission:permission-edit']]);
	Route::patch('admin/permissions/{id}',        ['as'=>'permissions.update',      'uses'=>'PermissionController@update','middleware'       => ['permission:permission-edit']]);
	Route::delete('admin/permissions/{id}',       ['as'=>'permissions.destroy',     'uses'=>'PermissionController@destroy','middleware'      => ['permission:permission-delete']]);

	Route::get('admin/itemCRUD2',                 ['as'=>'itemCRUD2.index',         'uses'=>'ItemCRUD2Controller@index','middleware'         => ['permission:item-list|item-create|item-edit|item-delete']]);
	Route::get('admin/itemCRUD2/create',          ['as'=>'itemCRUD2.create',        'uses'=>'ItemCRUD2Controller@create','middleware'        => ['permission:item-create']]);
	Route::post('admin/itemCRUD2/create',         ['as'=>'itemCRUD2.store',         'uses'=>'ItemCRUD2Controller@store','middleware'         => ['permission:item-create']]);
	Route::get('admin/itemCRUD2/{id}',            ['as'=>'itemCRUD2.show',          'uses'=>'ItemCRUD2Controller@show']);
	Route::get('admin/itemCRUD2/{id}/edit',       ['as'=>'itemCRUD2.edit',          'uses'=>'ItemCRUD2Controller@edit','middleware'          => ['permission:item-edit']]);
	Route::patch('admin/itemCRUD2/{id}',          ['as'=>'itemCRUD2.update',        'uses'=>'ItemCRUD2Controller@update','middleware'        => ['permission:item-edit']]);
	Route::delete('admin/itemCRUD2/{id}',         ['as'=>'itemCRUD2.destroy',       'uses'=>'ItemCRUD2Controller@destroy','middleware'       => ['permission:item-delete']]);
});
