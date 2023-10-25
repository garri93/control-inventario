<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellidos
 * @property string|null $dni
 * @property int $telefono
 * @property int $empresa_id
 * @property string $rol
 *
 * @property Actuacion[] $actuacions
 * @property AsignacionOficina[] $asignacionOficinas
 * @property Empresa $empresa
 * @property Oficina[] $oficinas
 * @property UsuarioActuacion[] $usuarioActuacions
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellidos', 'telefono', 'empresa_id', 'rol'], 'required'],
            [['telefono', 'empresa_id'], 'integer'],
            [['nombre', 'apellidos'], 'string', 'max' => 100],
            [['dni'], 'string', 'max' => 9],
            [['rol'], 'string', 'max' => 45],
            [['dni'], 'unique'],
            [['empresa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::class, 'targetAttribute' => ['empresa_id' => 'id']],
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
            'apellidos' => 'Apellidos',
            'dni' => 'Dni',
            'telefono' => 'Telefono',
            'empresa_id' => 'Empresa ID',
            'rol' => 'Rol',
        ];
    }

    /**
     * Gets query for [[Actuacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActuacions()
    {
        return $this->hasMany(Actuacion::class, ['id' => 'actuacion_id'])->viaTable('usuario_actuacion', ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[AsignacionOficinas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsignacionOficinas()
    {
        return $this->hasMany(AsignacionOficina::class, ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[Empresa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresa::class, ['id' => 'empresa_id']);
    }

    /**
     * Gets query for [[Oficinas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOficinas()
    {
        return $this->hasMany(Oficina::class, ['id' => 'oficina_id'])->viaTable('asignacion_oficina', ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[UsuarioActuacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioActuacions()
    {
        return $this->hasMany(UsuarioActuacion::class, ['usuario_id' => 'id']);
    }
}
