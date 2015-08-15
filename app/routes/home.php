<?php

use Lunchbox\Helpers\Date;

$app->get('/', function() use ($app){

  $list = $app->menu_list->orderBy('id', 'DESC')->get()->first();

  $app->render('/home.php', [
      'list' => $list
    ]);


})->name('home');


$app->post('/', function() use ($app){

  $request = $app->request;

  $lang = $request->post('language');

  if(isset($_SESSION[$app->config->get('lang.session')])){
    unset($_SESSION[$app->config->get('lang.session')]);
  }

  $_SESSION[$app->config->get('lang.session')] = $lang;




  $app->redirect($app->urlFor('home'));

})->name('home.post');
