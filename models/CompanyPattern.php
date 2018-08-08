<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class CompanyPattern extends Model
{
    public $rent;
    public $service;
    public $logistics;

    public function init() {
        parent::init();
        $settings = Yii::$app->settings;
        $this->rent = $settings->get('Companyphy.rent');
        $this->service = $settings->get('Companyphy.service');
        $this->logistics = $settings->get('Companyphy.logistics');
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['rent','service','logistics'], 'required'],
        ];
    }
    
    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
            'rent' =>  '租赁模式',
            'service' => '服务模式',
            'logistics' => '自动物流',

        ];
    }
    
    public function save(){
        $settings = Yii::$app->settings;
        $settings->set('Companyphy.rent', $this->rent);
        $settings->set('Companyphy.service', $this->service);
        $settings->set('Companyphy.logistics', $this->logistics);
    }
}
