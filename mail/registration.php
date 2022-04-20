<?php

use yii\helpers\Url;
use yii\bootstrap4\Html;

$activationUrl = Url::to(['/site/activate', 'user' => $user->id, 'token' => $user->uid], true);
echo Yii::t('app', 'Please click on ') . Html::a(Yii::t('app', 'activate_link'), $activationUrl);
