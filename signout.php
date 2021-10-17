<?php
include './init.php';
unset($_SESSION['is-auth']);
unset($_SESSION['user']);
$Template->set_alert('loged out');
header("Location: ./");