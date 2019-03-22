<?php

Route::get('/', function () {
    return view('welcome');  
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//rutas excel
Route::get('descargar-articulos', 'ArticlesController@excela')->name('articles.excela');
Route::get('descargar-trabajadores', 'WorkersController@excelw')->name('workers.excelw');
Route::get('descargar-quimicos', 'ArticlesController@excelq')->name('articles.excel');
Route::get('descargar-quimicoss', 'ArticlesController@excelqs')->name('articless.excel');
Route::get('descargar-bandejas', 'ArticlesController@excelto')->name('operations.excel');
Route::get('descargar-bandejass', 'ArticlesController@exceltr')->name('operationss.excel');
//rutas excel

Route::middleware('auth')->group(function() {
    //rutas pdf
Route::get('admin/workers/pdf', 'WorkersController@gpdf')->middleware('permission:workers.gpdf');
Route::get('admin/inventories/pdf', 'ArticlesController@gpdfa')->middleware('permission:inventories.gpdfa');
Route::get('admin/chemicals/pdf', 'ArticlesController@gpdfq')->middleware('permission:chemicals.gpdfq');
Route::get('admin/chemicals/pdfs', 'ArticlesController@gpdfqs')->middleware('permission:chemicals.gpdfqs');
Route::get('admin/trays/pdfto', 'ArticlesController@gpdfto');
Route::get('admin/trays/pdftr', 'ArticlesController@gpdftr');
    //rutas pdf

Route::get('/mantenedor_inventario', 'InventarioController@index');
Route::get('/control_quimicos', 'ProductosQuimicosController@index');
Route::get('/indexBandejasEnviadas', 'BandejasEnviadasController@index');
Route::get('/indexBandejasRecibidas', 'BandejasRecibidasController@index');
Route::get('/panel_control', 'PanelControlController@panel_control');
Route::get('/mantenedor_usuarios', 'PanelControlController@usuarios');

    //rutas de trabajadores
Route::get('/admin/workers', 'WorkersController@index')->middleware('permission:workers.index');
Route::get('/admin/workers/create','WorkersController@create')->middleware('permission:workers.create');
Route::get('/admin/workers/{id}/edit','WorkersController@edit')->middleware('permission:workers.edit');
Route::post('/admin/workers/{id}/delete','WorkersController@destroy')->middleware('permission:workers.destroy'); 
Route::get('/admin/workers/{id}/view','WorkersController@view')->middleware('permission:workers.view');
Route::post('/admin/workers','WorkersController@store')->middleware('permission:workers.store');
Route::post('/admin/workers/{id}/edit','WorkersController@update')->middleware('permission:workers.update');
Route::get('/search','WorkersController@show')->middleware('permission:workers.show');
    //rutas de trabajadores

    //rutas Articulos
Route::get('/admin/inventories', 'ArticlesController@index')->middleware('permission:inventories.index');
Route::get('/admin/inventories/create','ArticlesController@create')->middleware('permission:inventories.create'); 
Route::post('/admin/inventories','ArticlesController@store')->middleware('permission:inventories.store'); 
Route::get('/admin/inventories/{id}/edit','ArticlesController@edit')->middleware('permission:inventories.edit'); 
Route::post('/admin/inventories/{id}/delete','ArticlesController@destroy')->middleware('permission:inventories.destroy'); 
Route::post('/admin/inventories/{id}/edit','ArticlesController@update')->middleware('permission:inventories.update');
Route::get('/admin/inventories/{id}/index','ArticlesController@res')->middleware('permission:inventories.res');
Route::get  ('/admin/inventories/{id}/detail','ArticlesController@detail')->middleware('permission:inventories.detail'); 
Route::get('/admin/inventories/{id}/re','ArticlesController@re')->middleware('permission:inventories.re'); 
Route::post('/admin/inventories/{id}/res','ArticlesController@res')->middleware('permission:inventories.res');
Route::get  ('/search','ArticlesController@search')->middleware('permission:inventories.search');
Route::get('/admin/tests/{id}/index', 'ArticlesController@stock');
     //rutas Articulos

    //rutas quimicos
Route::get('/admin/chemicals_in', 'ArticlesController@chemicals_in')->middleware('permission:chemicals.chemicals_in');
Route::get('/admin/chemicals_out', 'ArticlesController@chemicals_out')->middleware('permission:chemicals.chemicals_out'); 
Route::get('/admin/chemicals/{article_id}/chemical_out','ArticlesController@chemical_out')->middleware('permission:chemicals.chemical_out'); 
Route::post('/admin/chemicals/{id}/chemicalout','ArticlesController@chemicaloutstore')->middleware('permission:chemicals.chemicaloutstore');
Route::get('/admin/chemicals/{id}/chemical_in','ArticlesController@chemicalin')->middleware('permission:chemicals.chemicalin'); 
Route::post('/admin/chemical','ArticlesController@chemicalinstore')->middleware('permission:chemicals.chemicalinstore');
Route::get('/searchq','ArticlesController@showq')->middleware('permission:chemicals.showq');
Route::get('/searchqs','ArticlesController@showqs')->middleware('permission:chemicals.showqs'); 
Route::post('/admin/chemicals/{id}/delete','ArticlesController@destroyqs')->middleware('permission:chemicals.destroyqs');
    //rutas quimicos

    //rutas bandejas
Route::get('/admin/trays_in', 'ArticlesController@trays_in')->middleware('permission:trays.trays_in'); 
Route::get('/admin/trays/{article_id}/tray_out','ArticlesController@tray_out')->middleware('permission:trays.tray_out');
Route::post('/admin/trays/{id}/tray_out','ArticlesController@tray_out_store')->middleware('permission:trays.tray_out_store');   
Route::get('/admin/trays_out', 'ArticlesController@trays_out')->middleware('permission:trays.trays_out');
Route::post('/admin/trays/tray_in_store','ArticlesController@tray_in_store')->middleware('permission:trays.tray_in_store');   
Route::get('/admin/trays/{id}/tray_out_view','ArticlesController@tray_out_view')->middleware('permission:trays.tray_out_view');
Route::get('/admin/trays/{id}/trays_return_view','ArticlesController@trays_return_view');
Route::get('/admin/trays/{id}/tray_out_view','ArticlesController@tray_out_view')->middleware('permission:trays.tray_out_view');  
Route::get('/admin/trays/{berrie_id}/tray_return','ArticlesController@tray_return')->middleware('permission:trays.tray_return');
Route::post('/admin/trays/{id}/delete','ArticlesController@destroytr')->middleware('permission:trays.destroytr'); 
Route::post('/admin/trayss/{id}/delete','ArticlesController@destroyto')->middleware('permission:trays.destroyto');  


Route::get('/admin/trays/{id}/tray_out_edit','ArticlesController@tray_out_edit')->middleware('permission:trays.tray_out_edit'); 
Route::get('/admin/trays_return', 'ArticlesController@trays_return')->middleware('permission:trays.trays_return');
Route::get('/searchts','ArticlesController@showts')->middleware('permission:trays.showts');       
Route::get('/searchtr','ArticlesController@showtr')->middleware('permission:trays.showtr');   

Route::get('admin/trays/tray_return/ajax1/{a_id}/{b_id}','ArticlesController@tipo_bandejaAjax')->middleware('permission:trays.tipo_bandeja.ajax');

Route::get('admin/trays/tray_return/ajax2/{a_id}/{b_id}','ArticlesController@tipo_bandeja1Ajax')->middleware('permission:trays.tipo_bandeja1.ajax');

    //rutas bandejas 

    //rutas usuarios
Route::get('/admin/users', 'UsersController@index')->middleware('permission:users.index');   
Route::get('/admin/users/create','UsersController@create')->middleware('permission:users.create');    
Route::get('/admin/users/{id}/edit','UsersController@edit')->middleware('permission:users.edit'); 
Route::post('/admin/users/{id}/edit','UsersController@update')->middleware('permission:users.update'); 
Route::post('/admin/users/{id}/delete','UsersController@destroy')->middleware('permission:users.destroy'); 
    //rutas usuarios

    //rutas Huertos
Route::get('/admin/berries', 'BerriesController@index')->middleware('permission:berries.index'); 
Route::get('/admin/berries/create','BerriesController@create')->middleware('permission:berries.create');  
Route::post('/admin/berries','BerriesController@store')->middleware('permission:berries.store');   
Route::get('/admin/berries/{id}/edit','BerriesController@edit')->middleware('permission:berries.edit');   
Route::post('/admin/berries/{id}/delete','BerriesController@destroy')->middleware('permission:berries.destroy');  
Route::post('/admin/berries/{id}/edit','BerriesController@update')->middleware('permission:berries.update');
Route::get('/searchb','ArticlesController@showb')->middleware('permission:berries.showb');  
     //rutas Huertos
 
    //rutas generos
Route::get('/admin/genders', 'GenderController@index');
Route::get('/admin/genders/create','GenderController@create');
Route::post('/admin/genders','GenderController@store');
Route::get('/admin/genders/{id}/edit','GenderController@edit');
Route::post('/admin/genders/{id}/edit','GenderController@update');
Route::post('/admin/genders/{id}/delete','GenderController@destroy');
    //rutas generos

    //rutas Localidad
Route::post('/admin/locations','LocationController@store');
Route::get('/admin/locations/{id}/edit','LocationController@edit');
Route::post('/admin/locations/{id}/edit','LocationController@update');
Route::post('/admin/locations/{id}/delete','LocationController@destroy');
     //rutas Localidad

    //rutas Nacionalidad
Route::post('/admin/nationalities','NationalityController@store');
Route::get('/admin/nationalities/{id}/edit','NationalityController@edit');
Route::post('/admin/nationalities/{id}/edit','NationalityController@update');
Route::post('/admin/nationalities/{id}/delete','NationalityController@destroy');
      //rutas Nacionalidad

    //rutas position (cargos del trabajador)
Route::get('/admin/positions', 'PositionController@index');
Route::get('/admin/positions/create','PositionController@create');
Route::post('/admin/positions','PositionController@store');
Route::get('/admin/positions/{id}/edit','PositionController@edit');
Route::post('/admin/positions/{id}/edit','PositionController@update');
Route::post('/admin/positions/{id}/delete','PositionController@destroy');
    //rutas position (cargos del trabajador) 
      
    //rutas Estados
Route::post('/admin/states','StatesController@store');
Route::get('/admin/states/{id}/edit','StatesController@edit');
Route::post('/admin/states/{id}/edit','StatesController@update');
Route::post('/admin/states/{id}/delete','StatesController@destroy');
    //rutas Estados 

    //rutas Categorias
Route::post('/admin/categories','CategoriesController@store');
Route::get('/admin/categories/{id}/edit','CategoriesController@edit');
Route::post('/admin/categories/{id}/edit','CategoriesController@update');
Route::post('/admin/categories/{id}/delete','CategoriesController@destroy');
    //rutas Categorias

    //rutas Unidades de medida
Route::post('/admin/unities','UnitiesController@store');
Route::get('/admin/unities/{id}/edit','UnitiesController@edit');
Route::post('/admin/unities/{id}/edit','UnitiesController@update');
Route::post('/admin/unities/{id}/delete','UnitiesController@destroy');
    //rutas Unidades de medida 

    //rutas Configuración General de Sistema
Route::get('/admin/configuration', 'ConfigurationController@index')->middleware('permission:configuration.index');
    //rutas Configuración General de Sistema
});
