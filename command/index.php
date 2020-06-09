<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Open File</title>
</head>

<body>
    <header>
        <h1>Open File</h1>
  
    </header>

    <div>
        <!--
            Please input "a.txt" or "b.txt" or "c.txt"
        -->
        <form action="" method="get">
            <input type="text" name="file">
            <input type="submit" value="送信">
        </form>
    </div>

    <div>
    <?php
        if(isset($_GET["file"])) {
            system("cat files/".$_GET["file"]);
        }
    ?>
    </div>
