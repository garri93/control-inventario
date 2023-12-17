<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attribute".
 *
 * @property int $id
 * @property string $name
 * @property int $device_id
 * @property string|null $description
 *
 * @property Device $device
 */
class Attribute extends \yii\db\ActiveRecord
{

    const ACTIVO_SI = 1;
    const ACTIVO_NO = 0;

    public $office_id;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attribute';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'device_id'], 'required'],
            [['device_id', 'activo'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['device_id'], 'exist', 'skipOnError' => true, 'targetClass' => Device::class, 'targetAttribute' => ['device_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre',
            'device_id' => 'Dispositivo',
            'description' => 'Descripcion',
            'activo' => 'Activo'
        ];
    }

    /**
     * Gets query for [[Device]].
     *
     * @return \yii\db\ActiveQuery|DeviceQuery
     */
    public function getDevice()
    {
        return $this->hasOne(Device::class, ['id' => 'device_id'])->activo();
    }

    /**
     * {@inheritdoc}
     * @return AttributeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AttributeQuery(get_called_class());
    }

    public function beforeSave($insert){

        if (parent::beforeSave($insert)) {

            if ($this->isNewRecord)
                $this->activo = self::ACTIVO_SI;
            
            return true;
        }
    }

    public function delete(){
        $this->activo = self::ACTIVO_NO;
        $this->save();
    }
}