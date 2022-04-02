<?php
include_once './init.php';
auth();
// if (isset($_GET['go-back'])) $_SESSION['preview'] = true;
$Template->set_data('form-title', trim($_SESSION['article']['title']));
$Template->set_data('form-markdown', trim($_SESSION['article']['content']));

// if (isset($_POST['preview']) || isset($_POST['update'])) {
if (isset($_POST['update'])) {
    // handle inputs
    $article_title = htmlentities($_POST['title'], ENT_QUOTES);
    $markdown = htmlentities($_POST['markdown'], ENT_QUOTES);
    $Template->set_data('form-title', $article_title);
    $Template->set_data('form-markdown', $markdown);
    // handle the image
    $image_name = '';
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $allowed_extentions = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
        $file = $_FILES['image'];
        $file_extention = explode('.', $file['name']);
        $file_extention = strtolower(end($file_extention));
        if (!in_array($file_extention, $allowed_extentions)) {
            $Template->set_alert("images of type .$file_extention aren't acceptable", 'error');
            $Template->load($ROOT_PATH . '/views/pages/v-admin-update-ui.php');
            exit();
        }
        if (!$file['error'] === 1) {
            $Template->set_alert("Error: something went wrong", 'error');
            $Template->load($ROOT_PATH . '/views/pages/v-admin-update-ui.php');
            exit();
        }
        if (!$file['size'] > 15000000) {
            // if image size if bigger than 15MB
            $Template->set_alert("image size is to large, try to resize it down or compress it", 'error');
            $Template->load($ROOT_PATH . '/views/pages/v-admin-update-ui.php');
            exit();
        }
        $image_name = uniqid('', true) . '.' . $file_extention;
        $image_destination = $ROOT_PATH . '/views/images/uploads/' . $image_name;


        if ($_SESSION['article']['image-name'] !== 'default.jpg') {
            if (!unlink($ROOT_PATH . '/views/images/uploads/' . $_SESSION['article']['image-name'])) {
                $_SESSION['error-message'] = "something went wrong with the uploaded image";
                $Template->redirect(SITE_PATH . '/error.php');
            }
        }
        move_uploaded_file($file['tmp_name'], $image_destination);
    }
    try {
        $Post_articles->update_article(
            $_SESSION['article']['id'],
            $_POST['title'],
            $_POST['markdown'],
            $image_name
        );
    } catch (Throwable $error) {
        // redirect to error page
        $_SESSION['error-message'] = $error->getMessage();
        $Template->redirect(SITE_PATH . '/error.php');
    }
    $Template->set_alert('article updated');
    unset($_SESSION['article']);

    $Template->redirect(SITE_PATH . '/index.php');
    exit();
}

$Template->load($ROOT_PATH . '/views/pages/v-admin-update-ui.php');
// unset($_SESSION['preview']);
// unset($_SESSION['p-title']);
// unset($_SESSION['p-markdown']);