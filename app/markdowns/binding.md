# 値のバインディング
コンポーネントの呼び出し時にプロパティを記述することで、コンポーネント内で値を動的にバインドすることができます。<br>
- タグのプロパティ (o.attr(prop, val))
- タグのinnerHTML (o.html(content), o.text(content))

の更新に対応していて、条件分岐やループなどの制御構文はありません。

## 渡し方
値をコンポーネントに渡すには、componentタグのプロパティにkey="val"形式で指定します。

<div class="code-with-caption">

`index.html`
```html
<component use="component-a" id="accela" title="Accela"></component>
```
</div>

## バインド
### プロパティ
`data-bind`に、コロン区切りで**バインドしたいプロパティ名**と**呼び出し元で指定したプロパティ名**を記述します。

<div class="code-with-caption">

`component-a.html`
```html
<div data-bind="id:id"></div>
↓
<div id="accela"></div>

<div data-bind="class:id"></div>
↓
<div class="accela"></div>
```
</div>

1つのタグに複数のプロパティをバインドしたい場合は、カンマ区切りで記述します。

<div class="code-with-caption">

`component-a.html`
```html
<div data-bind="id:id,data-title:title"></div>
↓
<div id="accela" data-title="Accela"></div>
```
</div>

### innerHTML
`data-bind-html`を使えば、innerHTMLを更新することができます。

<div class="code-with-caption">

`component-a.html`
```html
<h1 data-bind="id:id" data-bind-html="title"></div>
↓
<h1 id="accela">Accela</h1>
```
</div>

タグをエスケープしたい場合は`data-bind-text`を使います。


## 委譲
呼び出し元で指定したプロパティを、さらに子のコンポーネントに渡したい場合は、`@prop="prop-name"`を使います。

<div class="code-with-caption">

`component-a.html`
```html
<component use="component-b" @id="id" @text="title">
```

`component-b.html`
```html
<h1 data-bind="id:id" data-bind-html="text"></h1>
↓
<h1 id="accela">Accela</h1>
```
</div>

## プロパティの加工
モジュールを使えば、バインドした値を加工することができます。
詳細は[モジュール](../modules/)を参照。

<div class="code-with-caption">

`script.js`
```javascript
ACCELA.modules.uppercase = function(object){
  object.text(object.text().toUpperCase());
};

ACCELA.modules.printClassName = function(object){
  object.text(object[0].className);
}
```

`component-a.html`
```html
<div data-use-module="uppercase" data-bind-text="title"></div>
↓
<div>ACCELA</div>

<div data-use-module="printClassName" data-bind="class:id"></div>
↓
<div class="accela">accela</div>
```
</div>
