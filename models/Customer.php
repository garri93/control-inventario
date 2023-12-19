<?php

namespace app\models;

use app\models\OfficeAssignment;

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

    const ACTIVO_SI = 1;
    const ACTIVO_NO = 0;
    

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
            [['company_id', 'phone', 'activo'], 'integer'],
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
            'activo' => 'Activo'
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

    public function beforeSave($insert){

        if (parent::beforeSave($insert)) {

            if ($this->isNewRecord)
                $this->activo = self::ACTIVO_SI;
            
            return true;
        }
    }

    public function delete(){
        if (count($this->offices) > 0) {
            foreach ($this->offices as $office) {
                $office->delete();
            }
        }

        $this->activo = self::ACTIVO_NO;
        $this->save();
    }
    

    public static function customerview ()
    {
        
        $oficinas = Yii::$app->user->identity->offices;
       
        
        if(count($oficinas) > 0) {
            $clientes_id = [];
        
            foreach ($oficinas as $oficina) {
            
                if (!in_array($oficina->customer_id, $clientes_id)) {
                    array_push($clientes_id, $oficina->customer_id);
                }
                
            }
            
        return $clientes_id;

 

        } 
        return [''];
    }


    

}
