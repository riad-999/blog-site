<?php
$Database;
try {
    $Database = new mysqli(HOST_NAME, DB_USER, DB_PASS, DB_NAME);
    mysqli_report(MYSQLI_REPORT_STRICT);
} catch (Throwable $error) {
    //redirect to error page 
    exit();
}