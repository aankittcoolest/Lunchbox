<?php

namespace Lunchbox\Menu;

use Illuminate\Database\Eloquent\model as Eloquent;

class History extends Eloquent
{

    protected $table = 'history';

    protected $fillable = [
          'user_id',
          'category_id',
          'lunch_date'
      ];

}
