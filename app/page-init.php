<?php

namespace Accela;

require_once __DIR__ . "/functions.php";
require_once __DIR__ . "/api.php";

// lang
define("HTML_LANG", "ja");

// seconds for Cache-Control
// define("SERVER_LOAD_INTERVAL", 60);

Accela::global_props(function () {
  return [
    "accela-document-pages" => get_accela_document_pages()
  ];
});

// Accela
Accela::page_props("/accela/", function () {
  return [
    "current-slug" => "about"
  ];
});

Accela::page_paths("/accela/[slug]/", function () {
  return array_map(function ($slug) {
    return "/accela/{$slug}/";
  }, array_keys(get_accela_document_pages()));
});

Accela::page_props("/accela/[slug]/", function ($query) {
  $slug = $query["slug"];
  $file_path = APP_DIR . "/markdowns/{$slug}.md";

  return [
    "current-slug" => $slug,
    "title" => get_accela_document_pages()[$slug][0] . " - Accela Document",
    "path" => "/accela/{$slug}/"
  ];
});


// Blog
Accela::page_props("/blog/", function () {
  return [];
});
