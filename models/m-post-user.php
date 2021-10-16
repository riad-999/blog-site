<?php
class Post_users
{
    private $database;
    private $table;

    public function __construct(mysqli $database)
    {
        $this->database = $database;
    }
    public function get_user_by_email(string $email): ?array
    {
        $database = $this->database;
        $query =
            "SELECT * FROM users WHERE email = ? ;";
        if (!$select_stmt = $database->prepare($query)) {
            throw new Error("Error: status 500");
        }
        $select_stmt->bind_param('s', $email);
        if (!$select_stmt->execute()) {
            throw new Error("Error: status 500");
        }
        $select_stmt->store_result();
        if ($select_stmt->num_rows == 0) {
            return NULL;
        }
        $select_stmt->bind_result(
            $id,
            $username,
            $email,
            $password,
            $activation_hash,
            $pass_hash,
            $active,
            $notify,
            $admin
        );
        $select_stmt->fetch();
        $select_stmt->close();
        return [
            'id' => $id,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'activation_hash' => $activation_hash,
            'pass-hash' => $pass_hash,
            'active' => $active,
            'notify' => $notify,
            'admin' => $admin
        ];
    }
    public function register(string $username, string $email, string $password, bool $notify): bool
    {
        global $Mail;
        $table = $this->table;
        if ($this->get_user_by_email($email)) {
            // if the the result is not NULL then 
            // the email is already in use
            return FALSE;
        }
        // generating random hash for acount activation
        $activation_hash = md5(rand(0, 10000));
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $notify = $notify ? 1 : 0;
        $query =
            "INSERT INTO users 
        (username,email,user_pass,activation_hash,notify) 
        VALUES (?,?,?,?,?) ;";
        if (!$insert_stmt = $this->database->prepare($query)) {
            throw new Error("Error: status 500");
        }
        $insert_stmt->bind_param(
            "ssssi",
            $username,
            $email,
            $hashed_password,
            $activation_hash,
            $notify
        );
        if (!$insert_stmt->execute()) {
            throw new Error("Error: status 500");
        }
        $insert_stmt->close();
        // mail the user for the account acivation
        $path = SITE_PATH . "confirm-email.php?email=$email&hash=$activation_hash";
        $body = [
            'text-body' => "hey thanks for sining in . one more step 
            to complete the process, just click on the confiramtion link
            here : $path",
            'html-body' => "<div>
                hey thanks for sining in . one more step 
            to complete the process, just click on the confiramtion link
            here : <a href='$path'>click here</a>
            </div>"
        ];
        $Mail->mail([$email], $body, 'email confirmation');
        return TRUE;
    }
    public function confirm_account(string $email, string $hash): bool
    {
        $user = $this->get_user_by_email($email);
        if ($user['active'] !== '1') {
            if ($hash === $user['activation_hash']) {
                // activate the account     
                $query =
                    "UPDATE users SET active = ?, activation_hash = ? WHERE email = ?";
                if (!$update_stmt = $this->database->prepare($query)) {
                    throw new Error("Error: status 500");
                }
                $active = 1;
                $null_hash = NULL;
                $update_stmt->bind_param('iis', $active, $null_hash, $email);
                if (!$update_stmt->execute()) {
                    throw new Error("Error: status 500");
                }
                $update_stmt->close();
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return TRUE;
        }
    }
}