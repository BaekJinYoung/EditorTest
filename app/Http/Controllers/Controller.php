<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class Controller
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    protected function getName($view) // 이동할 페이지 이름
    {
        return 'editor.' . strtolower(class_basename($this->model)) . ucfirst($view);
    }

    public function index(Request $request)
    {

        return view($this->getName('index'));
    }

    public function create(Request $request)
    {

        return view($this->getName('create'));
    }
}
