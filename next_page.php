
<?php
if(isset($_GET['success']) && $_GET['success'] == "true" && isset($_GET['course'])) {
    $course = $_GET['course'];
    echo "Registration successful for $course!";
} else {
    echo "Registration failed!";
}
?>
