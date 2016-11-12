<?php
namespace Home\Controller;
//use Think\Controller;
use Common\Controller\BaseController;

class IndexController extends BaseController {
    public function index(){
        //获得参数signature nonce token timestamp
        $nonce = $_GET['nonce'];
        $token ='weixin';
        $timestamp = $_GET['timestamp'];
        $echostr  = $_GET['echostr'];
        $signature = $_GET['signature'];
        $array =array();
        $array = array($nonce,$timestamp,$token);
        sort($array);
        $str=sha1(implode($array));
        if($str == $signature){
            echo $echostr;
            exit;
        }
    }

    public function response(){
        //获取微信推送过来的数据（xml格式）
        $postArr= $GLOBALS['HTTP_RAW_POST_DATA'];
        //处理消息类型，设置回复类型及内容
        $postObj = simplexml_load_string($postArr);//XML转换成对象
        //判断数据包是否是订阅的事件推送
        if(strtolower($postObj->MsgType) == 'event'){
            //如果是关注subscribe事件
            if(strtolower($postObj->Event == 'subscribe')){
                //回复用户消息
                $toUser = $postObj->FromUserName;
                $fromUser = $postObj ->ToUserName;
                $time = time();
                $MsgType =  'text';
                $Content = '你好啊菜鸟';
                $template = '<xml>
                            <ToUserName><![%s]]></ToUserName>
                            <FromUserName><![%s]]></FromUserName>
                            <CreateTime>12345678</CreateTime>
                            <MsgType><![%s]]></MsgType>
                            <Content><![%s]></Content>
                            </xml>';

            }
        }
    }

    public function show(){
        $data = M("Ly");
        $meg=$data->table("Ly")->field("id,name")->where("id<20")->order("id desc")->limit(3)->select();
        //$meg=$data->field('id,name')->select();
        //var_dump($meg);
//        $meg=$data->select();
       $this->assign("msg",$meg);

        $this->display();
    }
    public function page(){
        $data = M('Ly');
        $count=$data->count('id');
        $p = new Page($count,1);
        $p->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $p->setConfig('header', '<span class="rows">共 %TOTAL_ROW% 条记录</span>');
        $p->setConfig('prev', '上一页');
        $p->setConfig('next', '下一页');
        $p->setConfig('first','首页');
        $p->setConfig('last','尾页');
        $p->lastSuffix = false;
        $list = $data->order('id asc')->limit($p->firstRow.','.$p->listRows)->select();
        $show = $p->show();
        //dump($show);exit;
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }

    public function p(){
            $m = M('Ly');
            //$where = "status=1";
            $count = $m->where($where)->count();
            $p = getpage($count,3);
            $list = $m->field(true)->where($where)->order('id')->limit($p->firstRow, $p->listRows)->select();
            $this->assign('list', $list); // 赋值数据集
            $this->assign('page', $p->show()); // 赋值分页输出
            $this->display();
        }


}
