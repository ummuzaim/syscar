<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $orderNumber
 * @property string $orderDate
 * @property string $requiredDate
 * @property string $shippedDate
 * @property string $status
 * @property string $comments
 * @property integer $customerNumber
 *
 * @property Orderdetails[] $orderdetails
 * @property Products[] $productCodes
 * @property Customers $customerNumber0
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['orderNumber', 'orderDate', 'requiredDate', 'status', 'customerNumber'], 'required'],
            [['orderNumber', 'customerNumber'], 'integer'],
            [['orderDate', 'requiredDate', 'shippedDate'], 'safe'],
            [['comments'], 'string'],
            [['status'], 'string', 'max' => 15],
            [['customerNumber'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['customerNumber' => 'customerNumber']],
            //[['orderDate', 'requiredDate', 'shippedDate'], 'date', 'format'=>'Y-m-d'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'orderNumber' => 'Order Number',
            'orderDate' => 'Order Date',
            'requiredDate' => 'Required Date',
            'shippedDate' => 'Shipped Date',
            'status' => 'Status',
            'comments' => 'Comments',
            'customerNumber' => 'Customer Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderdetails()
    {
        return $this->hasMany(Orderdetails::className(), ['orderNumber' => 'orderNumber']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCodes()
    {
        return $this->hasMany(Products::className(), ['productCode' => 'productCode'])->viaTable('orderdetails', ['orderNumber' => 'orderNumber']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerNumber0()
    {
        return $this->hasOne(Customers::className(), ['customerNumber' => 'customerNumber']);
    }
}
