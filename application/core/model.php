<?php

abstract class Model
{
    /**
     * @var PDO
     */
    protected $connection;

    public function __construct(){
        $this->connection = new mysqli('localhost', 'root', '', 'shop-test');
    }


    public function get_data()
    {
    }
}