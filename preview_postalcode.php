<?PHP
session_start();

// var_dump($_FILES);

//upload
$filename = $_FILES["csvfile"]["name"];
// echo ($filename);
// exit();


$csvfile = fopen('csvdata/' . $filename, 'r');
$newAry = array();


flock($csvfile, LOCK_EX);
if ($csvfile) {
    while ($line = fgetcsv($csvfile)) {
        $newAry[] = $line;
    }
}

$_SESSION = array();
$_SESSION["newAry"] = $newAry;
// var_dump($_SESSION);




//previewのためにnewAry配列に格納したcsvデータをjson形式に変換
$php_jsonnewAry = json_encode($newAry);
// var_dump($php_jsonnewAry);
// exit();



?>



<!---------------------
HTML 要素
--------------------->
<!DOCTYPE html>
<html lang='ja'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <title>csv preview</title>
</head>

<body>

    <a href='upload_postalcode.php'><button>mySQLにアップロード</button></a>
    <p>プレビュー</p>
    <div id="table"></div>
    <div id="more" style="display:none;">
        <p>この先14万レコード続くので流石に長すぎて...</p>
        <img src='img/restrict.gif' alt=''>
    </div>
</body>

</html>

<!---------------------
javascript 要素
--------------------->
<script>
    //phpの配列をjsの配列に変換
    let js_array = <?= $php_jsonnewAry; ?>;
    console.log(js_array);




    //表の動的作成
    function makeTable(js_array, tableId) {
        // 表の作成開始
        let rows = [];
        let table = document.createElement("table");

        // 表に2次元配列の要素を格納
        for (i = 0; i < 30; i++) {
            rows.push(table.insertRow(-1)); // 行の追加
            for (j = 0; j < js_array[0].length; j++) {
                cell = rows[i].insertCell(-1);
                cell.appendChild(document.createTextNode(js_array[i][j]));
                cell.style.backgroundColor = "#ddd"; // 色塗り
            }
        }
        // 指定したdiv要素に表を加える
        document.getElementById(tableId).appendChild(table);
    }
    window.onload = function() {

        // 表の動的作成
        makeTable(js_array, "table");
    };
    //読み込みが終わったら#moreの表示をnoneからblockに変更
    document.getElementById("more").style.display = "block";
</script>