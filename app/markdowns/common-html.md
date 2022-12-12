# サイトの共通情報
`app/common.html`

common.htmlには、サイト全体で共通する&amp;lt;head /&amp;gt;および&amp;lt;style /&amp;gt;を記述します。
ここに書かれたHTMLは最初のアクセス時にレンダリングされ、ページの移動で更新されることはありません。

## 基本テンプレート

<div class="code-with-caption">

`common.html`
```html
&lt;head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="/assets/css/styles.css">
  <link rel="icon" href="/favicon.png">
&lt;/head>

<style>
</style>
```
</div>

## head
- (共通の)メタ情報
- &amp;lt;link&amp;gt;
- &amp;lt;script&amp;gt;&amp;lt;/script&amp;gt;

など。

タイトルやOGPなどのページ固有情報は、ここには記述しません。

## style
ここに書いたCSSはHTML上にインライン展開されるため、高速にレンダリングしたい要素に適用することができます。
