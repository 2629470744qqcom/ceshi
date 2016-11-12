<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="utf-8">
<title>Uploadify--demo</title>
<link rel="stylesheet" type="text/css" href="uploadify.css"/>
<script src="jquery.min.js"></script>
<script src="jquery.uploadify.v2.1.4.min.js"></script>
<script src="swfobject.js"></script>
<script src="json2.js"></script>
<script>
$(function(){
	//每次上传文件过程的各种信息的存储容器，存储生存周期是从选择文件到下次选择文件
	var responseDataObjContainer=[],queueIdObjContainer=[],fileObjContainer=[],dataObjContainer=[];
	 $('#file_upload').uploadify({
    'uploader'  : 'uploadify.swf',
    'script'    : 'upload.php?kind=type_2',
    'fileDataName':'upfiledata',//就是<input type="file" name="upfiledata" />
    'cancelImg' : 'cancel.png',//取消按钮的小图片
    'wmode'     : 'transparent',//flash透明
    'hideButton': true,//隐藏按钮 必须设置flash透明，
    	               //隐藏的目的是自己可以弄个图片按钮做背景，防止中文乱码 如果直接设置buttonText为中文会出现乱码
    	               //设置背景的CSS #file_uploadUploader {background: url('bag.gif') no-repeat;}
    	               //#file_uploadUploader就是动态生成的flash的id
    'width'     :60,//flash宽 由于设置的背景图片的宽是60 高是22 所以这里和下面设置60 22
    'height'    :22,//flash高
    'queueID'   :'myinfo',//上传提示信息的层的id，默认是 file_uploadQueue
    	                   //如果不想显示提示把提示层的display设为none
    'queueSizeLimit':2,//当设置允许同时选择多个上传时，设置最大的文件数
    'sizeLimit':1024*1024*1,//单位bit
    'displayData': 'percentage',//显示进度提示为百分比 还可以是速度 speed
    'multi'      :true,//是否允许同时选择多个文件上传
    'removeCompleted':false,//上传完成是否隐藏提示信息
    'fileExt'     : '*.jpg;*.gif;*.png',//允许的扩展名默认*.*
    'fileDesc'    : '图片文件(*.jpg;*.gif;*.png)',//文件选择对话框扩展名下面的提示信息
    'onComplete':function(event,queueId,fileObj,response,data){//每个文件上传完成时执行的函数 response是服务器返回的数据
    	         var _msg=eval("("+response+")");
    	         queueIdObjContainer.push(queueId);
    	         fileObjContainer.push(fileObj);
    	         responseDataObjContainer.push(_msg);
    	         dataObjContainer.push(data);
    	         //hint("#hint",info);
                 },
    'onAllComplete':function(event,data){//所有上传完成执行的函数 response是服务器返回的数据
    	         var info='';
    	         for(var i=0;i<responseDataObjContainer.length;i++){//当一次上传操作完成时，处理各种数据
    	         	 info+=responseDataObjContainer[i].msg+JSON.stringify(dataObjContainer[i])+'<br/>';
    	         }
    	         hint("#hint",info);
                 },             	 
    'onError':function(event,queueId,fileObj,errorObj){//上传发生错误执行的函数
                  hint("#hint",errorObj.type+":"+errorObj.info);
                  },
    'onSelectOnce' : function(event,data) {//每选择一次文件就触发该函数
    	           responseDataObjContainer=[];
    	           queueIdObjContainer=[];
    	           fileObjContainer=[];
    	           dataObjContainer=[];
			      },
    'auto'      : true
    });




});//end ready
function hint(slector,str){$(slector).html(str);}
</script>
</head>
<body>
<input id="file_upload" name="file_upload" type="file" /><a href="#" onclick="$('#file_upload').uploadifyUpload();">clickStartUpload</a><br/>
<span id="hint"></span>
<div id="myinfo"></div>
</body>
</html>
