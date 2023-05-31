<?php

namespace app\events;

use Yii;

class Login extends Event
{
    public static function register($event)
    {
      if(static::isApplied($event->name, $event->sender->email)){
         die($event->name);
      }
    }
}