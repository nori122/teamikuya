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


    <form action="preview.php" method="post" enctype="multipart/form-data">
        CSVファイル：<br />
        <input type="file" name="csvfile" size="30" /><br />
        <input type="submit" value="アップロード" />
    </form>


</body>

</html>