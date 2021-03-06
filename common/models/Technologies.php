<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "technologies".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $general_image
 * @property integer $technologies_categories_id
 *
 * @property TechnologiesCategories $technologiesCategories
 */
class Technologies extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'technologies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['technologies_categories_id'], 'required'],
            [['technologies_categories_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['technologies_categories_id'], 'exist', 'skipOnError' => true, 'targetClass' => TechnologiesCategories::className(), 'targetAttribute' => ['technologies_categories_id' => 'id']],
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
            'description' => 'Description',
            'technologies_categories_id' => 'Technologies Categories ID',
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
    public function getTechnologiesCategories()
    {
        return $this->hasOne(TechnologiesCategories::className(), ['id' => 'technologies_categories_id']);
    }
}
