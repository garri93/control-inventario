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
            [['internal_code', 'name', 'cif', 'company_id'], 'required'],
            [['company_id'], 'integer'],
            [['internal_code'], 'string', 'max' => 45],
            [['name'], 'string', 'max' => 100],
            [['cif'], 'string', 'max' => 9],
            [['cif'], 'unique'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'internal_code' => 'Internal Code',
            'name' => 'Name',
            'cif' => 'Cif',
            'company_id' => 'Company ID',
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
