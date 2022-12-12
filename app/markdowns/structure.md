# ファイル構成

## /app/
サイト開発に使用するディレクトリです。

### /app/pages/
ページのHTMLテンプレートを設置します。<br>
このディレクトリのファイル構成を基に、ルーティングも自動で定義されます。
- [ルーティング](../routing/)
- [テンプレート](../templates/)

### /app/components/
ページで扱うコンポーネントを配置します。
- [コンポーネント](../components/)

### /app/server-components/
サーバコンポーネントを配置します。
- [サーバコンポーネント](../server-components/)

### /app/common.html
サイト共通で使う、&amp;lt;head /&amp;gt;と&amp;lt;style /&amp;gt;を定義します。
- [サイトの共通情報](../common-html/)

### /app/page-init.php
サーバサイドで行いたい処理を記述するファイルです。<br>
- [Page Paths](../page-paths/)
- [Page Props](../page-props/)

### /app/script.js
クライアントサイドで行いたい処理を記述するファイルです。
- [モジュール](../modules/)
- [レンダリングのフック](../js-hooks/)

## /assets/
静的ビルド時に、自動で同梱されます。

## /accela/
システムファイル群です。通常は触りません。

