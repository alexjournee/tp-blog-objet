<?php

class PostTable
{
    protected $table = 'posts';
    private $db;

    public function __construct()
    {
        global $db;
        $this->db = $db;
    }

    public function get(int $id): Post
    {
        $sth = $this->db->prepare("SELECT * FROM {$this->table} WHERE id= ? ");
        $sth->execute(array($id));
        $res = $sth->fetch();
        $post = new Post();
        $post->setID($id);
        $post->setTitle($res['title']);
        $post->setContent($res['content']);
        return $post;
    }
    
    public function all(): array
    {
        $sth = $this->db->query("SELECT * FROM {$this->table}");
        return $sth->fetchAll();
    }

    public function create(Post $post): void
    {
        $sth = $this->db->prepare("INSERT INTO {$this->table} (title, content) VALUES (:title, :content)");
        $title=$post->getTitle();
        $content=$post->getContent();
        $sth->bindParam(':title', $title);
        $sth->bindParam(':content', $content);
        $result = $sth->execute();

        if (!$result) {
            throw new Exception("Error during creation of the table {$this->table}");
        }
    }

    public function update(Post $post): void
    {
        $id= $post->getID();
        $titre = $post->getTitle();
        $texte = $post->getContent();
        $sth = $this->db->prepare("UPDATE {$this->table}  SET title=:title , content=:content WHERE id=:id");
        $sth->bindParam(':title', $titre);
        $sth->bindParam(':content', $texte);
        $sth->bindParam(':id', $id);
        $result = $sth->execute();
    }

    public function delete(int $id): void
    {
        $sth = $this->db->prepare("DELETE FROM posts where id = ? ");
        $result = $sth->execute(array($id));
    }
}
