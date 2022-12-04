<?php

namespace Accela;

require_once __DIR__ . "/functions.php";

// lang
define("HTML_LANG", "ja");

// Static Site Generation
define("SSG_ENABLED", false);

// seconds for Cache-Control
// define("SERVER_LOAD_INTERVAL", 60);

function get_document_nav($current_slug=null){
  $html = "<ul>";
  foreach(get_titles() as $slug => $set){
    if($current_slug === $slug){
      $html .= "<li class=\"{$set[1]}\"><a href=\"../{$slug}/\" class=\"current\">{$set[0]}</a></li>";
    }else{
      $html .= "<li class=\"{$set[1]}\"><a href=\"../{$slug}/\">{$set[0]}</a></li>";
    }
  }
  return $html . "</ul>";
}

// Accela
Accela::page_props("/accela/", function(){
  $file_path = APP_DIR . "/markdowns/about.md";

  return [
    "md" => file_exists($file_path) ? file_get_contents($file_path) : ""
  ];
});

Accela::page_paths("/accela/[slug]/", function(){
  return array_map(function($slug){
    return "/accela/{$slug}/";
  }, array_keys(get_titles()));
});

Accela::page_props("/accela/[slug]/", function($query){
  $slug = $query["slug"];
  $file_path = APP_DIR . "/markdowns/{$slug}.md";

  return [
    "title" => get_titles()[$slug][0] . " - Accela Document",
    "slug" => $slug,
    "path" => "/accela/{$slug}/",
    "md" => file_exists($file_path) ? file_get_contents($file_path) : "",
  ];
});
