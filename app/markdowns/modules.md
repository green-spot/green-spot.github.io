# モジュール

`app/script.js`

クライアントサイドで動的なコンテンツを扱いたい場合は、モジュール機能を使うとシンプルに記述できます。

コンポーネント、サーバコンポーネント、モジュールの違いは、[動的処理の比較](../dynamic-functions/)を参照してください。

## 基本

script.js内で`ACCELA.modules`に関数を追加していき、テンプレート内で`data-use-module`を使ってその関数を呼び出します。

<div class="code-with-caption">

`script.js`
```javascript
ACCELA.modules.uppercase = (object) => {
  object.textContent = object.innerText.toUpperCase();
};
```

`index.html`
```html
<div data-use-module="uppercase">accela</div>
↓
<div>ACCELA</div>
```
</div>

引数の`object`には、**呼び出された&amp;lt;div /&amp;gt;のNodeオブジェクト**が渡されます。

## 非同期
`object`が保持されている間は、いつでもinnerHTMLの更新が可能なため、非同期な更新も実装できます。

<div class="code-with-caption">

`script.js`
```javascript
// カウントダウン
ACCELA.modules.asyncModule = (object) => {
  object.textContent = "3";
  setTimeout(() => object.textContent = "2", 1000);
  setTimeout(() => object.textContent = "1", 2000);
  setTimeout(() => object.textContent = "done.", 3000);
};

// ローディングとウィジェットの読み込み
ACCELA.modules.loadWidget = async (object) => {
  object.innerHTML = '<div class="loading">loading</div>';

  const res = await fetch("/api/widget");
  object.innerHTML = await res.text();
};
```
</div>

## バインディングとの連携
[Page Props](../page-props/)と[値のバインディング](../binding/)を使って、バインドした値をモジュールで扱うこともできます。

<div class="code-with-caption">

`index.html`
```html
<div data-use-module="a" data-bind="data-id:id" data-bind-text="text">
</div>
```

`script.js`
```javascript
ACCELA.modules.a = (object)=> {
  const id = object.getAttribute("data-id");
  const text = object.innerText;
  ...
};
```
</div>


## モジュールの拡張、委譲

モジュールは単なるJavaScriptの関数なので、モジュールから別のモジュールを呼ぶことで、処理を委譲することができます。

<div class="code-with-caption">

`page-init.php`
```javascript
ACCELA.modules.repeat = (object) => {
  const count = object.getAttribute("data-count") ? object.getAttribute("data-count") : 1;
  object.innerHTML = object.innerHTML.repeat(count);
};

ACCELA.modules.repeat10 = (object) => {
  object.setAttribute("data-count", 10);
  ACCELA.modules.repeat(object);
};
```
</div>

以下の2つのulは等価です。

<div class="code-with-caption">

`index.html`
```html
<ul data-use-module="repeat" data-count="10">
  <li></li>
</ul>

<ul data-use-module="repeat10">
  <li></li>
</ul>
```
</div>
