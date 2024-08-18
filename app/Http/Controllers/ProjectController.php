<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends MainController
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['data' => 'hello world']);
    }

    public function get()
    {

    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
