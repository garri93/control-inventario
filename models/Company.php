<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $email
 * @property string $name
 * @property string $cif
 *
 * @property Customer[] $customers
 * @property User[] $users
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'name', 'cif'], 'required'],
            [['email', 'name'], 'string', 'max' => 100],
            [['cif'], 'string', 'max' => 9],
            [['email'], 'unique'],
            [['cif'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'name' => 'Nombre',
            'cif' => 'Cif',
        ];
    }

    /**
     * Gets query for [[Customers]].
     *
     * @return \yii\db\ActiveQuery|CustomerQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::class, ['company_id' => 'id'])->activo();
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['company_id' => 'id'])->activo();
    }

    /**
     * {@inheritdoc}
     * @return CompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompanyQuery(get_called_class());
    }

    ublic function beforeSave(){

        if (parent::beforeSave()) {

            if ($this->isNewRecord)
                $this->activo = self::ACTIVO_SI;
            
            return true;
        }
    }

    public function delete(){
        if (count($this->users) > 0) {
            foreach ($this->users as $user) {
                $user->delete();
            }
        }

        if (count($this->customers) > 0) {
            foreach ($this->customers as $customer) {
                $customer->delete();
            }
        }

        $this->activo = self::ACTIVO_NO;
        $this->save();
    }
}
