<?php  

class Book extends Controller{

    public function __construct()
    {
        $this->bookModel = $this->model('Book_model');
    }

    public function index()
    {
        $books = $this->bookModel->getAllBooks();

        $data = [
            'title' => 'Book Store',
            'books' => $books
        ];

        $this->view('book/index', $data);
    }

    public function detail($id)
    {
        $book = $this->bookModel->getBookById($id);
        if (!$book){
            header('Location: ' . BASEURL . '/book');
        } else{

            $data = [
                'title' => 'Detail',
                'book' => $book
            ];

            $this->view('book/detail', $data);
        }
    }

    public function get($id){
        $book = $this->bookModel->getBookById($id);
        return $book;
    }

}