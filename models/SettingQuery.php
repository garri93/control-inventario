<?php

namespace app\models;

use app\models\Setting;

/**
 * This is the ActiveQuery class for [[Setting]].
 *
 * @see Setting
 */
class SettingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Setting[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Setting|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function activo(){
        return $this->andFilterWhere(['activo' => Setting::ACTIVO_SI]);
    }
}
