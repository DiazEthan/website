<?php
class Book {
    public $id;
    public $title;
    public $author;
    public $genre;
    public $year;

    public function __construct($id, $title, $author, $genre, $year) {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->genre = $genre;
        $this->year = $year;
    }
}
?>