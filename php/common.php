<?php

//判断是否是手机
function is_mobile()
{
	$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
//	$is_pc = (strpos($agent, 'windows nt')) ? true : false;
//	$is_mac = (strpos($agent, 'mac os')) ? true : false;
	return strpos($agent, 'iphone') ||  strpos($agent, 'android') || strpos($agent, 'ipad');
}