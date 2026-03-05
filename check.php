<?php
// This is the standard check.php file for wa4e PHP assignments
// Do NOT alter this file

$checks = 0;
$good = 0;

function check($label, $test) {
    global $checks, $good;
    $checks++;
    if ( $test ) {
        $good++;
        echo('<p style="color: green;">OK '.$label.'</p>'."\n");
    } else {
        echo('<p style="color: red;">FAIL '.$label.'</p>'."\n");
    }
}

?>
<html>
<head>
<title>WA4E PHP Assignment Check</title>
</head>
<body>
<h1>Checking Your PHP Assignment</h1>
<?php

check("PHP is running", true);
check("SHA256 is available", function_exists('hash'));

$sha = hash('sha256', 'Hello World');
check("SHA256 produces correct output", strlen($sha) == 64);

?>
<h2>Summary</h2>
<p>
<?php
echo($good . ' of ' . $checks . ' checks passed.');
if ( $good == $checks ) {
    echo(' <b style="color:green;">All checks passed!</b>');
} else {
    echo(' <b style="color:red;">Some checks failed.</b>');
}
?>
</p>
<p>This check file was provided by <a href="http://www.wa4e.com" target="_blank">www.wa4e.com</a></p>
</body>
</html>
