<?php

namespace AHT\Core;

    interface ResourceModelInterface
    {
        function _init($table, $id ,$model);
        function save($model);
        function delete($id);
        function get($id);
        function getAll();
        function edit($id, $model);
    }