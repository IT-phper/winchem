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
class CompanyPhylogeny extends Model
{
    public $phylogeny;
    public $culture;


    public function init() {
        parent::init();
        $settings = Yii::$app->settings;
        $this->phylogeny = $settings->get('Companyphylogeny.index');
        $this->culture = $settings->get('Companyphylogeny.culture');
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
            'phylogeny' =>  '公司发展史',
            'culture' => '公司文化',

        ];
    }
    
    public function save(){
        $settings = Yii::$app->settings;
        $settings->set('Companyphylogeny.index', $this->phylogeny);
        $settings->set('Companyphylogeny.culture', $this->culture);
    }
}
