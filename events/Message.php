<?php

namespace app\events;

use Yii;

class Message extends Event
{
    public static function register($event)
    {
       if(static::isApplied($event->name, Yii::$app->user->identity)){
          // TO DO 
       }
    }
}