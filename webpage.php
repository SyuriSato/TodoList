<?php
ini_set('display_errors',"On");

$dsn = 'mysql:dbname=todolist;host=localhost';
$user = 'root';
$password = 'syuri1031';
$dbh = new PDO($dsn, $user, $password);
$sql = 'select * from todolist order by dates;';
?>

<html>
<head>
<link rel="stylesheet" href="center.css" type="text/css"> 
<title>PHP TEST</title>
</head>
<body>
<div id="wrapper">
<h1>
<?php echo date("Y年　m/d g時i分"); ?>
</h1>
<br><br>

<form action="add.php" method="post">
予定日：<input type="datetime-local" name="dates" />
内容：<input type="text" name="contents" />
<input type="submit" name="button" value="追加" />
<br />
</form>

<table border=1 align="center">
<tr><th>予定日</th><th>内容</th></tr>
<?php
try{
    foreach ($dbh->query("$sql") as $row){?>
        <tr><th>
        <?php
        print($row['dates']);
        ?></th>
        <th><?php
        print($row['contents']);
        ?></th><th>
        <form action="delete.php" method="post">
        <input type="submit" name="button" value="削除" />
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
        </form></th>

        <th>
        <form action="edit_form.php" method="post">
        <input type="submit" name="button" value="詳細" />
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
        </form></th>
        </tr>

    <?php }
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
}?>
<!--/ #wrapper-->
</div>
</table>
</body>
</html>