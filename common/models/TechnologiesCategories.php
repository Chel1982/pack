<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "technologies_categories".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Technologies[] $technologies
 */
class TechnologiesCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'technologies_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTechnologies()
    {
        return $this->hasMany(Technologies::className(), ['technologies_categories_id' => 'id']);
    }
}
