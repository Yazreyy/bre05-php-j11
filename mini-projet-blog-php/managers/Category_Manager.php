<?php

class CategoryManager extends AbstractManager {
    
public function __construct()
{
    return parent::__construct();
}

public function findAll(): array
    {
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();
        $categoriesData = $query->fetchAll(PDO::FETCH_ASSOC);

        $categories = [];

        foreach ($categoriesData as $data) {
            $category = new Category(
                $data['title'],
                $data['description']
                
            );
            $category->setId($data['id']);
            $categories[] = $category;
        }
        return $categories;
    }
    
 public function findOne(int $id): ?Category
    {
        $query = $this->db->prepare('SELECT * FROM categories WHERE id  = :id');
        $query->execute(['id' => $id]);
        $cat = $query->fetch(PDO::FETCH_ASSOC);

        if ($cat) {
            $category = new Category(
                $cat['title'],
                $cat['description']
               
            );
            $category->setId($cat['id']);
            return $category;
        }
        return null;
    }

     public function create(Category $category): void
    {
        $query = $this->db->prepare('insert INTO categories(title, description) VALUES (:title, :description)');
        $query->execute([
            'title' => $category->getTitle(),
            'description' => $category->getDescription()
            
        ]);
        $id = $this->db->lastInsertId();
        $category->setId($id);
        }

    public function update(Category $category) : void {
        $query = $this->db->prepare('UPDATE categories SET title = :title, description = :description  WHERE id= :id ');
        $query->execute([
            'title' => $category->getTitle(),
            'description' => $category->getDescription(),
            'id' => $category->getId()
        ]);
    }

    public function delete(int $id) : void {
        $query = $this->db->prepare('DELETE FROM categories WHERE id = :id');
        $query->execute(['id' => $id]);
        
    }
    


}