<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $surname
 * @property string|null $dni
 * @property int $phone
 * @property int $company_id
 * @property string $role
 * @property string $password
 *
 * @property Company $company
 * @property OfficeAssignment[] $officeAssignments
 * @property Office[] $offices
 * @property Performance[] $performances
 * @property UserPerformance[] $userPerformances
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'surname', 'phone', 'company_id', 'role', 'password'], 'required'],
            [['phone', 'company_id'], 'integer'],
            [['username', 'surname', 'password'], 'string', 'max' => 100],
            [['dni'], 'string', 'max' => 9],
            [['role'], 'string', 'max' => 45],
            [['dni'], 'unique'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'surname' => 'Surname',
            'dni' => 'Dni',
            'phone' => 'Phone',
            'company_id' => 'Company ID',
            'role' => 'Role',
            'password' => 'Password',
        ];
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery|CompanyQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'company_id']);
    }

    /**
     * Gets query for [[OfficeAssignments]].
     *
     * @return \yii\db\ActiveQuery|OfficeAssignmentQuery
     */
    public function getOfficeAssignments()
    {
        return $this->hasMany(OfficeAssignment::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Offices]].
     *
     * @return \yii\db\ActiveQuery|OfficeQuery
     */
    public function getOffices()
    {
        return $this->hasMany(Office::class, ['id' => 'office_id'])->viaTable('office_assignment', ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Performances]].
     *
     * @return \yii\db\ActiveQuery|PerformanceQuery
     */
    public function getPerformances()
    {
        return $this->hasMany(Performance::class, ['id' => 'performance_id'])->viaTable('user_performance', ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserPerformances]].
     *
     * @return \yii\db\ActiveQuery|UserPerformanceQuery
     */
    public function getUserPerformances()
    {
        return $this->hasMany(UserPerformance::class, ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
