<?php
require '../../../zb_system/function/c_system_base.php';

require '../../../zb_system/function/c_system_admin.php';


if(isset($_GET['setcolor'])){
	$zbp->Load();
	$action='root';
	if ($zbp->CheckRights($action)) {
		$zbp->Config('AdminColor')->color=(int)$_GET['setcolor'];
		$zbp->SaveConfig('AdminColor');
		setcookie("admincolor", (int)$_GET['setcolor'], time()+3600*24*365,$zbp->cookiespath);
		Redirect($zbp->host . 'zb_system/admin/');
		die();
	}else{
		setcookie("admincolor", (int)$_GET['setcolor'], time()+3600*24*365,$zbp->cookiespath);
		Redirect($zbp->host . 'zb_system/admin/');
		die();
	}
}

header('Content-Type: text/css; Charset=utf-8');  

$id=(int)$zbp->Config('AdminColor')->color;
if(isset($_COOKIE['admincolor'])){
	$id=(int)$_COOKIE['admincolor'];
}
$c='';

$c .="header,.header{background-color:#3a6ea5;}". "\r\n";
$c .="input.button,input[type='submit'],input[type='button'] {background-color:#3a6ea5;}". "\r\n";
$c .="div.theme-now .betterTip img{box-shadow: 0 0 10px #3a6ea5;}". "\r\n";

$c .="#divMain a,#divMain2 a{color:#1d4c7d;}". "\r\n";

$c .=".menu ul li a:hover {background-color: #b0cdee;}". "\r\n";
$c .="#leftmenu a:hover {background-color: #b0cdee!important;}". "\r\n";
$c .="div.theme-now{background-color:#b0cdee;}". "\r\n";
$c .="div.theme-other .betterTip img:hover{border-color:#b0cdee;}". "\r\n";
$c .=".SubMenu a:hover {background-color:#b0cdee;}". "\r\n";
$c .=".siderbar-header:hover {background-color:#b0cdee;}". "\r\n";

$c .="#leftmenu .on a,#leftmenu #on a:hover {background-color:#3399cc!important;}". "\r\n";
$c .="input.button,input[type=\"submit\"],input[type=\"button\"] { border-color:#3399cc;}". "\r\n";
$c .="input.button:hover {background-color: #3399cc;}". "\r\n";
$c .="div.theme-other .betterTip img:hover{box-shadow: 0 0 10px #3399cc;}". "\r\n";
$c .=".SubMenu{border-bottom-color:#3399cc;}". "\r\n";
$c .=".SubMenu span.m-now{background-color:#3399cc;}". "\r\n";
$c .="div #BT_title {background-color: #3399cc;border-color:#3399cc;}". "\r\n";

$c .="a:hover { color:#d60000;}". "\r\n";
$c .="#divMain a:hover,#divMain2  a:hover{color:#d60000;}". "\r\n";


//appcenter
$c .=".tabs { border-bottom-color:#3a6ea5!important;}". "\r\n";
$c .=".tabs li a.selected {background-color:#3a6ea5!important;}". "\r\n";
$c .="div.heart-vote {background-color:#3a6ea5!important;}". "\r\n";
$c .="div.heart-vote ul {border-color:#3a6ea5!important;}". "\r\n";
$c .=".install {background-color:#3a6ea5!important;}". "\r\n";
$c .=".install:hover{background-color: #3399cc!important;}". "\r\n";
$c .="input.button{background-color:#3a6ea5!important;border-color:#3399cc!important;}". "\r\n";
$c .="input.button:hover{background-color:#3399cc!important;}". "\r\n";
$c .=".themes_body ul li img:hover,.plugin_body ul li img:hover,.main_plugin ul li img:hover,.main_theme ul li img:hover{box-shadow: 0 0 10px #3399cc!important;}". "\r\n";
$c .=".left_nav h2,.text h2 {color: #3a6ea5!important;}". "\r\n";
$c .=".pagebar span{ background:#3399cc!important; border-color:#3399cc!important;color:#fff;}". "\r\n";
$c .=".pagebar span.now-page,.pagebar span:hover{ background:#eee!important;border-color:#eee!important; color:#3399cc!important;}". "\r\n";


//zbdk
$c .="#divMain .DIVBlogConfignav ul li a:hover {background-color: #3399cc!important;}". "\r\n";
$c .="#divMain .DIVBlogConfignav ul li a.clicked{background-color: #b0cdee!important;}". "\r\n";
$c .=".DIVBlogConfignav {background-color: #ededed!important;}". "\r\n";
$c .="#divMain .DIVBlogConfigtop {background-color: #3399cc!important;}". "\r\n";
$c .="#divMain .DIVBlogConfig {background-color: #ededed!important;}". "\r\n";


$c .="div.bg {background: #3a6ea5;!important;}". "\r\n";
$c .="div.bg input[type=\"text\"], input[type=\"password\"] {border-color:#3a6ea5!important;}". "\r\n";


//$c .=Response_Plugin_AdminColor_Css


$c1="#1d4c7d";
$c2="#3a6ea5";
$c3="#b0cdee";
$c4="#3399cc";
$c5="#d60000";

$Colors=array();

$Colors['Blod']  =$BlodColor[$id];
$Colors['Normal']=$NormalColor[$id];
$Colors['Light'] =$LightColor[$id];
$Colors['High']  =$HighColor[$id];
$Colors['Anti']  =$BlodColor[$id];

foreach ($GLOBALS['Filter_Plugin_AdminColor_CSS_Pre'] as $fpname => &$fpsignal) {
	$fpname($Colors);
}

$c=str_replace($c1,$Colors['Blod'],$c);
$c=str_replace($c2,$Colors['Normal'],$c);
$c=str_replace($c3,$Colors['Light'],$c);
$c=str_replace($c4,$Colors['High'],$c);
$c=str_replace($c5,$Colors['Anti'],$c);


$c .="\r\n" . "/*AdminColor*/" . "\r\n" . "#admin_color{float:right;line-height: 2.5em;font-size: 0.5em;letter-spacing: -0.1em;}";

if($id==10){
$c.='header,.header {background:url(header.jpg) no-repeat 0 0;}'. "\r\n";
$c.='body{background:url(body.jpg) no-repeat 0 0;background-attachment:fixed;}'. "\r\n";
$c.='#topmenu{opacity:0.8;}'. "\r\n";
}

echo $c;
?>