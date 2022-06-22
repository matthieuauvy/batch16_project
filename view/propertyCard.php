<a href="index.php?action=property&propId=<?= $property['id'];?>">
    <div class='property'>
        <div class='propertyImgContainer'><img alt="property main image" src="<?= $property['p_img'];?>"></div>
        <div id='propertyDetails'>
            <p class="price">Price: <span><?= number_format($property['monthly_price_won']);?></span>₩/month</p>
            <p>Location: <?= $property['city'].', '.$property['country'];?></p>
            <p>Type: <?= $property['p_type']?>, <?= $property['r_type'];?></p>
            <p><?php 
            if($property['post_title']==''){
                echo $property['p_type'].' in '.$property['province_state'].', '.$property['city'];
            } else {
                echo $property['post_title'];
            };?>
            </p>
        </div>
    </div>
</a>
