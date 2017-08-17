<?php
/**
 * Created by PhpStorm.
 * User: 熊
 * Date: 2017/8/11
 * Time: 11:15
 */

namespace Home\Controller;


use Think\Controller;
use Think\Page;
use EasyWeChat\Foundation\Application;
require './vendor/autoload.php'; // 引入 composer 入口文件

class GuaranteeController extends LoginController
{
    public function add(){
        if(IS_POST){
            $Guarantee = D('Guarantee');
            $data = $Guarantee->create();
            if($data){
                $id = $Guarantee->add();
                if($id){
                    $this->success('新增成功', U('Home/Index/index'));
                    //记录行为
                    action_log('update_guarantee', 'guarantee', $id, UID);
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Guarantee->getError());
            }
        } else {
            $this->meta_title = '新增导航';
            $this->display('edit');
        }

    }
    public function my(){

        $this->display('my');
    }
    public function online(){
            /* 获取频道列表 */
            $Guarantee = M('Guarantee');//实列化Guarantee对象
            $count =$Guarantee->count();//获取查询条数
            $Page=new Page($count,2);//实例化分页类 传入总记录数和每页显示的记录数(2)
            $list = $Guarantee->limit($Page->firstRow.','.$Page->listRows)->select();
            $show=$Page->show();//分页显示输出
            $this->assign('index', $list);
            $this->assign('page',$show);
            $this->meta_title = '导航管理';
            $this->display('online');

    }
    //实现小区通知业务逻辑
    public function notice(){
        $Document= M('Document')->where(['category_id'=>39])->select();//实列化Guarantee对象
        $this->assign('index',$Document);
        $this->meta_title = '导航管理';
        $this->display('notice');
    }
    //实现小区通知详情业务逻辑
    public function sort(){
        $id=I('get.id');
        $DocumentArticle=M('DocumentArticle')->where(['id'=>$id])->select();
        $Document=M('Document')->where(['id'=>$id])->select();
        $data['view'] = $Document[0]['view']+1;
        //var_dump($data['view']);exit;
        M('Document')->where(['id'=>$id])->save($data);
        $Picture=M('Picture')->where(['id'=>$Document[0]['cover_id']])->select();
        $this->assign('Document',$Document);
        $this->assign('DocumentArticle',$DocumentArticle);
        $this->assign('Picture',$Picture);
        $this->display('notice-detail');

    }
    //小区活动业务逻辑
    public function activity(){
        $Document= M('Document')->where(['category_id'=>41])->select();//实列化Guarantee对象
        $this->assign('index',$Document);
        $this->meta_title = '导航管理';
        $this->display('notice');
    }
    //实现商家活动业务逻辑
    public function seller(){
        $Document= M('Document')->where(['category_id'=>42])->select();//实列化Guarantee对象
        $this->assign('index',$Document);
        $this->meta_title = '导航管理';
        $this->display('notice');
    }
    //实现商家活动业务逻辑
    public function Shop(){
        $Document= M('Document')->where(['category_id'=>43])->select();//实列化Guarantee对象
        $this->assign('index',$Document);
        $this->meta_title = '导航管理';
        $this->display('notice');
    }

}