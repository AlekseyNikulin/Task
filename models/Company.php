<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property string $id
 * @property string $create_at
 * @property string $name
 * @property string $address
 * @property string $zip
 * @property int $active
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_at'], 'safe'],
            [['address'], 'string'],
            [['active'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['zip'], 'string', 'max' => 8],
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
            'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'zip' => Yii::t('app', 'Zip'),
            'active' => Yii::t('app', 'Active'),
        ];
    }
}
