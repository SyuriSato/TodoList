<?php
$dsn = 'mysql:host=localhost;dbname=todolist;charset=utf8';
$user = 'root';
$password = 'syuri1031';

try{
    $dbh = new PDO($dsn, $user, $password);
    $statement = $dbh->prepare("select * from todolist where id=:id");
    if($statement){
        $id = $_POST['id'];

        $params = array(':id'=>$id);
    }
    $statement->execute($params);
    $result=$statement->fetch();
}catch (PDOException $e){
		print('Error:'.$e->getMessage());
        $errors['error'] = "データベース接続失敗しました。";
}
?>

<html>
<head><title>PHP TEST</title></head>
<body>
<form action="edit.php" method="post">
<input type="hidden" name="id" value="<?php echo $id ?>" />
予定日：<input default="datetime-local" name="dates" value="<?php echo $result['dates']; ?>"/><br/>
内容：<input default="text" name="contents" value="<?php echo $result['contents']; ?>"/><br/>
場所：<input default="text" name="place" value="<?php echo $result['place']; ?>"/><br/>
メモ：<input default="text" name="memo" value="<?php echo $result['memo']; ?>"/><br/>
<input type="submit" name="button" value="決定" />

