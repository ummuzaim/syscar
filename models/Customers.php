<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property integer $customerNumber
 * @property string $customerName
 * @property string $contactLastName
 * @property string $contactFirstName
 * @property string $phone
 * @property string $addressLine1
 * @property string $addressLine2
 * @property string $city
 * @property string $state
 * @property string $postalCode
 * @property string $country
 * @property integer $salesRepEmployeeNumber
 * @property string $creditLimit
 *
 * @property Employees $salesRepEmployeeNumber0
 * @property Orders[] $orders
 * @property Payments[] $payments
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customerNumber', 'customerName', 'contactLastName', 'contactFirstName', 'phone', 'addressLine1', 'city', 'country'], 'required'],
            [['customerNumber', 'salesRepEmployeeNumber'], 'integer'],
            [['creditLimit'], 'number'],
            [['customerName', 'contactLastName', 'contactFirstName', 'phone', 'addressLine1', 'addressLine2', 'city', 'state', 'country'], 'string', 'max' => 50],
            [['postalCode'], 'string', 'max' => 15],
            [['salesRepEmployeeNumber'], 'exist', 'skipOnError' => true, 'targetClass' => Employees::className(), 'targetAttribute' => ['salesRepEmployeeNumber' => 'employeeNumber']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customerNumber' => 'Customer Number',
            'customerName' => 'Customer Name',
            'contactLastName' => 'Contact Last Name',
            'contactFirstName' => 'Contact First Name',
            'phone' => 'Phone',
            'addressLine1' => 'Address Line1',
            'addressLine2' => 'Address Line2',
            'city' => 'City',
            'state' => 'State',
            'postalCode' => 'Postal Code',
            'country' => 'Country',
            'salesRepEmployeeNumber' => 'Sales Rep Employee Number',
            'creditLimit' => 'Credit Limit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalesRepEmployeeNumber0()
    {
        return $this->hasOne(Employees::className(), ['employeeNumber' => 'salesRepEmployeeNumber']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['customerNumber' => 'customerNumber']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payments::className(), ['customerNumber' => 'customerNumber']);
    }
}
