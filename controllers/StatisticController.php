<?php
/**
 * Created by PhpStorm.
 * User: matsk
 * Date: 15.05.2018
 * Time: 04:40
 */

namespace app\controllers;


use yii\web\Controller;

use app\models\Subscriber;

use Yii;

class StatisticController extends Controller
{
    public $layout = 'mylayout';


    public function actionIndex() {
        $users = Subscriber::find()->all();
        $mail_services = array();
        $browsers = array();
        $devices = array();
        $countries = array();

        foreach($users as $user) {
            $mail_services[$user->mail_service] = array();
            $browsers[$user->browser] = array();
            $devises[$user->device] = array();
            $countries[$user->country] = array();
            $cities[$user->city] = array();
            $operating_systems[$user->operating_system] = array();
        }
        foreach($users as $user) {
            if(isset($mail_services[$user->mail_service])) {
                $mail_services[$user->mail_service][] = $user->mail_service;
            }
            if(isset($browsers[$user->browser])) {
                $browsers[$user->browser][] = $user->browser;
            }
            if(isset($devises[$user->device])) {
                $devices[$user->device][] = $user->device;
            }
            if(isset($countries[$user->country])) {
                $countries[$user->country][] = $user->country;
            }
            if(isset($cities[$user->city])) {
                $cities[$user->city][] = $user->city;
            }
            if(isset($operating_systems[$user->operating_system])) {
                $operating_systems[$user->operating_system][] = $user->operating_system;
            }


        }


        return $this->render('statistic',[
            'users'=>$users,
            'mail_services'=>$mail_services,
            'browsers'=>$browsers,
            'devices'=>$devices,
            'countries'=>$countries,
            'cities'=>$cities,
            'operating_systems'=>$operating_systems]);
    }
}