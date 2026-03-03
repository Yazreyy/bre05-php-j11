<?php

class Category {

private ?int $Id = null;
private array $posts = [];
    public function __construct(private string $title, private string $description)
    {
    
    }

    public function getId() : ?int {
        return $this->Id;
    }
    public function setid(int $Id) : void {
        $this->Id = $Id;
    }
    
    public function getTitle() : string {
        return $this->title;
    }
    public function setTitle(string $title) : void {
        $this->title = $title;
    }

    public function getDescription() : string {
        return $this->description;
    }
    public function setEmail(string $description) : void {
        $this->description = $description;
    }

    public function addPost(Post $post) {
        $ici = false;
        foreach($this->posts as $currentPost){
            if($currentPost === $post) {
                $ici = true;
            }
        }
        if($ici === false){
            $this->posts[] = $post;
        }
    }
    
    public function removePost(Post $post) {
        foreach($this->posts as $key=>$currentPost){
            if($currentPost === $post) {
                unset($this->posts[$key]);
                $this->posts = array_values($this->posts);
            }
        }
    }
}
?>