<!---------------------
HTML 要素
--------------------->
<!DOCTYPE html>
<html lang='ja'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <title>CSV upload</title>
</head>

<body>

    <form action="preview_address.php" method="post" enctype="multipart/form-data">
        住所マスタ：<br />
        <input type="file" name="csvfile" size="30" /><br />
        <input type="submit" value="プレビューを見る" />
    </form>
    <hr>
    <form action="preview_postalcode.php" method="post" enctype="multipart/form-data">
        郵便番号マスタ：<br />
        <input type="file" name="csvfile" size="30" /><br />
        <input type="submit" value="プレビューを見る" />
    </form>
    <hr>

    <form action="preview_tel.php" method="post" enctype="multipart/form-data">
        市外局番マスタ：<br />
        <input type="file" name="csvfile" size="30" /><br />
        <input type="submit" value="プレビューを見る" />
    </form>
    <!-- <img src='img/restrict.gif' alt=''> -->

</body>

</html>