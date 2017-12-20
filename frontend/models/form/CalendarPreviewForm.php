<?php
namespace frontend\models\form;

use yii\base\Model;


/**
 * CalendarPreview
 */
class CalendarPreviewForm extends Model
{
    public $description;
    public $title;
    public $event;
    public $exhibition;
    public $address;
    public $count_day;
    public $time_spending;
    public $isNewForm;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            //[['time_spending'], 'string'],
            //['time_spending', 'date', 'format' => 'dd.MM.yyyy h:m'],
            [[ 'time_spending'], 'required'],
            [['time_spending', 'date'], 'safe'],
            [[ 'count_day'], 'integer'],
            [['title'], 'string', 'max' => 200],
            [['event'], 'string', 'max' => 255],
            [['exhibition'], 'string', 'max' => 255],
            [['address'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'address' => 'Адрес',
            'event' => 'Событие',
            'count_day' => 'Количество дней',
            'time_spending' => 'Дата и время',
        ];
    }


}
