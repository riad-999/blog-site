<?php
include './init.php';
if (isset($_SESSION['is-auth']) && $_SESSION['is-auth'] === TRUE) {
    $Template->set_data('is-auth', TRUE);
}
include_once './views/pages/v-home.php';