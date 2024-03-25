
<!DOCTYPE html>
<html>

<head>
    <title>Patient search</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url(../images/banner.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
           
        }

        .menu {
            padding: 20px;
            border-top: 60px solid #87CEEB;
            border-left: 60px solid #87CEEB;
            height: 100vh;
            text-align: center;
        }

        h2 {
            margin-top: 20px;
            font-weight: bold;
            color: #DB4437;
        }

        h2 {
            float: middle;
            margin-right: 20px;
        }

        form {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px;
            border-radius: 5px;
            width: 200px;
        }

        input[type="submit"] {
            padding: 10px;
            background-color: #006400;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="button"] {
            padding: 10px;
            background-color: #4285f4;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        table {
            width: 80%;
            margin: 20px auto;
            text-align: left;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #006400;
            color: white;
        }

        tr {
            background-color: #4CAF50;
        }
    </style>
</head>

<body>
    <div class="menu">
        <h2>Patient search in database</h2>
        <form action="../Controllers/patientprofile_controller.php" method="POST">
            <input type="text" name="id" placeholder="Search id">
            <input type="submit" name="Search" value="Search Data">
        </form>
        <table>
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Patient id</th>
                    <th>Disease</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($patientData)) {
                    if (empty($patientData)) {
                        echo "<tr><td colspan='4'>No record found</td></tr>";
                    } else {
                        foreach ($patientData as $row) {
                            echo "<tr>";
                            echo "<td>" . $row['first name'] . "</td>";
                            echo "<td>" . $row['last name'] . "</td>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['disease'] . "</td>";
                            echo "</tr>";
                        }
                    }
                }
                ?>
            </tbody>
        </table>
        <br>
        <input type="button" value="Go Back" onclick="window.location.href='../views/Home.php'">
    </div>
</body>


</html>
