<?php
use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Noodlehaus\Config;
use RandomLib\Factory as RandomLib;


use Lunchbox\User\User;
use Lunchbox\Menu\Category;
use Lunchbox\Menu\History;
use Lunchbox\Menu\MenuList;
use Lunchbox\Menu\AdminList;

use Lunchbox\Helpers\Hash;
use Lunchbox\Mail\Mailer;

use Lunchbox\Validation\Validator;
use Lunchbox\Validation\ValidateList;



session_cache_limiter(false);
session_start();

ini_set('display_errors', 'On');

define('INC_ROOT', dirname(__DIR__));

require INC_ROOT . '/vendor/autoload.php';

$app = new Slim([
      'mode' => rtrim(file_get_contents(INC_ROOT .'/mode.php')),
      'view' => new Twig(),
      'templates.path'  => INC_ROOT . '/app/views'
  ]);

  $app->add(new Lunchbox\Middleware\BeforeMiddleware);
  $app->add(new Lunchbox\Middleware\CsrfMiddleware);


$app->config = Config::load(INC_ROOT . "/app/config/{$app->mode}.php");



  require 'database.php';
  require 'filters.php';
  require 'routes.php';


  $app->container->set('user', function(){
    return new User;
  });

  $app->container->singleton('hash', function() use ($app){
    return new Hash($app->config);
  });

  $app->container->set('categories', function(){
    return new Category;
  });

  $app->container->set('history', function(){
      return new History;
  });

  $app->container->set('menu_list', function(){
      return new MenuList;
  });

  $app->container->set('admin_list', function() {
      return new AdminList;
  });

  $app->container->singleton('validation', function() use($app){
      return new Validator($app,$app->user, $app->hash, $app->auth);
  });

  $app->container->singleton('validateList', function() use($app){
      return new ValidateList($app,$app->menu_list);
  });

  $app->container->singleton('mail', function() use($app){
      $mailer = new PHPMailer(true);

      $mailer->IsSMTP();
      $mailer->Host = $app->config->get('mail.host');
      $mailer->SMTPAuth = $app->config->get('mail.smtp_auth');
      $mailer->SMTPSecure = $app->config->get('mail.secure');
      $mailer->Port = $app->config->get('mail.port');
      $mailer->Username = $app->config->get('mail.username');
      $mailer->Password = $app->config->get('mail.password');
//      $mail->From       = $app->config->get('mail.username');
      $mailer->SMTPDebug = 2;

      $mailer->isHTML($app->config->get('mail.html'));

      return new Mailer($app->view, $mailer);
  });


  $app->container->singleton('randomlib', function(){
      $factory = new RandomLib;
      return $factory->getMediumStrengthGenerator();
  });

$view = $app->view();

$view->parserOptions = [
      'debug'   =>    $app->config->get('twig.debug')
  ];

$view->parserExtensions = [
      new TwigExtension
  ];
