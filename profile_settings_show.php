<?php 
 include "navbar.php";
 include "config.php";
    $dietitianuserID = $_SESSION['dietitianuserID'];
    // echo $dietitianuserID;
    // $name = substr($name, 0, -4);
    $query = "SELECT * FROM `dietitian` where dietitianuserID = '$dietitianuserID';";
    $result = mysqli_query($conn, $query);
    // Use curly braces to access array members inside strings
    //  echo mysqli_num_rows($result);
    //  exit;
    if(mysqli_num_rows($result)>0){ 
      while($row = mysqli_fetch_assoc($result)){
        $dietitianuserID = $row['dietitianuserID'];
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $password = $row['password'];
        $qualification = $row['qualification'];
        $location = $row['location'];
        $experience = $row['experience'];
        $gender = $row['gender'];
        $age = $row['age'];
        $facebook = $row['facebook'];
        $whatsapp = $row['whatsapp'];
        $twitter = $row['twitter'];
        $linkedin = $row['linkedin'];
        $instagram = $row['instagram'];
        $profilePhoto = $row['profilePhoto'];

        if (is_null($row['profilePhoto']) or $row['profilePhoto']=' ') {
            $path = "./upload/pp.jpg";
        } else { 
            $ext= explode('|',$row['profilePhoto']);
            $path = $ext[1]. "/" .$ext[0];
        }
      }
    }

?>



<!DOCTYPE html>
<html>

<head>
    <title>Infits | Add Client</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <style>
  @font-face {
    font-family: 'NATS';
    src:url('font/NATS.ttf.woff') format('woff'),
        url('font/NATS.ttf.svg#NATS') format('svg'),
        url('font/NATS.ttf.eot'),
        url('font/NATS.ttf.eot?#iefix') format('embedded-opentype'); 
    font-weight: normal;
    font-style: normal;
}
::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: #BBBBBB;
  opacity: 1; /* Firefox */
}

body {
    font-family: 'NATS', sans-serif;
    font-weight:400;
}


    input,
    input[type=file] {
        background: #FFFFFF;
        box-shadow: 0px 0.7px 5px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        border: none;
        width: 100%;
        min-width: 250px;
        padding: 8px 16px;
        gap: 8px;
    }

    select {
        background: #EFF8FFD9;
        border: none;
        border-radius: 4px;
        width: 100%;
        min-width: 250px;
        padding: 8px 16px;
        gap: 8px;
    }

    input[type=sign-up] {
        border: 1px solid #EBEBEB;
        color: #7282FB;
        align-items: center;
        padding: 10px 22px;
        border-radius: 10px;
        text-decoration: none;
        margin: 4px 2px;
        width: auto;
    }

    /* Shared */
    .addBtn {
        width: 342px;
        height: 48px;
        background: #0177FD;
        border-radius: 10px;
        color:white;
        padding-top:0.5rem;
        font-size: 20px;
    }
    .addBtn:hover{
        background-color:none;
    }

    .center-flex {
        display: flex;
        margin-left:20.3rem;
    }

    .signup {
        border: 1px solid #EBEBEB;
        padding: 10px;
        border-radius: 5px;
        min-width: auto;
        width: 150px;
        background-color: #FFFFFF;
        text-decoration: none;
        color: black;
    }

    .float-right {
        float: right;
    }

    .flex-left,
    .flex-right,
    .flex-middle {
        display: flex;
        align-items: left;
        justify-content: top;
        flex-direction: column;
    }

    .flex-main {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        flex-wrap: wrap;
        align-content: flex-start;
        position:relative;
    }

    .align-middle {
        margin-left: 5%;
    }

    .reset a {
        color: RoyalBlue;
    }

    .socials {
        border: none;
        background: none;
    }
    .socials:hover{
        background-color:none;
    }

  
    .sharebutton{
        width: 342px;
    height: 48px;
    background: #FFFFFF;
    border: 2px solid #0177FD;
    border-radius: 10px;
    padding-top:0.5rem;
        font-size: 20px;
        underline:none;
        margin-left:5.5rem;
    }
    .sharebutton:hover{
      background-color:white;
      background:white;
    }
    
