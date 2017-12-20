<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "payment".
 *
 * @property integer $id
 * @property string $name_company
 * @property string $username
 * @property string $direction_activity
 * @property string $address
 * @property string $phone_number
 * @property string $email
 * @property string $product_name
 * @property integer $taxpayer_certificate
 * @property integer $individual_certificate
 * @property string $information
 * @property integer $created_at
 * @property integer $updated_at
 */
class Payment extends \yii\db\ActiveRecord
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
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_company', 'username', 'direction_activity', 'address', 'phone_number', 'email', 'product_name', 'taxpayer_certificate', 'individual_certificate', 'information'], 'required'],
            [['taxpayer_certificate', 'individual_certificate', 'created_at', 'updated_at'], 'integer'],
            [['name_company', 'username', 'direction_activity', 'address', 'phone_number', 'email', 'product_name', 'information'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_company' => 'Name Company',
            'username' => 'Username',
            'direction_activity' => 'Direction Activity',
            'address' => 'Address',
            'phone_number' => 'Phone Number',
            'email' => 'Email',
            'product_name' => 'Product Name',
            'taxpayer_certificate' => 'Taxpayer Certificate',
            'individual_certificate' => 'Individual Certificate',
            'information' => 'Information',
            'created_at' => 'Created At',
        ];
    }
}
