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
class CompanyCultrue extends Model
{
    public $phylogeny;
    public $culture;


    public function init() {
        parent::init();
        $settings = Yii::$app->settings;
        $this->phylogeny = $settings->get('CompanyCulture.index');
        $this->culture = $settings->get('CompanyCulture.culture');
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['phylogeny','culture'], 'required'],
        ];
    }
    
    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
            'phylogeny' =>  '企业文化',
            'culture' => '人才理念',

        ];
    }
    
    public function save(){
        $settings = Yii::$app->settings;
        $settings->set('CompanyCulture.index', $this->phylogeny);
        $settings->set('CompanyCulture.culture', $this->culture);
    }
}
