# Accelaとは

## 特徴
- PHP製、SPA用Webフレームワーク
- 最低限の学習で開発可能
- サーバの動作要件もゆるめ(PHP, Apache, mod_rewrite)
- 全てのデータの静的ビルド(一部開発中)

Next.jsに触発されて開発していますが、設計思想はかなり異なるため、代わりになるものではありません。
ただ、Next.jsではオーバースペックなサイトは、低コストでAccelaに置き換えることができるかもしれません。
小規模な静的サイトでは一切PHPのコードを触ることなく、HTMLベースのテンプレートだけで開発することも可能です。

### サーバサイドの特徴
- HTMLの知識だけで作成できるページテンプレート
- 自動で構築されるルーティングシステム
- コンポーネントによるHTMLパーツの読み込み
- PHPによる同期的な動的コンテンツ開発

### クライアントサイドの特徴
- モジュールによる非同期での動的コンテンツ開発
- ページ遷移のフックを使ったアニメーションやトラッキングの実装

<div id="get-started"></div>

## 環境構築

```
$ composer require green-spot/accela
$ cp -r vendor/green-spot/accela/accela/. ./
```

<a href="https://github.com/green-spot/accela" target="_blank">https://github.com/green-spot/accela</a>
