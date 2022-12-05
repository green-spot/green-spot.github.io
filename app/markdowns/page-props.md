# Page Props
`app/page-init.php`

[Page Paths](../page-paths/)で動的ルーティングは実現できましたが、実際にページごとの内容を変更するには、URLに合わせて違う情報を扱う必要があります。


## ⚠️注意点
静的ビルドする場合は、リクエストやセッションなど、アクセスごとに変化する(アクセス時に決定する)情報を使うことはできません。

たとえば、Page PropsでUser Agentを扱うと、静的ビルドを実行した環境の情報がキャッシュされるため、毎回同じものが表示されるようになります。
同様の理由で、ユーザログインなどの機能を扱うこともできません。


## page_props関数
ページテンプレートに固有の値を渡すには、`app/page-init.php`内で`page_props()`を使います。
動的ルーティングに使用する仮変数(*slug*など)は、全てコールバック関数の引数として渡されます。

<div class="code-with-caption">

`page-init.php`
```php
Accela::page_props("/category/[slug]/", function($query){
  return [
    "slug" => $query["slug"],
  ];
});

Accela::page_props("/category/[slug]/[id]", function($query){
  return [
    "slug" => $query["slug"],
    "article_id" => $query["id"],
  ];
});
```
</div>

これらの値は、[値のバインディング](../binding/)で紹介したバインディング機構によって、テンプレートもしくはコンポーネント内で取得することができます。


## 静的ルーティング時
静的ページでも、同様にPage Propsを用いたバインディングが行えます。(この場合$queryは渡されません。)

<div class="code-with-caption">

`page-init.php`
```php
Accela::page_props("/", function(){
  return [
    "key" => "value"
  ];
});
```
</div>

## Global Props
Global Propsを使えば、全てのページ、全てのコンポーネントから参照できるPropsを作ることができます。

<div class="code-with-caption">

`page-init.php`
```php
Accela::global_props(function(){
  return [
    "key" => "value"
  ];
});
```
</div>

## 具体的な使い方
たとえば、カテゴリページで記事の一覧を表示したい場合、通常はAPIで取得した配列をループします。
テンプレート、コンポーネントには制御構造がないため、Page Propsの中でHTMLを組み立てる必要があります。(※[モジュール](../modules/)と連携することもできます。)

<div class="code-with-caption">

`page-init.php`
```php
Accela::page_props("/category/[slug]/", function($query){
  $category_slug = $query["slug"];

  $lis = array_map(function($article){
    $title = htmlspecialchars($article->title);
    return "<li><a href=\"./{$article->id}\">{$title}</a></li>"
  }, SomeAPI::get_articles_by_category($category_slug));

  return [
    "slug" => $category_slug,
    "lis" => implode("", $lis),
  ];
});
```

`category/[slug]/index.html`
```html
...
<body>
  ...
  <ul data-bind-html="lis"></ul>
</body>
```
</div>

[Page Paths](../page-paths/)と同様、Page Propsもサーバサイドで同期的に行われ、静的ビルド時には全てキャッシュされます。
