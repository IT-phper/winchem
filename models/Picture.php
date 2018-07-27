<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "picture".
 *
 * @property int $id
 * @property string $picture
 * @property string $name
 * @property int $order 排序 小的排到前面
 * @property int $type 1 代表公司荣誉
 * @property int $sub_type
 */
class Picture extends \yii\db\ActiveRecord
{
    public $file;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'picture';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'sub_type'], 'required'],
            [['order', 'type', 'sub_type'], 'integer'],
            [['picture'], 'string', 'max' => 120],
            [['name'], 'string', 'max' => 30],
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
            'picture' => '图片路径',
            'name' => '标题',
            'order' => '排序（小的显示在前面）',
            'type' => '类型',
            'sub_type' => '子类型',
            'file' => '图片',
        ];
    }
    
    public static function honor(){
        $data[] = self::find()->select(['picture','name','sub_type'])->where(['sub_type' => 1])->orderBy('order Asc')->asArray()->one();
        $data[] = self::find()->select(['picture','name','sub_type'])->where(['sub_type' => 2])->orderBy('order Asc')->asArray()->one();
        $data[] = self::find()->select(['picture','name','sub_type'])->where(['sub_type' => 3])->orderBy('order Asc')->asArray()->one();
        return $data;
    }
    
    public static function honor1($sub_type){
        return self::find()->select(['picture','name','sub_type'])->where(['sub_type' => $sub_type])->orderBy('order Asc')->asArray()->all();

    }
}
