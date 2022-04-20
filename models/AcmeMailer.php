<?php

namespace app\models;

use Yii;

class AcmeMailer {
    
    const TYPE_REGISTRATION = 1;
    const TYPE_PASSWORD_RESET = 2;
    
    private static $from = ['username@gmail.com' => 'Acme mailer'];
    private static $to;
    private static $subject;
    private static $renderFile;
    private static $renderParams = [];
    
    public static function validate($type, $model) {
        switch ($type) {
            case self::TYPE_REGISTRATION:
                if (empty($model->id) || empty($model->uid) || empty($model->username) || empty($model->email)) {
                    return false;
                }
                self::$to = [$model->email];
                self::$subject = Yii::t('app', 'Please activate your account');
                self::$renderFile = 'registration';
                self::$renderParams = ['user' => $model];
                break;
                
            case self::TYPE_PASSWORD_RESET:
                break;
            
            default:
                return false;
        }
        return true;
    }
    
    public static function send($type, $model) {
        if (! self::validate($type, $model)) {
            return false;
        }
        // sends email
        $message = Yii::$app->mailer->compose(self::$renderFile, self::$renderParams);
        return $message->setFrom(self::$from)->setTo(self::$to)->setSubject(self::$subject)->send();
    }
    
}

