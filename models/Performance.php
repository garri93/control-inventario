<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "performance".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $device_id
 * @property string $date
 *
 * @property Device $device
 * @property UserPerformance[] $userPerformances
 * @property User[] $users
 */
class Performance extends \yii\db\ActiveRecord
{
    public $office_id;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'performance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'device_id', 'date'], 'required'],
            [['description'], 'string'],
            [['device_id'], 'integer'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 45],
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
            'name' => 'Name',
            'description' => 'Description',
            'device_id' => 'Device ID',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[Device]].
     *
     * @return \yii\db\ActiveQuery|DeviceQuery
     */
    public function getDevice()
    {
        return $this->hasOne(Device::class, ['id' => 'device_id']);
    }

    /**
     * Gets query for [[UserPerformances]].
     *
     * @return \yii\db\ActiveQuery|UserPerformanceQuery
     */
    public function getUserPerformances()
    {
        return $this->hasMany(UserPerformance::class, ['performance_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['id' => 'user_id'])->viaTable('user_performance', ['performance_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return PerformanceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PerformanceQuery(get_called_class());
    }
}
