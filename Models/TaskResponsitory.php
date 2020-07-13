<?php

namespace AHT\Models;

use AHT\Models\TaskResourceModel;

class TaskResponsitory
{   
    public function add($model) {
        $taskRM = new TaskResourceModel();
        return $taskRM->save($model);
    }

    public function getAll() {
        $taskRM = new TaskResourceModel();
        return $taskRM->getAll();
    }

    public function get($id) {
        $taskRM = new TaskResourceModel();
        return $taskRM->get($id);
    }

    public function edit($id, $model) {
        $taskRM = new TaskResourceModel();
        return $taskRM->edit($id, $model);
    }

    public function delete($id) {
        $taskRM = new TaskResourceModel();
        return $taskRM->delete($id);
    }
}