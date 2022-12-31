<?php

return [
  "root_dir" => __DIR__,
  "cache_dir" => __DIR__ . "/cache",

  "apis" => [
    "newt" => [
      "module" => "Newt",

      "cache_config" => [
        "enabled" => true,
        "expiration" => 3600, // seconds
        "background" => true, // inspired by stale-while-revalidate
      ],

      "http_client_config" => [
        "headers" => [
          "Authorization" => "Bearer " . getenv("NEWT_BEARER_TOKEN")
        ],
        "timeout" => 5.0,
      ],

      "enabled_apis" => [
        "get" => [
          "/accela-document/articles",
          "/accela-document/article",
          "/blog/articles",
          "/blog/article"
        ],
        "post" => []
      ],

      "spaceUid" => getenv("NEWT_SPACE_UID"),
    ]
  ]
];
