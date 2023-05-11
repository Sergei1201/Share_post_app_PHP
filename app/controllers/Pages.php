<?php
class Pages extends Controller
{
    public function __construct()
    {
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
