<?php


try {
    $fid = $_POST['fid'];
    $name = $_POST['name'];
    $toid = $_POST['toid'];
    $amount = $_POST['amount'];
    $fbalance = $_POST['fbalance'] - $_POST['amount'];
    
    $db_name = "mysql:host=localhost;dbname=banking";
    $username = "root";
    $password = "";


    $con = new PDO($db_name, $username, $password);
    $tsql1 = $con->prepare("select * from customer where id = $toid");
    $tsql1->execute();
    $tresult = $tsql1->fetchObject();
    $tobalance = $tresult->balance + $_POST['amount'];
    $toname = $tresult->name;
    $toemail = $tresult->email;


    

    $con->beginTransaction();
    $fsql = $con->prepare("UPDATE customer SET balance =? WHERE id = ?");
    $tosql = $con->prepare("UPDATE customer SET balance = ? WHERE id = ? ");
    $data = $con->prepare("INSERT INTO transfer(fid,amount,toname,toemail) VALUES (?,?,?,?)");
    $fsql->execute([$fbalance, $fid]);
    $tosql->execute([$tobalance, $toid]);
    $data->execute([$fid,$amount,$toname,$toemail]);
    $con->commit();
    header("Location: http://localhost/sf/customer.php");
} catch (Exception $e) {
    $con->rollback();
    echo $e->getMessage();
}
