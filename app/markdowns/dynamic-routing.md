# 動的ルーティング

[ルーティング](../routing/)の基本ルールに加えて、動的なURLを定義することもできます。<br>
以下は便宜上の"[ ]"ではなく、テンプレートファイル名に実際に"[ ]"を使うことを意味しています。

| テンプレート | URL |
| - | - |
| /c/[category]/index.html | /c/php/<br>/c/node/<br>... |
| /c/[category]/[slug].html | /c/php/accela<br>/c/node/nextjs<br>...|

## [category]/, [slug].html
ファイル名に"[ ]"を使うと、動的なページが定義されます。
仮引数の名前(category, slug)は自由に決めることができ、[Page Props](../page-props/)でキーとして利用することができます。


## 実際にページを表示するには
**このページテンプレートを作るだけではページの生成はできません。**<br>
URLの決定には[Page Paths](../page-paths/)、動的なコンテンツの作成には[Page Props](../page-props/)か[モジュール](../modules/)、もしくはその両方を使う必要があります。
