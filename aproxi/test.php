<?php

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/Newt.php";

if(file_exists(__DIR__ . "/../env.php")){
  require_once __DIR__ . "/../env.php";
}

Aproxi\Aproxi::initialize(include __DIR__ . "/settings.php");

$aproxi = Aproxi\Aproxi::getInstance();
$article = $aproxi->get("newt", "/accela-document/article", ["id" => "63970c024bc209e149da68a2"]);
var_dump($article);
