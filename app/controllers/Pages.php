<?php
class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [

            'Title' => 'Shared Posts',
            'Description' => 'A basic social media app created with a custom PHP framework'


        ];
        $this->view('pages/index', $data);
    }
    public function about()
    {
        $data = [
            'Title' => 'About',
            'Description' => 'This application was created to share posts with the help of this custom PHP framework'
        ];
        $this->view('pages/about', $data);
    }
}
