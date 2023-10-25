<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "atributo".
 *
 * @property int $id
 * @property string $nombre
 * @property int $categoria
 *
 * @property AtributoDispositivo[] $atributoDispositivos
 * @property Categoria $categoria0
 * @property Dispositivo[] $dispositivos
 */
class Atributo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'atributo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'categoria'], 'required'],
            [['categoria'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
            [['categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::class, 'targetAttribute' => ['categoria' => 'id']],
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
            'categoria' => 'Categoria',
        ];
    }

    /**
     * Gets query for [[AtributoDispositivos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAtributoDispositivos()
    {
        return $this->hasMany(AtributoDispositivo::class, ['atributo_id' => 'id']);
    }

    /**
     * Gets query for [[Categoria0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria0()
    {
        return $this->hasOne(Categoria::class, ['id' => 'categoria']);
    }

    /**
     * Gets query for [[Dispositivos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDispositivos()
    {
        return $this->hasMany(Dispositivo::class, ['id' => 'dispositivo_id'])->viaTable('atributo_dispositivo', ['atributo_id' => 'id']);
    }
}
