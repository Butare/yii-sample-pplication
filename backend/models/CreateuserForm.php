<?php
/**
 * Created by PhpStorm.
 * User: JimmyHome
 * Date: 2017/10/03
 * Time: 13:07
 */

namespace app\models;



use yii\base\Model;
use \common\models\User;


class CreateuserForm extends Model
{
    public $username;
    public $password;
    public $role;
        public $shopId;
    public $email;


    public function rules(){

        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This name has already been taken'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['password', 'required'],
            ['password', 'string', 'min' => 3],

            ['shopId', 'integer'],

            ['role', 'required'],
            ['role', 'string'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email has already been taken']
        ];
    }


    public function createUser() {

        if (!$this->validate()) {
            return null;
        }

        $user = new User();

        $user->username = $this->username;
        $user->password = $this->password;
        $user->role = $this->role;
        $user->shopId = $this->shopId;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user:null;
    }



}