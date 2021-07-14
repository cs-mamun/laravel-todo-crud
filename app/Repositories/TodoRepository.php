<?php

namespace App\Repositories;

use App\Models\Todo;

class TodoRepository
{

    protected $todo;


    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }


    public function getAll()
    {
        return $this->todo
            ->get();
    }


    public function save($data)
    {
        $todo = new $this->todo;

        $todo->title = $data['title'];
        $todo->description = $data['description'];

        $todo->save();

        return $todo->fresh();
    }


    public function update($data, $id)
    {

        $todo = $this->todo->find($id);

        $todo->title = $data['title'];
        $todo->description = $data['description'];

        $todo->update();

        return $todo;
    }

    public function delete($id)
    {

        $todo = $this->todo->find($id);
        $todo->delete();

        return $todo;
    }

}
