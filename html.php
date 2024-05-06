<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Course Registration Form</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="last-name">Last Name:</label>
                <input type="text" id="lastname" name="lastname" required>
            </div>
            <!-- <div class="form-group">
                <label for="PRNNo">PRN Number:</label>
                <input type="number" id="PRNNo" name="PRNNo" required>
            </div> -->
            <div class="form-group">
                <label>Gender:</label>
                <div class="gender-options">
                    <input type="radio" id="male" name="gender" value="male"><label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female"><label for="female">Female</label>
                    <input type="radio" id="other" name="gender" value="other"><label for="other">Other</label>
                </div>
            </div>
                  <div class="form-group">
                <label for="course">Select Course:</label>
                <select id="course" name="course" required>
                    <option value="">Select Course</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Data Science">Data Science</option>
                    <option value="Network Security">Network Security</option>
                    <option value="Artificial Intelligence">Artificial Intelligence</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required oninput="validateEmail()">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" required></textarea>
            </div>
            <div class="form-group">
                <label for="agree">
                    <input type="checkbox" id="agree" name="agree" required>
                    I agree to the terms and conditions
                </label>
            </div>
            <input type="submit" value="Register" class="btn" name="register">
        </form>
    </div>
</body>
</html>
<script>
        function validateEmail() {
            var emailInput = document.getElementById("email");
            var email = emailInput.value;
            var emailRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
            
            if (!emailRegex.test(email)) {
                emailInput.setCustomValidity("Please enter a valid email address");
            } else {
                emailInput.setCustomValidity("");
            }
        }
    </script>
<?php
include("connection.php");

if(isset($_POST['register'])) {
    $fname   = $_POST['firstname'];
    $lname   = $_POST['lastname'];
    $gender  = $_POST['gender'];
    $course = $_POST['course'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $address = $_POST['address'];

    if($fname !="" && $lname !="" && $gender !="" && $course !="" && $email !="" && $phone !="" && $address !="" ) {
 
        $check_query = "SELECT * FROM form WHERE email = '$email'";


        $check_result = mysqli_query($conn, $check_query);

        if(mysqli_num_rows($check_result) > 0) {
            echo "<script>alert('Email already exists. Please enter a different email.');</script>";
        } else {
        
            $query = "INSERT INTO form (fname, lname, gender, course, email, phone, address) 
                      VALUES ('$fname', '$lname', '$gender', '$course', '$email', '$phone', '$address')";

            $data = mysqli_query($conn, $query);

            if($data) {
                header("Location: next_page.php?success=true&course=" . urlencode($course));
                exit();
            } else {
                echo "Failed to insert data into database";
            }
        }
    } else {
        echo "Please fill the form";
    }
}
?>


