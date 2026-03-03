<?php

class PostManager extends AbstractManager
{

    public function __construct()
    {
        return parent::__construct();
    }

    public function findAll(): array
    {
        $query = $this->db->prepare('SELECT * FROM posts');
        $query->execute();
        $postsData = $query->fetchAll(PDO::FETCH_ASSOC);

        $posts = [];

        foreach ($postsData as $data) {
            $post = new Post(
                $data['title'],
                $data['excerpt'],
                $data['content'],
                $data['author']
            );
            $post->setId($data['id']);
            $posts[] = $post;
        }

        return $posts;
    }

    public function findOne(int $id): ?Post
    {
        $query = $this->db->prepare('SELECT * FROM posts WHERE id  = :id');
        $query->execute(['id' => $id]);
        $postData = $query->fetch(PDO::FETCH_ASSOC);

        if ($postData) {
            $post = new Post(
                $postData['title'],
                $postData['excerpt'],
                $postData['content'],
                $postData['author']

            );
            $post->setId($postData['id']);
            return $post;
        }
        return null;
    }

    public function create(Post $post): void
    {
        $query = $this->db->prepare('insert INTO posts(title, excerpt,content,author) VALUES (:title, :excerpt,:content,:author)');
        $query->execute([
            'title' => $post->getTitle(),
            'excerpt' => $post->getExcerpt(),
            'content' => $post->getContent(),
            'author' => $post->getAuthor()
            
        ]);
        $id = $this->db->lastInsertId();
        $post->setId($id);
        }

        public function update(Post $post) : void {
        $query = $this->db->prepare('UPDATE posts SET title = :title, excerpt = :excerpt, content = :content, author = :author  WHERE id= :id ');
        $query->execute([
            'title' => $post->getTitle(),
            'excerpt' => $post->getExcerpt(),
            'content' => $post->getContent(),
            'author' => $post->getAuthor(),
            'id' => $post->getId()
        ]);
    }

     public function delete(int $id) : void {
        $query = $this->db->prepare('DELETE FROM posts WHERE id = :id');
        $query->execute(['id' => $id]);
        
    }

}
