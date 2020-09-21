<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Erick Madrigal">
    <link rel="shortcut icon" href="<?=$root;?>img/icon.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
      <?php if(isset($links)):?>
        <?php foreach($links as $link): ?>
            <link rel="stylesheet" href="<?= $link;?>">
        <?php endforeach;?>
    <?php endif;?>
    <link rel="stylesheet" href="<?=$root;?>css/style.css">

    <title>bitComic | <?= $title; ?></title>
  </head>
  <body class="bg-light <?=$fondo;?>">