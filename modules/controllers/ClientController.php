<?php

namespace app\modules\controllers;

use app\models\Client;
use Yii;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

/**
 * Client controller for the `v1` module
 */
class ClientController extends ActiveController
{
    public $modelClass = 'app\models\Client';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => \yii\filters\auth\HttpBearerAuth::class
        ];
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex()
    {
        $query = Client::find();

        $page = Yii::$app->request->get('page', 1);
        $pageSize = Yii::$app->request->get('pageSize', 10);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $pageSize,
                'page' => $page - 1,
            ],
        ]);

        return $dataProvider;
    }
}
