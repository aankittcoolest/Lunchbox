<?php

namespace Lunchbox\Menu;

use Illuminate\Database\Eloquent\model as Eloquent;

class MenuList extends Eloquent
{
    protected $table = 'menu_list';

    protected $fillable = [
        'name',
        'menu_picture'
      ];
}
