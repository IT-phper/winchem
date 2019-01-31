<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
use app\models\LoginForm;
use app\models\User;
use app\models\UserIdentity;

class LoginController extends Controller
{
        /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

		if ($post_data = Yii::$app->request->post()) {
			if (User::validatePassword($post_data['username'], $post_data['password'])) {
				Yii::$app->user->login(UserIdentity::findByUsername($post_data['username']));
				return $this->redirect('/');
			} else {
				Yii::$app->session->setFlash('error', '您输入的账号或密码有误');
			}
		}

        return $this->render('login');
    }
    
    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    
    	/**
	 * 修改密码
	 */
	public function actionPassword()
	{
        if ($post_data = Yii::$app->request->post()) {
            if ($post_data['AdminUsers']['password'] !=
                $post_data['AdminUsers']['password_confirm']
            ) {
                Yii::$app->session->setFlash('error', '确认密码不一致');
                return $this->redirect(['/login/password']);
            }
            unset($post_data['AdminUsers']['password_confirm']);
            $uid = Yii::$app->User->id;
            $user = User::findOne($uid);
            $user->password = $post_data['AdminUsers']['password'];
            if ($user->save()) {
                Yii::$app->session->setFlash('success', '密码修改成功');
                return $this->redirect(['/login/password']);
            }
            Yii::$app->session->setFlash('error', '密码修改失败');
            return $this->redirect(['/login/password']);
        }
        return $this->render('update_passwd.php');		
	}
}


