<?php $title = "User Profile";?>

<?php ob_start();?>
<main>
<div>
    <button id='homeButton'><a href='index.php'>Home</a></button>
</div>
<div id="profileContainer">
    <div id='userInfo'>
        <div id='userMain'>
            <div><div id='userImgContainer'><img id='userImg' src="<?= $user['profile_img'];?>" alt="<?= $user['id'].'profile image';?>"></div></div>
            <div>
                <div>
                    <h2 id='userName'><?= $user['first_name'];?></h2>
                    <p>Last active: <? // TODO: last online status based on session end datetime ?></p>
                </div>
            </div>
        </div>
        <div id='userDetails'>
            <div>
                <p>Age: <?php 
                    $dob = $user['dob'];
                    $today = date('Y-m-d');
                    $diff = date_diff(date_create($dob), date_create($today));
                    $age = $diff->format('%y');
                    echo $age;?></p>
                <p>Gender: <?= $user['gender']='f' ? 'Female' : 'Male';?></p>
                <p>Language(s):</p>
                <ul>
                    <?php $languages = explode(',', $user['languages']);
                    foreach($languages as $language) {
                        echo '<li>'.$language.'</li>';
                    } ?>
                </ul>
                <button id='contact'>Contact</button>
            </div>
            <div>
                <p><?= $user['bio'];?></p>
                <div>
                    <button id='editProfileButton'>Edit Profile</button>
                </div>
            </div>
        </div>
    </div>
    <!-- <?php include('propertyCard.php'); ?>  -->
    <!-- TODO: uncomment above include and work on propertyCard.php & PropertyManager.php  -->
</div>
</main>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>