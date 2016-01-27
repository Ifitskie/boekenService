<?php

require 'vendor/autoload.php';

$client = new GuzzleHttp\Client();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'];
    $body = $_POST['body'];
    $author = $_POST['author'];


    $response = $client->post('http://docent.cmi.hro.nl/bootb/restdemo/notes',
        ['json' => [
            'title' => $title,
            'body' => $body,
            'author' => $author]
        ]);
    echo $response->getStatusCode();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/foundation.css"/>
</head>
<body>
<form method="post">
    <div class="row">
        <div class="small-3 columns">
            <label for="middle-label" class="text-right middle">Title</label>
        </div>
        <div class="small-9 columns">
            <input type="text" name="title" id="middle-label">
        </div>
    </div>
    <div class="row">
        <div class="small-3 columns">
            <label for="middle-label" class="text-right middle">Body</label>
        </div>
        <div class="small-9 columns">
            <input type="text" name="body" id="middle-label">
        </div>
    </div>
    <div class="row">
        <div class="small-3 columns">
            <label for="middle-label" class="text-right middle">Author</label>
        </div>
        <div class="small-9 columns">
            <input type="text" name="author" id="middle-label">
        </div>
    </div>
    <div class="row">
        <div class="small-3 columns">
        </div>
        <div class="small-9 columns">
            <input type="submit" class="success expanded button" value="Create">
        </div>
    </div>
    <div class="row">
        <div class="small-3 columns">
        </div>
        <div class="small-9 columns">
            <a href="index.php" class="alert expanded button">Cancel</a>

        </div>
    </div>
</form>
</body>
</html>
