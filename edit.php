<?php
ini_set('display_errors',"On");
$dsn = 'mysql:host=localhost;dbname=todolist;charset=utf8';
$user = 'root';
$password = 'syuri1031';


try{
    $dbh = new PDO($dsn, $user, $password);
    $statement = $dbh->prepare("UPDATE todolist SET dates=:dates,contents=:contents,memo=:memo,place=:place where id=:id");
    if($statement){
        $dates = $_POST['dates'];
        $contents = $_POST['contents'];
        $memo=$_POST['memo'];
        $place=$_POST['place'];
        $id = $_POST['id'];
        $params = array(':dates' => $dates, ':contents' => $contents,':memo'=>$memo,':place'=>$place, ':id'=>$id);
 
    }
    $statement->execute($params);
 
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    $errors['error'] = "データベース接続失敗しました。";
}
echo "d";

header('Location:webpage.php');
exit();
