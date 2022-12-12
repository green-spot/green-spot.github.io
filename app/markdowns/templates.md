# テンプレート

`app/pages/*.html`

ディレクトリ名・ファイル名がそのままURLに対応します。<br>
URLについての詳細は[ルーティング](../routing/)を参照。

## 基本テンプレート

```html
&lt;head>
  <title>Accela</title>
&lt;/head>

<style>
  h1 {text-align: center;}
</style>

&lt;body>
  <h1>Accela</h1>
&lt;/body>
```

※&amp;lt;head /&amp;gt;と&amp;lt;body /&amp;gt;は必須です。<br>
※ルートに他のタグを置いても認識されません。

## head
- タイトル
- このページで使うCSS, JS
- メタ情報

など、ページ固有の&amp;lt;head /&amp;gt;を記述することができます。<br>
ページを移動すると、そのページに合わせて自動的に更新されます。

## style
全てのページテンプレートの&amp;lt;style /&amp;gt;が、最初のアクセス時にHTML上にインライン展開されます。

## body
ページのコンテンツを記述します。
テンプレート上では`&lt;body /&gt;`ですが、内部的にはAccelaが作成した`<div id="accela" />`のinnerHTMLが更新されます。
(が、この構造はあまり意識せずに開発できるようになっています。)


### body内で使える機能
- [コンポーネント](../components/)
- [サーバコンポーネント](../server-components/)
- [値のバインディング](../binding/)
- [モジュール](../modules/)
