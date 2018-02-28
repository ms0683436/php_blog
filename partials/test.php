<?php
// 1.   Fibonacci 
function FibonacciRecursive($value){
    if ($value == 0 || $value == 1) {
        return $value;
    } else {
        return FibonacciRecursive($value-1) + FibonacciRecursive($value-2);
    }
}

function Fibonacci($value) {
    $one = 0;
    $two = 1;
    $ans = 0;
    if ($value == 0 || $value == 1) {
        return $value;
    } else {
        for ($i=1; $i < $value; $i++) { 
            $ans = $one + $two;
            $one = $two;
            $two = $ans;
        }
    }
    return $ans;
}

//echo FibonacciRecursive(6);
//echo Fibonacci(6);



// 2.   中位數
function Median(&$data) {
    sort($data);
    $size = count($data);
    if ($size % 2){
        $mid = ($size-1)/2;
        return $data[$mid];
    } else {
        $mid = $size/2;
        return ($data[$mid] + $data[$mid-1])/2;
    }
    
}

$data = [10, 20, 50, 7, 9];

//echo Median($data);



//3.    php timestamp
date_default_timezone_set("Asia/Taipei");
$lastDay = strtotime('last day 15:00:00'); //昨天下午3:00
//echo $lastDay;  

$lastTuesday = strtotime('last Tuesday 08:00:00');
$lastTuesday = date('W', $lastTuesday) == date('W') ? $lastTuesday - 86400*7 : $lastTuesday;    //上星期二早上8:00
//echo $lastTuesday;   

$theDay = strtotime('2016/11/11 10:30');     //2016/11/11 早上10:30
//echo $theDay;

//echo date("m-d-Y h:i:s a", $lastDay).'<br>';
//echo date("m-d-Y h:i:s a", $lastTuesday).'<br>';
//echo date("m-d-Y h:i:s a", $theDay).'<br>';