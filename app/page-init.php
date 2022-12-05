<?php

namespace Accela;

require_once __DIR__ . "/functions.php";

// lang
define("HTML_LANG", "ja");

// seconds for Cache-Control
// define("SERVER_LOAD_INTERVAL", 60);

Accela::global_props(function(){
  return [
    "accela-document-pages" => get_accela_document_pages()
  ];
});

// Accela
Accela::page_props("/accela/", function(){
  $file_path = APP_DIR . "/markdowns/about.md";

  return [
    "current-slug" => "about",
    "md" => file_exists($file_path) ? file_get_contents($file_path) : ""
  ];
});

Accela::page_paths("/accela/[slug]/", function(){
  return array_map(function($slug){
    return "/accela/{$slug}/";
  }, array_keys(get_accela_document_pages()));
});

Accela::page_props("/accela/[slug]/", function($query){
  $slug = $query["slug"];
  $file_path = APP_DIR . "/markdowns/{$slug}.md";

  return [
    "current-slug" => $slug,
    "title" => get_accela_document_pages()[$slug][0] . " - Accela Document",
    "path" => "/accela/{$slug}/",
    "md" => file_exists($file_path) ? file_get_contents($file_path) : "",
  ];
});


// Blog
Accela::page_props("/blog/", function(){
  return [
  ];
});
