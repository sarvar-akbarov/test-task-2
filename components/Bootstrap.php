<?php

namespace app\components;


use yii\base\BootstrapInterface;
use Yii;
use yii\base\Event;
use app\components\Foo;
use app\modules\event\enums\Events;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app): void
    {
        $events = Events::list();

        foreach($events as $eventKey => $event){
            Yii::$app->on($eventKey, ['app\events\\' . ucfirst($eventKey), 'register']);
        }
    }
}