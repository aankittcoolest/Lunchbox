<?php

namespace Lunchbox\Menu;

use Illuminate\Database\Eloquent\model as Eloquent;

class AdminList extends Eloquent
{

    protected  $table = 'admin_list';

    protected $fillable =  [
      'day',
      'lunch_date',
      'mail_send'
    ];
}
