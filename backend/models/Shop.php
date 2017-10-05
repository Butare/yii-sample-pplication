<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop".
 *
 * @property integer $id
 * @property string $name
 * @property string $contact
 * @property string $address
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Item $items
 */
class Shop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'contact'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'address'], 'string', 'max' => 100],
            [['contact'], 'string', 'max' => 20],
            [['name'], 'unique'],
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
            'contact' => 'Contact',
            'address' => 'Address',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasOne(Item::className(), ['shopId' => 'id']);
    }


    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getShopNames()
    {
        return Shop::find()->select(['name', 'id'])->asArray()->all();

        //return $shopName;

    }
}
