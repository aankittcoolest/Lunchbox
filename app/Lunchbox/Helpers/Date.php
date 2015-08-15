<?php

namespace Lunchbox\Helpers;

class Date
{
  public function __construct(){
    $this->datetime = new \DateTime();
  }

  public function getCurrentDay(){
      return date('l');
  }

  public function getCurrentDate(){
    return $this->datetime->format("Y-m-d");
  }

  public function getNextDate($args){
    return $this->datetime->modify('+'.$args.' day')->format("Y-m-d");
  }

  public function getNextDay($args){
    return $this->datetime->modify('+'.$args.' day')->format("l");
  }

  public function getCurrentMonthFirstDay(){
    return $this->datetime->format("Y-m-01");
  }

}
