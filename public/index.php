<?php

require "bootstrap.php";

try {
    $data = router();

    if (!isset($data['view'])) {
        throw new Exception("View é necessária");
    }

    if (!file_exists(VIEWS . $data['view'])) {
        throw new Exception("View não encontrada");
    }
    extract($data['data']);

    $view = $data['view'];

    require VIEWS . 'index.php';
} catch (Exception $e) {
    var_dump($e->getMessage());
}
