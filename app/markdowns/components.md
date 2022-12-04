# コンポーネント
`app/components/*.html`

レイアウトやナビゲーションなどの共通パーツは、コンポーネントとしてまとめることができ、テンプレート内で&lt;component /&gt;タグとして扱うことができます。
コンポーネントの中身は、通常のHTMLタグと&lt;component /&gt;タグのみで構成されます。

コンポーネント、サーバコンポーネント、モジュールの違いは、[動的処理の比較](../dynamic-functions/)を参照してください。

## 例1 ナビゲーション
### コンポーネント定義

<div class="code-with-caption">

`app/components/nav.html`
```html
<nav class="nav1">
  <ul>
    <li><a href="/">TOP</a></li>
    <li><a href="/about/">About</a></li>
    <li><a href="/inquiry/">Inquiry</a></li>
  </ul>
</nav>
```
</div>

### コンポーネントの使用
コンポーネントの使用には、独自タグ **&lt;component use="" /&gt;** を使用します。
このタグは、レンダリング時にコンポーネントのHTMLに置換され、DOM上からは無くなります。

<div class="code-with-caption">

`app/pages/index.html`
```html
...
<body>
  <div>
    <component use="nav"></component>
  </div>
</body>
```
</div>

コンポーネント内で別のコンポーネントを呼び出すこともできます。

<div class="code-with-caption">

`app/components/nav2.html`
```html
<div class="nav-wrapper">
  <component use="nav"></component>

  <nav class="nav2">
    <ul>
      <li><a href="/sitemap/">Site map</a></li>
      <li><a href="/privacy/">Privacy Policy</a></li>
    </ul>
  </nav>
</div>
```
</div>

## 例2 レイアウト
### コンポーネント定義
呼び出し元で&lt;component /&gt;タグ内にHTMLを書けば、コンポーネント内で`data-contents`プロパティを使って表示することができます。
以下の例では、&lt;main /&gt;が置換される訳ではなく、&lt;main /&gt;内にコンテンツが埋め込まれます。

<div class="code-with-caption">

`app/components/layout.html`
```html
<div class="wrapper">
  <component use="nav"></component>

  <main data-contents></main>
</div>
```
</div>

### コンポーネントの使用

<div class="code-with-caption">

`app/pages/index.html`
```html
...
<body>
  <component use="layout">
    <h1>Accela</h1>
    <p>Accela is a PHP Framework that inspired by Next.js.</p>
  </component>
</body>
```
</div>


## 注意点

最初に表示するページでは、&lt;head /&gt;タグ内を全て静的に書き出すため、&lt;head /&gt;内ではコンポーネントを使うことはできません。
代わりに[サーバコンポーネント](./server-components)を使ってください。
