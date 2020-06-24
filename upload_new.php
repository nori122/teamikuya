<?PHP

session_start();
// var_dump($_SESSION);
// exit();
$newAry = $_SESSION["newAry"];
$filepath = $_SESSION["filepath"];
$filename = $_SESSION["filename"];
$tablename = $_SESSION["tablename"];
// var_dump($newAry);
// var_dump($filepath);
// exit();




//DB接続
function connect_to_db()
{
    // DB接続の設定
    // DB名は`gsacf_x00_00`にする
    $dbn = 'mysql:dbname=teamIkuya_v3;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    try {
        // ここでDB接続処理を実行する
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        // DB接続に失敗した場合はここでエラーを出力し，以降の処理を中止する
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit();
    }
}

$pdo = connect_to_db();


// データ取得SQLの作成
$sql = 'load data infile "/Applications/XAMPP/xamppfiles/htdocs/teamikuya/csvdata/' . $filename . '" into table ' . $tablename . ' fields terminated by ",";';
// echo ($sql);
// exit();



// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は指定の11レコードを取得
    // fetch()関数でSQLで取得したレコードを取得できる
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    echo ('DBにデータが入りました');
}
