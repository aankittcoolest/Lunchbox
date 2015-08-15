<?php

$app->get('/u/:username/orders', function($username) use ($app) {

    $user = $app->user->where('username', $username)->first();

    $history = $app->history->where('user_id', $user->id)->get();

    if(!$user){
      $app->notFound();
    }

    $app->render('user/orderHistory.php', [
        'user' => $user,
        'history' => $history
      ]);

})->name('user.orderHistory');
