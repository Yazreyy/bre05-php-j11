<?php

require_once 'Category.php';

class Post {
    private ?int $Id = null;
    private DateTime $createdAt;
    private array $categories = [];
    
    public function __construct(private string $title, private string $excerpt, private string $content,
    private int $author, )
    {
     $this->createdAt = new DateTime();
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

    public function getExcerpt() : string {
        return $this->excerpt;
    }
    public function setExcerpt(string $excerpt) : void {
        $this->excerpt = $excerpt;
    }
    
    public function getContent() : string {
        return $this->content;
    }
    public function setContent(string $content) : void {
        $this->content = $content;
    }

    public function getAuthor() : int {
        return $this->author;
    }
    public function setAuthor(string $author) : void {
        $this->author = $author;
    }

    public function getCreatedAt(): DateTime {
        return $this->createdAt;
    }
    public function setCreatedAt(DateTime $date): void {
        $this->createdAt = $date;
    }
    
    public function getCategories() : array {
        return $this->categories;
    }
    public function setCategories(array $categories) : void {
        $this->categories = $categories;
    }

    public function addCategory(Category $category) : void{
        $ici = false;
        foreach($this->categories as $currentCategory){
            if($currentCategory === $category) {
                $ici = true;
            }
        }
        if($ici === false){
            $this->categories[] = $category;
        }
    }
    public function removeCategory(Category $category) : void{
        foreach($this->categories as $key=>$currentcategory){
            if($currentcategory === $category) {
                unset($this->categories[$key]);
                $this->categories = array_values($this->categories);
            }
        }
    }
}