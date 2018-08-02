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
 */
class Classes extends \yii\db\ActiveRecord
{
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
            [['name', 'img', 'summary', 'order'], 'required'],
            [['order'], 'integer'],
            [['name', 'img'], 'string', 'max' => 60],
            [['summary'], 'string', 'max' => 255],
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
        ];
    }
}
