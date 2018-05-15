<?php
/**
 * Created by PhpStorm.
 * User: matsk
 * Date: 15.05.2018
 * Time: 02:33
 */

namespace app\models;


use yii\db\ActiveRecord;

class Subscriber extends ActiveRecord
{
    public static function tableName()
    {
        return 'users';
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Введите свою електронную почту',
        ];
    }

    public function rules() {
        return [
            ['email','required','message'=>'Поле обезательно'],
            ['email','email'],
            ['email','string','max'=>100]
        ];
    }
}