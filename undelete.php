<?php

require 'vendor/autoload.php';
$client = new GuzzleHttp\Client();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];

    $response = $client->post('http://docent.cmi.hro.nl/bootb/restdemo/notes/'.$_POST['id'], [
        'form_params' => [
            'method' => 'UNDELETE']

    ]);
}


$response = $client->get('http://docent.cmi.hro.nl/bootb/restdemo/notes?deleted=true');

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
        <td width="1156"><a href="index.php" class="expanded warning button">Return</a></td>
    </tr>
    </tbody>
</table>
<table class="hover">


    <thead>
    <tr>
        <th width="100">ID</th>
        <th width="250">Title</th>
        <th width="550">Body</th>
        <th width="100"></th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($json as $item) { ?>
        <tr>
            <td><?= $item->id ?></td>
            <td><?= $item->title ?></td>
            <td><?= $item->body ?></td>
            <td>
                <form method="post">
                    <input name="id" type="hidden" value="<?= $item->id ?>">
                    <input type="submit" class="alert expanded button" name="submit" value="undelete">
                </form>
            </td>
        </tr>

    <?php } ?>

</table>
</body>
</html>
