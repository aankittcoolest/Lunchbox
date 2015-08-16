<?php

$app->get('/new-category', function() use ($app){
    $app->render('/menu/createCategory.php');
})->name('new_category');

$app->post('/new-cateogory', function() use ($app){

    $request = $app->request;
    $name    = $request->post('category_name');
    $amount  = $request->post('amount');

    $v = $app->validateList;

    $v->validate([
      'category_name'   => [$name,'required|uniqueCategoryName'] ,
      'amount'          => [$amount, 'required']
      ]);

      if($v->passes()){

          $app->categories->create([
            'name'  =>  $name,
            'amount'  => $amount
            ]);

          $app->flash('global',$app->lang['messages']['successful_category']);
          $app->redirect($app->urlFor('new_category'));
      }

      $app->render('/menu/createCategory.php',[
        'errors'  => $v->errors()
        ]);


})->name('new_category.post');
