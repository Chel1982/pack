<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "about_project".
 *
 * @property integer $id
 * @property string $about_project
 */
class AboutProject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'about_project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['about_project'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'about_project' => 'About Project',
        ];
    }
}
