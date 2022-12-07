# API
`app/page-init.php`

記事が多いサイトなどでは、最初にバンドルされるJSONデータが肥大化し、本来は必要ないデータが含まれてしまいます。
API機能を使えば、例えば記事の本文のみ別のリソースとして、クライアントサイドで読み込ませる構成にすることも可能です。
APIとして定義したリソースは、静的ビルド対象になります。

## api関数

<div class="code-with-caption">

`page-init.php`
```php
Accela::api("sample.json", function(){
  echo json_encode(["hello" => "accela"]);
});
```
</div>

上記を記述し`/api/sample.json`にアクセスすると、下記が出力されます。

```
Content-Header: application/json;

{"hello":"accela"}
```

ページのルーティングと同様に、`[slug]`のような形で動的なURLを定義することもできます。

<div class="code-with-caption">

`page-init.php`
```php
Accela::api_paths("blog/[slug].json", function(){
  return array_map(function($article){
    return "blog/{$article->slug}.json";
  }, BlogAPI::get("/articles"));
});

Accela::api("blog/[slug].json", function($query){
  echo BlogAPI::get("/article", ["slug" => $query["slug"]]);
});
```
</div>
