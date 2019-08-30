<?php
$dsn = 'mysql:host=localhost;dbname=todolist;charset=utf8';
$user = 'root';
$password = 'syuri1031';
try{
		$dbh = new PDO($dsn, $user, $password);
		$statement = $dbh->prepare("INSERT INTO todolist (dates,contents) VALUES (:dates,:contents)");
	
		if($statement){
            $dates = $_POST['dates'];
            $contents = $_POST['contents'];
            $params = array(':dates' => $dates, 'contents' => $contents);
        } 
        $statement->execute($params);
        
}catch (PDOException $e){
		print('Error:'.$e->getMessage());
		$errors['error'] = "データベース接続失敗しました。";
}
header('Location: webpage.php ');
exit();
