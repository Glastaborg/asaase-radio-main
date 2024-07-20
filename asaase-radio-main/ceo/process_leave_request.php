<?php
session_start();
include('../connection.php');
include('includes/auth.php');

if (isset($_GET['leave_id']) && isset($_GET['action'])) {
    $leave_id = $_GET['leave_id'];
    $action = $_GET['action'];

    // Fetch leave request details
    $leave_query = "SELECT days_requested, employee_id FROM employee_leave WHERE leave_id = '$leave_id'";
    $leave_result = mysqli_query($dbcon, $leave_query);
    $leave_data = mysqli_fetch_assoc($leave_result);

    if ($leave_data) {
        $days_requested = $leave_data['days_requested'];
        $employee_id = $leave_data['employee_id'];

        if ($action == 'approve') {
            $leave_status = 'Granted';

            // Update the employee's remaining leave days
            $employee_query = "UPDATE employee SET remaining_leave_days = remaining_leave_days - $days_requested WHERE employee_id = '$employee_id'";
            mysqli_query($dbcon, $employee_query);
        } else if ($action == 'reject') {
            $leave_status = 'Rejected';
        }

        // Update the leave request status
        $update_query = "UPDATE employee_leave SET leave_status = '$leave_status' WHERE leave_id = '$leave_id'";
        if (mysqli_query($dbcon, $update_query)) {
            echo "<script>alert('Leave request has been $leave_status.'); window.location.href='employeeleave.php';</script>";
        } else {
            $error_message = mysqli_error($dbcon);
            echo "<script>alert('Error: $error_message'); window.location.href='employeeleave.php';</script>";
        }
    } else {
        echo "<script>alert('Error: Invalid leave request.'); window.location.href='employeeleave.php';</script>";
    }
} else {
    echo "<script>alert('Error: Invalid parameters.'); window.location.href='employeeleave.php';</script>";
}
