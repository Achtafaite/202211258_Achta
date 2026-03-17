<?php
// 1. Create an array containing at least 10 students' marks
$student_marks = array(85, 42, 67, 30, 92, 48, 55, 78, 20, 60);

// 2. Initialize counters and variables
$total_marks = 0;
$passed_count = 0;
$failed_count = 0;
$total_students = count($student_marks);

echo "<h3>Student Results Analysis</h3>";
echo "<table border='1' cellpadding='5' style='border-collapse: collapse;'>
        <tr>
            <th>Student #</th>
            <th>Mark</th>
            <th>Status</th>
        </tr>";

// 3. Use a loop to analyze the marks
foreach ($student_marks as $index => $mark) {
    // Determine pass/fail (pass: 50 and above; fail: below 50)
    if ($mark >= 50) {
        $status = "Passed";
        $passed_count++;
    } else {
        $status = "Failed";
        $failed_count++;
    }
    
    // Accumulate total marks
    $total_marks += $mark;
    
    // Display individual results
    $student_num = $index + 1;
    echo "<tr>
            <td>Student $student_num</td>
            <td>$mark</td>
            <td>$status</td>
          </tr>";
}

echo "</table>";

// 4. Calculate Average
$average = $total_marks / $total_students;

// 5. Display Summary Results
echo "<h4>Summary Statistics</h4>";
echo "Total Marks: " . $total_marks . "<br>";
echo "Average Mark: " . $average . "<br>";
echo "Number of Students who Passed: " . $passed_count . "<br>";
echo "Number of Students who Failed: " . $failed_count . "<br>";
?>