<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */
Auth::routes();
/*
|--------------------------------------------------------------------------
|                             Repartiteur Routes
|--------------------------------------------------------------------------
|
| Dans cette section on trouve les Routes que seul Le répartiteur a le droit d'y acceder
|
|
 */

Route::group(['middleware' => 'Repartiteur'],function () {

    /*
     * Recherche - Routes
     */
    Route::get('/listeUERep' , 'MainControllers\UEController@Get_list_to_Rep');
    Route::get('/listePersoRep' , 'MainControllers\PersoController@Get_list_to_Rep');
    Route::get('/ficheUERep/{idue}' , 'MainControllers\UEController@Get_UE_to_Rep');
    Route::get('/fichePersoRep/{enseignantid}' , 'MainControllers\PersoController@Get_perso_to_Rep');
    Route::post('/UpdateFichePerso' , 'MainControllers\PersoController@Modify_FichePerso');
    Route::post('/DeleteEns' , 'MainControllers\PersoController@Delete_ens');
    Route::get('/AjoutEns' , 'MainControllers\PersoController@Get_ajoutens_view');
    Route::post('/ajouterEns' , 'MainControllers\PersoController@Add_Ens');
    Route::post('/UpdateFicheUe' , 'MainControllers\UEController@Modify_FicheUE');
    Route::get('/AjoutUe' , 'MainControllers\UEController@Get_ajout_view');
    Route::post('/ajouterUe' , 'MainControllers\UEController@Add_UE');
    Route::post('/DeleteUe' , 'MainControllers\UEController@Delete_ue');
    /*
     * Session - Routes
     */
    Route::post('/posting', 'MainControllers\ServiceController@Update_repartition');
    Route::post('/reset', 'MainControllers\RepartitionController@Reset_reparition_table');
    Route::get('/Repartition', 'MainControllers\RepartitionController@Get_repartition_data');
    Route::post('/commentaire', 'MainControllers\RepartitionController@Get_commentaire');
    Route::post('/Start', 'MainControllers\RepartitionController@Start_Session');
    Route::get('/DemarrerSessions', 'MainControllers\RepartitionController@Data_Start_Session');
    Route::post('/Fermer', 'MainControllers\RepartitionController@Stop_Session');


});
/*
|--------------------------------------------------------------------------
|                             Authenticated Routes
|--------------------------------------------------------------------------
|
| Dans cette section on trouve les Routes accecible que par les utilisateur
|
|
 */

Route::group(['middleware' => 'Grouped'], function () {


    Route::get('/MessagePage'        , 'MainControllers\MessagesController@Get_messages');
    Route::post('/vu'                , 'MainControllers\MessagesController@Update_Status');
    Route::post('/EnvoiMessage'      , 'MainControllers\MessagesController@Envoi_Message');
    Route::post('/DeleteMessage'      , 'MainControllers\MessagesController@Update_Status');
    Route::post('/MessageExtern'      , 'MainControllers\MessagesController@Envoi_Message_Extern');
    Route::post('/Check_messages'      ,'MainControllers\ServiceController@Check_messages');
    Route::get('/historiquePersonnel'    , 'MainControllers\HistoriquesController@gethisto');
    Route::get('/profil'    , 'MainControllers\ProfilController@getprofil');
    Route::post('/password'    , 'MainControllers\ProfilController@updatePassword');




});

/*
|--------------------------------------------------------------------------
|                             Enseignant Routes
|--------------------------------------------------------------------------
|
| Dans cette section on trouve les Routes que seul L'enseignant a le droit d'y acceder
|
|
 */
Route::group(['middleware' => 'Enseignant'], function () {

    Route::get('/Voeux'    , 'MainControllers\VoeuxController@getView')->middleware('Sessions');
    Route::post('/Voeux'    , 'MainControllers\VoeuxController@getAndSet');
    Route::post('/getid'    , 'MainControllers\ServiceController@getidofue');
    /*
     * Recherche - Routes
     */
    Route::get('/listeUEEns' , 'MainControllers\UEController@Get_list_to_Ens');
    Route::get('/listePersoEns' , 'MainControllers\PersoController@Get_list_to_Ens');
    Route::get('/ficheUEEns/{idue}' , 'MainControllers\UEController@Get_UE_to_Ens');
    Route::get('/fichePersoEns/{enseignantid}' , 'MainControllers\PersoController@Get_perso_to_Ens');


});