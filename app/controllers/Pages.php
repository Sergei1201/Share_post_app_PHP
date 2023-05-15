<?php
class Pages extends Controller
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $users = $this->userModel->getUsers();
        $data = [

            'Title' => 'Welcome',
            'Users' => $users


        ];
        $this->view('pages/index', $data);
    }
    public function about()
    {
        $data = ['Title' => 'About'];
        $this->view('pages/about', $data);
    }
}
