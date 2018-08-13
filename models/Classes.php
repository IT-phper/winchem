<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classes".
 *
 * @property int $id
 * @property string $name 产品种类
 * @property string $img 图片
 * @property string $summary 简介
 * @property int $order 排序（越小的优先显示）
 * @property int $type 1是清洁剂产品 2是设备产品
 */
class Classes extends \yii\db\ActiveRecord
{
    public $file;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'classes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'summary', 'order', 'type'], 'required'],
            [['order', 'type'], 'integer'],
            [['name', 'img'], 'string', 'max' => 60],
            [['summary'], 'string', 'max' => 80, 'message' => '长度不能超过70字符'],
            [['file'], 'file', 'extensions' => ['png', 'jpg', 'gif'], 'maxSize' => 1024*1024*1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '产品种类',
            'img' => '图片',
            'summary' => '简介',
            'order' => '排序（越小的优先显示）',
            'type' => '类型',
            'file' => '图片',
        ];
    }
    
    /**
     * 正常状态下的栏目名
     */
    public static function getMainColumnName()
    {
        return self::find()->select(['name'])->orderBy('id ASC')->indexBy('id')->column();
    }
    
    public static function getName($id){
        return self::findOne($id)->name;
    }
    
    public static function getClasses(){
        $data =  self::find()->select('id,name,img,summary')->where(['type' => 1])->orderBy('order asc, id asc')->asArray()->all();
        foreach($data as &$v){
            if($v['img']){
                $v['img'] = Yii::$app->request->hostInfo . '/uploads/'.$v['img'];
            }
        }
        return $data;
    }
    
    public static function getClasses2(){
        $data =  self::find()->select('id,name,img,summary')->where(['type' => 2])->orderBy('order asc, id asc')->asArray()->all();
        foreach($data as &$v){
            if($v['img']){
                $v['img'] = Yii::$app->request->hostInfo . '/uploads/'.$v['img'];
            }
        }
        return $data;
    }
}
