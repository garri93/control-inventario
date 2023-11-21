<?php

namespace app\models;
use yii\helpers\ArrayHelper;

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
 *
 * @property Company $company
 * @property OfficeAssignment[] $officeAssignments
 * @property Office[] $offices
 * @property Performance[] $performances
 * @property UserPerformance[] $userPerformances
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const ROL_ADMIN = 1;
    const ROL_TECHNICAL = 2;
    const ROL_MANAGER = 3;

 static $rolOptions = [
        self::ROL_ADMIN => 'Admin',
        self::ROL_TECHNICAL => 'Tecnico',
        self::ROL_MANAGER => 'Encargado'
 ];


    public function getRolToString(){
        return self::$rolOptions[$this->role];
    }


    public function isAdmin(){
        return $this->role === self::ROL_ADMIN;
    }
    

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
            [['email'], 'string', 'max' => 50],
            [['role'], 'integer', 'max' => 3],
            [['dni'], 'unique'],
            [['email'], 'unique'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
            [['auth_key'], 'string'],
            [['accessToken'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Nombre',
            'surname' => 'Apellidos',
            'dni' => 'Dni',
            'phone' => 'Telefono',
            'company_id' => 'Empresa',
            'role' => 'Rol',
            'password' => 'Password',
            'correo' => 'Password',
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

    
/**
 * Preparando el Login
 */


    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function getRole()
    {
        return $this->role;
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
                $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            }
            return true;
        }
        return false;
    }

        /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

            /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */


    public static function findByUserEmail($email)
    {
        return static::findOne(['email' => $email]);
    }
   


    
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
  *//*
    public function validatePassword($password)
    {
        return $this->password === $password;
    }*/

    public function validatePassword($password) 
    {
        return (Yii::$app->getSecurity()->validatePassword($password, $this->password)); 
    }

  /**
     *
     * Verificacion de usuarios
     *
     */

    public function isUserAdmin()
    {
        return $this->getRole() === self::ROL_ADMIN;
    }

    public function isUserTechnical()
    {
        return $this->getRole() === self::ROL_TECHNICAL;
    }

    public function isUserManager()
    {
        return $this->getRole() === self::ROL_MANAGER;
    }


    /* Establecer pagina de inicio segun usuario */
    public function getUserAdminPanel()
    {
        switch (Yii::$app->user->identity->role) {
            case User::ROL_ADMIN:
                    return "/administration/administration";
                break;
            case User::ROL_TECHNICAL :
                    return "/administration/technical";
                break;
            case User::ROL_MANAGER :
                    return "/administration/manager";
                break;
        }

    }


    public static function getList()
    {
        $models = static::find()->where(['company_id' => Yii::$app->user->identity->company_id])->orderBy('username')->all();
    
        return ArrayHelper::map($models, 'id', 'username');
    }








}