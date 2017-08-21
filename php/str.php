<?php

/**
 * 字符串转化为数组, 针对没有特殊分隔符的情况，支持多编码，需要php支持mb扩展
 * @param $str
 * @return array
 */
function w_str_split($str){
	$ret = array();
	$encoding = mb_detect_encoding($str);
	for($i = 0; $i < mb_strlen($str, $encoding); $i++){
		$ret[] = mb_substr($str, $i, 1, $encoding);
	}

	return $ret;
}

/**
 * 根据字符串中的数字分割字符串
 * eg: 中文233测试 => array('中文', '233', '测试')
 * @param $str
 * @return array
 */
function _explode_by_num($str){
	$ret = array();
	$arr_str = w_str_split($str);
	$counter = 0;
	$ret[$counter] = $arr_str[0];
	$numeric = is_numeric($arr_str[0]);
	for($i = 1; $i < count($arr_str); $i++){
		$char = $arr_str[$i];
		if(is_numeric($char) === $numeric){
			$ret[$counter] .= $char;
		}else{
			$counter++;
			$ret[$counter] = $char;
			$numeric = is_numeric($char);
		}
	}

	return $ret;
}
