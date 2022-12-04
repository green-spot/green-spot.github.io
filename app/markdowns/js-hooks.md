# ページ移動時のフック
`app/script.js`

ページの初期表示時、ページ移動時のフックを使えば、アニメーションや差分レンダリングを実装することができます。


## ACCELA.initPage
最初にサイト内のページにアクセスされた時に1回だけ実行される処理を記述します。
- フェードイン
- ローディング
- Webフォントの読み込み待ち

など。

```javascript
ACCELA.initPage = () => {
  document.querySelector("body").classList.add("show")
};
```


## ACCELA.movePage
ページ移動時に実行される処理を記述します。最初のアクセス時には実行されません。
- ページ遷移アニメーション
- トラッキングの追加

など。

```javascript
ACCELA.movePage = (pageContent, move) => {
  // ページ移動する前にコンテンツをフェードアウト
  $("#accela").fadeOut(200, () => {
    // ページ移動
    move();

    // トラッキング
    analyze(location.pathname);

    // コンテンツのフェードイン
    $("#accela").fadeIn(400);
  })
};
```

### 第1引数
移動先ページのコンテンツのNodeオブジェクトが渡されます。
このDOM構造を比較することで、ページの種類ごとにアニメーションを設定することもできます。

### 第2引数
実際にDOMの更新をするための関数が渡されます。
`movePage`内で必ず1回だけ実行する必要があります。


## ACCELA.changePageContent
ページ移動のDOMの更新処理を変更することができます。
このフックを使うと、DOMの差分レンダリングが可能になります。


```javascript
ACCELA.change_page_content = (body, pageContent) => {
  body.innerHTML = pageContent;
};
```

### 第1引数
Accelaで管理している、コンテンツ全体が含まれる仮想的な&lt;body /&gt;が渡されます。
実際に渡されるのは&lt;div id="accela" /&gt;で、このDOMの中身を更新することでページ移動をしています。

### 第2引数
移動後のコンテンツが渡されます。
