<?php $title = "Create profile"; ?>

<?php ob_start(); ?>
<section>
    <form action="index.php?action=checkProfile" method="POST" id="newProfile" enctype="multipart/form-data" class="profileFormsBorder">
        <h1>Let's create a profile for you</h1>
        <div>

            <div id="profilePhoto">
                <div>
                
                </div>
            </div>
            <input type="file" id="file" name="uploadFile">
            <label for="file" class="customFileButton">Upload Profile Photo</label>
        </div>
        <div class="flexRow">
            <div id="createProfileDetails">
                <div>
                    <label for="phoneNum">Phone Number:</label>
                    <input type="text" id="phoneNum" name="phoneNum">
                </div>
                <div>
                    <label for="birthdate">Birthdate:</label>
                    <div id="birthdate">
                        <select id="year" name="year"></select>
                        <select id="month" name="month">
                            <option value=1>Jan</option>
                            <option value=2>Feb</option>
                            <option value=3>Mar</option>
                            <option value=4>Apr</option>
                            <option value=5>May</option>
                            <option value=6>June</option>
                            <option value=7>July</option>
                            <option value=8>Aug</option>
                            <option value=9>Sept</option>
                            <option value=10>Oct</option>
                            <option value=11>Nov</option>
                            <option value=12>Dec</option>
                        </select>
                        <select id="day" name="day"></select>
                    </div>
                </div>
                <div>
                    <label for="gender">Gender: </label>
                    <div>
                        <input type="radio" id="male" name="gender" value="M">
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="F">
                        <label for="female">Female</label>
                        <input type="radio" id="non-binary" name="gender" value="Nb">
                        <label for="non-binary">Non-Binary</label>
                    </div>
                </div>
            </div>

            <div id="langDetails">
                <div>
                    <label for="language">Which languages do you speak?</label>
                    <select id="language" name="language">
                            <option id="HK" value="HK">Cantonese</option>
                            <option id="ZH" value="ZH">Chinese(Mandarin)</option>
                            <option id="NL" value="NL">Dutch</option>
                            <option id="EN" value="EN">English</option>
                            <option id="DE" value="DE">German</option>
                            <option id="FR" value="FR">French</option>
                            <option id="HI" value="HI">Hindi</option>
                            <option id="IN" value="IN">Indonesian</option>
                            <option id="IT" value="IT">Italian</option>
                            <option id="JA" value="JA">Japanese</option>
                            <option id="KO" value="KO">Korean</option>
                            <option id="VI" value="VI">Vietnamese</option>
                            <option id="PT" value="PT">Portugese</option>
                            <option id="RU" value="RU">Russian</option>
                            <option id="ES" value="ES">Spanish</option>
                    </select>
                    <input type="hidden" id="userLang" name="userLang" value="">
                </div>
            </div>
        </div>
        <div>
            <input type="textarea" id="bio" name="bio" placeholder="Introduce yourself" rows="4">
        </div>
        <input type="submit" id="create" name="create" value="Create profile">
    </form>
</section>
<script src="./public/js/createProfile.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>