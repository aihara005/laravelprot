# Laravel Prot

## 動作確認環境
- Laravel 5.5.40
- PHP 7.2.4
- Apache 2.4.28
- MySQL 5.7.20

## 変更点
- ディレクトリ構成
  - Controller
  - Service
  - Repository
  - Model
  - Resource

- APIリソース追加
- Nuxt.js環境へ変更
- PHP 7.2系へ変更
  
## how to use
``` 
 git clone git@github.com:aihara005/laravelprot.git
 composer install
 yarn install
 vi .env // 適当に.env用意する
 posts / commentsデータとDB用意、DB接続
 php artisan serve
 yarn run dev
 access to http://127.0.0.1:3000
 ```
