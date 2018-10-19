<?php

namespace app\modules\api\controllers;

use app\models\Company;
use yii\web\Controller;

/**
 * Default controller for the `api` module
 */
class RestController extends Controller
{
    /**
     * @var Company
     */
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

    /**
     * @return array
     */
    public function actionIndex()
    {
        return [1,2,3];
    }

    /**
     * @param null $id
     * @return mixed
     */
    public function actionTask($id = null)
    {
        return ($this->modelClass)::find()->where(
            $id ? ["id" => $id] : []
        )->cache(\Yii::$app->params['api']['duration'])->asArray()->all();
    }
}
