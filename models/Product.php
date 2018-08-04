<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name 名称
 * @property string $img 图片
 * @property string $summary 介绍
 * @property int $order 排序（越小的优先显示）
 * @property int $class_id 产品种类
 */
class Product extends \yii\db\ActiveRecord
{
    public $file;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'summary', 'order', 'class_id'], 'required'],
            [['order', 'class_id'], 'integer'],
            [['name', 'img'], 'string', 'max' => 60],
            [['summary'], 'string', 'max' => 255],
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
            'name' => '名称',
            'img' => '图片',
            'summary' => '介绍',
            'order' => '排序（越小的优先显示）',
            'class_id' => '产品种类',
            'file' => '图片',
        ];
    }
    
    public static function getProductByClassId($class_id){
        $data = self::find()->select('name,img,summary')->where(['class_id' => $class_id])->orderBy('order asc')->asArray()->all();
        foreach($data as &$v){
            if($v['img']){
                $v['img'] = Yii::$app->request->hostInfo . '/uploads/'.$v['img'];
            }
        }
        return $data;
    }
}
