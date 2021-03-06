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
### 1.リポジトリをクローン
**cloneから起動まで**
1. Appのルートディレクトリでcomposer update
2. .envファイルを作成, 編集
.envファイル内のデータベース接続設定は下記の通り
```
  DB_CONNECTION=mysql
  DB_HOST=db
  DB_PORT=3306
  DB_DATABASE=famous_line_db
  DB_USERNAME=user
  DB_PASSWORD=password
```
3. php artisan key:generate
4. commandディレクトリ配下で./create_app.shを実行
5. マイグレーション php artisan migrate
6. seedの流し込み php artisan db:seed

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

### api・管理画面へのアクセス
1. apiの利用
apiとして取得できる漫画タイトルは以下の3つ
```
1. スラムダンク
2. 機動戦士ガンダム
3. ジョジョの奇妙な冒険
```
JSON形式でapiからのレスポンスを取得できます。

**リスト形式**

`localhost/api/gundam` 

`localhost/api/jojo` 

`localhost/api/slamdunk`

例)

<img width="486" alt="json_list" src="https://user-images.githubusercontent.com/40926770/75687638-6cbdda80-5ce1-11ea-9001-8c3442f969ca.png">

**個別で取得**

`localhost/api/gundam/1`

`localhost/api/jojo/1`

`localhost/api/slamdunk/1`

例）

<img width="316" alt="json1" src="https://user-images.githubusercontent.com/40926770/75687792-b0184900-5ce1-11ea-89c2-79491308eba2.png">

### 管理画面

管理画面へは`localhost`でアクセス。

<img width="1157" alt="console" src="https://user-images.githubusercontent.com/40926770/75687619-6891bd00-5ce1-11ea-98c1-25ed3ec6c55b.png">

- タイトル一覧表示
- 各漫画の名言のCRUD処理ができ、APIに新たな名言を追加することができます。

<img width="929" alt="crud1" src="https://user-images.githubusercontent.com/40926770/75687816-bb6b7480-5ce1-11ea-8702-f7fa7fe98b27.png">
<img width="825" alt="crud2" src="https://user-images.githubusercontent.com/40926770/75687825-befefb80-5ce1-11ea-8d39-06a0a5029ee7.png">

