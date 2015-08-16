<?php

use Lunchbox\Helpers\Date;

$app->get('/reserve',function() use ($app){
  $app->container->set('date', function(){
    return new Date;
  });
      if(!$app->auth){
        $app->redirect($app->urlFor('login'));
      }

      $todays_record = $app->admin_list->where('lunch_date',$app->date->getCurrentDate())->first();

      $mail_send = 0;
      if(count($todays_record)){
        $mail_send = $todays_record->mail_send;
      }

      $today = $app->date->getCurrentDay();
      $app->render('/user/reserve.php',[
          'categories' => $app->categories->get(),
          'mail_send'  => $mail_send,
          'today'      => $today
        ]);
})->name('reserve');


$app->post('/reserve', $authenticated(), function() use ($app){
      $_TODAY = "1";
      $_TOMORROW = "2";
      $_WHOLEWEEK = "3";
      $request = $app->request;

      $app->container->set('date', function(){
        return new Date;
      });

      $category = $request->post('categories');

      if($request->post('cancel')){
        $app->redirect($app->urlFor('reserve'));
      }

      if($request->post('confirm')){

        $val = $request->post('order');



        if($val == $_TODAY){
              $app->history->create([
                  'user_id' => $app->auth->id,
                  'category_id' => $_SESSION[$app->config->get('category.session')],
                  'lunch_date' => $app->date->getCurrentDate()
                ]);

        }else if($val == $_TOMORROW){

              $app->history->create([
                  'user_id' => $app->auth->id,
                  'category_id' => $_SESSION[$app->config->get('category.session')],
                  'lunch_date' => $app->date->getNextDate('1')
                ]);


        }else if($val == $_WHOLEWEEK){
          $i = 0;
          do{
            $day = $app->date->getNextDay($i);
            $date = $app->date->getNextDate($i);
            $app->history->create([
                'user_id' => $app->auth->id,
                'category_id' => $_SESSION[$app->config->get('category.session')],
                'lunch_date' => $date
              ]);
            $i++;

          }while(strcmp ( $day , "Friday" )!==0);

        }

        //send confirmation mail
        $app->mail->send('email/menu/orderConfirmation.php',['email' => $app->auth->email], function($message) use($app) {
            $message->to($app->auth->email);
            $message->subject($app->lang['mail_subject']['successful_reserve']);
        });

        //Congratulate user for succesful submission
        $app->flash('global', $app->lang['messages']['successful_reservation']);

        //Redirect the user to the home page
        $app->redirect($app->urlFor('home'));
      }


      $_SESSION[$app->config->get('category.session')] = $category;

       $category_name = $app->categories
                        ->where('id', $category)->first()->name;

      $todays_record = $app->admin_list->where('lunch_date',$app->date->getCurrentDate())->first();

      $mail_send = 0;
      if(count($todays_record)){
        $mail_send = $todays_record->mail_send;
      }

      $today = $app->date->getCurrentDay();
       $app->render('/user/reserve.php',[
            'category' => $category_name,
            'mail_send'=> $mail_send,
            'today'    => $today
         ]);

})->name('reserve.post');
