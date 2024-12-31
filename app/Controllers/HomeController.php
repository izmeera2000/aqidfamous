<?php

class HomeController
{
    public function index()
    {
        // Include the view for the home page
        include APP_ROOT . '/app/Views/pages/home.php';
    }

    public function about()
    {
        // Include the view for the about page
        include APP_ROOT . '/app/Views/pages/about.php';
    }
}
