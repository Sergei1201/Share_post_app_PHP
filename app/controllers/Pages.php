<?php
class Pages extends Controller
{
    private $postModel;
    public function __construct()
    {
        $this->postModel = $this->model('Post');
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
