<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property integer $id
 * @property string $name_co_worker
 * @property string $description_name
 * @property string $email
 */
class Contacts extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description_name'], 'string'],
            [['name_co_worker'], 'string', 'max' => 200],
            [['email'], 'string', 'max' => 45],
            ['file', 'file', 'extensions' => 'png', 'maxSize' => 1024*1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_co_worker' => 'Name Co Worker',
            'description_name' => 'Description Name',
            'email' => 'Email',
        ];
    }
}
