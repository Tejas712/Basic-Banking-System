<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="transfer.css">
</head>

<body>
<?php include "nav.php"?>
    <form action="update.php" method="post">
        <?php
        $id = $_GET['id'];
        $conn = mysqli_connect("localhost", "root", "","banking");
        $query = "select * from customer where id={$id}";
        $result = mysqli_query($conn,$query);
        while ($row = mysqli_fetch_assoc($result)){
        ?>
        <input type="number" name="fid" value="<?php echo $id;?>" hidden>
        <input type="number" name="fbalance" value="<?php echo $row['balance'];?>" hidden>
        <table>
            <tr>
                <td>
                    <label for="name">From</label>
                </td>
                <td>
                    <input type="text" name="name" placeholder="name" value="<?php echo $row['name'];?>">
                </td>
            </tr>
            <?php
            }
            ?>
            <tr>

                <td>
                    <label for="amount">Amount</label>
                </td>
                <td>
                    <input type="text" name="amount" placeholder="Amount">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">To</label>

                </td>
                <td>
                    <select name="toid" id="">
                        <?php
                         $query1 = "SELECT * From customer";
                         $result1 = mysqli_query($conn,$query1) or die("query fail");
                        if(mysqli_num_rows($result1)>0){

                            while($row1 = mysqli_fetch_assoc($result1)){

                                echo "<option value='{$row1['id']}'>{$row1['name']}</option>";
                            };

                        };?>

                    </select>
                </td>
            </tr>

        </table>
        <button type="submit">submit</button>
    </form>
    <?php include "footer.php"?>
</body>

</html>