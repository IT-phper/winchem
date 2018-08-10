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
class CompanyIdeal extends Model
{
    public $ideal;


    public function init() {
        parent::init();
        $settings = Yii::$app->settings;
        $this->ideal = $settings->get('Companyphy.ideal');
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['ideal'], 'required'],
        ];
    }
    
    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
            'ideal' =>  '经营理念',
        ];
    }
    
    public function save(){
        $settings = Yii::$app->settings;
        $settings->set('Companyphy.ideal', $this->ideal);
    }
}
