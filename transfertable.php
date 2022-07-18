<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="transfertable.css">
</head>

<body>
    <?php include "nav.php" ?>



    <table>
        <tr>
            <td colspan="3">
                From
            </td>
            <td colspan="2">
                To
            </td>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "banking");
        $query = "select * from transfer JOIN customer ON fid = id";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {

            echo
            " <tr>
                <td>
                   {$row['name']}
                </td>
                <td>
                {$row['email']}
                </td>
                <td>
                {$row['amount']}
                </td>
                <td>
                {$row['toname']}
                </td>
                <td>
                {$row['toemail']}
                </td>
            </tr>"


        ?>
        <?php } ?>
    </table>
    <?php include "footer.php" ?>
</body>

</html>