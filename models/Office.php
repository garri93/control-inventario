<?php

namespace app\models;


use Yii;
use arogachev\ManyToMany\behaviors\ManyToManyBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "office".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $postal_code
 * @property string $phone
 * @property int $customer_id
 *
 * @property Customer $customer
 * @property Device[] $devices
 * @property OfficeAssignment[] $officeAssignments
 * @property User[] $users
 */
class Office extends \yii\db\ActiveRecord
{

    public $category_id;
    

/**
 * Extension Many to Many
 *  */    
    public $assignmentUsers = [];

    public function behaviors()
    {
        return [
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    [
                        'editableAttribute' => 'assignmentUsers', // Nombre de atributo editable
                        'table' => 'office_assignment', // Nombre de la tabla de unión
                        'ownAttribute' => 'office_id', // Nombre de la columna en la tabla de unión que representa el modelo actual
                        'relatedModel' => User::className(), // Clase de modelo relacionada
                        'relatedAttribute' => 'user_id', // Nombre de la columna en la tabla de unión que representa el modelo relacionado
                    ],
                ],
            ],
        ];
    }

/*********** */

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'office';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'postal_code', 'phone', 'customer_id'], 'required'],
            [['customer_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 250],
            [['postal_code'], 'string', 'max' => 45],
            [['phone'], 'string', 'max' => 9],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['customer_id' => 'id']],
            ['assignmentUsers', 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre',
            'address' => 'Direccion',
            'postal_code' => 'Codigo Postal',
            'phone' => 'Telefono',
            'customer_id' => 'Cliente',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery|CustomerQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::class, ['id' => 'customer_id']);
    }

    /**
     * Gets query for [[Devices]].
     *
     * @return \yii\db\ActiveQuery|DeviceQuery
     */
    public function getDevices()
    {
        return $this->hasMany(Device::class, ['office_id' => 'id']);
    }

    /**
     * Gets query for [[OfficeAssignments]].
     *
     * @return \yii\db\ActiveQuery|OfficeAssignmentQuery
     */
    public function getOfficeAssignments()
    {
        return $this->hasMany(OfficeAssignment::class, ['office_id' => 'id']);
    }
    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['id' => 'user_id'])->viaTable('office_assignment', ['office_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return OfficeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OfficeQuery(get_called_class());
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





}
