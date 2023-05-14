<?php
class Pages extends Controller
{
    private $modelPost;
    public function __construct()
    {
        $this->modelPost = $this->model('Post');
    }
    public function index()
    {
        $data = ['Title' => 'Welcome'];
        $this->view('pages/index', $data);
    }
    public function about()
    {
        $data = ['Title' => 'About'];
        $this->view('pages/about', $data);
    }
}
