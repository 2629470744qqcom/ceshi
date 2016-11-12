<?php
namespace Common\Controller;
use Think\Controller;
use Think\Model;


class BaseController extends Controller{
    /**
     * 获取列表信息，支持分页
     * @param string $field 需要查询的字段
     * @param string $table 数据来源表
     * @param string $where 查询条件
     * @param string $order 排序规则
     * @param string $page 是否分页
     * @param number $listrows 分页大小
     *        zhangxinhe 2015-12-25
     */
    protected function getList($field, $table, $where, $order, $page = false, $listrows = 12){
        $table = stripos($table, ',') === false ? C('DB_PREFIX') . $table : $table;
        $model = new Model();
        if($page == true){
            $totalrows = $model->table($table)->where($where)->count();
            $page = new \Think\Page($totalrows, $listrows);
            $limit = $page->firstRow . ',' . $page->listRows;
            $this->assign('page', $page->show());
        }
        return $model->table($table)->field($field)->where($where)->order($order)->limit($limit)->select();
    }

}
?>