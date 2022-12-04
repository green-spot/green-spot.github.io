# 動的処理の比較

<style>
.dynamic-functions-comparison {
  width: 100%;
  overflow-x: auto;
  overflow-y: hidden;
}
.dynamic-functions-comparison table {
  width: 740px;
}
.dynamic-functions-comparison table th,
.dynamic-functions-comparison table td:not(:first-child) {
  text-align: center !important;
}
.dynamic-functions-comparison table th span {
  display: inline-block;
  font-size: 10px;
  white-space: nowrap;
}
</style>

<div class="dynamic-functions-comparison">

| | [サーバコンポーネント](../server-components/)<br><span>app/server-components/\*.php</span> | [コンポーネント](../components/)<br><span>app/components/\*.html</span>  | [モジュール](../modules/)<br><span>app/script.js</span>  |
| --- | --- | --- | --- |
| 記述言語 | PHP+HTML | HTML | JavaScript |
| 実行タイミング | Server side | Client side | Client side |
| headでの実行 | ○ | × | × |
| bodyでの実行 | ○ | ○ | ○ |
| 値のバインディング | ○ | ○ | ○ |
| ネスト| × | ○ | △ |
| 軽量化 | × | ○ | ○ |
</div>
