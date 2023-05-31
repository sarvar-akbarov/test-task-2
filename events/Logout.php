<?php

namespace app\events;

use Yii;

class Logout extends Event
{
    public static function register($event)
    {
       if(static::isApplied($event->name, Yii::$app->user->identity)){
          // TO DO 
       }
    }
}