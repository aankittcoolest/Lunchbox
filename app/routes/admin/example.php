<?php

use Lunchbox\Helpers\Date;

$app->get('/admin/example', $admin(), function() use ($app){

$date = new Date;

  //get order list for today from history table
  $todays_order = $app->history->where('lunch_date',$date->getCurrentDate())->get();



if(count($todays_order)){
      $i = 0;
      foreach ($todays_order as $today_order) {
        $todays_record[$i]['id'] = $i;
        $todays_record[$i]['username'] = $app->user->where('id',$today_order->user_id)->first()->username;
        $category = $app->categories->where('id',$today_order->category_id)->first();
        $todays_record[$i]['category_name'] = $category->name;
        $todays_record[$i]['amount'] = $category->amount;
        $i++;
      }
        $todays_record = json_decode(json_encode($todays_record));

        $app->render('admin/example.php',[
            'todays_record' => $todays_record
          ]);

  }else{
    $app->render('admin/example.php');

  }



})->name('admin.example');


$app->post('/admin/example', $admin(), function() use ($app) {

$date = new Date();

  $app->admin_list->create([
    'day' => $date->getCurrentDay(),
    'lunch_date' => $date->getCurrentDate(),
    'mail_send'  => true
    ]);

  //get order list for today from history table
  $todays_order = $app->history->where('lunch_date',$date->getCurrentDate())->get();


  $i = 0;
  foreach ($todays_order as $today_order) {
    $todays_record[$i]['id'] = $i;
    $todays_record[$i]['username'] = $app->user->where('id',$today_order->user_id)->first()->username;
    $category = $app->categories->where('id',$today_order->category_id)->first();
    $todays_record[$i]['category_name'] = $category->name;
    $todays_record[$i]['amount'] = $category->amount;
    $i++;
  }


    $todays_record = json_decode(json_encode($todays_record));

//send order list by mail to admin
$auth = $app->auth;
$app->mail->send('email/menu/bookingList.php', ['todays_record' => $todays_record], function($message) use ($auth){
      $message->to($auth->email);
      $message->Subject('Today order List');
});

$app->flash('global', $app->lang['messages']['successful_mail_send']);
$app->redirect($app->urlFor('admin.example'));


})->name('admin.example.post');
