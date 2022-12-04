# サイトの共通情報
`app/common.html`

common.htmlには、サイト全体で共通する&lt;head /&gt;および&lt;style /&gt;を記述します。
ここに書かれたHTMLは最初のアクセス時にレンダリングされ、ページの移動で更新されることはありません。

## 基本テンプレート

<div class="code-with-caption">

`common.html`
```html
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="/assets/css/styles.css">
  <link rel="icon" href="/favicon.png">
</head>

<style>
</style>
```
</div>

## head
- (共通の)メタ情報
- &lt;link&gt;
- &lt;script&gt;&lt;/script&gt;

など。

タイトルやOGPなどのページ固有情報は、ここには記述しません。

## style
ここに書いたCSSはHTML上にインライン展開されるため、高速にレンダリングしたい要素に適用することができます。
