<?php

namespace app\controllers;

use Yii;
use app\models\CompanyIndex;
use app\models\CompanyPhylogeny;
use app\models\CompanyCultrue;
//use app\models\CompanyIdea;
use app\models\CompanyIdeal;
use app\models\CompanyPattern;
use app\models\CompanyAbout;
use yii\web\UploadedFile;

class CompanyController extends BaseController
{    
    //公司简介
    public function actionIndex()
    {
        $model = new CompanyIndex();
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $file = UploadedFile::getInstance($model,'picture');
            if ($file) {
                $model->picture = date('Y-m-d') . '-' .uniqid() . '.' . $file->extension;  
                $file->saveAs('uploads/' . $model->picture);
            }
            
            $model->save();
        }
        
        return $this->render('index',[
            'model' => $model,
        ]);
    }
    
    //关于我们
    public function actionAbout(){
         $model = new CompanyAbout();
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            $model->save();
        }
        
        return $this->render('about',[
            'model' => $model,
        ]);
    }
    
    //发展史
    public function actionPhylogeny(){
        $model = new CompanyPhylogeny();
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
        }
        
        return $this->render('phylogeny',[
            'model' => $model,
        ]);
    }
    
    //公司文化
    public function actionCultrue(){
        $model = new CompanyCultrue();
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
        }
        
        return $this->render('culture',[
            'model' => $model,
        ]);
    }
    
        //经营理念
    public function actionIdeal(){
        $model = new CompanyIdeal();
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
        }
        
        return $this->render('ideal',[
            'model' => $model,
        ]);
    }
    
    //公司业务模式
    public function actionPattern(){
        $model = new CompanyPattern();
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
        }
        
        return $this->render('pattern',[
            'model' => $model,
        ]);
    }
    
    
    
    
    //经营理念
//    public function actionIdea(){
//        $model = new CompanyIdea();
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            
//            $file1 = UploadedFile::getInstance($model,'picture1');
//            if ($file1) {
//                $model->picture1 = date('Y-m-d') . '-' .uniqid() . '.' . $file1->extension;  
//                $file1->saveAs('uploads/' . $model->picture1);
//            }
//            
//            $file2 = UploadedFile::getInstance($model,'picture2');
//            if ($file2) {
//                $model->picture2 = date('Y-m-d') . '-' .uniqid() . '.' . $file2->extension;  
//                $file2->saveAs('uploads/' . $model->picture2);
//            }
//            
//            $file3 = UploadedFile::getInstance($model,'picture3');
//            if ($file3) {
//                $model->picture3 = date('Y-m-d') . '-' .uniqid() . '.' . $file3->extension;  
//                $file3->saveAs('uploads/' . $model->picture3);
//            }
//            
//            $model->save();
//        }
//        
//        return $this->render('idea',[
//            'model' => $model,
//        ]);
//    }
    
}