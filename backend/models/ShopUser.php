<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shopuser".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $password
 * @property string $status
 *
 * @property Shop $shop
 */
class ShopUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shopuser';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'first_name', 'username', 'password'], 'required'],
            [['shop_id'], 'integer'],
            [['first_name', 'last_name', 'password'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 30],
            [['status'], 'string', 'max' => 255],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shop::className(), 'targetAttribute' => ['shop_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shop_id' => 'Shop ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'username' => 'Username',
            'password' => 'Password',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shop::className(), ['id' => 'shop_id']);
    }


    /**
     * @return string
     */
    public function getShopNames() {
        return Shop::findOne(['id' => $this->shop_id])->name;
    }


    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }
}
