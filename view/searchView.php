<?php $title = "Search Results"; ?>

<?php ob_start(); ?>

<section id='searchResults'>
    <?php require('searchResultsCard.php');?>
</section>

<?php $content = ob_get_clean();?>
<?php require('template.php');?>