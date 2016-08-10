<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Orderdetails]].
 *
 * @see Orderdetails
 */
class OrderdetailsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Orderdetails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Orderdetails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
