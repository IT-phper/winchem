<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $initial 首字母
 * @property string $province
 * @property string $city
 * @property string $addr 地址
 * @property string $tel
 * @property int $order 排序，越小排名到前面
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['initial', 'city','addr', 'tel'], 'required'],
            [['order'], 'integer'],
            [['initial'], 'string', 'max' => 1],
            [['province', 'city'], 'string', 'max' => 20],
            [['addr'], 'string', 'max' => 60],
            [['tel'], 'string', 'max' => 30],
            ['order', 'default', 'value' => 0],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'initial' => '首字母',
            'province' => '省份（直辖市无需填写）',
            'city' => '城市',
            'addr' => '详细地址',
            'tel' => '联系电话',
            'order' => '排序（小的优先显示）',
        ];
    }
    
    public static function data(){
        $data = self::find()->orderBy('initial asc, province asc,order asc')->asArray()->all();
        $res = [];
        foreach($data as $v){
            
            $v['initial'] = $v['initial'] == '1' ? 'zx' : $v['initial'];
            
//            if(isset($res[$v['initial']])){
//                
//                
//            }else{
                
                if (empty($v['province'])){
                    $res[$v['initial']][] = $v;
                }else{
                    $res[$v['initial']][$v['province']][] = $v;
                }
                
                
//            }
                
        }
        
        return $res;
    }
}
