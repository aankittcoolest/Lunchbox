<?php

use Lunchbox\User\UserPermission;

$app->get('/register', $guest(), function() use($app) {
    $app->render('auth/register.php');
})->name('register');

$app->post('/register', $guest(),function() use($app){

    $request = $app->request;

    $email = $request->post('email');
    $username = $request->post('username');
    $password = $request->post('password');
    $passwordConfirm = $request->post('password_confirm');

    $v = $app->validation;

    $v->validate([
          'email' => [$email, 'required|email|uniqueEmail'],
          'username'  =>  [$username, 'required|alnumDash|max(20)|uniqueUsername'],
          'password'  =>  [$password, 'required|min(6)'],
          'password_confirm' =>  [$passwordConfirm, 'required|matches(password)']
      ]);

      if($v->passes()){

            $identifier = $app->randomlib->generateString(128);


            $user = $app->user->create([
                'email' => $email,
                'username'  => $username,
                'password'  => $app->hash->password($password),
                'active'    =>  false,
                'active_hash' =>  $app->hash->hash($identifier)
              ]);

              $user->permissions()->create(UserPermission::$defaults);

              $user = $app->user->where('email', $email)->first();
              $app->mail->send('email/auth/registered.php', ['user' => $user, 'identifier' => $identifier], function($message) use($user, $app) {
                  $message->to($user->email);
                  $message->subject($app->lang['mail_subject']['successful_register']);
              });

              $app->flash('global', $app->lang['messages']['successful_register']);
              return $app->response->redirect($app->urlFor('home'));
      }

      $app->render('auth/register.php', [
          'errors'  => $v->errors(),
          'request' => $request,
        ]);






})->name('register.post');

 ?>
