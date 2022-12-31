<?php

use Aproxi\Aproxi;

function el($k, $v, $d=null) {
  return Accela\el($k, $v, $d);
}

function h($str){
  return htmlspecialchars($str);
}

function get_accela_document_pages(){
  $aproxi = Aproxi::getInstance();
  $res = $aproxi->get("newt", "/accela-document/articles");

  $ret = [];
  foreach($res["body"]->items as $item){
    $ret[$item->slug] = [$item->title, $item->type, $item->_id];
  }

  return $ret;
}

function get_accela_document_article($id){
  $aproxi = Aproxi::getInstance();
  $res = $aproxi->get("newt", "/accela-document/article", ["id" => $id]);

  return $res["body"]->contents;
}

function get_blog_articles(){
  return [];
  $aproxi = Aproxi::getInstance();
  $res = $aproxi->get("newt", "/blog/articles");

  return array_map(function($item){
    return [
      "id" => $item->_id,
      "title" => $item->title,
      "slug" => $item->slug,
      "createdAt" => $item->_sys->createdAt,
      "updatedAt" => $item->_sys->updatedAt
    ];
  }, $res["body"]->items);
}

function get_blog_article($id){
  return "";
  $aproxi = Aproxi::getInstance();
  $res = $aproxi->get("newt", "/blog/article", ["id" => $id]);

  return $res["body"];
}
