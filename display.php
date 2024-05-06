<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Records</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php  
        include("connection.php");

        $query = "SELECT * FROM form";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);

        if($total != 0) {
    ?>
    <h2 align="center">Displaying All Records</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Course</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Operation</th>
        </tr>
        <?php
            while($result = mysqli_fetch_assoc($data)) {
                echo "<tr>
                <td>{$result['id']}</td>
                <td>{$result['fname']}</td>
                <td>{$result['lname']}</td>
                <td>{$result['course']}</td>
                <td>{$result['gender']}</td>
                <td>{$result['email']}</td>
                <td>{$result['phone']}</td>
                <td>{$result['address']}</td>
                <td>
                    <a href='update.php?id={$result['id']}'><button class='update'>Update</button></a>
                    <a href='delete.php?id={$result['id']}' onclick='return checkDelete()'><button class='delete'>Delete</button></a>
                </td>
                </tr>";
            }
        ?>
    </table>
    <?php
        } else {
            echo "<h2 align='center'>No records found</h2>";
        }
    ?>

    <script>
        function checkDelete() {
            return confirm('Are you sure you want to delete this record?');
        }
    </script>
</body>
</html>
