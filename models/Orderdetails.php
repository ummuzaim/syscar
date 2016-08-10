<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orderdetails".
 *
 * @property integer $orderNumber
 * @property string $productCode
 * @property integer $quantityOrdered
 * @property string $priceEach
 * @property integer $orderLineNumber
 *
 * @property Orders $orderNumber0
 * @property Products $productCode0
 */
class Orderdetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orderdetails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           // [['orderNumber', 'productCode', 'quantityOrdered', 'priceEach', 'orderLineNumber'], 'required'],
            [['orderNumber', 'quantityOrdered', 'orderLineNumber'], 'integer'],
            [['priceEach'], 'number'],
            [['productCode'], 'string', 'max' => 15],
            [['orderNumber'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['orderNumber' => 'orderNumber']],
            [['productCode'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['productCode' => 'productCode']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'orderNumber' => 'Order Number',
            'productCode' => 'Product Code',
            'quantityOrdered' => 'Quantity Ordered',
            'priceEach' => 'Price Each',
            'orderLineNumber' => 'Order Line Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderNumber0()
    {
        return $this->hasOne(Orders::className(), ['orderNumber' => 'orderNumber']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCode0()
    {
        return $this->hasOne(Products::className(), ['productCode' => 'productCode']);
    }

    /**
     * @inheritdoc
     * @return OrderdetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderdetailsQuery(get_called_class());
    }
}
