<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property string $codigo_interno
 * @property string $nombre
 * @property string $cif
 * @property int $empresa_id
 *
 * @property Empresa $empresa
 * @property Oficina[] $oficinas
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo_interno', 'nombre', 'cif', 'empresa_id'], 'required'],
            [['empresa_id'], 'integer'],
            [['codigo_interno'], 'string', 'max' => 45],
            [['nombre'], 'string', 'max' => 100],
            [['cif'], 'string', 'max' => 9],
            [['cif'], 'unique'],
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
            'codigo_interno' => 'Codigo Interno',
            'nombre' => 'Nombre',
            'cif' => 'Cif',
            'empresa_id' => 'Empresa ID',
        ];
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
        return $this->hasMany(Oficina::class, ['empresa_id' => 'id']);
    }
}
