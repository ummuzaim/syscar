<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property integer $employeeNumber
 * @property string $lastName
 * @property string $firstName
 * @property string $extension
 * @property string $email
 * @property string $officeCode
 * @property integer $reportsTo
 * @property string $jobTitle
 *
 * @property Customers[] $customers
 * @property Employees $reportsTo0
 * @property Employees[] $employees
 * @property Offices $officeCode0
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employeeNumber', 'lastName', 'firstName', 'extension', 'email', 'officeCode', 'jobTitle'], 'required'],
            [['employeeNumber', 'reportsTo'], 'integer'],
            [['lastName', 'firstName', 'jobTitle'], 'string', 'max' => 50],
            [['extension', 'officeCode'], 'string', 'max' => 10],
            [['email'], 'string', 'max' => 100],
            [['reportsTo'], 'exist', 'skipOnError' => true, 'targetClass' => Employees::className(), 'targetAttribute' => ['reportsTo' => 'employeeNumber']],
            [['officeCode'], 'exist', 'skipOnError' => true, 'targetClass' => Offices::className(), 'targetAttribute' => ['officeCode' => 'officeCode']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'employeeNumber' => 'Employee ID',
            'lastName' => 'Last Name',
            'firstName' => 'First Name',
            'extension' => 'Extension',
            'email' => 'Email',
            'officeCode' => 'Office Code',
            'reportsTo' => 'Reports To',
            'jobTitle' => 'Job Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customers::className(), ['salesRepEmployeeNumber' => 'employeeNumber']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReportsTo0()
    {
        return $this->hasOne(Employees::className(), ['employeeNumber' => 'reportsTo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employees::className(), ['reportsTo' => 'employeeNumber']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfficeCode0()
    {
        return $this->hasOne(Offices::className(), ['officeCode' => 'officeCode']);
    }

    /**
     * @inheritdoc
     * @return EmployeesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmployeesQuery(get_called_class());
    }
}
