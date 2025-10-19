<?php

require './config/connection.php';

try {
    $conn = connection();
    echo "✅ Conexão bem-sucedida!";
} catch (Exception $e) {
    echo "❌ " . $e->getMessage();
}
