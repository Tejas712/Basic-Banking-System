<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <link rel="stylesheet" href="customer.css">
</head>

<body>
<?php include "nav.php"
?>

    <table>
        <tr>
            <td>
                Name
            </td>
            <td>
                email
            </td>
            <td>
                Balance
            </td>
        </tr>
        <?php $conn = mysqli_connect("localhost", "root", "","banking");
        $query = "select * from customer";
        $result = mysqli_query($conn,$query);
        while ($row = mysqli_fetch_assoc($result)){
            echo "
             <tr>
            <td>
               {$row['name']}
            </td>
            <td>
                {$row['email']}
            </td>
            <td>
                {$row['balance']}
            </td>
            <td>
            <a href='transfer.php?id={$row["id"]}'>Transfer</a>
</td>
            
        </tr>"
            ?>

        <?php } ?>
    </table>
    <?php include "footer.php"?>
</body>

</html>