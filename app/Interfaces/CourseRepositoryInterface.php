<?php

namespace App\Interfaces;

interface CourseRepositoryInterface
{
    public function index();
    public function getById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function stats() : array;
}

