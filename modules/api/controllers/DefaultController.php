<?php

namespace app\modules\api\controllers;
use yii\rest\ActiveController;
use yii\web\Controller;

/**
 * Default controller for the `api` module
 */
class DefaultController extends ActiveController
{
    public $modelClass = "app\models\Company";

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['corsFilter' ] = [
            'class' => \yii\filters\Cors::className(),
        ];
        $behaviors['contentNegotiator'] = [
            'class' => \yii\filters\ContentNegotiator::className(),
            'formats' => [
                'application/json' => \yii\web\Response::FORMAT_JSON,
            ],
        ];
        // В это место мы будем добавлять поведения (читай ниже)
        return $behaviors;
    }
}
