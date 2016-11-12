<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Controller\BaseController;
/*
 * page  分页
 */
class PageController extends BaseController{
    public function index(){

        $where='';
        $list = $this->getPage('id,name,age','cs_excel',$where,'id asc',true);
        $this->assign('list',$list);
        $this->display();
    }
}