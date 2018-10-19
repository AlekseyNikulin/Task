<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $create_at
 * @property string $title
 * @property string $date
 * @property string $author
 * @property string $status
 * @property string $description
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_at', 'date'], 'safe'],
            [['description'], 'string'],
            [['title', 'author', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'create_at' => Yii::t('app', 'Create At'),
            'title' => Yii::t('app', 'Title'),
            'date' => Yii::t('app', 'Date'),
            'author' => Yii::t('app', 'Author'),
            'status' => Yii::t('app', 'Status'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
