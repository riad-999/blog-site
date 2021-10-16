<?php
include './init.php';
unset($_SESSION['is-auth']);
$Template->set_alert('loged out');
header("Location: ./");