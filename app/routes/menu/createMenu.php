<?php

use Lunchbox\Helpers\Image;

$app->get('/create-menu', function() use ($app){
    $app->render('/menu/createMenu.php');
})->name('new_menu');


$app->post('/create-menu', function() use ($app){

    $message = '';

    $request = $app->request;

    $menu_name = $request->post('menu_name');
    $image = $_FILES['file'];

    $v = $app->validateList;

    $v->validate([
        'menu_name' => [$menu_name,'required|uniqueMenuName'],
        'file'      =>  [$image['name'], 'validUpload|validUploadExtension']
      ]);

      if($v->passes()){

        //upload the file
        $folder_path  = $app->config->get('image.path');
        $folder_name = 'menu_list/';
        $menu_picture_path = Image::uploadImage($image,$folder_path,$folder_name);



        //enter details in the database
              $app->menu_list->create([
                  'name' => $menu_name,
                  'menu_picture' => $menu_picture_path
                ]);

              $app->flash('global', $app->lang['messages']['successful_creation']);
              return $app->response->redirect($app->urlFor('new_menu'));

  }

  $app->render('/menu/createMenu.php', [
      'errors' => $v->errors(),
      'request' => $request
    ]);





})->name('new_menu.post');
