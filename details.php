<?php
require 'vendor/autoload.php';

$client = new GuzzleHttp\Client();

$id = $_GET['id'];

$response = $client->request('GET', 'http://docent.cmi.hro.nl/bootb/restdemo/notes', ['query' => ['id' => $id]]);

$json = json_decode($response->getBody());

if ($_POST != null) {
    $response = $client->delete('http://docent.cmi.hro.nl/bootb/restdemo/notes/' . $id);
header('Location: index.php');
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
<table class="hover">
    <thead>
    <tr>
        <th width="100">ID</th>
        <th width="250">Title</th>
        <th width="500">Body</th>
        <th width="250">Author</th>
        <th width="250"></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?= $json->id ?></td>
        <td><?= $json->title ?></td>
        <td width="500"><?= $json->body ?></td>
        <td><?= $json->author ?></td>
        <td class="button-group">
            <a href="edit.php?id=<?= $json->id ?>" class="success button">Edit</a>

            <form method="post">
                <input type="submit" class="alert button" name="delete" value="Delete">
            </form>

            <a href="index.php" class="secondary button">back</a></td>
    </tr>
    </tbody>
</table>
</body>
</html>
