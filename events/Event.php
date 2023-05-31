<?php 

namespace app\events;

abstract class Event {
    public abstract static function register($event);

    protected static function isApplied($eventName, $email): bool
    {
        return \app\modules\event\models\Event::findOne([
            'event_name' => $eventName,
            'recipient' => $email, 
            'is_blocked' => false
        ]) !== null;
    }
}