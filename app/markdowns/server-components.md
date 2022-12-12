# サーバコンポーネント
`app/server-components/*.php`

コンポーネントはJavaScriptでレンダリングされますが、サーバコンポーネントを使えばサーバサイドで動的な処理を行うことができます。

コンポーネント、サーバコンポーネント、モジュールの違いは、[動的処理の比較](../dynamic-functions/)を参照してください。

## 注意点

呼び出しの記法はコンポーネントとほぼ変わりませんが、動作原理が違う点にご注意ください。

サーバコンポーネントを使うと、処理された段階で全てHTML上に展開されてJSONデータに埋め込まれるため、ファイルサイズが大きくなる傾向があります。
複雑な処理が必要ないものは、まず[Page Props](../page-props/)と[コンポーネント](../components/)を使った実装を検討してください。


## 使うと便利なケース

&amp;lt;head /&amp;gt;内の情報は、JavaScriptに対応していないクローラーに正確に伝えるため、あらかじめHTMLとして書いておく必要があります。
モジュールやバインディングを使った値の書き換えは、クライアントサイド(JavaScript)で行われるため、こういった問題に対応するためにサーバコンポーネントを使います。

## 例1 メタタグ
### サーバコンポーネントの定義

<div class="code-with-caption">

`app/server-components/meta.php`
```html
<title><?php echo $props['title']; ?></title>
<meta name="description" content="<?php echo $props['description']; ?>">
<meta name="keywords" content="<?php echo $props['keywords']; ?>">
<!-- OGP -->
<meta ...>
```
</div>


### サーバコンポーネントの使用
サーバコンポーネントの使用には、独自タグ **&amp;lt;server-component use="" /&amp;gt;** を使用します。
このタグはコンポーネントと同様、レンダリング時にDOM上から無くなります。

<div class="code-with-caption">

`app/pages/index.html`
```html
&lt;head>
  <server-component use="meta"
    title="Accela PHP Web Framework"
    description="Accela is a PHP Framework that inspired by Next.js."
    keywords="accela,php,web framework,next.js">
  </server-component>
&lt;/head>
...
```
</div>

動的ルーティングのページでは、[Page Props](../page-props/)と[バインディング](../binding/)の委譲を使うことで解決できます。

<div class="code-with-caption">

`app/pages/news/[id].html`
```html
&lt;head>
  <server-component use="meta"
    @title="title"
    @description="description"
    @keywords="keyword">
  </server-component>
&lt;/head>
...
```
</div>

