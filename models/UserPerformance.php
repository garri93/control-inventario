<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_performance".
 *
 * @property int $user_id
 * @property int $performance_id
 *
 * @property Performance $performance
 * @property User $user
 */
class UserPerformance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_performance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'performance_id'], 'required'],
            [['user_id', 'performance_id'], 'integer'],
            [['user_id', 'performance_id'], 'unique', 'targetAttribute' => ['user_id', 'performance_id']],
            [['performance_id'], 'exist', 'skipOnError' => true, 'targetClass' => Performance::class, 'targetAttribute' => ['performance_id' => 'id']],
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
            'performance_id' => 'Performance ID',
        ];
    }

    /**
     * Gets query for [[Performance]].
     *
     * @return \yii\db\ActiveQuery|PerformanceQuery
     */
    public function getPerformance()
    {
        return $this->hasOne(Performance::class, ['id' => 'performance_id']);
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
     * @return UserPerformanceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserPerformanceQuery(get_called_class());
    }
}
