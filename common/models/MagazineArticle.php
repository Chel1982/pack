<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "magazine_article".
 *
 * @property integer $id
 * @property string $description
 * @property integer $status
 * @property integer $magazine_id
 *
 * @property Magazine $magazine
 */
class MagazineArticle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'magazine_article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['status', 'magazine_id'], 'integer'],
            [['magazine_id'], 'required'],
            [['magazine_id'], 'exist', 'skipOnError' => true, 'targetClass' => Magazine::className(), 'targetAttribute' => ['magazine_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'status' => 'Status',
            'magazine_id' => 'Magazine ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMagazine()
    {
        return $this->hasOne(Magazine::className(), ['id' => 'magazine_id']);
    }
}
