<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "calendar_preview".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $created_at
 * @property integer $calendar_id
 *
 * @property Calendar $calendar
 */
class CalendarPreview extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendar_preview';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['time_spending', 'date'], 'safe'],
            [['created_at', 'count_day', 'created_at'], 'integer'],
            [['title'], 'string', 'max' => 200],
            [['event'], 'string', 'max' => 255],
            [['exhibition'], 'string', 'max' => 255],
            [['address'], 'string', 'max' => 255],
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
            'address' => 'Адрес',
            'event' => 'Адрес',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->time_spending = Yii::$app->formatter->asTimestamp($this->time_spending);//strtotime($this->time_spending);

            return true;
        }
        return false;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendar()
    {
        return $this->hasOne(Calendar::className(), ['id' => 'calendar_id']);
    }
}
