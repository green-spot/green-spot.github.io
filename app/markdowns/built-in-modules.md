# ビルトインモジュール

現在、デフォルトで使えるモジュールは2つ用意しています。

## markdown

テンプレートやコンポーネント内に記述したマークダウンを、自動的にHTMLに変換するモジュールです。

<div class="code-with-caption">

`index.html`
```html
<article data-use-module="markdown">
# Accela
Accela is a PHP Web Framework that inspired by Next.js.

## Structure

## Templates

## Routing
...
</article>
```
</div>

## unescapeMarkdown

unescapeの処理を行ってからマークダウンをHTMLに変換するモジュールです。

\&amp;lt; → &lt;<br>
\&amp;gt; → &gt;<br>
\&amp;amp; → &amp;<br>
\&amp;quot; → &quot;<br>
\&amp;#x27; → &#x27;<br>
\&amp;#x60; → &#x60;


<div class="code-with-caption">

`index.html`
```html
<article data-use-module="unescapeMarkdown" data-bind-html="markdown_text">
</article>
```
</div>
