<?php

namespace Lunchbox\Middleware;

use Slim\Middleware;
use Noodlehaus\Config;
use Carbon\Carbon;

class BeforeMiddleware extends Middleware
{
        public function call()
        {
            $this->app->hook('slim.before', [$this, 'run']);

            $this->next->call();
        }

        public function run()
        {

              if(isset($_SESSION[$this->app->config->get('auth.session')])){
                  $this->app->auth = $this->app->user->where('id', $_SESSION[$this->app->config->get('auth.session')])->first();

              }

              //create language cookie
              if(!isset($_COOKIE[$this->app->config->get('lang.language')])){
                $this->app->setcookie(
                    $this->app->config->get('lang.language'),
                    'en-us',
                    Carbon::parse('+1 week')->timestamp
                );
                $language = Config::load(INC_ROOT . "/app/lang/en-us.php");
              }else{
                $lang = $this->app->getCookie($this->app->config->get('lang.language'));
                $language = Config::load(INC_ROOT . "/app/lang/{$lang}.php");
              }

              $this->app->lang = $language->get('lang');

              $this->checkRememberMe();

              $this->app->view()->appendData([
                  'auth'  =>  $this->app->auth,
                  'baseUrl' =>  $this->app->config->get('app.url'),
                  'lang'   => $this->app->lang
              ]);
        }

        public function checkRememberMe()
        {

            if($this->app->getCookie($this->app->config->get('auth.remember')) && !$this->app->auth) {

                $data = $this->app->getCookie($this->app->config->get('auth.remember'));
                $credentials = explode('___', $data);


                if(trim($data) == false || count($credentials) !== 2){
                    $this->app->response->redirect($this->app->urlFor('home'));
                }else {
                    $identifier = $credentials[0];
                    $token = $this->app->hash->hash($credentials[1]);

                    $user = $this->app->user
                    ->where('remember_identifier', $identifier)
                    ->first();

                    if($user){
                      if($this->app->hash->hashCheck($token, $user->remember_token))
                           $_SESSION[$this->app->config->get('auth.session')] = $user->id;
                           $this->app->auth = $this->app->user->where('id', $user->id)->first();
                      }else {
                        $this->app->user->removeRememberCredentials();
                      }
                    }
                }
            }


}
