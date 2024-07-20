<?php
include('../connection.php');

// Fetch all employees
$employees = $dbcon->query("SELECT employee_id FROM employee");
if ($employees->num_rows > 0) {
    while ($employee = $employees->fetch_assoc()) {
        $employee_id = $employee['employee_id'];

        // Calculate total leave days taken by this employee
        $leave_requests = $dbcon->query("SELECT date_from, date_to FROM employee_leave WHERE employee_id = '$employee_id' AND leave_status = 'Approved'");
        $total_leave_days_taken = 0;

        if ($leave_requests->num_rows > 0) {
            while ($leave = $leave_requests->fetch_assoc()) {
                $date_from = strtotime($leave['date_from']);
                $date_to = strtotime($leave['date_to']);

                while ($date_from <= $date_to) {
                    $currentDateFormatted = date('Y-m-d', $date_from);
                    if (!isWeekend($currentDateFormatted) && !isHoliday($currentDateFormatted)) {
                        $total_leave_days_taken++;
                    }
                    $date_from = strtotime('+1 day', $date_from);
                }
            }
        }

        // Calculate remaining leave days
        $initial_leave_days = 30;
        $remaining_leave_days = $initial_leave_days - $total_leave_days_taken;

        // Insert or update the leave_balance table
        $stmt = $dbcon->prepare("INSERT INTO leave_balance (employee_id, total_leave_days) VALUES (?, ?) ON DUPLICATE KEY UPDATE total_leave_days = ?");
        if ($stmt) {
            $stmt->bind_param("iii", $employee_id, $remaining_leave_days, $remaining_leave_days);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $dbcon->error;
        }
    }
} else {
    echo "No employees found.";
}

// Function to check if a date is a weekend
function isWeekend($date)
{
    $day = date('w', strtotime($date));
    return ($day == 0 || $day == 6);
}

// Array of holidays (in YYYY-MM-DD format)
$holidays = [
    "2024-01-01", // New Year's Day
    "2024-01-07", // Constitution Day
    "2024-03-06", // Independence Day
    "2024-03-29", // Good Friday
    "2024-04-01", // Easter Monday
    "2024-05-01", // May Day (Workers' Day)
    "2024-08-04", // Founders’ Day
    "2024-09-21", // Kwame Nkrumah Memorial Day
    "2024-12-06", // Farmer’s Day
    "2024-12-25", // Christmas Day
    "2024-12-26", // Boxing Day
    // Add more holidays if needed
];

// Function to check if a date is a holiday
function isHoliday($date)
{
    global $holidays;
    return in_array($date, $holidays);
}

echo "Initial setup completed.";
