# LaravelREST APIと管理画面
## マンガ名言API
```
漫画・アニメの名言を返すAPI
管理画面から名言と各漫画の登場人物のCRUD操作が可能
```
### 構築環境
```
LAMP + Laravel
L: Linux(alpine)
A: Apache2.4(alpine)
M: MySQL 5.7
P: PHP7.3

Laravel => 5.7.x
```
### ファイル構成
```
laravel_develop_env_docker/
  ┃
  ┣━━ app_server (PHP + Laravel + apache2 サーバー)
  ┃    ┣━ laravel (Laravelプロジェクトマウントディレクトリ)
  ┃    ┣━ laravel_setting(コンテナ構築シェルシェルスクリプト)
  ┃    ┃    ┣━ restart.sh (プロジェクトルートへのシンボリックリンク復旧用スクリプト)
  ┃    ┃    ┗━ setting.sh (Laravelプロジェクト生成スクリプト)
  ┃    ┣━　Dockerfile
  ┃    ┣━　httpd.conf
  ┃    ┗━　php7-module.conf
  ┃
  ┣━━ db_server（MySQLサーバー）
  ┃    ┣━ db_volume (dbコンテナデータ永続化ディレクトリ)
  ┃    ┣━　Dockerfile
  ┃    ┗━　mysql.conf
  ┃
  ┣━━ .env (Laravelプロジェクト名、バージョン設定)
  ┣━━ .gitignore
  ┣━━ app_create.sh (初回コンテナ生成用スクリプト)
  ┣━━ app_start.sh (コンテナ起動スクリプト)
  ┗━━ README.md
```
※app_server内のlaravelディレクトリと、db_server内のdb_volumeは初回コンテナ作成時に自動で生成されます。
<br><br>

## 使用方法
### Laravel新規作成時
**0.リポジトリをクローン**
**cloneから起動まで**


**LaravelでのDB接続設定について**

Laravelプロジェクトのルートディレクトリにある.envのDB_HOSTには、servisesでDBサーバーに設定している名前を指定。

↓docker-compose.yml
```
services:
  db: <= これを.envのDB_HOSTに指定
    container_name: db_server
```
↓Laravelのルートディレクトリの.envファイル内
```
DB_HOST=db
```

```
1. Appのルートディレクトリでcomposer update
2. .envファイルを作成, 編集
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=famous_line_db
DB_USERNAME=user
DB_PASSWORD=password

3. php artisan key:generate
4. docker リスタート
4. db作成 php artisan migrate
```
