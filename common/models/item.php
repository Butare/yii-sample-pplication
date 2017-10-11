<?php

namespace common\models;
use Yii;

/**
 * This is the model class for table "items".
 *
 * @property integer $id
 * @property integer $shopId
 * @property string $name
 * @property double $price
 * @property integer $quantity
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Shop $shop
 */
class item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['shopId', 'quantity'], 'integer'],
            [['price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['imagename'], 'file', 'skipOnEmpty' => false, 'extensions' =>'png, jpg'],
            [['shopId'], 'exist', 'skipOnError' => true, 'targetClass' => Shop::className(), 'targetAttribute' => ['shopId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shopId' => 'Shop ID',
            'name' => 'Name',
            'price' => 'Price',
            'quantity' => 'Quantity',
            'imagename' => 'Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shop::className(), ['id' => 'id']);
    }

    /**
     * @return static
     */
    public function getShopName(){
        return Shop::findOne(['id' => $this->shopId])->name;
    }

    // get all items in a given shop

    /**
     * @param $shopId
     * @return $this
     */
    public static function getItemByShopId($shopId) {
        return item::find()->where(['shopId' => $shopId]);
    }


    // upload image of an item
    public  function upload() {
        if ($this->validate()) {
            $this->imagename->saveAs(Yii::getAlias('@common/images/'. $this->imagename->baseName . '.' .$this->imagename->extension));
            Yii::trace("The image instance in saveAs : $this->imagename", 'debug');
            return true;
        } else {
            return false;
        }
    }

}
