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

//Rutas Basicas 

Auth::routes();
Route::get('/', 'UserController@controlInicio');
//Rutas de Activacion

Route::get('/Activacion', function () {return view('Activacion');});
Route::get('/Register/Verify/{code}', 'UserController@verify');

//Rutas de Experiencia

Route::post('/PanelUsuario/InsertarExperiencia', 'ExperienciaController@store');
Route::delete('/PanelUsuario/BorrarExperiencia/{id}', 'ExperienciaController@destroy');
Route::post('/PanelUsuario/EditarExperiencia','ExperienciaController@update');

//Rutas de Formacion

Route::post('/PanelUsuario/InsertarFormacion', 'FormacionController@store');
Route::delete('/PanelUsuario/BorrarFormacion/{id}', 'FormacionController@destroy');
Route::post('/PanelUsuario/EditarFormacion','FormacionController@update');

//Rutas de Idiomas

Route::post('/PanelUsuario/InsertarIdiomas', 'IdiomaController@store');
Route::delete('/PanelUsuario/BorrarIdiomas/{id}', 'IdiomaController@destroy');
Route::post('/PanelUsuario/EditarIdiomas','IdiomaController@update');

//Rutas Usuario

Route::post('/PanelUsuario/EditarPerfil','UserController@update');
Route::get('/PanelUsuario/EliminarPerfil/{id}', 'UserController@peticionEliminar')->name('peticionEliminar');
Route::get('/','UserController@controlInicio');
Route::get('/PanelUsuario/EliminarUser/{id}', 'UserController@BorrarUser');

//Rutas Curriculum general

Route::get('/PanelUsuario', 'UserController@index');
Route::delete('/PanelUsuario/EliminarCurriculum', 'UserController@destroyCurriculum');
Route::get('/PanelUsuario/DescargarPDF', 'UserController@pdf')->name('Currriculum.pdf');

//Rutas Ofertas

Route::get('/PanelUsuario/Ofertas','OfertaController@index')->name('Ofertas');;
Route::post('/PanelUsuario/Ofertas/Buscar','OfertaController@buscarOfertas')->name('BuscarOfertas');
Route::post('/PanelAdmin/InsertarOferta', 'OfertaController@store');
Route::post('/PanelAdmin/EditarOferta', 'OfertaController@Update');
Route::get('/PanelAdmin/BorrarOferta/{id}', 'OfertaController@BorrarOferta');

//Rutas de inscribirse en ofertas

Route::get('/PanelUsuario/Ofertas/InscribirseOferta/{id}','InscribeController@store');

//Rutas Admin

Route::get('/PanelAdmin', 'AdminController@index');
Route::get('/PanelAdmin/ActivarCuenta/{id}', 'AdminController@activarCuenta');
Route::get('/PanelAdmin/BorrarUser/{id}', 'AdminController@BorrarUser');
Route::get('/PanelAdmin/HacerAdmin/{id}', 'AdminController@HacerAdmin');
Route::get('/PanelAdmin/DeshacerAdmin/{id}', 'AdminController@DeshacerAdmin');
Route::get('/PanelAdmin/ListarUsers/{id}', 'AdminController@ListarUsuariosInscritos');
Route::get('/PanelAdmin/ListarUsers/Seleccionar/{id_user}/{id_oferta}', 'AdminController@SeleccionarUsuario');
Route::post('/PanelAdmin/ExportarCurriculums', 'AdminController@exportarCurriculums');
Route::post('/PanelAdmin/EnviarCurriculums', 'AdminController@enviarCurriculums');
Route::get('/PanelAdmin/DescargarPDF1', 'AdminController@pdfUserInscrito')->name('Usersxfamilia.pdf');
Route::post('/PanelAdmin/DescargarPDF2', 'AdminController@pdfOfertas');
Route::post('/PanelAdmin/DescargarPDF3', 'AdminController@pdfUserSeleccionado');

