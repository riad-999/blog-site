<?php
// holder object for holding or storing data 
//fetched or generated by the models or the controlers
// for the view to use it
// and it is used for some utilities fucntions
class Template
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }
    public function load(string $url): void
    {
        global $Template, $ROOT_PATH;
        include_once($url);
    }
    public function redirect(string $url): void
    {
        header("Location: $url");
        exit();
    }
    public function set_data(string $key, $value): void
    {
        $this->data[$key] = $value;
    }
    public function get_data(string $key)
    {
        if (isset($this->data[$key]))
            return $this->data[$key];
        return NULL;
    }
    public function set_alert(string $alert_message, string $type = 'success'): void
    {
        $alert = [
            'type' => $type,
            'message' => $alert_message
        ];
        $_SESSION['alert'] = $alert;
    }
    public function get_alert(): ?array
    {
        if (isset($_SESSION['alert'])) {
            return $_SESSION['alert'];
        }
        return NULL;
    }
}