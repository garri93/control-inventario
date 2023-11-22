<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "office_assignment".
 *
 * @property int $user_id
 * @property int $office_id
 *
 * @property Office $office
 * @property User $user
 */
class OfficeAssignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'office_assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['office_id'], 'required'],
            [['office_id'], 'integer'],
            [['office_id'], 'exist', 'skipOnError' => true, 'targetClass' => Office::class, 'targetAttribute' => ['office_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'office_id' => 'Office ID',
        ];
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return OfficeAssignmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OfficeAssignmentQuery(get_called_class());
    }

   





}
