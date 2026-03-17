
<?php
// Define the score variable
$score = 80;

// Grade logic
if ($score >= 80 && $score <= 100) {
    echo "Student got a grade of A.";
} elseif ($score >= 70 && $score < 80) {
    echo "Student got a grade of B.";
} elseif ($score >= 60 && $score < 70) {
    echo "Student got a grade of C.";
} elseif ($score >= 50 && $score < 60) {
    echo "Student got a grade of D.";
} elseif ($score >= 0 && $score < 50) {
    echo "Student got a grade of Fail.";
} else {
    echo "Invalid score.";
}
?>