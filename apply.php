<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Jobapplicationform">
    <meta name="keywords" content="">
    <meta name="author" content="SH">

    <link href="styles/style.css" rel="stylesheet">
    <link rel="icon" href="styles/cross.png">
    
    <title>Job Application Form</title>
</head>
<body>
<header>
        <div class="container center">
            <div><img src="styles/cross.png" alt="Our logo" id="logo"></div>
            <div>   
                <h1>
                    Welcome to Website Wellness! 
                </h1>
            </div> 
        </div>
        <br>

        <nav>
            <div class="navcontainer center">
                <div><a href="index.html"> Home Page</a></div>
                <div><a href="about.html"> About Page</a></div>
                <div><a href="jobs.html"> Jobs Page</a></div>
                <div><a href="apply.html"> Apply Page</a></div>
            </div>
        </nav>
    </header><br>
<main class="center">
<div class="form-container">
   <h1>Job Application Form</h1> 
   <form action="https://mercury.swin.edu.au/it000000/formtest.php" method="post">
    <fieldset>        
        <label for="JobReferenceNumber">Job Reference Number</label><br>
        <input type="text" id="JobReferenceNumber" name="JobReferenceNumber"
        pattern="[a-zA-Z0-9]{5}" required> 
        <br><br>

        <label for="FirstName">First Name</label><br>
        <input type="text" id="FirstName" name="FirstName"
        pattern="[A-Za-z\s]{1,20}" required> 
        <br><br>

        <label for="LastName">Last Name</label><br>
        <input type="text" id="LastName" name="LastName" 
        pattern="[A-Za-z\s]{1,20}" required>
        <br><br>

        <label for="date">Date of birth</label><br>
        <input type="date" name="date" id="date" required>
        <br><br>

        <fieldset>
            <legend>Gender</legend>
        <input type="radio" id="Male" name="Gender" value="Male">
        <label for="Male">Male</label>
        
        <br>
        <input type="radio" id="Female" name="Gender" value="Female">
        <label for="Female">Female</label>
        <br>

        <input type="radio" id="Other" name="Gender" value="Other">
        <label for="Other">Other</label>
        <br>

        <input type="radio" id="PreferNotToAnswer" name="gender" value="PreferNotToAnswer">
        <label for="PreferNotToAnswer">Prefer Not To Answer</label>            
        </fieldset>

        <br><br>

        <label for="StreetAddress">Street Address</label><br>
        <input type="text" id="StreetAddress" name="StreetAddress" 
        pattern="[A-Za-z\s\-]{1,40}" required>
        <br><br>

        <label for="Suburb/Town">Suburb/Town</label><br>
        <input type="text" id="Suburb/Town" name="Suburb/Town" 
        pattern="[A-Za-z\s\-]{1,40}" required>
        <br><br>

        <label for="State">State</label><br>
        <select id="State" name="State">
            <option value="Select any one"> Please Select</option>
            <option value="VIC">VIC</option>
            <option value="NSW">NSW</option>
            <option value="QLD">QLD</option>
            <option value="NT">NT</option>
            <option value="WA">WA</option>
            <option value="SA">SA</option>
            <option value="TAS">TAS</option>
            <option value="ACT">ACT</option>
        </select>
        <br><br>

        <label for="Postcode">Postcode</label><br>
        <input type="text" id="Postcode" name="Postcode"
        pattern="\d{4}" required>
        <br><br>

        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" required>
        <br><br>

        <label for="PhoneNumber">Phone Number</label><br>
        <input type="text" id="PhoneNumber" name="PhoneNumber"
        pattern="\d{8,12}" required>
        <br><br>

        <label for="Skills">Skill list</label><br>
        <input type="checkbox" name="Project Management"> Project Management <br>
        <input type="checkbox" name="Digital Marketing"> Digital Marketing <br>
        <input type="checkbox" name="Data Management"> Data Management <br>
        <input type="checkbox" name="Communication Skills"> Communication Skills
        <br><br>

        <label for="Skills">Other Skills</label><br>
        <textarea name="Skills" id="Skills" rows="5" cols="40"
            placeholder="Enter any other applicable skills here"></textarea>
    </fieldset>
     <br><br>
     <input type="submit" value="Apply">
   </form>
</div>
</main>
<footer>
        <div class="footercontainer">
            <div><a href="https://github.com/106278803/WebTech_A1" target="_blank">GitHub Link</a></div>
            <div><a href="https://webtechthree.atlassian.net/jira/software/projects/WTA/summary?atlOrigin=eyJpIjoiMjNmNjIyY2NjZDc1NDRlZDhhMTFiNjBiYzk4MWRmNGYiLCJwIjoiaiJ9" target="_blank">Jira Board</a></div>
            <div><a href="mailto:106278803@student.swin.edu.au">Email</a></div>
        </div>
    </footer>
</body>