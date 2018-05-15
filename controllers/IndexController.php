<?php
/**
 * Created by PhpStorm.
 * User: matsk
 * Date: 15.05.2018
 * Time: 02:13
 */

namespace app\controllers;


use yii\web\Controller;

use app\models\Subscriber;

use yii\web\NotFoundHttpException;

use Yii;

use app\components\AboutGuest\AboutGuest;

class IndexController extends Controller
{
    public $layout = 'mylayout';

    public function actionIndex() {
        $model = new Subscriber();


        return $this->render('index',['model'=>$model]);
    }

    public function actionSave() {
        if(Yii::$app->request->post()) {
            $model = new Subscriber();
            if($model->load(Yii::$app->request->post())) {
                // вычисление всей нужной информации о пользователе
                $client  = $_SERVER['HTTP_CLIENT_IP'];
                $forward = $_SERVER['HTTP_X_FORWARDED_FOR'];
                $remote  = "92.249.67.7";
                $country = false;
                $city = false;

                if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
                elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
                else $ip = $remote;

                $ip_data = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
                if($ip_data && $ip_data->geoplugin_countryName != null)
                {
                    $country = $ip_data->geoplugin_countryName;
                }
                if($ip_data && $ip_data->geoplugin_city != null)
                {
                    $city = $ip_data->geoplugin_city;
                }

                $model->city = $city;
                $model->country = $country;
                $aboutUser = new AboutGuest($model->email);
                $model->mail_service = $aboutUser->mail_service;
                $model->browser = $aboutUser->browser;
                if($aboutUser->is_mobile) {
                    $model->device = $aboutUser->mobile;
                } else {
                    $model->device = "PC";
                }
                $model->operating_system = $aboutUser->operating_system.'/'.$aboutUser->os_version;
                if($model->save()) {
                    Yii::$app->session->setFlash('success','Данные были успешно отправлены');
                    return $this->redirect('/');
                } else {
                    Yii::$app->session->setFlash('error','Ошибка отправки данных');
                    return $this->redirect('/');
                }
            }
        } else {
            throw new NotFoundHttpException('Даная старница не существует');
        }
    }
}