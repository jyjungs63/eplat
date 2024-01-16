<?php
// Replace "your_command_here" with the actual command you want to execute
$newDirectory = 'd:\6_Test\PythonExercize\PythonGround';
chdir($newDirectory);

$command = 'C:\Users\HP\AppData\Local\Programs\Python\Python311\python.exe -u "d:\6_Test\PythonExercize\PythonGround\test2.py"';

// Execute the command and capture the output
$output = shell_exec($command);

// Display the output
echo "<pre>$output</pre>";
?>