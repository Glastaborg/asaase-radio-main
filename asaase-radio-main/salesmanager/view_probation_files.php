<?php
session_start();
include('../connection.php');
include('includes/auth.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- Meta tags, title, CSS, and JavaScript includes -->
    <!-- CSS Links-->
    <?php include("../includes/includes_css.php"); ?>
    <!-- Js Scripts-->
    <?php include("../includes/includes_js.php"); ?>
</head>

<body class="has-background-light">
    <div class="columns">
        <?php include('includes/sidebar.php'); ?>
        <div class="column is-10 has-background-light" id="main">
            <?php include('includes/navbar.php'); ?>
            <!-- Breadcrumb navigation -->
            <!-- Main content -->
            <div class="columns is-multiline has-background-white mx-1 mb-3 p-3">
                <div class="column is-full" style="border-bottom: 1px solid #c7c7c7;">
                    <h1 class="title is-size-5">View Probation Files</h1>
                </div>
                <div class="column is-full">
                    <table class="table is-fullwidth">
                        <thead>
                            <tr>
                                <th>Employee Name</th>
                                <th>Probation File</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Retrieve probation files from the database
                            $query = "SELECT employee_id, firstname, lastname, probation_file FROM employee";
                            $result = mysqli_query($dbcon, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$row['firstname']} {$row['lastname']}</td>";
                                echo "<td><a href='{$row['filename']}'>View/Download</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>