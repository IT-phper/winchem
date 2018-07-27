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
class CompanyIndex extends Model
{
    public $picture;
    public $chinese;
    public $english;


    public function init() {
        parent::init();
        $settings = Yii::$app->settings;
        $this->picture = $settings->get('CompanyIndex.picture');
        $this->chinese = $settings->get('CompanyIndex.chinese');
        $this->english = $settings->get('CompanyIndex.english');
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
            'picture' =>  '宣传图',
            'chinese' =>  '中文介绍',
            'english' => '英文介绍',
        ];
    }
    
    public function save(){
        $settings = Yii::$app->settings;
        $settings->set('CompanyIndex.picture', $this->picture);
        $settings->set('CompanyIndex.chinese', $this->chinese);
        $settings->set('CompanyIndex.english', $this->english);
    }
}
