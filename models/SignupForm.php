<?php

namespace app\models;

use Yii;
use yii\base\Model;

use app\models\User;
use app\models\Company;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class SignupForm extends Model
{
    public $email;
    public $password;    
    public $username;
    public $repeatpassword;
    public $phone;
    public $dni;
    public $cifcompany;
    public $surname;
    public $namecompany;
    public $company_id;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'surname', 'phone', 'password','repeatpassword','cifcompany','dni','namecompany','email'], 'required'],
            [['phone', 'company_id'], 'integer'],
            [['username', 'surname', 'password'], 'string', 'max' => 100],
            [['dni'], 'string', 'max' => 9],
            [['cifcompany'], 'string', 'max' => 9],
            [['email'], 'string', 'max' => 50],
            [['dni'], 'dni_existe'],
            [['cifcompany'], 'cif_existe'],
            [['email'], 'email_existe'],
            
            ['password', 'match', 'pattern' => "/^.{8,16}$/", 'message' => 'Mínimo 6 y máximo 16 caracteres'],
            ['repeatpassword', 'compare', 'compareAttribute' => 'password', 'message' => 'Los passwords no coinciden'],

        ];
    }

     /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [

            'namecompany' => 'Nombre Empresa',
            'address' => 'Direccion',
            'postal_code' => 'Codigo Postal',
            'phone' => 'Telefono',
            'customer_id' => 'Cliente',
            'cifcompany' => 'Cif',
            'password' => 'Contraseña',
            'repeatpassword' => 'Repite Contraseña',
            'username' => 'Nombre Usuario',
            'surname' => 'Apellidos',
        ];
    }


    public function email_existe($attribute, $params)
    {
        if(User::find()->where(["email" => $this->email])->exists() || Company::find()->where(["email" => $this->email])->exists())
            $this->addError($attribute, "El email seleccionado existe");
    }

    public function dni_existe($attribute, $params)
    {
        if(User::find()->where(["dni" => $this->dni])->exists())
            $this->addError($attribute, "El Dni seleccionado existe");
    }

    public function cif_existe($attribute, $params)
    {
        if(Company::find()->where(["cif" => $this->cifcompany])->exists())
            $this->addError($attribute, "El Cif seleccionado existe");
    }
 
 

}















