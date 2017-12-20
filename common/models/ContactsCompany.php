<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contacts_company".
 *
 * @property integer $id
 * @property string $address
 * @property string $phone_number
 * @property string $fax_number
 * @property string $email
 * @property string $site_url
 */
class ContactsCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contacts_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address', 'phone_number', 'fax_number', 'email', 'site_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'phone_number' => 'Phone Number',
            'fax_number' => 'Fax Number',
            'email' => 'Email',
            'site_url' => 'Site Url',
        ];
    }
}
