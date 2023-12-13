<?php
// Sample data - Replace this with data fetched from your database or other sources
$data = [
    'id' => 1,
    'name' => 'John Doe',
    'email' => 'johndoe@example.com'
];

// Set the response content type to JSON
header('Content-Type: application/json');

// Output the data as JSON
echo json_encode($data);
?>