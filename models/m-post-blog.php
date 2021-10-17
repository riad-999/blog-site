<?php
class Post_blog
{
    private $Database;

    public function __construct(mysqli $db)
    {
        $this->Database = $db;
    }
    public function creat_blog($title, $article, $image): void
    {
        $query =
            'INSERT INTO blogs (title,image_name,article) VALUES (?,?,?)';
        if (!$insert_stmt = $this->Database->prepare($query)) {
            throw new Error('Error: status 500 unprepared stmt');
        }
        $insert_stmt->bind_param('sss', $title, $image, $article);
        if (!$insert_stmt->execute()) {
            throw new Error('Error: status 500 cannot execute');
        }
        $insert_stmt->close();
    }
}