<?php

namespace app\modules\event\enums;

use Yii;

class Events
{
    const ON_SIGNUP = 'signup';
    const ON_VERIFICATION = 'verification';
    const ON_LOGIN = 'login';
    const ON_MESSAGE = 'message';
    const ON_LOGOUT = 'logout';


    public static function list()
    {
        return [
            Events::ON_SIGNUP => Yii::t('app', 'signup'),   
            Events::ON_VERIFICATION => Yii::t('app', 'verification'),   
            Events::ON_LOGIN => Yii::t('app', 'login'),   
            Events::ON_MESSAGE => Yii::t('app', 'message'),   
            Events::ON_LOGOUT => Yii::t('app', 'logout'), 
        ];
    }
}
