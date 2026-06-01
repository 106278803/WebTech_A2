<?php
require_once("settings.php"); 
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['job'])) {
    $searchTerm = mysqli_real_escape_string($conn, $_GET['job']);
    $sql = "SELECT * FROM `job positions` WHERE `job title` LIKE '%$searchTerm%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr>
                <th>Ref #</th>
                <th>Job Title</th>
                <th>Description</th>
                <th>Salary</th>
                <th>Reports To</th>
            </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['reference number']) . "</td>";
            echo "<td>" . htmlspecialchars($row['job title']) . "</td>";
            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
            echo "<td>" . htmlspecialchars($row['salary']) . "</td>";
            echo "<td>" . htmlspecialchars($row['reports to']) . "</td>";
            echo "<td>" . nl2br(htmlspecialchars($row['key responsibilities'])) . "</td>";
            echo "<td>" . nl2br(htmlspecialchars($row['essential requirements'])) . "</td>";
            echo "<td>" . nl2br(htmlspecialchars($row['preferable requirements'])) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No matching job positions found for: " . htmlspecialchars($searchTerm);
    }
} else {
    echo "Please enter a job title to search.";
}

mysqli_close($conn);
?>