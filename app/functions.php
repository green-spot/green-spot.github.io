<?php

function el($k, $v, $d=null) {
  return Accela\el($k, $v, $d);
}

function get_titles(){
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
    "static-site-generation" => ["静的ビルド", "accela"],
    //"functions" => ["組み込み関数(PHP)", "php"],
    "dynamic-functions" => ["動的処理の比較", "accela"],
  ];
}
