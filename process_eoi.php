<?php
require_once("settings.php");

// cleans user input before using it
function clean($v) {
    return htmlspecialchars(stripslashes(trim($v)));
}

// gets a post value if it exists
function post($name) {
    return isset($_POST[$name]) ? clean($_POST[$name]) : "";
}

// stops people opening this page directly
if ($_SERVER["REQUEST_METHOD"] != "POST" || !isset($_POST["JobReferenceNumber"])) {
    header("Location: apply.html");
    exit();
}

// gets form values
$job = post("JobReferenceNumber");
$first = post("FirstName");
$last = post("LastName");
$dob = post("date");
$gender = post("Gender") ?: post("gender");
$street = post("StreetAddress");
$suburb = post("Suburb/Town");
$state = post("State");
$postcode = post("Postcode");
$email = post("email");
$phone = post("PhoneNumber");
$skills = post("Skills");

// checks which skills were selected
$pm = isset($_POST["Project_Management"]) || isset($_POST["Project Management"]) ? "Yes" : "No";
$dm = isset($_POST["Digital_Marketing"]) || isset($_POST["Digital Marketing"]) ? "Yes" : "No";
$data = isset($_POST["Data_Management"]) || isset($_POST["Data Management"]) ? "Yes" : "No";
$comm = isset($_POST["Communication_Skills"]) || isset($_POST["Communication Skills"]) ? "Yes" : "No";

// connects to the database
$conn = mysqli_connect($host, $user, $pwd, $sql_db) or die("database connection failed.");

// escapes data before putting it into sql
foreach (["job","first","last","dob","gender","street","suburb","state","postcode","email","phone","skills"] as $v) {
    $$v = mysqli_real_escape_string($conn, $$v);
}

// creates the eoi table because it doesn't exist yet
$table = "CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    JobReferenceNumber VARCHAR(5),
    FirstName VARCHAR(20),
    LastName VARCHAR(20),
    date VARCHAR(10),
    Gender VARCHAR(20),
    StreetAddress VARCHAR(40),
    SuburbTown VARCHAR(40),
    State VARCHAR(3),
    Postcode VARCHAR(4),
    email VARCHAR(100),
    PhoneNumber VARCHAR(12),
    Project_Management VARCHAR(3),
    Digital_Marketing VARCHAR(3),
    Data_Management VARCHAR(3),
    Communication_Skills VARCHAR(3),
    Skills TEXT,
    status ENUM('New','Current','Final') NOT NULL DEFAULT 'New'
)";

mysqli_query($conn, $table) or die("table creation failed: " . mysqli_error($conn));

// inserts the valid form record into the eoi table database
$sql = "INSERT INTO eoi (
    JobReferenceNumber, FirstName, LastName, date, Gender, StreetAddress,
    SuburbTown, State, Postcode, email, PhoneNumber, Project_Management,
    Digital_Marketing, Data_Management, Communication_Skills, Skills
) VALUES (
    '$job', '$first', '$last', '$dob', '$gender', '$street',
    '$suburb', '$state', '$postcode', '$email', '$phone',
    '$pm', '$dm', '$data', '$comm', '$skills'
)";

// shows the auto generated eoi number after saving
if (mysqli_query($conn, $sql)) {
    echo "<h1>Application submitted successfully</h1>";
    echo "<p>Your EOI number is: <strong>" . mysqli_insert_id($conn) . "</strong></p>";
    echo "<p>Status: New</p>";
} else {
    echo "<p>error: " . mysqli_error($conn) . "</p>";
}

mysqli_close($conn);
?>