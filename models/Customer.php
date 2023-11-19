<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $internal_code
 * @property string $name
 * @property string $cif
 * @property int $company_id
 * @property int $phone 
 * @property string|null $notes 
 *
 * @property Company $company
 * @property Office[] $offices
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['internal_code', 'name', 'cif', 'company_id', 'phone'], 'required'],
            [['company_id', 'phone'], 'integer'],
            [['notes'], 'string'],
            [['internal_code'], 'string', 'max' => 45],
            [['name'], 'string', 'max' => 100],
            [['cif'], 'string', 'max' => 9],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'internal_code' => 'Codigo Interno',
            'name' => 'Nombre',
            'cif' => 'Cif',
            'company_id' => 'Company ID',
            'phone' => 'Telefono', 
            'notes' => 'Anotaciones', 
        ];
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery|CompanyQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'company_id']);
    }

    /**
     * Gets query for [[Offices]].
     *
     * @return \yii\db\ActiveQuery|OfficeQuery
     */
    public function getOffices()
    {
        return $this->hasMany(Office::class, ['customer_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CustomerQuery(get_called_class());
    }
}
