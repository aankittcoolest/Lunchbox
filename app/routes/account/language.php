<?php

use Carbon\Carbon;

$app->get('/account/language-settings', function() use ($app){
    $app->render('account/language.php');

})->name('account.language');


$app->post('/account/language-settings', function() use ($app){

    $request = $app->request;

    $lang = $request->post('language');

    $app->deleteCookie($app->config->get('lang.language'));
    $app->setcookie(
        $app->config->get('lang.language'),
        "ja-jp",
        Carbon::parse('+1 week')->timestamp
    );


    $app->flash('global', $app->lang['messages']['successful_lang_update']);
    $app->redirect($app->urlFor('home'));

})->name('account.language.post');
