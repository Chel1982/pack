<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "interview".
 *
 * @property integer $id
 * @property string $author
 * @property string $position
 * @property string $title
 * @property string $general_image
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $interview_categories_id
 *
 * @property InterviewCategories $interviewCategories
 */
class Interview extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interview';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['created_at', 'updated_at', 'interview_categories_id'], 'integer'],
            [['interview_categories_id'], 'required'],
            [['author', 'position', 'title'], 'string', 'max' => 255],
            [['interview_categories_id'], 'exist', 'skipOnError' => true, 'targetClass' => InterviewCategories::className(), 'targetAttribute' => ['interview_categories_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author' => 'Author',
            'position' => 'Position',
            'title' => 'Title',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'interview_categories_id' => 'Interview Categories ID',
        ];
    }

    public function scenarios(){
        $scenarios = parent::scenarios();
        $scenarios['step2'] = ['general_image'];

        return $scenarios;
    }

    public function afterSave($insert, $changedAttributes)
    {
        //parent::afterSave($insert, $changedAttributes);
        Yii::$app->locator->cache->set('id', $this->id);
        // TODO: Change the autogenerated stub
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterviewCategories()
    {
        return $this->hasOne(InterviewCategories::className(), ['id' => 'interview_categories_id']);
    }
}
