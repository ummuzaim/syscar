<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productlines".
 *
 * @property string $productLine
 * @property string $textDescription
 * @property string $htmlDescription
 * @property string $image
 *
 * @property Products[] $products
 */
class Productlines extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'productlines';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productLine'], 'required'],
            [['htmlDescription', 'image'], 'string'],
            [['productLine'], 'string', 'max' => 50],
            [['textDescription'], 'string', 'max' => 4000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'productLine' => 'Product Line',
            'textDescription' => 'Text Description',
            'htmlDescription' => 'Html Description',
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['productLine' => 'productLine']);
    }

    /**
     * @inheritdoc
     * @return ProductlinesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductlinesQuery(get_called_class());
    }
}
