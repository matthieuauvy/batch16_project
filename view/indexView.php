
<?php $title = "Welcome to Room-EZ";?>


<?php ob_start();?>

<section class="flexColumn">

  <div class="landingHeader">
    <h3 id="slogan">Your hassle-free housing search starts with Room-EZ</h3>
  </div> 
  
  <!-- <div id="searchBarContainer">
      <input type="text" name="searchbar" id="searchBar" placeholder="Start your search here">
      <button class="searchButton"><i class="fa-solid fa-magnifying-glass"></i></button>
  </div> -->
  </div>

  <div class="slideshow">
    <div id="slide1" class="slide"></div>
  </div>

  <div class="indexProperties">
    <?php include('listPropertiesView.php'); ?> 
  </div>

  <!-- <div id="intro">
    <h3>About Us</h3>
    <p>Room E-Z is a no-frills service linking hosts with housing or rooms to rent and renters looking for a place in Korea anywhere from a month to a year</p>
    <p>Whether you're a host or a renter, post your profile and look for potential matches!</p>
  </div> -->
</section>
  



<?php $content = ob_get_clean(); ?>

<?php require("template.php") ?>

