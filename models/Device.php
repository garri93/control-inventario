<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "device".
 *
 * @property int $id
 * @property int|null $parent_device
 * @property string|null $description
 * @property int $device_name_id
 * @property int $office_id
 *
 * @property Attribute[] $attributes0
 * @property DeviceAttribute[] $deviceAttributes
 * @property DeviceName $deviceName
 * @property Office $office
 * @property Performance[] $performances
 * @property Setting[] $settings
 */
class Device extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'device';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_device', 'device_name_id', 'office_id'], 'integer'],
            [['device_name_id', 'office_id'], 'required'],
            [['description'], 'string', 'max' => 250],
            [['device_name_id'], 'exist', 'skipOnError' => true, 'targetClass' => DeviceName::class, 'targetAttribute' => ['device_name_id' => 'id']],
            [['office_id'], 'exist', 'skipOnError' => true, 'targetClass' => Office::class, 'targetAttribute' => ['office_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_device' => 'Parent Device',
            'description' => 'Description',
            'device_name_id' => 'Device Name ID',
            'office_id' => 'Office ID',
        ];
    }

    /**
     * Gets query for [[Attributes0]].
     *
     * @return \yii\db\ActiveQuery|AttributeQuery
     */
    public function getAttributes0()
    {
        return $this->hasMany(Attribute::class, ['id' => 'attribute_id'])->viaTable('device_attribute', ['device_id' => 'id']);
    }

    /**
     * Gets query for [[DeviceAttributes]].
     *
     * @return \yii\db\ActiveQuery|DeviceAttributeQuery
     */
    public function getDeviceAttributes()
    {
        return $this->hasMany(DeviceAttribute::class, ['device_id' => 'id']);
    }

    /**
     * Gets query for [[DeviceName]].
     *
     * @return \yii\db\ActiveQuery|DeviceNameQuery
     */
    public function getDeviceName()
    {
        return $this->hasOne(DeviceName::class, ['id' => 'device_name_id']);
    }

    /**
     * Gets query for [[Office]].
     *
     * @return \yii\db\ActiveQuery|OfficeQuery
     */
    public function getOffice()
    {
        return $this->hasOne(Office::class, ['id' => 'office_id']);
    }

    /**
     * Gets query for [[Performances]].
     *
     * @return \yii\db\ActiveQuery|PerformanceQuery
     */
    public function getPerformances()
    {
        return $this->hasMany(Performance::class, ['device_id' => 'id']);
    }

    /**
     * Gets query for [[Settings]].
     *
     * @return \yii\db\ActiveQuery|SettingQuery
     */
    public function getSettings()
    {
        return $this->hasMany(Setting::class, ['device_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return DeviceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DeviceQuery(get_called_class());
    }
}
