<?php

namespace Accela;

Accela::api_paths("accela/[slug].md", function () {
  return array_map(function ($slug) {
    return "accela/{$slug}.md";
  }, array_keys(get_accela_document_pages()));
});

Accela::api("accela/about.md", function(){
  $file_path = APP_DIR . "/markdowns/about.md";
  if(file_exists($file_path)) echo file_get_contents($file_path);
});

Accela::api("accela/[slug].md", function($query){
  $slug = $query["slug"];
  $file_path = APP_DIR . "/markdowns/{$slug}.md";
  if(file_exists($file_path)) echo file_get_contents($file_path);
});
