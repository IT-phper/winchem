<?php
namespace app\models;
use Yii;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $real_name
 * @property integer $role
 * @property integer $shop_id
 * @property string $authKey
 * @property string $accessToken
 * @property string $created
 * @property string $updated
 * @property integer $status
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'string', 'max' => 60],
            [['password'], 'string', 'max' => 32],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '管理员邮箱',
            'password' => '密码',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }
    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
//    public static function find()
//    {
//        return (new UserQuery(get_called_class()))->andWhere(['<>', self::tableName() . '.status', 3]);
//    }

    /**
     * 验证登录账号和密码
     */
    public static function validatePassword($username, $password)
    {
        $data = self::find()->where(['username' => $username])->asArray()->one();
        if ($data) {
            if ($data['password'] === $password) return true;
        }     
        return false;
    }
}