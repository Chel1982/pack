<?php
namespace frontend\models\form;

use yii\base\Model;


/**
 * CalendarPreview
 */
class CalendarForm extends Model
{
    public $description;
    public $title;
    public $event;
    public $exhibition;
    public $address;
    public $count_day;
    public $time_spending;
    public $organization;
    public $phone_number;
    public $web_site;
    public $path_img;
    public $place;
    public $email;
    public $isNewForm;
    public $file;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['organization', 'count_day', 'time_spending'], 'required'],
            [['description'], 'string'],
            [['count_day'], 'integer'],
            [['time_spending', 'date'], 'safe'],
            [['title', 'address'], 'string', 'max' => 200],
            [['organization', 'place', 'event', 'exhibition', 'phone_number', 'web_site', 'email'], 'string', 'max' => 255],
            [['path_img'], 'string', 'max' => 255],
            ['file', 'file', 'extensions' => 'png, gif, jpg, jpeg', 'maxSize' => 340*240],
        ];
    }

    public function attributeLabels()
    {
        return [
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


}
