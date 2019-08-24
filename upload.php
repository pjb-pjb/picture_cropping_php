<?php
/**
 * Created by PhpStorm.
 * User: 29393
 * Date: 2019/8/25
 * Time: 1:49
 */
//require "/imgCompress.php";
function response($resulr)
{
    echo json_encode();
    exit();
}

$flieInfo = $_FILES["avatar"];
$typeArr = ["image/gif", "image/png", "image/jpeg", "image/jpg"];
//设置文件保存目录
$uploaddir = "upfiles/";
if (!(in_array($flieInfo["type"], $typeArr))) {
    response([
        "code" => 1,
        "msg" => "文件格式不正确"
    ]);
}
$filename = explode(".", $flieInfo['name']);
$filename[0] = uniqid();
$name = implode(".", $filename);
$uploadfile = $uploaddir . $name;
$uploadInfo = move_uploaded_file($flieInfo['tmp_name'], $uploadfile);

if(!$uploadInfo){
    response([
        "code"=>1,
        "msg"=>"上传失败"
    ]);
}
response([
    "code"=>0,
    "msg"=>"上传成功"
]);
//$imgCompress = new imgcompress($uploadfile,0.5);
//$imgCompress->compressImg();