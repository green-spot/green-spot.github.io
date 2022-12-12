<?php

namespace Accela;

Accela::api_paths("accela/[id].md", function () {
  return array_map(function ($slug) {
    return "accela/{$slug}.md";
  }, array_keys(get_accela_document_pages()));
});

/*
Accela::api("accela/about.md", function(){
  $file_path = APP_DIR . "/markdowns/about.md";
  if(file_exists($file_path)) echo file_get_contents($file_path);
});
*/

Accela::api("accela/[id].md", function($query){
  echo get_accela_document_article($query["id"]);
});

Accela::api("blog/article/[id].json", function($query){
  echo json_encode(get_blog_article($query["id"]));
});
