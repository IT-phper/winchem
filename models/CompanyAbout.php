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
class CompanyAbout extends Model
{
    public $chinese;
    public $english;


    public function init() {
        parent::init();
        $settings = Yii::$app->settings;
        $this->chinese = $settings->get('CompanyAbout.chinese');
        $this->english = $settings->get('CompanyAbout.english');
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['chinese', 'english'], 'required'],
        ];
    }
    
    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
            'chinese' =>  '中文介绍',
            'english' => '英文介绍',
        ];
    }
    
    public function save(){
        $settings = Yii::$app->settings;
        $settings->set('CompanyAbout.chinese', $this->chinese);
        $settings->set('CompanyAbout.english', $this->english);
    }
}
