<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//URL FOR SAVED THE BIOMETRIC DATA REGISTER
Route::get('user/saveregister', array('as' => 'registerbio', 'uses' => 'ApiBiometricCOntroller@savedregister'));

//URL FOR GET THE BIOMETRIC DATA FROM SPECIFIC USER
Route::post('user/get/', array('as' => 'getbio', 'uses' => 'ApiBiometricCOntroller@getbio'));

//URL FOR VALIDATE
Route::post('user/validate/', array('as' => 'validatebio', 'uses' => 'ApiBiometricCOntroller@validatebio'));

//servicioprueba
Route::get('/servicioprueba', array('as' => 'servicioprueba', 'uses' => 'ApiBiometricCOntroller@servicioprueba'));

//getalldata
Route::get('/getalldata', array('as' => 'getalldata', 'uses' => 'ApiBiometricCOntroller@getalldata'));

//Detalle de la cuenta 
Route::get('user/account', array('as' => 'getuserinfo', 'uses' => 'ApiBiometricCOntroller@getuserinfo'));
