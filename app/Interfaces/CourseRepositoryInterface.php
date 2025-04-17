<?php

namespace App\Interfaces;

interface CourseRepositoryInterface{

    public function index();
    public function show($id);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);

}
