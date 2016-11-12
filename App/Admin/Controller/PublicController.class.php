<?php
namespace Admin\Controller;
use Think\Controller;

/*
 * session 存储用户信息
 */
class PublicController extends Controller {
   public function index(){
        if(session('?name')){
            $this->display();
        }else{
            echo  '出错';
        }

   }

    public  function  logout(){
        //session(null);
        session(['destroy']);
        $this->redirect('Public/ssn');
    }
    public function ssn(){//session测试
        if(IS_POST){
            $name=I('post.username');
            $pwd =I('post.pwd');
            $result=M('ssn')->field('id,username,pwd')->where('username="'. $name .'" and pwd="'.$pwd.'"')->find();
            if($result){
                $this->success('登录成功','index');
                session('name',$result['username']);//$_SESSION['name'] =$result['username']
            }else{
                $this->error('添加失败');
             }
        }
       $this->display();
   }
}