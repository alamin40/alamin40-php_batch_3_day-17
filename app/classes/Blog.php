<?php
namespace App\classes;
class Blog
{

    protected $title;
    protected $authorName;
    protected $description;
    protected $image;
    protected $imageName;
    protected $directory;
    protected $fileName;
    protected $file;
    protected $data;


    public function __construct($post = null)
    {
//        echo '<pre>';
//        print_r($_POST);
//        print_r($_FILES);

        $this->title        = $post['title'];
        $this->authorName   = $post['author_name'];
        $this->description  = $post['description'];
    }

    public function index()
    {
        $this->fileName = 'db.txt';
        $this->file = fopen('db.txt','a');
        $this->data = "$this->title, $this->authorName, $this->description";
        fwrite($this->file, $this->data);
        fclose($this->file);
    }

    protected function imageUpload()
    {
        $this->imageName = $_FILES['image']['name'];
        $this->directory = 'assets/img/upload/'.$this->imageName;
        move_uploaded_file($_FILES['image']['tmp_name'], $this->directory);
    }

}