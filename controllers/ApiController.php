<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use app\models\Picture;
use app\models\Contact;
use app\models\Articles;
use app\models\Classes;
use app\models\Product;

/*
 * 接口： 域名 都是http://admin.suzengguang.top  建议先存一个变量，后面肯定会改成别人的域名
 * 
 * 首页模块
 * 
 * 轮播图
 * /api/sowing
 * 
 * 关于我们
 * /api/company-about
 * 
 * 首页新闻动态
 * /api/news
 * 
 * 首页新闻轮播图
 * /api/news-sowing
 * 
 * 注释：新闻动态和新闻轮播图返回数据中的ID，作为接口/api/articles-detail的传入参数，可以获取该条新闻的详情信息
 *
 * 
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
 * 
 * 
 * 产品系列模块接口
 * 
 * 清洁类产品类别
 * /api/classes
 * 
 * 设备产品类别
 * /api/classes2
 * 
 * 获取某一类别下的对应产品
 * /api/product
 * 传入参数 class_id  class_id对应在接口/api/classes与/api/classes2返回数据的id
 * eg:/api/product?class_id=2
 * 
 * 
 * 业务模式模块接口
 * 
 * 租赁模式
 * /api/company-rent
 * 
 * 服务模式
 * /api/company-service
 * 
 * 自动物流
 * /api/company-logistics
 * 
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
    
    public function actionCompanyAbout(){
        $settings = Yii::$app->settings;
        return $this->ajaxMessage(0, 'success', [
            'chinese' => $settings->get('CompanyAbout.chinese'),
            'english' => $settings->get('CompanyAbout.english')
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
    
    //轮播图
    public function actionSowing(){
        $data = Picture::sowing();
        $suffix = Yii::$app->request->hostInfo . '/uploads/';
        foreach($data as &$v) {
            $v['picture'] = $suffix . $v['picture'];
        }
        return $this->ajaxMessage(0, 'success',$data);
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
        $suffix = Yii::$app->request->hostInfo . '/uploads/';
        foreach($data as &$v){
            $v['picture'] = $suffix . $v['picture'];
        }
        return $this->ajaxMessage(0, 'success',$data);
    }
    
    //联系我们
    public function actionContact(){
        return $this->ajaxMessage(0, 'success', Contact::data());
    }
    
    //新闻动态
    public function actionNews(){
        $data = Articles::news();
        return $this->ajaxMessage(0, 'success',$data);
    }
    
    //新闻轮播图
    public function actionNewsSowing(){
        $data = Articles::sowing();
        return $this->ajaxMessage(0, 'success',$data);
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
    
    //清洁剂产品类别
    public function actionClasses(){
        $data = Classes::getClasses();
        return $this->ajaxMessage(0, 'success',$data);
    }
    
    //设备产品
    public function actionClasses2(){
        $data = Classes::getClasses2();
        return $this->ajaxMessage(0, 'success',$data);
    }
    
    //获取某一类别下的对应产品
    public function actionProduct(){
        $request = Yii::$app->request;
        $class_id = $request->get('class_id',1);
        $data = Product::getProductByClassId($class_id);
        return $this->ajaxMessage(0, 'success',$data);
    }
    
    //租赁模式
    public function actionCompanyRent(){
        $settings = Yii::$app->settings;
        return $this->ajaxMessage(0, 'success', [
            'rent' => str_replace('<img src="','<img src="'.Yii::$app->request->hostInfo,$settings->get('Companyphy.rent')),
        ]);
    }
    
    //服务模式
    public function actionCompanyService(){
        $settings = Yii::$app->settings;
        return $this->ajaxMessage(0, 'success', [
            'service' => str_replace('<img src="','<img src="'.Yii::$app->request->hostInfo,$settings->get('Companyphy.service')),
        ]);
    }
    
    //自动物流
    public function actionCompanyLogistics(){
        $settings = Yii::$app->settings;
        return $this->ajaxMessage(0, 'success', [
            'logistics' => str_replace('<img src="','<img src="'.Yii::$app->request->hostInfo,$settings->get('Companyphy.logistics')),
        ]);
    }
}

