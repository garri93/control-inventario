<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "setting".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $device_id
 * @property int $activo
 * @property string $creation_date
 * @property string|null $edition_date
 *
 * @property Device $device
 */
class Setting extends \yii\db\ActiveRecord
{
    const ACTIVO_SI = 1;
    const ACTIVO_NO = 0;


    public $office_id;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'device_id', 'creation_date', 'activo'], 'required'],
            [['description'], 'string'],
            [['device_id'], 'integer'],
            [['creation_date', 'edition_date'], 'safe'],
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
            'description' => 'Descripcion',
            'device_id' => 'Device ID',
            'creation_date' => 'Creation Date',
            'edition_date' => 'Edition Date',
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
        return $this->hasOne(Device::class, ['id' => 'device_id']);
    }

    /**
     * {@inheritdoc}
     * @return SettingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SettingQuery(get_called_class());
    }

    public function beforeSave(){

        if (parent::beforeSave()) {

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
