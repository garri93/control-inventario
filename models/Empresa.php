<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property int $id
 * @property string $correo
 * @property string $nombre
 * @property string $cif
 *
 * @property Cliente[] $clientes
 * @property Usuario[] $usuarios
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['correo', 'nombre', 'cif'], 'required'],
            [['correo', 'nombre'], 'string', 'max' => 100],
            [['cif'], 'string', 'max' => 9],
            [['correo'], 'unique'],
            [['cif'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'correo' => 'Correo',
            'nombre' => 'Nombre',
            'cif' => 'Cif',
        ];
    }

    /**
     * Gets query for [[Clientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Cliente::class, ['empresa_id' => 'id']);
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::class, ['empresa_id' => 'id']);
    }
}
