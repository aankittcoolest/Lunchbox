<?php

namespace Lunchbox\Validation;

use Violin\Violin;
use Lunchbox\User\User;
use Lunchbox\Helpers\Hash;


class Validator extends Violin
{
    protected $user;
    protected $hash;
    protected $auth;

    public function __construct($app, User $user, Hash $hash, $auth = null)
    {
      $this->user = $user;
      $this->hash = $hash;
      $this->auth = $auth;

      $this->addFieldMessages([
        'email' => [
              'uniqueEmail' => $app->lang['errors']['mail_not_unique']

          ],
          'username'  =>  [
                'uniqueUsername' => $app->lang['errors']['username_not_unique']
            ]
        ]);

        $this->addRuleMessages([
            'matchesCurrentPassword' => $app->lang['errors']['password_mismatch']
          ]);
    }

    public function validate_uniqueEmail($value, $input, $args)
    {
        $user = $this->user->where('email', $value);

        if($this->auth && $this->auth->email === $value ){
            return true;
        }

        return ! (bool) $user->count();
    }

    public function validate_uniqueUsername($value, $input, $args)
    {
        return ! (bool) $this->user->where('username', $value)->count();
    }

    public function validate_matchesCurrentPassword($value,$input, $args)
    {
        if($this->auth && $this->hash->passwordCheck($value, $this->auth->password)){
            return true;
        }
        return false;
    }

}
