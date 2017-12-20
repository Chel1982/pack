<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "calendar".
 *
 * @property integer $id
 * @property string $title
 * @property string $organization
 * @property string $place
 * @property string $event
 * @property string $exhibition
 * @property string $address
 * @property string $phone_number
 * @property string $web_site
 * @property string $email
 * @property string $description
 * @property integer $count_day
 * @property integer $time_spending
 * @property integer $created_at
 * @property string $path_img
 */
class Calendar extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['organization', 'phone_number', 'web_site', 'email', 'count_day', 'time_spending'], 'required'],
            [['description'], 'string'],
            [['time_spending', 'date'], 'safe'],
            [['count_day', 'created_at'], 'integer'],
            [['title', 'address'], 'string', 'max' => 200],
            [['organization', 'place', 'event', 'exhibition', 'phone_number', 'web_site', 'email'], 'string', 'max' => 255],
            [['path_img'], 'string', 'max' => 255],
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
            'organization' => 'Organization',
            'place' => 'Place',
            'event' => 'Event',
            'exhibition' => 'Exhibition',
            'address' => 'Address',
            'phone_number' => 'Phone Number',
            'web_site' => 'Web Site',
            'email' => 'Email',
            'description' => 'Description',
            'count_day' => 'Count Day',
            'time_spending' => 'Time Spending',
            'created_at' => 'Created At',
            'path_img' => 'Path Img',
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
}
