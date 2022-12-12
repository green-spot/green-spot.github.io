<?php

function el($k, $v, $d=null) {
  return Accela\el($k, $v, $d);
}

function h($str){
  return htmlspecialchars($str);
}

function get_accela_document_pages(){
  $url = getenv("BLOG_API_URL") . "/accela-document/article?select=_id,title,slug,type&order=-_sys.customOrder";
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . getenv("BLOG_TOKEN")
  ]);
  $res = json_decode(curl_exec($ch));
  curl_close($ch);

  $ret = [];
  foreach($res->items as $item){
    $ret[$item->slug] = [$item->title, $item->type, $item->_id];
  }

  return $ret;
  /*
  return [
    "structure" => ["ファイル構成", "accela"],
    "common-html" => ["サイトの共通情報", "html"],
    "templates" => ["テンプレート", "html"],
    "routing" => ["ルーティング", "accela"],
    "dynamic-routing" => ["動的ルーティング", "accela"],
    "components" => ["コンポーネント", "html"],
    "server-components" => ["サーバコンポーネント", "php"],
    "binding" => ["値のバインディング", "accela"],
    "page-paths" => ["Page Paths", "php"],
    "page-props" => ["Page Props", "php"],
    "modules" => ["モジュール", "js"],
    "built-in-modules" => ["ビルトインモジュール", "js"],
    "js-hooks" => ["ページ移動時のフック", "js"],
    "api" => ["API", "php"],
    "static-site-generation" => ["静的ビルド", "accela"],
    //"functions" => ["組み込み関数(PHP)", "php"],
    "dynamic-functions" => ["動的処理の比較", "accela"],
  ];
  */
}

function get_accela_document_article($id){
  $url = getenv("BLOG_API_URL") . "/accela-document/article/{$id}?select=contents";
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . getenv("BLOG_TOKEN")
  ]);
  $res = json_decode(curl_exec($ch));
  curl_close($ch);

  return $res->contents;
}

function get_blog_articles(){
  $url = getenv("BLOG_API_URL") . "/blog/article?select=_id,title,slug,_sys";
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . getenv("BLOG_TOKEN")
  ]);
  $res = json_decode(curl_exec($ch));
  curl_close($ch);

  return array_map(function($item){
    return [
      "id" => $item->_id,
      "title" => $item->title,
      "slug" => $item->slug,
      "createdAt" => $item->_sys->createdAt,
      "updatedAt" => $item->_sys->updatedAt
    ];
  }, $res->items);
}

function get_blog_article($id){
  $url = getenv("BLOG_API_URL") . "/blog/article/{$id}";
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . getenv("BLOG_TOKEN")
  ]);
  $res = json_decode(curl_exec($ch));
  curl_close($ch);

  return $res;
}
