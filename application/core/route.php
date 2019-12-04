<?php


class Route
{
    static function start()
    {
        // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'index';
        $params = null;

        $routes = explode('/', $_SERVER['REQUEST_URI']);
//        echo "<pre>";
//        var_dump($routes);
//        echo "</pre>";
//        die();

        // получаем имя контроллера
        if (!empty($routes[1])) {
            $controller_name = $routes[1]; // about
        }

        // получаем имя экшена
        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        if(!empty(array_slice($routes, 3))){
            $params = array_slice($routes, 3);
        }

        // добавляем префиксы
        $model_name = 'Model_' . $controller_name;
        $controller_name = 'Controller_' . $controller_name; // Controller_about
        $action_name = 'action_' . $action_name;

        // подцепляем файл с классом модели (файла модели может и не быть)
        $model_file = strtolower($model_name) . '.php';
        $model_path = "application/models/" . $model_file;
        if (file_exists($model_path)) {
            include "application/models/" . $model_file;
        }

        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name) . '.php'; // controller_about.php
        $controller_path = "application/controllers/" . $controller_file;
        // application/controllers/controller_about.php
        if (file_exists($controller_path)) {
            include "application/controllers/" . $controller_file;
        } else {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
            Route::ErrorPage404();
        }

        // если контроллер в файле не определен, то выбрасываем 404
        if(!class_exists($controller_name)){
            Route::ErrorPage404();
        } else {
            $controller = new $controller_name;
            // $controller = new controller_about;

            // $controller = new Page; /explain.by/page // $routes[1]
            // $controller = new Post; /explain.by/post
            // $controller = new Comment; /explain.by/comment
            $action = $action_name;
            // $action = action_index;
            // $action = $action_name; /explain.by/post/index // $routes[2]

            if (method_exists($controller, $action)) {
                // вызываем действие контроллера

                if($params){
                    // $bmv->go()
                    $controller->$action($params);
                    // $page->show($id)
                } else {
                    $controller->$action();
                    // $controller->action_index();
                    // $page->index()
                }

            } else {
                // здесь также разумнее было бы кинуть исключение
                Route::ErrorPage404();
            }
        }




    }


    function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}