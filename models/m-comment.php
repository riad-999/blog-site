<?php
class Comment
{
    private $Database;

    public function __construct(mysqli $db)
    {
        $this->Database = $db;
    }

    public function store(int $user, int $article, string $comment): void
    {
        $query = 'INSERT INTO comments (user_id,article_id,comment) VALUES (?,?,?)';
        if (!$insert_stmt = $this->Database->prepare($query)) {
            throw new Error('Error: status 500 cannot execute');
        }
        $insert_stmt->bind_param('iis', $user, $article, $comment);
        if (!$insert_stmt->execute()) {
            throw new Error('Error: status 500 cannot execute');
        }
        $insert_stmt->close();
    }

    public function index(int $article)
    {
        $query = 'SELECT comment,username FROM comments INNER JOIN users ON comments.user_id = users.user_id WHERE article_id = ? ;';
        if (!$select_stmt = $this->Database->prepare($query)) {
            throw new Error('Error: status 500 unprepared stmt');
        }
        $select_stmt->bind_param('i', $article);
        if (!$select_stmt->execute()) {
            throw new Error('Error: status 500 cannot execute');
        }
        $select_stmt->store_result();

        if ($select_stmt->num_rows > 0) {
            $select_stmt->bind_result($comment, $name);
            $comments = [];
            while ($row = $select_stmt->fetch()) {
                array_push($comments, [
                    'name' => $name,
                    'comment' => $comment
                ]);
            }
            $select_stmt->close();
            return $comments;
        } else {
            return [];
        }
    }
}