.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.6);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
    
  margin: 290px ;
  margin-left:550px;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 25%;
  position: relative;
  transition: all 5s ease-in-out;
  box-shadow: 0px 0px 34.0377px rgba(0, 0, 0, 0.25);
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
  background:none;
  border:none;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}
.leftinput{
    width:342px;
}
    @media screen and (max-width: 720px) {
        .popup{
            margin:30%;
            margin-top:50%;
            width:40%;
        }
        .heading{
            margin-left:2rem !important;
        }
        .leftinput{
            width:auto !important;
        }
        .flex-left{
            margin-left:2rem;
        }
        .flex-middle{
            margin-left:2rem;
        }
        .flex-main_wrapper{
            display:flex;
            flex-direction:column;
        }
        .flex-main{
            display:flex;
            flex-direction:column;
        }
        .user{
            margin-left:6rem !important;
        }
        .star{
            margin-left:7.5rem !important;
        }
        .center-flex {
        display: flex;
        flex-direction:column;
        gap:1rem;
        margin-left:2.3rem;
    }
    .addBtn{
        width:auto !important;
        margin-right:2rem;
    }
    .sharebutton{
        width:auto !important;
        margin-left:0;
        margin-right:2rem;
    }
    }

   
    </style>

</head>

<body>


    <div id="content">

        <br>
        <h4 class="heading" style="margin-left:21rem; font-size:40px"> Profile Settings</h4>

        <!--<div class="add-client-area">-->
        <form method="post" action="" enctype="multipart/form-data">

            <br>

            <div class="flex-main">

                <div style="display:flex; gap:5.5rem" class="flex-main_wrapper">
                <div class="flex-left" style="font-size:18px;display:flex;flex-direction:column;justify-content:center">
                    User ID <br> <input  class="leftinput" name="dietitianuserID" value="<?php echo $dietitianuserID; ?>" disabled style="color: #AEAEAE;" />
                    <br>

                    Name <br> <input name="Name" value="<?php echo $name; ?>" style="color: #AEAEAE;" disabled />
                    <br>

                    Email <br> <input name="email" value="<?php echo $email; ?>" disabled style="color: #AEAEAE;"/>
                    <br>

                    Mobile Number <br> <input name="mobile" value="<?php echo $mobile; ?>" disabled  style="color: #AEAEAE;"/>
                    <br>

                    Qualification <br>
                    <?php if (is_null($qualification) or $qualification=='') { ?>
                    <input type="text" name="qualification" value="<?php echo 'XXXXXX'; ?>" disabled style="color: #AEAEAE;">
                    <?php } else { ?>
                    <input name="qualification" value="<?php echo $qualification; ?>" disabled style="color: #AEAEAE;">
                    <?php } ?>
                    <br>

                    Password: <br> <input type="password" name="password" value="<?php echo $password; ?>" disabled style="color: #AEAEAE;"/>
                    <br>



                </div>


                <div class="flex-middle" style="font-size:18px">

                    Location <br>
                    <?php if (is_null($location) or $location=='') { ?>
                    <input type="text" name="location" value="<?php echo 'XXXXXX'; ?>" class="leftinput" disabled style="width: 342px;color: #AEAEAE;" >
                    <?php } else { ?>
                    <input type="text" name="location" value="<?php echo $location; ?>" class="leftinput" disabled required style="width: 342px;color: #AEAEAE;" >
                    <?php } ?>
                    <br>

                    Age <br>
                    <?php if (is_null($age) or $age=='') { ?>
                    <input type="text" name="experience" value="<?php echo 'XX Years'; ?>" disabled class="leftinput" style="color: #AEAEAE;">
                    <?php } else { ?>
                    <input type="text" name="age" value="<?php echo $age; ?>" disabled required class="leftinput" style="color: #AEAEAE;">
                    <?php } ?>
                    <br>



                    Gender: <br>
                    <?php if (is_null($gender) or $gender=='') { ?>
                    <input type="text" name="gender" value="<?php echo 'XXXX'; ?>" disabled class="leftinput" style="color: #AEAEAE;">
                    <?php } else { ?>
                    <input type="text" name="gender" value="<?php echo $gender; ?>" disabled class="leftinput" style="color: #AEAEAE;">
                    <?php } ?>
                    <br>

                    Experience <br>
                    <?php if (is_null($experience) or $experience=='') { ?>
                    <input type="text" name="experience" value="<?php echo 'XX Years'; ?>" disabled class="leftinput" style="color: #AEAEAE;">
                    <?php } else { ?>
                    <input type="text" name="experience" value="<?php echo $experience; ?>" disabled class="leftinput" style="color: #AEAEAE;">
                    <?php } ?>
                    <br>

                    Referral Code <br><input type="text" name="ref_code">
                    <br>

                    Achievements and Certificates <br><input type="text" name="ref_code">
                    <br>



                </div>
                </div>

                <div class="flex-right" >

                    <img class = "user" src="<?php echo $path;?>"  style="height: 100px; width: 100px; border-radius: 30%;" alt="" />
                    <div class="star" style="margin-left:2.7rem;margin-bottom:2rem;background:none">
                        <img src="images/star.png"style="background:none"ui >
                        <span>4.8</span>
                    </div>

                    <button class='socials'><img src="images/WhatsApp.svg" style="height: 33px; "> &nbsp; <a
                            href="<?php echo $whatsapp; ?>"
                            style="text-decoration:none; color:black; background-color:none">WhatsApp</button><br>
                    <button class='socials'><img src="images/Twitter.svg" style="height: 33px;"> &nbsp; <a
                            href="<?php echo $twitter; ?>"
                            style="text-decoration:none; color:black;background-color:none">Twitter</button><br>
                    <button class='socials'><img src="images/LinkedIn.svg" style="height: 33px;"> &nbsp; <a
                            href="<?php echo $linkedin; ?>"
                            style="text-decoration:none; color:black;background-color:none">LinkedIn</button><br>
                    <button class='socials'><img src="images/Instagram.svg" style="height: 33px;"> &nbsp; <a
                            href="<?php echo $instagram; ?>"
                            style="text-decoration:none; color:black;background-color:none">Instagram</button><br>
                    <button class='socials' ><img src="images/Facebook.svg" style="height: 33px;"> &nbsp; <a
                            href="<?php echo $facebook; ?>" style="text-decoration:none; color:black;background-color:none">Facebook
                    </button> <br>

                </div>


            <!----------------------------------------------SUBMIT BUTTON -------------------------------------------------->

            </div>

            <div class="center-flex"> <br> <br>
                <a id="addBtn" href="profile_settings_edit.php">
                    <div class="addBtn">
                        <center>Edit Profile Details</center>
                    </div>
                </a>

                <a id="sharebutton" href="#popup1" >
                    <div class="sharebutton">
                        <center >Share Profile</center>
                    </div>
                </a>
                <!--link not working to move to next page -->
            </div>
            <br>
        </form>
    </div>


    <!-------------------------------------POPUPS-------------------------------------------------->
    <div id="popup1" class="overlay">
	<div class="popup">
		<h5 style="margin-left:1.5rem">Share Via <img src="images/shareeee.png" style="margin-left:0.5rem;width:4%"></h2>
		<a class="close" href="#">&times;</a>
		<div class="content" style="display:flex;gap:1rem;margin-left:1rem">
			<img src="images/WhatsApp.png" >
            <img src="images/Twitter.png" >
            <img src="images/Facebook.png" >
            <img src="images/LinkedIn_Circled.png" >
            <img src="images/Instagram.png" >
		</div>
	</div>


</body>

</html>