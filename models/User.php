<?php

namespace app\models;
use yii\helpers\ArrayHelper;
use arogachev\ManyToMany\behaviors\ManyToManyBehavior;

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
    const ACTIVO_SI = 1;
    const ACTIVO_NO = 0;

    const ROL_ADMIN = 1;
    const ROL_TECHNICAL = 2;
    const ROL_MANAGER = 3;

 static $rolOptions = [
        self::ROL_ADMIN => 'Admin',
        self::ROL_TECHNICAL => 'Tecnico',
        self::ROL_MANAGER => 'Encargado'
 ];


 public $assignmentOffice = [];

    public function behaviors()
    {
        return [
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    [
                        'editableAttribute' => 'assignmentOffice', // Nombre de atributo editable
                        'table' => 'office_assignment', // Nombre de la tabla de unión
                        'ownAttribute' => 'user_id', // Nombre de la columna en la tabla de unión que representa el modelo actual
                        'relatedModel' => Office::className(), // Clase de modelo relacionada
                        'relatedAttribute' => 'office_id', // Nombre de la columna en la tabla de unión que representa el modelo relacionado
                    ],
                ],
            ],
        ];
    }


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
            [['phone', 'company_id', 'activo'], 'integer'],
            [['username', 'surname', 'password'], 'string', 'max' => 100],
            [['dni'], 'string', 'max' => 9],
            [['email'], 'string', 'max' => 50],
            [['role'], 'integer', 'max' => 3],
            [['dni'], 'unique'],
            [['email'], 'unique'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
            [['auth_key'], 'string'],
            [['accessToken'], 'string'],
            ['assignmentOffice', 'safe'],
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
            'password' => 'Contraseña',
            'email' => 'email',
            'activo' => 'Activo'
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
                $this->activo = self::ACTIVO_SI; 

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



    static function toDropDown(){

        return ArrayHelper::map(
            Office::find()
                ->joinWith(['customer'])
                ->where([
                    'customer.company_id' => Yii::$app->user->identity->company_id,
                ])
                ->orderBy(['name' => SORT_ASC])
                ->all(),
            'id',
            'name'
        );
        
    } 


/** Esta funcion es para validar el acceso del usuario cundo se le envia una oficina
 * va a tener en cuenta las oficinas asignadas que tenga ese usuario
 */
public function canAccessByAssignedOffice($id_office):bool
{ 
    return in_array($id_office, $this->assignmentOffice); 
}

/** Esta funcion es para validar el acceso del usuario admin a los usarios de su empresa
 */

 public function canAccessByUser($id_user): bool
 { 
    $users = User::find()
    ->where(['company_id' => Yii::$app->user->identity->company_id])
    ->all();

    if (count($users) == 0) return false; 

    $user_ids = [];

    foreach ($users as $user) {
        $user_ids[] = $user->id;
    }

    return in_array($id_user, $user_ids); 

 }


/** Esta funcion es para validar el acceso a las categorias de la empresa
 */

public function canAccessBycategory($id_category):bool
{ 
    $categories = Category::find()
    ->where(['company_id' => Yii::$app->user->identity->company_id])
    ->all();

    if (count($categories) == 0) return false; 

    $category_ids = [];

    foreach ($categories as $category) {
        $category_ids[] = $category->id;
    }

    return in_array($id_category, $category_ids); 
}


/** Esta funcion es para validar el acceso a las Clientes de la empresa
 */

public function canAccessBycustomer($id_customer):bool
{ 
  
    $customers = Customer::find()
    ->where(['company_id' => Yii::$app->user->identity->company_id])
    ->all();

    if (count($customers) == 0) return false; 

    $customer_ids = [];

    foreach ($customers as $customer) {
        $customer_ids[] = $customer->id;
    }
   

    return in_array($id_customer, $customer_ids); 
}

/** Esta funcion es para validar el acceso a los  datos de empresa de la empresa
 */

public function canAccessBycompany($id_company):bool
{ 
    $company = Company::findOne(Yii::$app->user->identity->company_id);
    
    return $company !== null && $company->id == $id_company;
}



public function delete(){

     // la quitamos de la n:m, borrar elemento de un array por valor
     if (($key = array_search($this->id, $this->assignmentOffice)) !== false) {
        unset($this->assignmentOffice[$key]);
    }

    $this->activo = self::ACTIVO_NO;
    $this->save();
}

}