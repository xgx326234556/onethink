<?php
namespace Admin\Controller;
class GuaranteeController extends AdminController{
 public function add(){
     if(IS_POST){
         $Guarantee = D('Guarantee');
         $data = $Guarantee->create();
         if($data){
             $id = $Guarantee->add();
             if($id){
                 $this->success('新增成功', U('index'));
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
    public function index(){
        /* 获取频道列表 */
        $list = M('Guarantee')->select();

        $this->assign('index', $list);
        $this->meta_title = '导航管理';
        $this->display('index');
    }
    public function edit($id = 0)
    {
        if (IS_POST) {
            $Guarantee = D('Guarantee');
            $data = $Guarantee->create();
            if ($data) {
                if ($Guarantee->save()) {
                    //记录行为
                    action_log('update_guarantee', 'guarantee', $data['id'], UID);
                    $this->success('编辑成功', U('index'));
                } else {
                    //var_dump($Guarantee);exit;
                    $this->error('编辑失败');
                }

            } else {
                $this->error($Guarantee->getError());
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = M('Guarantee')->find($id);

            if (false === $info) {
                $this->error('获取配置信息错误');
            }

            $this->assign('info', $info);
            $this->meta_title = '编辑导航';
            $this->display();
        }
    }
        public function del(){
            $id = array_unique((array)I('id',0));

            if ( empty($id) ) {
                $this->error('请选择要操作的数据!');
            }

            $map = array('id' => array('in', $id) );
            if(M('Guarantee')->where($map)->delete()){
                //记录行为
                action_log('update_guarantee', 'guarantee', $id, UID);
                $this->success('删除成功');
            } else {
                $this->error('删除失败！');
            }
        }
    }





