<?php
  namespace Admin\Controller;
  use Think\Controller;
  use Think\Model;

  class BaseController extends Controller{
      public function getPage($field,$table,$where,$order,$page=false,$listrows=5,$showSql = false){

          if($page == true){
              $model=new Model();
              $totalrows=$model->table($table)->where($where)->count();
              $page     = new \Think\Page($totalrows,$listrows);
              $limit    =$page->firstRow .','. $page->listRows;
              $this->assign('page',$page->show());
          }

          return $model->table($table)->field($field)->where($where)->order($order)->limit($limit)->select();
      }
  }