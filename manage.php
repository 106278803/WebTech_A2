<?php require_once 'settings.php'; ?>
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
        <option value="Status">Status</option>
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
        mysqli_stmt_bind_param($stmt, "s", $job_ref);
        my_sqli_stmt_execute($stmt);

        echo "<p>Deleted EOIs for Job Reference: ".htmlspecialchars($job_ref) ;
        echo "</p>";
    }

//UPDATE STATUS
if(isset($_POST["update_status"])){ 
    $eoi_number = $_POST["eoi_number"];

    $sql = "UPDATE eoi SET Status = ? WHERE EOINumber = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $status, $eoi_number);
    my_sqli_stmt_execute($stmt);

    echo "<p>EOI status updated succesfully.</p>";
}

//SEARCH and LIST
if(isset($_POST["search"]) || isset($_GET["list_all"]))
    $allowed_sort = [
            "EOInumber",
            "JobReferenceNumber",
            "FirstName",
            "LastName",
            "Status",
    ];

    $sort = $_GET["sort"] ?? "EOINumber";

    if (!in_array($sort, $allowed_sort)) {
        $sort = "EOINumber";
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
        
        if(!empty($_GET["last_name"])) {
            $sql .= " AND LastName LIKE     ?";
            $types .= "s";
            $params[] = "%" . $_GET["last_name"] . "%";
        }
    }

    $sql .= " ORDER BY $sort";
    $stmt = mysqli_prepare($conn, $sql);

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
            echo "<td>".htmlspecialchars($row["EOINumber"])."</td>";
            echo "<td>".htmlspecialchars($row["JobReferenceNumber"])."</td>";
            echo "<td>".htmlspecialchars($row["FirstName"])."</td>";
            echo "<td>".htmlspecialchars($row["LastName"])."</td>";
            echo "<td>".htmlspecialchars($row["Status"])."</td>";
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

