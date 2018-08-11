<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mode".
 *
 * @property int $id
 * @property string $name 名称
 * @property string $content 内容
 * @property int $order 排序
 */
class Mode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mode';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'content', 'order'], 'required'],
            [['content'], 'string'],
            [['order'], 'integer'],
            [['name'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '模式名称',
            'content' => '内容',
            'order' => '排序（小的显示在前面）',
        ];
    }
    
    public static function getmode(){
        return self::find()->select(['name', 'content'])->orderBy('order asc')->asArray()->all();
    }
}
