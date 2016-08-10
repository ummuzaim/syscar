<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property integer $division
 * @property string $address
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code', 'division', 'address'], 'required'],
            [['division'], 'integer'],
            [['address'], 'string'],
            [['name'], 'string', 'max' => 200],
            [['code'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nama',
            'code' => 'Kod',
           // 'division' => 'Bahagian',
            'address' => 'Alamat',
        ];
    }
    
    public function getSektor(){
        //relationship anak nak penggil induk
        return $this->hasOne(Division::className(),['id' => 'division']);
    }
}
