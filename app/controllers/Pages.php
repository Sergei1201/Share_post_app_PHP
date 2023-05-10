<?php
class Pages
{
    public function __construct()
    {
        echo 'Pages constructor ran...';
    }
    public function about($id)
    {
        echo $id;
    }
}
