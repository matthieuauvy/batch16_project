<?php

    if(count($properties)>0){
        ?>
        
        <h2>Search Results for <?= $_REQUEST['search'] ?></h2>
        <div id='propertiesSearchList'>
            <?php
            foreach($properties as $property)
            {
                include('propertyCard.php');
            } ?>
        </div>
        
    <?php
    }else {
        ?>
        <p>No Search Results Yet for <b><?= $_REQUEST['search'] ?></b> with the Selected Filters ! Try to expand your Search.</p>
        <?php
    } ?>
