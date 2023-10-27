<?php

namespace app\models;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $nombre;
    public $password;
    public $authKey;
    public $accessToken;
    public $apellidos;
    public $dni;
    public $telefono;
    public $empresa_id;
    public $rol;

  
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $user = Usuario::findOne(['id' => $id]);

        if ($user !== null) {
            return new static($user);
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        // Utiliza el método findOne para buscar un usuario en la base de datos
        $user = Usuario::findOne(['nombre' => $username]);

        if ($user !== null) {
            return new static($user);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

        /**
     * {@inheritdoc}
     */
    public function getnombre()
    {
        return $this->nombre;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    


/**
     * Creacion de Roles
     * https://jquery-manual.blogspot.com/2015/02/yii-framework-2-user-y-admin-control-de.html
     */

    public $role;

    public static function isUserAdmin($id)
    {
       if (Yii::$app->user->identity->rol === 1){
        return true;
       } else {

        return false;
       }

    }

    public static function isUserTecnico($id)
    {
       if (Yii::$app->user->identity->rol === 2){
       return true;
       } else {

       return false;
       }
    }

    public static function isUserCliente($id)
    {
       if (Yii::$app->user->identity->rol === 3){
       return true;
       } else {

       return false;
       }
    }





}
