<?php $title = $propDetails['post_title'];?>

<?php ob_start();?>
<section>
    <h2><?=$propDetails['post_title'];?></h1>
    <p><?= $propDetails['province_state'].', '.$propDetails['city'];?><?php
    if($propDetails['validation']) {
        echo ' ‣ Validated Property'?> <i class="fa-solid fa-check"></i><?php ;}
        else?></p>
    <div class='propertyImgContainer propImages'>
        <img alt="property main image" src="<?= $propDetails['p_img'];?>">
        <button class='allPropPhotos'><a href="">See all photos <i class="fa-solid fa-images"></i></a></button>
        <!-- TODO: click for modal with slide gallery for showing all property photos -->
    </div>
    <div class='propDetails'>
        <div class='propDesc'>
            <h3><?=$propDetails['r_type']?> in <?= $propDetails['p_type'];?></h3>
            <p>Size: <?=$propDetails['size'];?>m² | # Beds | # Baths</p>
            <p class='upperLowerBorders'><?= $propDetails['description'];?></p>
            <p>Address: <?= $propDetails['address1'].' '.$propDetails['address2'].', '.$propDetails['city'];?></p>
        </div>
        <div class='propResv flexColumn'>
            <p class='price'>Price: <span><?= number_format($propDetails['monthly_price_won']);?></span>₩/month</p>
            <p>Owner information:</p>
            <button class='resvbutton'><a href="">Reserve now</a></button>
            <!-- TODO: reservation action -->
        </div>
    </div>

</section>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>