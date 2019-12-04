<?php

class Controller_Main extends Controller
{
    function action_index()
    {
        $this->view->generate('main_view.php', 'template_view.php',
            array(
                'title' => 'Главная страница',
                'is_photo_slider' => true,
                'is_slider' => true,
                'is_right_sidebar' => true
            )
        );
    }
}