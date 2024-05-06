 <?php include("connection.php");
$id = $_GET['id'];

$query = "SELECT * FROM form WHERE id = '$id'";
  $data = mysqli_query($conn,$query);
  $result = mysqli_fetch_assoc($data);

?>
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
        <h2>Update Student Details</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="firstname" value ="<?php echo $result['fname']; ?>"name="firstname"  required>
            </div>
            <div class="form-group">
                <label for="last-name">Last Name:</label>
                <input type="text" id="lastname" value ="<?php echo $result['lname']; ?>" name="lastname" required>
            </div>
            <div class="form-group">
    <label for="course">Select Course:</label>
    <select id="course" name="course" required>
        <option value="">Select Course</option>
        <option value="Computer Science" <?php if($result['course'] == 'Computer Science') echo 'selected'; ?>>Computer Science</option>
        <option value="Web Development" <?php if($result['course'] == 'Web Development') echo 'selected'; ?>>Web Development</option>
        <option value="Data Science" <?php if($result['course'] == 'Data Science') echo 'selected'; ?>>Data Science</option>
        <option value="Network Security" <?php if($result['course'] == 'Network Security') echo 'selected'; ?>>Network Security</option>
        <option value="Artificial Intelligence" <?php if($result['course'] == 'Artificial Intelligence') echo 'selected'; ?>>Artificial Intelligence</option>
    </select>
</div>

            <!-- <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" value ="<?php echo $result['password']; ?>" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirmpassword" value ="<?php echo $result['cpassword']; ?>" name="confirmpassword" required>
            </div> -->
            <div class="form-group">
        <label>Gender:</label required>
        <div class="gender-options">
            <input type="radio" id="male" name="gender" value="male"
            <?php if($result['gender']=='male') { echo "checked"; }?>
            ><label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female"  <?php if($result['gender']=='female') { echo "checked"; }?>><label for="female">Female</label>
            <input type="radio" id="other" name="gender" value="other"    <?php if($result['gender']=='other') { echo "checked"; }?>><label for="other">Other</label>
        </div>
    </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" value ="<?php echo $result['email']; ?>" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" value ="<?php echo $result['phone']; ?>" name="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address"  name="address" required><?php echo $result['address']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="agree">
                <input type="checkbox" id="agree" name="agree" required>
               I agree to the terms and conditions</label>
            </div>
            <input type="submit" value="Update" class="btn" name="update">
        </form>
    </div>
</body>
</html>

<?php
include("connection.php");
if(isset($_POST['update'])) {
   
    $id      = $_GET['id']; 
    $fname   = $_POST['firstname'];
    $lname   = $_POST['lastname'];
    // $pwd     = $_POST['password'];
    // $cpwd    = $_POST['confirmpassword'];
    $gender  = $_POST['gender'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $address = $_POST['address'];

  
    $query = "UPDATE form 
              SET fname = '$fname', lname = '$lname', gender = '$gender', email = '$email', phone = '$phone', address = '$address' 
              WHERE id = '$id'";
    $data = mysqli_query($conn, $query);

    if($data) {

        echo "<script>alert('Record updated')</script>";
        ?>
        
        <meta http-equiv = "refresh" content = "0; url = http://localhost/CRUD/display.php" />
        <?php
    } else {
        echo "Failed to update record: " . mysqli_error($conn);
    }
} else {
    echo "Update button not clicked";
}
?>






