<?php 

namespace Controllers;
use stdClass;
use Models\Author;
use Models\Category;
use Models\Post;
use Models\Session;

class SessionController
{
    public function __construct(
        public readonly Session $Session_model = new Session(),
        public readonly Post $post_model = new Post(),
        public readonly Author $author_model = new Author(),
        public readonly Category $category_model = new Category())
    {
    }
    public function get(){

    }   
    public function create(){
        
        
        
        $authors = $this->author_model->get();
        $categories = $this->category_model->get();
        $most_recent_post = $this->post_model->latest();
        
        $view_data = new stdClass();
        $view_data->name = 'log.php';
        
        $view_data->data = compact('authors', 'categories', 'most_recent_post');
        return $view_data;
    } 
    public function store(){
        
        $mail = htmlspecialchars($_REQUEST['email']);
        $pass = htmlspecialChars($_REQUEST['password']);
        $Session = $this->Session_model->get($mail, $pass);
        
        header('Location: index.php');
    }
    public function destroy(){

    }
}
