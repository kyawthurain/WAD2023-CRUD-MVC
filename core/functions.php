<?php

// Die Dump
function dd(mixed $data,$showType = false):void
{
    echo "<pre style='background-color: #1d1d1d;color: #cdcdcd; padding: 20px; margin: 10px; border-radius: 10px; line-height: 1.2rem;'>";
        if($showType){
            var_dump($data);
        }else{
            print_r($data);
        }
    echo "</pre>";
    die();
}

// Url generator
function url(string $fileName):string
{
    $path = isset($_SERVER["HTTPS"]) ? "https" : "http";
    $path .= "://";
    $path .= $_SERVER["HTTP_HOST"];
    $path .= "/";
    $path .= $fileName;
    return $path;
}

// Bootstrap Alert
function alert(string $message, string $color ='success'):string
{
    return "<div class=' alert alert-$color' >$message</div>";
}


// Show Time
function showTime(string $timestamp,string $format="j M Y"):string
{
    return date($format,strtotime($timestamp));
}

// View 
function view(string $viewName,array $data = null):void{
    if(!is_null($data)){
        foreach($data as $key => $value){
            ${$key} = $value;
        }
    }
    require_once ViewDir."/$viewName.view.php";
}

//Controller
function controller(string $data):void{
    $dataArr = explode("@",$data);
    require_once ControlDir."/$dataArr[0].controller.php";
    call_user_func($dataArr[1]);
}

function route(string $path,array $queries = null):string{
    $url = url($path);
    if(!is_null($queries)){
        $url .= "?". http_build_query($queries);
    }
    return $url;
}

function redirect(string $url):void{
    header("LOCATION:".url($url));
}

function checkRequestMethod(string $methodName){
    $result = false;
    $methodName = strtoupper($methodName);
    $serverRequestMethod = $_SERVER["REQUEST_METHOD"];
    if($methodName === "POST" && $serverRequestMethod === "POST"){
        $result = true;
    }
    elseif($methodName === "PUT" && $serverRequestMethod === "POST" && !empty($_POST["_method"]) && strtoupper($_POST["_method"]) === "PUT"){
        $result = true;
    }
    elseif($methodName === "DELETE" && $serverRequestMethod === "POST" && !empty($_POST["_method"]) && strtoupper($_POST["_method"]) === "DELETE"){
        $result = true;
    }
    return $result;
}


function run(string $sql,bool $connectionClose = true):bool|object{
    
    try{
        $query = mysqli_query($GLOBALS["connD"],$sql);
        $connectionClose && mysqli_close($GLOBALS["connD"]);
        return $query;
    }
    catch(Exception $e){
        dd($e);
    }
}

function all(string $sql):array{
    $lists = [];
    $query = run($sql);
    while($row = mysqli_fetch_assoc($query)){
        $lists[] = $row;
    }
    return $lists;
}

function first(string $sql):array{
    $query = run($sql);
    $lists = mysqli_fetch_assoc($query);
    return $lists;
}