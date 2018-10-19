<?php
namespace app\modules\api\components;

use app\models\Task;
use yii\db\Expression;

class TaskHelper {

    /**
     * @var int
     */
    public static $limit = 1000;

    /**
     * @param $id
     * @return array|null
     */
    public function worker($id){
        return $id ? $this->taskOne($id) : $this->taskAll(self::$limit);
    }

    /**
     * @param $id
     * @return array|null
     */
    public function taskOne($id){
        return Task::find()->select([
            "id",
            "title" => new Expression("concat(title,' ',id)"),
            "date" => new Expression("date + interval id hour"),
            "author" => new Expression("concat(author,' ',id)"),
            "status",
            "description" => new Expression("concat(description,' ',id)"),
        ])->where(["id" => $id])->cache(\Yii::$app->params['api']['duration'])->asArray()->one();
    }

    /**
     * @param $limit
     * @return array|null
     */
    public function taskAll($limit){
        $tasks = [];
        return Task::find()->select([
            "id",
            "title" => new Expression("concat(title,' ',id)"),
            "date" => new Expression("date + interval id hour"),
        ])->limit($limit)->cache(\Yii::$app->params['api']['duration'])->asArray()->all();
    }
}