<?php

namespace AHT\Controllers;

use AHT\Core\Controller;
use AHT\Models\TaskResponsitory;
use AHT\Models\Task;

class TasksController extends Controller
{
    function index()
    {
        $tasksResponsitory = new TaskResponsitory();
        $d['tasks'] = $tasksResponsitory->getAll();       
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
            $task = new Task();
            $task->setTitle($_POST["title"]);
            $task->setDescription($_POST["description"]);

            $tasksResponsitory = new TaskResponsitory();         
            if ($tasksResponsitory->add($task))
            {
                header("Location: /mvc");
            }
        }
        $this->render("create");        
    }

    function edit($id)
    {
        $tasksResponsitory = new TaskResponsitory();

        $d["task"] = $tasksResponsitory->get($id);

        if (isset($_POST["title"]))
        {
            $task = new Task();
            $task->setTitle($_POST['title']);
            $task->setDescription($_POST['description']);

            if ($tasksResponsitory->edit($id, $task)) {
                header("Location: /mvc");
            }
        }
        
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $tasksResponsitory = new TaskResponsitory();
        if($tasksResponsitory->delete($id)) {
            header("Location: /mvc");
        }       
    }
}
