<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UserPerformance]].
 *
 * @see UserPerformance
 */
class UserPerformanceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserPerformance[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserPerformance|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
