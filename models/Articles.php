<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property string $title 标题
 * @property int $column 主栏目
 * @property string $img 图片
 * @property int $order 权重（小的显示有限）
 * @property string $content 内容
 * @property string $created 创建时间
 */
class Articles extends \yii\db\ActiveRecord
{
    public $file;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content','summary'], 'required'],
            [['column', 'order'], 'integer'],
            [['content'], 'string'],
            [['created'], 'safe'],
            [['title','summary'], 'string', 'max' => 255],
            [['img'], 'string', 'max' => 120],
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
            'title' => '标题',
            'column' => '栏目',
            'img' => '图片',
            'order' => '排序（小的显示在前面）',
            'content' => '内容',
            'created' => '创建时间',
            'file' => '图片',
            'summary' => '简介'
        ];
    }
    
    public static function Trends($page,$limit){
        $offset = ($page-1)*$limit;
        $data=self::find()->select(['id','title','img','created','summary'])->where(['column' => 1])->orderBy('order asc,created desc')->offset($offset)->limit($limit)->asArray()->all();
        foreach($data as &$v){
            if($v['img']){
                $v['img'] = Yii::$app->request->hostInfo . '/uploads/'.$v['img'];
            }
        }
        $sum = self::find()->where(['column' => 1])->count();
        $total = ceil($sum/$limit);
        return ['page'=>$page,'total'=>$total,'data'=>$data];
    }
    
    public static function Information($page,$limit){
        $offset = ($page-1)*$limit;
        $data=self::find()->select(['id','title','img','created','summary'])->where(['column' => 2])->orderBy('order asc,created desc')->offset($offset)->limit($limit)->asArray()->all();
        foreach($data as &$v){
            if($v['img']){
                $v['img'] = Yii::$app->request->hostInfo . '/uploads/'.$v['img'];
            }
        }
        $sum = self::find()->where(['column' => 2])->count();
        $total = ceil($sum/$limit);
        return ['page'=>$page,'total'=>$total,'data'=>$data];
    }
    
    public static function detail($id){
        $data= self::find()->where(['id'=>$id])->asArray()->one();
        $data['content'] = str_replace('<img src="','<img src="'.Yii::$app->request->hostInfo,$data['content']);
        return $data;
    }
    
    public static function news(){
        $data = self::find()->select(['id','title','created','summary'])->orderBy('created desc')->limit(4)->asArray()->all();
        return $data;
    }
    
    public static function sowing(){
        $data = self::find()->select(['id','title','img'])->orderBy('created desc')->limit(4)->asArray()->all();
        foreach($data as &$v){
            if($v['img']){
                $v['img'] = Yii::$app->request->hostInfo . '/uploads/'.$v['img'];
            }
        }
        return $data;
    }
}
