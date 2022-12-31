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
    "accela-document-pages" => get_accela_document_pages(),
    "blog-articles" => get_blog_articles()
  ];
});

// Accela
Accela::page_props("/accela/", function () {
  return [];
});

Accela::page_paths("/accela/[slug]/", function () {
  return array_map(function ($slug) {
    return "/accela/{$slug}/";
  }, array_keys(get_accela_document_pages()));
});

Accela::page_props("/accela/[slug]/", function ($query) {
  $slug = $query["slug"];
  $page = get_accela_document_pages()[$slug];
  $title = $page[0];

  return [
    "current-slug" => $slug,
    "title" => "${title} - Accela Document",
    "title-raw" => $title,
    "article-id" => $page[2],
    "path" => "/accela/{$slug}/"
  ];
});


// Blog
Accela::page_props("/blog/", function () {
  return [];
});

Accela::page_paths("/blog/article/[slug]/", function () {
  return [];
  return array_map(function($article){
    return "/blog/article/{$article['slug']}/";
  }, Accela::get_global_prop("blog-articles"));
});

Accela::page_props("/blog/article/[slug]/", function ($query) {
  return [];
  $articles = array_filter(Accela::get_global_prop("blog-articles"), function($article)use($query){
    return $article["slug"] === $query["slug"];
  });
  $article = array_shift($articles);

  return [
    "article" => $article
  ];
});
