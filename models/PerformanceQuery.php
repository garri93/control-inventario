<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Performance]].
 *
 * @see Performance
 */
class PerformanceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Performance[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Performance|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
