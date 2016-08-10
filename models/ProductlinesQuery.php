<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Productlines]].
 *
 * @see Productlines
 */
class ProductlinesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Productlines[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Productlines|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
