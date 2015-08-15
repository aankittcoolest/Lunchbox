<?php

namespace Lunchbox\Mail;

class Mailer
{

    protected $view;
    protected $mailer;

    public function __construct($view, $mailer)
    {
        $this->view = $view;
        $this->mailer = $mailer;

    }

    public function send($template, $data, $callback)
    {
        try {

          $message = new Message($this->mailer);

          $this->view->appendData($data);

          $message->body($this->view->render($template));

          call_user_func($callback, $message);

          $this->mailer->send();

        } catch (phpmailerException $e) {
            echo $e->errorMessage(); //error messages from PHPMailer
        } catch (Exception $e) {
  echo $e->getMessage();
}

    }
}
