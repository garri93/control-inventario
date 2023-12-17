<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 *
 * @property DeviceName[] $deviceNames
 * @property Device[] $devices
 */
class Category extends \yii\db\ActiveRecord
{
    const ACTIVO_SI = 1;
    const ACTIVO_NO = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['activo'], 'integer'],
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
        ];
    }

    /**
     * Gets query for [[DeviceNames]].
     *
     * @return \yii\db\ActiveQuery|DeviceNameQuery
     */
    public function getDeviceNames()
    {
        return $this->hasMany(DeviceName::class, ['category_id' => 'id']);
    }

    /**
     * Gets query for [[Devices]].
     *
     * @return \yii\db\ActiveQuery|DeviceQuery
     */
    public function getDevices()
    {
        return $this->hasMany(Device::class, ['category_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }

    public function beforeSave($insert){

        if (parent::beforeSave($insert)) {

            if ($this->isNewRecord)
                $this->activo = self::ACTIVO_SI;
            
            return true;
        }
    }

    public function delete(){
        if (count($this->devices) > 0) {
            foreach ($this->devices as $device) {
                $device->delete();
            }
        }

        $this->activo = self::ACTIVO_NO;
        $this->save();
    }
}
