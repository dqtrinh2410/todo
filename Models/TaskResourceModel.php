<?php

namespace AHT\Models;

use AHT\Core\ResourceModel;
use AHT\Models\Task;

class TaskResourceModel extends ResourceModel
{
    public function __construct() {
        $task = new Task();
        parent::_init('tasks', 'id', $task);
    }
}