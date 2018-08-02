<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use app\models\Picture;
use app\models\Contact;
use app\models\Articles;

/*
 *  企业简介
 *  /api/company-index
 *  返回参数 picture 宣传图  chinese 中文文字  english 英文文字
 * 
 * 公司发展史
 *  /api/company-phylogeny
 * 
 * 公司文化
 *  /api/company-culture
 * 
 * 公司荣誉
 *  /api/company-honor
 * 返回三张图  sub_type 1是资质图片  2是专利  3是认证
 * 
 * 公司荣誉分类
 * /api/company-honor-from-subtype
 * get请求
 * 传入参数  sub_type 1是资质图片  2是专利  3是认证  
 * eg: /api/company-honor-from-subtype?subtype=2
 * 
 * 经营理念
 *  /api/company-idea
 * 
 * 联系我们
 *  /api/contact
 * 返回数据  initial 首字母 zx的代表是直辖市
 * 
 * 企业动态
 * /api/trends
 * 传入参数  page  页码
 * 返回数据
 * page 页码  data该页码的数据  total 总页码
 * 
 * 
 * 行业资讯
 * /api/information
 * 传入参数  page  页码
 * 返回数据
 * page 页码  data该页码的数据  total 总页码
 * 
 * 企业动态或者行业资讯的详情
 * /api/articles-detail
 * 传入参数 id id在接口/api/information与/api/trends中有返回数据，可以获取到
 */

class ApiController extends Controller
{
   
    public function behaviors()
    {
        return ArrayHelper::merge([
            [
                'class' => Cors::className(),
                'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['GET', 'HEAD', 'OPTIONS'],
                ],
            ],
        ], parent::behaviors());
    }
    
    /**
     * ajaxMessage web前端交互json数据格式
     *
     * @param  integer $status     0:正常 非0:非正常
     * @param  string  $statusInfo 状态信息
     * @param  array   $data       返回值
     * @return json
     */
    public function ajaxMessage($status = 0, $statusInfo = 'success', $data = [])
    {
        Yii::$app->response->format = 'json';
        $status = $status ? (int)$status : 0;
        return [
            'status' => $status,
            'statusInfo' => $statusInfo,
            'data' => $data,
        ];
    }
    
    public function actionCompanyIndex(){
        $settings = Yii::$app->settings;
        return $this->ajaxMessage(0, 'success', [
            'picture' => Yii::$app->request->hostInfo . '/uploads/' .$settings->get('CompanyIndex.picture'),
            'chinese' => $settings->get('CompanyIndex.chinese'),
            'english' => $settings->get('CompanyIndex.english')
        ]);
    }
    
    public function actionCompanyPhylogeny(){
        $settings = Yii::$app->settings;
        return $this->ajaxMessage(0, 'success', [
            'phylogeny' => $settings->get('Companyphylogeny.index'),
        ]);
    }
    
    public function actionCompanyCulture(){
        $settings = Yii::$app->settings;
        return $this->ajaxMessage(0, 'success', [
            'phylogeny' => $settings->get('Companyphylogeny.culture'),
        ]);
    }
    
    public function actionCompanyIdea(){
        $settings = Yii::$app->settings;
        $suffix = Yii::$app->request->hostInfo . '/uploads/';
        return $this->ajaxMessage(0, 'success', [
            'picture1' => $suffix .$settings->get('CompanyIdea.picture1'),
            'picture2' => $suffix .$settings->get('CompanyIdea.picture2'),
            'picture3' => $suffix .$settings->get('CompanyIdea.picture3'),
            'idea1' => $settings->get('CompanyIdea.idea1'),
            'idea2' => $settings->get('CompanyIdea.idea2'),
            'idea3' => $settings->get('CompanyIdea.idea3'),
        ]);
    }
    
    //公司荣耀
    public function actionCompanyHonor(){
        $data = Picture::honor();
        $suffix = Yii::$app->request->hostInfo . '/uploads/';
        foreach($data as &$v) {
            $v['picture'] = $suffix . $v['picture'];
        }
        return $this->ajaxMessage(0, 'success',$data);
    }
    
    //公司荣耀
    public function actionCompanyHonorFromSubtype(){
        $request = Yii::$app->request;
        $subtype = $request->get('subtype',1);
        $data = Picture::honor1($subtype);
        return $this->ajaxMessage(0, 'success',$data);
    }
    
    //联系我们
    public function actionContact(){
        return $this->ajaxMessage(0, 'success', Contact::data());
    }
    
    //企业动态
    public function actionTrends(){
        $request = Yii::$app->request;
        $page = $request->get('page',1);
        $limit = 5;
        $data = Articles::Trends($page,$limit);
        return $this->ajaxMessage(0, 'success',$data);
    }
    
    //行业资讯
    public function actionInformation(){
        $request = Yii::$app->request;
        $page = $request->get('page',1);
        $limit = 5;
        $data = Articles::Information($page,$limit);
        return $this->ajaxMessage(0, 'success',$data);
    }
    
    //获取企业动态或者行业资讯的文章详细
    public function actionArticlesDetail(){   
        $request = Yii::$app->request;
        $id = $request->get('id',1);
        $data = Articles::detail($id);
        return $this->ajaxMessage(0, 'success',$data);
    }
}

