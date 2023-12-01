<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "device".
 *
 * @property int $id
 * @property int|null $parent_device
 * @property string $name
 * @property int $office_id
 * @property int|null $category_id
 *
 * @property Attribute[] $deviceAttributes
 * @property Category $category
 * @property Office $office
 * @property Performance[] $performances
 * @property Setting[] $settings
 */
class Device extends \yii\db\ActiveRecord
{
    public $customer_id; 

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
            [['parent_device', 'office_id', 'category_id'], 'integer'],
            [['name', 'office_id'], 'required'],
            [['name'], 'string', 'max' => 250],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
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
            'name' => 'Name',
            'office_id' => 'Office ID',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Attributes0]].
     *
     * @return \yii\db\ActiveQuery|AttributeQuery
     */
    public function getDeviceAttributes()
    {
        return $this->hasMany(Attribute::class, ['device_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery|CategoryQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
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

    public function getParent()
    {
        return $this->hasMany(Device::class, ['parent_device' => 'id']);
    }
}
