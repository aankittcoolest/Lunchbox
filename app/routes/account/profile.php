<?php

$app->get('/account/profile', $authenticated(),  function() use ($app){
    $app->render('account/profile.php');
})->name('account.profile');

$app->post('/account/profile', $authenticated(),  function() use ($app){

    $request = $app->request();

    $firstName = $request->post('first_name');
    $lastName = $request->post('last_name');

    $v = $app->validation;

    $v->validate([
        'first_name' => [$firstName, 'alpha|max(50)'],
        'last_name' => [$lastName, 'alpha|max(50)']
      ]);

      if($v->passes()){
          $app->auth->update([
              'first_name' => $firstName,
              'last_name' => $lastName
            ]);

            $app->flash('global', $app->lang['messages']['successful_update']);
            return $app->response->redirect($app->urlFor('account.profile'));
      }

      $app->render('account/profile.php', [
            'errors' => $v->errors(),
            'request' => $request
        ]);

})->name('account.profile.post');
