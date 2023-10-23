<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dispositivo".
 *
 * @property int $id
 * @property int|null $dispositivo_padre
 * @property string|null $descripcion
 * @property int $nombre_dispositivo_id
 * @property int $oficina_id
 *
 * @property Actuacion[] $actuacions
 * @property AtributoDispositivo[] $atributoDispositivos
 * @property Atributo[] $atributos
 * @property Configuracion[] $configuracions
 * @property NombreDispositivo $nombreDispositivo
 * @property Oficina $oficina
 */
class Dispositivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dispositivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dispositivo_padre', 'nombre_dispositivo_id', 'oficina_id'], 'integer'],
            [['nombre_dispositivo_id', 'oficina_id'], 'required'],
            [['descripcion'], 'string', 'max' => 250],
            [['nombre_dispositivo_id'], 'exist', 'skipOnError' => true, 'targetClass' => NombreDispositivo::class, 'targetAttribute' => ['nombre_dispositivo_id' => 'id']],
            [['oficina_id'], 'exist', 'skipOnError' => true, 'targetClass' => Oficina::class, 'targetAttribute' => ['oficina_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dispositivo_padre' => 'Dispositivo Padre',
            'descripcion' => 'Descripcion',
            'nombre_dispositivo_id' => 'Nombre Dispositivo ID',
            'oficina_id' => 'Oficina ID',
        ];
    }

    /**
     * Gets query for [[Actuacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActuacions()
    {
        return $this->hasMany(Actuacion::class, ['dispositivo_id' => 'id']);
    }

    /**
     * Gets query for [[AtributoDispositivos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAtributoDispositivos()
    {
        return $this->hasMany(AtributoDispositivo::class, ['dispositivo_id' => 'id']);
    }

    /**
     * Gets query for [[Atributos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAtributos()
    {
        return $this->hasMany(Atributo::class, ['id' => 'atributo_id'])->viaTable('atributo_dispositivo', ['dispositivo_id' => 'id']);
    }

    /**
     * Gets query for [[Configuracions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConfiguracions()
    {
        return $this->hasMany(Configuracion::class, ['dispositivo_id' => 'id']);
    }

    /**
     * Gets query for [[NombreDispositivo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNombreDispositivo()
    {
        return $this->hasOne(NombreDispositivo::class, ['id' => 'nombre_dispositivo_id']);
    }

    /**
     * Gets query for [[Oficina]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOficina()
    {
        return $this->hasOne(Oficina::class, ['id' => 'oficina_id']);
    }
}
