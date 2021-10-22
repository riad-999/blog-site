<?php
class Post_articles
{
    private $Database;

    public function __construct(mysqli $db)
    {
        $this->Database = $db;
    }
    public function creat_blog($title, $article, $image): void
    {
        $title = strtolower($title);
        $query =
            'INSERT INTO articles (title,image_name,article) VALUES (?,?,?)';
        if (!$insert_stmt = $this->Database->prepare($query)) {
            throw new Error('Error: status 500 unprepared stmt');
        }
        $insert_stmt->bind_param('sss', $title, $image, $article);
        if (!$insert_stmt->execute()) {
            throw new Error('Error: status 500 cannot execute');
        }
        $insert_stmt->close();
    }
    public function get_article(int $id = NULL): ?array
    {
        if ($id) {
            // get the corressponding article 
            $query =
                'SELECT * FROM articles WHERE id = ?';
            if (!$select_stmt = $this->Database->prepare($query)) {
                throw new Error('Error: status 500 unprepared stmt');
            }
            $select_stmt->bind_param('i', $id);
            if (!$select_stmt->execute()) {
                throw new Error('Error: status 500 cannot execute');
            }
            $select_stmt->store_result();
            if ($select_stmt->num_rows > 0) {
                $select_stmt->bind_result(
                    $id,
                    $title,
                    $image_name,
                    $content,
                    $date
                );
                $select_stmt->fetch();
                $article = [
                    'id' => $id,
                    'title' => $title,
                    'image-name' => $image_name,
                    'content' => $content,
                    'date' => explode(' ', $date)[0]
                ];
                $select_stmt->close();
                return $article;
            } else {
                return NULL;
            }
        } else {
            // id is NULL get the 6 most recent articles 
            $articles = array();
            $query =
                'SELECT * FROM articles ORDER BY date DESC LIMIT 6';
            if (!$result = $this->Database->query($query)) {
                throw new Error('Error: status 500 unprepared stmt');
            }
            if ($result->num_rows > 0) {
                while ($article = $result->fetch_assoc()) {
                    array_push($articles, $article);
                }
                return $articles;
            } else {
                return NULL;
            }
        }
    }
    public function get_articles_by_title(string $title): ?array
    {
        $title = strtolower($title);
        $articles = [];
        $query =
            'SELECT id,title,image_name,date FROM articles WHERE title LIKE ?;';
        if (!$select_stmt = $this->Database->prepare($query)) {
            throw new Error('Error: status 500 unprepared stmt');
        }
        $pattern = "$title%";
        $select_stmt->bind_param('s', $pattern);
        if (!$select_stmt->execute()) {
            throw new Error('Error: status 500 unprepared stmt');
        }
        $select_stmt->store_result();
        if ($select_stmt->num_rows > 0) {
            $select_stmt->bind_result($id, $title, $image, $date);
            while ($select_stmt->fetch()) {
                array_push($articles, [
                    'id' => $id,
                    'title' => $title,
                    'image_name' => $image,
                    'date' => $date
                ]);
            }
            return $articles;
        } else {
            return [];
        }
    }
}