<?php

namespace app\modules\controllers;

use app\models\Product;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\rest\ActiveController;

/**
 * Product controller for the `v1` module
 */
class ProductController extends ActiveController
{
    public $modelClass = 'app\models\Product';

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
        $query = Product::find();

        $page = Yii::$app->request->get('page', 1);
        $pageSize = Yii::$app->request->get('pageSize', 10);
        $client_id = Yii::$app->request->get('client_id');
        
        if ($client_id !== null) {
            $query->andWhere(['client_id' => $client_id]);
        }

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
