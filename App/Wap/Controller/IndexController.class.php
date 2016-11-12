<?php
namespace Wap\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        {
            $echoStr = $_GET["echostr"];
            $signature = $_GET["signature"];
            $timestamp = $_GET["timestamp"];
            $nonce = $_GET["nonce"];
            $token = 'weixin';
            $array = array($token, $timestamp, $nonce);
            sort($array);
            $tmpStr = implode($array);
            $tmpStr = sha1($tmpStr);
            if($tmpStr == $signature && $echoStr){
                echo $echoStr;
                exit;
            }else{
                $this->responseMsg();
            }
        }
    }

    public function responseMsg(){
        $postArr = $GLOBALS['HTTP_RAW_POST_DATA'];//接收微信推送的数据包xml
/*        <xml>
            <ToUserName><![CDATA[toUser]]></ToUserName>
            <FromUserName><![CDATA[FromUser]]></FromUserName>
            <CreateTime>123456789</CreateTime>
            <MsgType><![CDATA[event]]></MsgType>
            <Event><![CDATA[subscribe]]></Event>
        </xml>*/
        $postObj = simplexml_load_string($postArr);//讲xml数据包转换为数组
        /*$postObj ->ToUserName = '';
        $postObj ->FromUserName = '';
        ...*/
        if(strtolower($postObj->MsgType) == 'event'){
            if(strtolower($postObj->Event == 'subscribe')){
                $toUser = $postObj->toomUserName;
                $fromUser = $postObj->FromUserName;
                $time = time();
                $msgType = 'text';
                $content = '欢迎关注我的微信公众平台哈';
                $template = '<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <Event><![CDATA[%s]]></Event>
                            </xml>';
                $info = sprintf($template,$toUser,$fromUser,$time,$msgType,$content);
                echo $info;
            }
        }
    }
}