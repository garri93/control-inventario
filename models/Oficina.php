<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oficina".
 *
 * @property int $id
 * @property string $nombre
 * @property string $calle
 * @property string $codigo_postal
 * @property string $telefono
 * @property int $empresa_id
 *
 * @property AsignacionOficina[] $asignacionOficinas
 * @property Dispositivo[] $dispositivos
 * @property Cliente $empresa
 * @property Usuario[] $usuarios
 */
class Oficina extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oficina';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'calle', 'codigo_postal', 'telefono', 'empresa_id'], 'required'],
            [['empresa_id'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
            [['calle'], 'string', 'max' => 250],
            [['codigo_postal'], 'string', 'max' => 45],
            [['telefono'], 'string', 'max' => 9],
            [['telefono'], 'unique'],
            [['empresa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::class, 'targetAttribute' => ['empresa_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'calle' => 'Calle',
            'codigo_postal' => 'Codigo Postal',
            'telefono' => 'Telefono',
            'empresa_id' => 'Empresa ID',
        ];
    }

    /**
     * Gets query for [[AsignacionOficinas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsignacionOficinas()
    {
        return $this->hasMany(AsignacionOficina::class, ['oficina_id' => 'id']);
    }

    /**
     * Gets query for [[Dispositivos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDispositivos()
    {
        return $this->hasMany(Dispositivo::class, ['oficina_id' => 'id']);
    }

    /**
     * Gets query for [[Empresa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Cliente::class, ['id' => 'empresa_id']);
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::class, ['id' => 'usuario_id'])->viaTable('asignacion_oficina', ['oficina_id' => 'id']);
    }
}
