<?php

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

            Route::get('/index', 'DashboardController@index')->name('index');

            //user routes
            Route::resource('users', 'UserController')->except(['show']);
            
              //client routes
              Route::resource('clients', 'ClientController')->except(['show']);
              

            Route::get('export_excel', 'ExportExcelController@index');

            Route::get('export_excel/excel', 'ExportExcelController@excel')->name('export_excel.excel');


            Route::get('checkout' , 'PaypalController@checkout');

            Route::get('done' , function(){
            
                return ('Done');
            });
            
            Route::get('cancel' , function(){
            
                return ('Cancel');
            }); 
            

        });//end of dashboard routes
    });


