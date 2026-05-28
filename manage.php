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



