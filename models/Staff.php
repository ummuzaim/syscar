<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property integer $id
 * @property string $fullname
 * @property string $email
 * @property string $address
 * @property integer $dept
 * @property string $created_at
 * @property string $modified_at
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'email', 'dept'], 'required'],
            [['address'], 'string'],
            [['dept'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['fullname', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
           // 'id' => 'ID',
            'fullname' => 'Fullname',
            'email' => 'Email',
            'address' => 'Address',
            'dept' => 'Dept',
            'created_at' => 'Created At',
            'modified_at' => 'Modified At',
        ];
    }
    
    public function getJabatan(){
        //relationship anak nak panggil induk
        return $this->hasOne(Department::className(), ['id' => 'dept']);
    }
    
    public function getNamaJabatan(){
        return $this->jabatan->name;
    }
    
    public function getNamaSektor(){
        return $this->jabatan->sektor->name;
    }
}
