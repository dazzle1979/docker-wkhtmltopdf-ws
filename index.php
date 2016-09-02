<?php

/**
 * Docker wkhtmltopdf simple web service
 * Service waiting for wkhtmltopdf runing command in POST request with 'command' argument
 */
function run()
{
    if (empty($_POST['command'])) {
        http_response_code(400);
        echo 'You must provide wkhtmltopdf command in POST "command" argument';
        exit();
    }

    $command = $_POST['command'];

    // we use proc_open with pipes to fetch error output
    $descriptors = [
        2 => ['pipe','w']
    ];
    $process = proc_open($command, $descriptors, $pipes, null, null, ['bypass_shell'=>true]);

    if (is_resource($process)) {
        $stderr = stream_get_contents($pipes[2]);
        fclose($pipes[2]);

        $result = proc_close($process);

        if ($result !== 0) {
            http_response_code(500);
            echo 'Failed while execution of command: ' . $command . ' Error: ' . $stderr;
            exit();
        }
    } else {
        http_response_code(500);
        echo 'Failed to run command: ' . $command;
        exit();
    }

    echo 'Command: ' . $command . ' successfuly executed';
    exit();
}

run();
