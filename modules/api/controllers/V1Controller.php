<?php

namespace app\modules\api\controllers;

use app\models\Company;
use app\modules\api\components\TaskHelper;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

/**
 * Default controller for the `api` module
 */
class V1Controller extends Controller
{
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
        return $behaviors;
    }

    /**
     * @return array
     */
    public function actionIndex()
    {
        return [];
    }

    /**
     * @param null $id
     * @return array|null
     */
    public function actionTask($id = null)
    {
        return (new TaskHelper)->worker($id);
    }
}
