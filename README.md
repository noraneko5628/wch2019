# wch2019

A WordPress theme for WordCamp Haneda 2019

## デザインと入稿要素

このテーマでは、ウィジェットやメニューにこういう指定をするとこうなるという変な仕組みがあります。

W.I.P


## 前提知識

このテーマは[WordCamp Haneda 2019](https://2019.haneda.wordcamp.org/)のテーマです。

WordCampサイトには以下の制約があります。

- マルチサイトである
- 新たにテーマをインストールすることはできず、既存テーマから選択するだけ
- PHPやJavascriptを追加することは一切できない
- 可能なのはカスタムCSSを読み込むことだけ。このカスタムCSSは外部URLを設定できるので、このGithubリポジトリから読み込むことができます。

詳細については2015, 2016のWeb制作を担当した羽野さんのブログ記事「[WordCamp Tokyo 2015のサイトデザインについてのおはなし ](https://www.asknode.net/wordcamp-tokyo-2015-theme-design/)」を読んでください。その他、[保存版・WordCampサイトの作り方](https://capitalp.jp/2017/09/21/how-to-make-wordcamp-site/)なども参考になります。

## セットアップ方法

### WordPressサイトの設定

VCCWをクローンしているので、それをダウンロードしてください。

[wchaneda2019/vccw](https://github.com/wchaneda2019/vccw)

```
git clone git@github.com:wchaneda2019/vccw.git ./wch2019-vccw
```

これで、以下の設定が行われます。

- WordPressマルチサイトのインストール
- 必要なプラグインを諸々インストール
- 必要な親テーマをインストール
- このテーマリポジトリをインストールし、有効化

成功すれば、 `https://wchaneda2019.local` でアクセスします。証明書のエラーは無視してください。

もし失敗した場合は、このリポジトリ[wchaneda2019/wch2019](https://github.com/wchaneda2019/wch2019/issues) にイシューとして登録してください。

### テーマのビルド

このテーマを初期化するにはnpmが必要です。

```
npm install
```

### ファイルのビルドと監視

```
npm start
```

上記のコマンドを入力すると、各種ファイルが書き出され、監視が始まります。

### CSSの構造

`src/scss` ディレクトリにSCSSを書き込んでくだたい。componentsおよびtemplatesディレクトリにSCSSを追加すると、勝手に読み込まれます。

サイト全体で使えそうな変数は`_variables.scss`に、サイト全体で使えまわせそうな部品は`components`ディレクトリに、サイトのそれぞれのパーツは`templates`ディレクトリにおいてください。

### 画像

画像は`src/images`ディレクトリに配置されたものが最適化されて`docs/assets/images`にコンパイルされます。
多くはCSSの背景画像としての利用だと思われますが、その場合はローカルと本番デプロイでパスが変わるので、必ず次のように記載してください。`$img-path`変数が文脈によって色々書き換わります。

```
.main-visual{
	background-image: url("#{$img-path}header-logo.png")
}
```

### 静的HTMLによる確認

`src/pug`ディレクトリにあるファイルは `dist`フォルダにHTMLとしてコンパイルされ、BrowserSyncで監視することができます。

```
npm run server
```

### Webフォントの適用

FontAwesomeを利用するには、外観 > フォントへ移動し、**Font Awesome**という項目に次のURLを含めてください。`https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css`

### 本番環境へのデプロイ

デプロイメントといっても、CSSが変わるだけです。リリースはmasterブランチの `docs` フォルダにて行います。

コンテンツ（サイドバー、メニュー、ウィジェットなど）の適用とCSSの適用を両方行って初めてコンテンツ公開となるので、できる限りCSSを冗長化させてください。要するに、CSSとコンテンツを同時に更新しないと適用されないのは好ましくないということです。

次のコマンドで、デプロイ用のファイルが書き出されます。

```
npm run production
```

本番用のリソースは静的なHTMLとして Github Pages にデプロイされます。

[wchaneda2019.github.io/wch2019/](https://wchaneda2019.github.io/wch2019/)

WordCamp用サイトは以下のCSSを参照することで、デザインが適用されます。

https://wchaneda2019.github.io/wch2019/assets/css/style.css

## 依存技術

- [Boubon](http://bourbon.io) & [Neat](http://neat.bourbon.io)

## 貢献するには

[issues](https://github.com/wchaneda2019/wch2019/issues)から問題点を報告してください。
もしくは、プルリクエストを送ってください。

## ライセンス

GPL 3.0またはそれ以降です。
