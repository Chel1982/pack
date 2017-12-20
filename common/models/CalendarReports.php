<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "calendar_reports".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $general_image
 * @property integer $created_at
 */
class CalendarReports extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendar_reports';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['general_image'], 'string'],
            [['created_at', 'date'], 'safe'],
            [['title'], 'string', 'max' => 200],
            [['title'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'created_at' => 'Created At',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->created_at = Yii::$app->formatter->asTimestamp($this->created_at);//strtotime($this->time_spending);

            return true;
        }
        return false;
    }

}
