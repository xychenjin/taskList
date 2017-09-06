<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= isset($title) ? $title : '简易框架开发' ?></title>
    <script src="<?= static_url('js/jquery-1.10.2.js') ?>" charset="UTF-8" type="text/javascript"></script>
    <script src="<?= static_url('js/site.js') ?>" charset="UTF-8" type="text/javascript"></script>
    <link rel="stylesheet" href="<?= static_url('css/style.css') ?>" charset="UTF-8" />
    <link rel="stylesheet" href="<?= static_url('css/index.css') ?>" charset="UTF-8" />
    <link rel="shortcut icon" href="<?= static_url('favicon.ico') ?>" />
</head>
<body>
<?= view('layouts.header') ?>

<div class="container">
    <?= $context ?>
</div>

</body>
</html>


