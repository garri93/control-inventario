<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Customer]].
 *
 * @see Customer
 */
class CustomerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Customer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Customer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function deMiEmpesa(){
        return $this->andFilterWhere(['company_id' => \Yii::$app->user->identity->company_id]);
    }

    public function dropDownCustomer(){
        return ArrayHelper::map(Customer::find()->orderBy('name')->where(['company_id' => Yii::$app->user->identity->company_id])->all(), 'id', 'name');
    } 

    public function activo(){
        return $this->andFilterWhere(['activo' => Customer::ACTIVO_SI]);
    }
    

}
