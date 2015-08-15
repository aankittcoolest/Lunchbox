<?php

namespace Lunchbox\Menu;
use Illuminate\Database\Eloquent\model as Eloquent;

class Category extends Eloquent {

  protected $table = 'categories';

  protected  $fillable = [
    'name',
    'amount'
    ];
}
