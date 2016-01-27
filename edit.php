<?php
require 'vendor/autoload.php';

$client = new GuzzleHttp\Client();

$id = $_GET['id'];
$response = $client->request('GET', 'http://docent.cmi.hro.nl/bootb/restdemo/notes', ['query' => ['id' => $id]]);

$json = json_decode($response->getBody());

if ($_POST != null) {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $author = $_POST['author'];

    $response = $client->put('http://docent.cmi.hro.nl/bootb/restdemo/notes/'.$id,
        ['json' => [
            'title' => $title,
            'body' => $body,
            'author' => $author
        ]]);
    echo $response->getReasonPhrase();
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
            <input type="text" name="title" id="middle-label" value="<?= $json->title ?>">
        </div>
    </div>
    <div class="row">
        <div class="small-3 columns">
            <label for="middle-label" class="text-right middle">Body</label>
        </div>
        <div class="small-9 columns">
            <input type="text" name="body" id="middle-label" value="<?= $json->body ?>">
        </div>
    </div>
    <div class="row">
        <div class="small-3 columns">
            <label for="middle-label" class="text-right middle">Author</label>
        </div>
        <div class="small-9 columns">
            <input type="text" name="author" id="middle-label" value="<?= $json->author ?>">
        </div>
    </div>
    <div class="row">
        <div class="small-3 columns">
        </div>
        <div class="small-9 columns">
            <input type="submit" class="secondary expanded button" value="submit">
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
