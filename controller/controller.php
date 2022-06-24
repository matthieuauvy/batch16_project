<?php
require_once('userController.php');
require_once('model/PropertyManager.php');

use wcoding\batch16\finalproject\Model\UserManager;
use wcoding\batch16\finalproject\Model\PropertyManager;

function signIn($params) {
    $signIn = new UserManager();
    $rememberMe = !empty($params['rememberMe']);
    $signIn->signIn($params['email'], $params['password'], $rememberMe);
    // rememberMe feature
}

function checkSignIn($params){
    $signIn = new UserManager();
    $signIn->checkSignIn($params['email'], $params['password']);
}

function verifyEmail($params){
    $email = new UserManager();
    $email->verifyEmail($params['email']);
}

function signOut(){
    $signOut = new UserManager();
    $signOut->signOut();
}

function googleOauth($params) {
    $oauth = new UserManager();
    $oauth->googleOauth($params['credential']);
}

function signUp($params) {
    $signUp = new UserManager();
    $signUp->signUp($params ['firstName'], $params['lastName'], $params['email'], $params['password']);
}

function showUserInfo($action, $userId) {
    $userM = new UserManager($userId);
    $user = $userM->getUserInfo();
    // $data = $userM->viewUserData(); //// for header profile picture - @TODO Get user ID directly from GetUserInfo function to avoid calling 2 functions /// 
    
    $propertyM = new PropertyManager($userId);
    $properties = $propertyM->getProperties($action);

    require('./view/viewProfile.php');
}

function listProperties() {
    $propertyM = new PropertyManager();
    $properties = $propertyM->getProperties();

    return $properties;
}

function getLanding($userId) {
    $properties = listProperties();
    $userM = new UserManager($userId); 
    $data = $userM->viewUserData();
    require('./view/indexView.php');
}

function getProperty($propId) {
    $propertyM = new PropertyManager();
    $propDetails = $propertyM->getProperty($propId);
    $propOwner = $propertyM->getPropertyOwner($propId);

    require('./view/detailedPropertyView.php');
}

function getPropertyOwner($propId) {
    $propertyM = new PropertyManager();
    $propOwner = $propertyM->getPropertyOwner($propId);

    require('./view/detailedPropertyView.php');
}

function modifyProperty($propId) {
    if(isset($_SESSION['uid']) and $_SESSION['uid'] === $_SESSION['user_uid']) {
        $propertyM = new PropertyManager();
        $propDetails = $propertyM->modifyProperty($propId);
        
        require('./view/modifyProperty.php');
    } else {
        header('Location: index.php');
    }
}

// function modifyProperty() {
//     $propertyM = new PropertyManager();
//     $propertyM->modifyProperty();
// }

function modifyProfile($userId) {
    $userM = new UserManager($userId); 
    $data = $userM->viewUserData();

    require('./view/modifyProfileView.php');
}

function updateProfile () {
    $userM = new UserManager();
    $data = $userM->viewUserData();
    $userM->updateUserData($data);

    header("Location: index.php?action=profile&user={$_SESSION['uid']}");
}

function updateLastActive() {
    $userM = new UserManager();
    $userM -> updateLastActive();
}

function search($params) {
    $propertyM = new PropertyManager();
    $rangeMin = $params["rentRange"] != "any" ? $params['rentRange']-500000 : "any";
    $rangeMax = $params["rentRange"] != "any" ? $params['rentRange'] : "any";
    $properties = $propertyM->searchProperties($params['province'], $params['city'], $rangeMin, $rangeMax, $params['propertyType'], $params['roomType']);
    require('./view/searchResultsCard.php');
}
function postProperty($params, $imgs) {
    $propertyM = new PropertyManager();
    for($i=0; $i<count($imgs); $i++) {
        $imgDescriptions[] = $params["t-attachment-$i"];
    }
    if (!empty($params['furnished'])) {
        $propertyM->postProperty($params['title'], $params['country'], $params['province'], $params['city'], $params['district'], $params['address1'], $params['address2'], $params['zipcode'], $params['propertyType'], $params['roomType'], $params['roomNum'], $params['bedNum'], $params['bathNum'],$params['furnished'], $params['size'], $params['price'], $params['description'], $params['bankAccNum'], $imgs, $imgDescriptions);
    } else {
        $propertyM->postProperty($params['title'], $params['country'], $params['province'], $params['city'], $params['district'], $params['address1'], $params['address2'], $params['zipcode'], $params['propertyType'], $params['roomType'], $params['roomNum'], null, $params['bathNum'], null, $params['size'], $params['price'], $params['description'], $params['bankAccNum'], $imgs, $imgDescriptions);
    }
}

function viewPostProperty() {
    require('view/postPropertyView.php');
}

function getCities($province) {
    $propertyM = new PropertyManager();
    $cities = $propertyM->getCities($province);
    if ($cities) {
        echo "<option selected disabled>Select a city</option>";
        foreach($cities as $key=>$city) {
            $key+=1;
            echo "<option value='{$key}'>$city</option>";
        }
    } else {
        echo '<option selected value="-1">No cities/districts in this area</option>';
    }
}
function getDistricts($city) {
    $propertyM = new PropertyManager();
    $districts = $propertyM->getDistricts($city);
    if ($districts) {
        echo "<option selected disabled>Select a district</option>";
        foreach($districts as $key=>$district) {
            $key+=1;
            echo "<option value='$key'>$district</option>";
        }
    } else {
        echo '<option selected value="-1">No cities/districts in this area</option>';
    }
}
