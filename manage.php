<?php
require_once 'settings.php';

$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HR Manager Dashboard</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body class="admin-dashboard">

<h1>HR Manager Dashboard - Website Wellness EOIs</h1>

<hr>

<!-- ================= LIST / SEARCH EOIs ================= -->
<form method="get" action="manage.php">

    <h2>Search / List EOIs</h2>

    <label>Job Reference:</label>
    <input type="text" name="job_ref">

    <label>First Name:</label>
    <input type="text" name="first_name">

    <label>Last Name:</label>
    <input type="text" name="last_name">

    <label>Sort By:</label>
    <select name="sort">
        <option value="EOInumber">EOI Number</option>
        <option value="JobReferenceNumber">Job Reference</option>
        <option value="FirstName">First Name</option>
        <option value="LastName">Last Name</option>
        <option value="status">Status</option>
    </select>

    <button type="submit" name="search">Search EOIs</button>
    <button type="submit" name="list_all">List All EOIs</button>

</form>

<hr>

<!-- ================= DELETE EOIs ================= -->
<form method="post" action="manage.php">

    <h2>Delete EOIs by Job Reference</h2>

    <label>Job Reference:</label>
    <input type="text" name="delete_job_ref" required>

    <button type="submit" name="delete">Delete</button>

</form>

<hr>

<!-- ================= UPDATE STATUS ================= -->
<form method="post" action="manage.php">

    <h2>Change EOI Status</h2>

    <label>EOI Number:</label>
    <input type="number" name="eoi_number" required>

    <label>Status:</label>
    <select name="status">
        <option value="New">New</option>
        <option value="Current">Current</option>
        <option value="Final">Final</option>
    </select>

    <button type="submit" name="update_status">Update Status</button>

</form>

<hr>

<?php
//DELETE LOGIC
    if(isset($_POST["delete"])) {
        $job_ref = trim($_POST["delete_job_ref"]);

        $sql = "DELETE FROM eoi WHERE JobReferenceNumber = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $job_ref);
            mysqli_stmt_execute($stmt);
            $deleted_count = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);

            if ($deleted_count > 0) {
                echo "<p>Deleted " . $deleted_count . " EOI(s) for Job Reference: " . htmlspecialchars($job_ref) . "</p>";
            } else {
                echo "<p>No EOIs found for Job Reference: " . htmlspecialchars($job_ref) . "</p>";
            }
        } else {
            echo "<p>Delete failed: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
        }
    }

//UPDATE STATUS
if(isset($_POST["update_status"])){ 
    $eoi_number = (int) $_POST["eoi_number"];
    $status = $_POST["status"];
    $allowed_statuses = ["New", "Current", "Final"];

    if (!in_array($status, $allowed_statuses)) {
        echo "<p>Invalid status selected.</p>";
    } else {
        $sql = "UPDATE eoi SET status = ? WHERE EOInumber = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "si", $status, $eoi_number);
            mysqli_stmt_execute($stmt);
            $updated_count = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);

            if ($updated_count > 0) {
                echo "<p>EOI status updated successfully.</p>";
            } else {
                echo "<p>No status changed. Check that EOI Number " . htmlspecialchars((string) $eoi_number) . " exists and is not already set to " . htmlspecialchars($status) . ".</p>";
            }
        } else {
            echo "<p>Status update failed: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
        }
    }
}

//SEARCH and LIST
if(isset($_GET["search"]) || isset($_GET["list_all"])) {
    $allowed_sort = [
            "EOInumber",
            "JobReferenceNumber",
            "FirstName",
            "LastName",
            "status"
    ];

    $sort = $_GET["sort"] ?? "EOInumber";

    if (!in_array($sort, $allowed_sort)) {
        $sort = "EOInumber";
    }

    $sql = "SELECT * FROM eoi WHERE 1=1";
    $types = "";
    $params = [];

    if(isset($_GET["search"])) {
        if(!empty($_GET["job_ref"])) {
            $sql .= " AND JobReferenceNumber = ?";
            $types .= "s";
            $params[] =$_GET["job_ref"];
        }
        if(!empty($_GET["first_name"])) {
            $sql .= " AND FirstName LIKE ?";
            $types .= "s";
            $params[] = "%" . $_GET["first_name"] . "%";
        }
        
        if(!empty($_GET["last_name"])) {
            $sql .= " AND LastName LIKE ?";
            $types .= "s";
            $params[] = "%" . $_GET["last_name"] . "%";
        }
    }

    $sql .= " ORDER BY $sort";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        echo "<p>Search failed: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
        exit;
    }

    if(!empty($params)){
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    echo "<h2>EOI Results</h2>";

    if(mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>EOI Number</th><th>Job Reference</th><th>First Name</th><th>Last Name</th><th>Status</th></tr>";

        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".htmlspecialchars($row["EOInumber"])."</td>";
            echo "<td>".htmlspecialchars($row["JobReferenceNumber"])."</td>";
            echo "<td>".htmlspecialchars($row["FirstName"])."</td>";
            echo "<td>".htmlspecialchars($row["LastName"])."</td>";
            echo "<td>".htmlspecialchars($row["status"])."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No EOIs found.</p>";
    }
}
?>
</body>
</html>

