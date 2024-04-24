<?php

namespace app\modules\controllers;

use yii\rest\ActiveController;

/**
 * User controller for the `v1` module
 */
class UserController extends ActiveController
{
    public $modelClass = 'app\models\User';
    
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => \yii\filters\auth\HttpBearerAuth::class
        ];
        return $behaviors;
    }
}
