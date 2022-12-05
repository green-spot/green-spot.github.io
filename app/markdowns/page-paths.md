# Page Paths
`app/page-init.php`

動的ルーティングを扱う際は、あらかじめ全てのURLをAccelaに登録する必要があります。
たとえばブログのカテゴリであれば、`pages/category/[slug]/index.html`を作成し、実際のURLは下記のようになります。

```text
/category/php/
/category/node/
/category/python/
```

これらをPHPの配列であらかじめ登録することで、初めてアクセスできるようになります。
Accelaではこの機能を**Page Paths**と呼び、**全ての動的ルーティングでは、Page Pathsが必須です。**

## page_paths関数

URLの一覧を登録するには、`app/page-init.php`内で`page_paths()`を使います。

<div class="code-with-caption">

`page-init.php`
```php
Accela::page_paths("/category/[slug]/", function(){
  return [
    "/category/php/",
    "/category/node/",
    "/category/python/",
  ];
});
```
</div>

## 動的なURL
全てのページが静的に決定するサイトなら、上のように単純に配列を指定するだけですが、実際の多くのサイトではCMSと連携してURLを決定する必要があります。

<div class="code-with-caption">

`page-init.php`
```php
Accela::page_paths("/category/[slug]/", function(){
  return array_map(function($c){
    return "/category/{$c->slug}/";
  }, SomeAPI::get_all_category());
});
```
</div>

これらは、見ての通り全て**同期的に**行われます。
つまり、サーバサイドレンダリングでは初期ページ表示時に毎回API通信が走り、静的ビルドすればAPIの結果が全てキャッシュされることを意味しています。
