# ルーティング

以下の例に示す簡単なルールに則って、[テンプレート](../templates/)を定義するだけで自動的にページにアクセスできるようになります。


| テンプレート | URL |
| - | - |
| index.html | / |
| about.html | /about |
| about/index.html | /about/ |
| about/accela.html | /about/accela |


## index.html
ディレクトリのインデックスページを表し、末尾に"/"が付いたURLが定義されます。

## index.html以外のHTMLファイル
about.html, accela.htmlなどのテンプレートは、末尾に"/"が付かないURLが定義されます。

## .html以外のファイル
全て無視されます。
