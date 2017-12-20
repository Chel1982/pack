<?php
namespace frontend\models\form;

use yii\base\Model;


/**
 * CalendarPreview
 */
class CalendarReportsForm extends Model
{
    public $description;
    public $title;
    public $created_at;
    public $isNewForm;
    public $file;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['created_at'], 'required'],
            [['created_at', 'date'], 'safe'],
            [['title'], 'string', 'max' => 200],
            ['file', 'file', 'extensions' => 'png, gif, jpg, jpeg', 'maxSize' => 340*240],
            //[['title'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'description' => 'Description',
            'created_at' => 'Created At',
        ];
    }


}
