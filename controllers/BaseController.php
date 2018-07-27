<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
//use yii\filters\Cors;
//use yii\helpers\ArrayHelper;

class BaseController extends Controller
{
    public function beforeAction($action) {
        
        if (Yii::$app->user->isGuest){
            return Yii::$app->getResponse()->redirect('/login');
        }
        
        return parent::beforeAction($action);
    }
    
//    public function behaviors()
//    {
//        return ArrayHelper::merge([
//            [
//                'class' => Cors::className(),
//                'cors' => [
//                    'Origin' => ['*'],
//                    'Access-Control-Request-Method' => ['GET', 'HEAD', 'OPTIONS'],
//                ],
//            ],
//        ], parent::behaviors());
//    }
}

