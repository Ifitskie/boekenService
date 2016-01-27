<?php

require 'vendor/autoload.php';

$client = new GuzzleHttp\Client();
$response = $client->get('http://docent.cmi.hro.nl/bootb/restdemo/notes');

$json = json_decode($response->getBody());
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/foundation.css"/>
</head>
<body>
<table>
    <tbody>
    <tr>
        <td width="1156"><a href="create.php" class="expanded success button">Create</a></td>
    </tr>
    <tr>
        <td width="1156"><a href="undelete.php" class="expanded warning button">Get deleted posts</a></td>
    </tr>
    </tbody>
</table>
<table class="hover">


    <thead>
    <tr>
        <th width="100">ID</th>
        <th width="250">Title</th>
        <th width="650">Body</th>
        <th width="100"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($json as $item) { ?>
        <tr>
            <td width="100"><?= $item->id ?></td>
            <td width="250"><?= $item->title ?></td>
            <td width="650"><?= $item->body ?></td>
            <td width="150" class="button-group">
                <a href="details.php?id=<?= $item->id ?>" class="secondary button">View</a>
                <a href="edit.php?id=<?= $item->id ?>" class="success button">Edit</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

</body>
</html>
