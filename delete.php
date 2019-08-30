<?php
$dsn = 'mysql:host=localhost;dbname=todolist;charset=utf8';
$user = 'root';
$password = 'syuri1031';
try{
    $dbh = new PDO($dsn, $user, $password);
    $statement = $dbh->prepare("delete from todolist where id=:id");
    if($statement){
        $id = $_POST['id'];

        $params = array(':id'=>$id);
    }
    $statement->execute($params);
}catch (PDOException $e){
		print('Error:'.$e->getMessage());
        $errors['error'] = "データベース接続失敗しました。";
}

header('Location: webpage.php ');
exit();

