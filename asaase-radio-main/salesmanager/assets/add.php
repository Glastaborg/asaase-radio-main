<?php
session_start();
include('../connection.php');
include('includes/auth.php');

// Define $sessunit if it should come from the session or other source
$sessunit = $_SESSION['unit'] ?? 'default_value'; // Replace 'default_value' with an appropriate fallback value

// Fetch form data
$employee_id = $_POST['employee_id'] ?? null;
$reason = $_POST['reason'] ?? null;
$date_start = $_POST['date_start'] ?? null;
$date_end = $_POST['date_end'] ?? null;

// Ensure all required fields are filled
if ($employee_id && $reason && $date_start && $date_end) {
   // Prepare the SQL statement
   $stmt = $conn->prepare("INSERT INTO emp_leaves (employee_id, reason, date_start, date_end, unit) VALUES (?, ?, ?, ?, ?)");
   $stmt->bind_param("issss", $employee_id, $reason, $date_start, $date_end, $sessunit);

   // Execute the statement
   if ($stmt->execute()) {
      echo "Leave request submitted successfully.";
   } else {
      echo "Error: " . $stmt->error;
   }

   // Close the statement
   $stmt->close();
} else {
   echo "All fields are required.";
}


