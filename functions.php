<?php

$action = isset($_POST['action']) ? $_POST['action'] : null;

if($action){
	$action();
}


function cutStr($str)
{
    $path = $str;
    $el = '/';
    $pos = strripos($path, $el); 
    
    return $rest = substr($str,0,$pos);
    
}

function render()
{
    $str =  $_POST['el'];
    $handle = fopen($str, "r");
    $length = filesize($str);
    $str1 = fread($handle, $length);
    fclose($handle);
    echo ($str1);
}