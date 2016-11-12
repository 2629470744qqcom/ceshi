<?php
namespace Admin\Controller;
use Think\Controller;

/*
 * 搜索
 */
class IndexController extends Controller {
    public function index(){

            $where = '1=1';
            $where .=I('get.title')&&I('get.title') != '' ? ' and title like "%'.I('get.title').'%"' : '';
            $where .= I('get.content') ? ' and content like "%'.I('get.content').'%"' : '';
            $list = M('news')->field('id,title,content')->where($where)->select();
            $this->assign('list',$list);
            $this->display();
    }

    public function  checkbox(){

        $data=I('post.week');

        $list = M('check')->data($data)->save();
        $this->assign('list',$list);
        $this->display();
    }


}