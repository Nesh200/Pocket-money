<html>
<head>
    <title>Registration Form</title>
</head>
<body>
<link href = "registration.css" type = "text/css" rel = "stylesheet" />
<h2>Sign Up</h2>
<form name = "form1" action="modified.php" method = "post" enctype = "multipart/form-data" >
    <div class = "container">
        <div class = "form_group">
            <label>First Name:</label>
            <input type = "text" name = "fname" value = "" required/>
        </div>
        <div class = "form_group">
            <label>Middle Name:</label>
            <input type = "text" name = "mname" value = "" required />
        </div>
        <div class = "form_group">
            <label>Last Name:</label>
            <input type = "text" name = "lname" value = "" required/>
        </div>
        <div class = "form_group">
            <label>Email:</label>
            <input type = "email" name = "email" value = "" required/>
        </div>
        <div class = "form_group">
            <label>Phone no:</label>
            <input type="tel" name = "phone" value = "" required />
        </div>
        <div class = "form_group">
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>
        </div>
        <div class = "form_group">
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label>
        </div>
        <div class = "form_group">
            <label>Password:</label>
            <input type = "password" name = "pwd" value = "" required/>
        </div>
        <div class = "form_group">
            <label>Confirm Password:</label>
            <input type = "passwordc" name = "pwdc" value = "" required/>
        </div>
        <div class = "form_group">
            <input type="submit" value="Submit">
        </div>
    </div>
</form>
</body>
</html>
