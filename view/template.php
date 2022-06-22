<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title;?></title>
    <link rel="stylesheet" href="public/style/style.css">
    <link rel="stylesheet" href="public/style/properties.css">
    <link rel="stylesheet" href="public/style/searchResults.css">
    <link rel="stylesheet" href="public/style/profile.css">
    <link rel="stylesheet" href="public/style/signUp.css">
    <link rel="stylesheet" href="public/style/modal.css">
    <link rel="stylesheet" href="public/style/indexView.css">
    <link rel="stylesheet" href="public/style/header.css">
    <link rel="stylesheet" href="public/style/footer.css">
    <!-- <script src="https://accounts.google.com/gsi/client"></script> -->
    <script src="https://kit.fontawesome.com/949df75f70.js" crossorigin="anonymous"></script>

</head>
<body class="flexColumn">
    <?php require "header.php"; ?>
    <?=$content;?>
    <?php require "footer.php"; ?>
<script src="./public/js/modal.js"></script> 

</body>
</html> 