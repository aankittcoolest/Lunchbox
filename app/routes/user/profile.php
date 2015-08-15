<?php

use Lunchbox\Helpers\Date;

$app->get('/u/:username', function($username) use ($app) {

    $date = new Date;

    $user = $app->user->where('username', $username)->first();
    if(!$user){
      $app->notFound();
    }

    $history = $app->history->where('user_id',$user->id)
                            ->where('lunch_date','>=',$date->getCurrentMonthFirstDay())->get();

    $i = 0;
    $serial_number = 1;
    foreach($history as $day_history){
        $records[$i]['id'] = $serial_number;
        $category = $app->categories->where('id',$day_history->category_id)->first();
        $records[$i]['category_name'] = $category->name;
        $records[$i]['amount'] = $category->amount;
        $records[$i]['date'] = $day_history->lunch_date;
        $i++;
        $serial_number++;
    }

  $records = json_decode(json_encode($records));


    $app->render('user/profile.php', [
        'user' => $user,
        'records' => $records
      ]);

})->name('user.profile');
