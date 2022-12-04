# テンプレート

`app/pages/*.html`

ディレクトリ名・ファイル名がそのままURLに対応します。<br>
URLについての詳細は[ルーティング](../routing/)を参照。

## 基本テンプレート

```html
<head>
  <title>Accela</title>
</head>

<style>
  h1 {text-align: center;}
</style>

<body>
  <h1>Accela</h1>
</body>
```

※&lt;head /&gt;と&lt;body /&gt;は必須です。<br>
※ルートに他のタグを置いても認識されません。

## head
- タイトル
- このページで使うCSS, JS
- メタ情報

など、ページ固有の&lt;head /&gt;を記述することができます。<br>
ページを移動すると、そのページに合わせて自動的に更新されます。

## style
全てのページテンプレートの&lt;style /&gt;が、最初のアクセス時にHTML上にインライン展開されます。

## body
ページのコンテンツを記述します。
テンプレート上では`<body />`ですが、内部的にはAccelaが作成した`<div id="accela" />`のinnerHTMLが更新されます。
(が、この構造はあまり意識せずに開発できるようになっています。)


### body内で使える機能
- [コンポーネント](../components/)
- [サーバコンポーネント](../server-components/)
- [値のバインディング](../binding/)
- [モジュール](../modules/)
