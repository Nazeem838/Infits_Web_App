<?php
$conn = new mysqli("localhost", "root", "", "infits");

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
?>

<?php include 'navbar.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infits | Health Details</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
               * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.content {
    display: flex;
    align-items: center;
    flex-direction: column;
    padding: 20px 16px;
    font-family: "NATS";
}
.content .heading-box {
    /* border: 1px solid red; */
    height: 70px;
    width: 94%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
}

.content .heading-box h1 {
    font-size: 2.3rem;
    font-weight: 400;
}

.content .heading-box .search-box {
    /* height: 30px; */
    width: 320px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 5px 10px;
    box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.25);
    border-radius: 10px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
}
.content .heading-box .search-box input {
    width: 100%;
    font-size: 1.2rem;
    padding: 5px 10px;
    margin-left: 10px;
    border: none;
}

.content .heading-box .search-box input:focus {
    outline: none;
}
.content .created-form-container,
.content .created-client-form-container {
    /* border: 1px solid rgb(0, 0, 0); */
    width: 87%;
}

.content .created-client-form-container {
    margin-top: 30px;
}
.content .created-form-container .form-card-container,
.content .created-client-form-container .client-card-container {
    /* border: 1px solid red; */
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    gap: 30px;

}

.content .created-client-form-container .client-card-container .client-cards {
    /* border: 1px solid red; */
    height: 190px;
    width: 186px;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
    box-shadow: 0px 2px 6px 0px rgba(0, 0, 0, 0.25);
    border-radius: 18px;
    -webkit-border-radius: 18px;
    -moz-border-radius: 18px;
    -ms-border-radius: 18px;
    -o-border-radius: 18px;
}

.content .created-client-form-container .client-card-container .client-cards .card-content {
    /* border: 1px solid red; */
    height: 90%;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
}

.content .created-client-form-container .client-card-container .client-cards img.vector {
    /* border: 1px solid red; */
    position: absolute;
    bottom: 0;
    right: 0;
    height: 120px;
    user-select: none;
    pointer-events: none;
}

/* .content .created-client-form-container .client-card-container .client-cards img#clientProfile {
    border: 1px solid red;
} */

.content .created-client-form-container .client-card-container .client-cards .card-content p {
    margin: 0;
    /* border: 1px solid red; */
    font-size: 1.5rem;
    font-weight: 500;
    z-index: 1;
}

.content .created-client-form-container .client-card-container .client-cards .card-content .btn-box {
    /* border: 1px solid red; */
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    z-index: 1;
}

.content .created-client-form-container .client-card-container .client-cards .card-content .btn-box button {
    border: none;
    background-color: #4B9AFB;
    color: #ffffff;
    padding: 5px 15px;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
}
.create_btn{
    position: absolute;
width: 85px;
height: 85px;
left: 88%;
top: 90%;
border:none;
border-radius:50%;
font-size:40px;
color:white;
background: #9C74F5;
box-shadow: 0px 0px 68px rgba(0, 0, 0, 0.3);
padding-bottom:0.5rem;
}
}
@media screen and (max-width: 720px){
    .create_btn{
        left: 78%;
top: 70%;


    }

}
        </style>
</head>
<body>
    <div class="content">

       <div class="heading-box">
            <h1>Client Forms and Documents</h1>
            <div class="search-box">
                <img src="icons/search.svg" alt="#">
                <input type="search" name="form" id="form" placeholder="Search clients">
            </div>
        </div>

        <div class="created-client-form-container">
            
            <div class="client-card-container">
                
                <?php
                    $sql = "SELECT DISTINCT ClientName FROM `clientcon` ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        ?>
                            <div class="client-cards">
                            <img class="vector" src="icons/client-card-vector.svg">
                            <div class="card-content">
                                <img src="images/client.png" alt="Profile" id="clientProfile">
                                <p> <?php echo $row["ClientName"]; ?> </p>
                                <div class="btn-box">
                                    <button id="clientForm">Form</button>
                                    <button id="clientDocument">Documents</button>
                                </div>
                            </div>
                        </div>
                        <?php
                          }
                    }
                ?>
            </div>
        </div>

      
            
    </div>


    <div class="button">
        <a style="background-color:none"href="health_detail_form_create.php"><button class="create_btn">+</button></a>
        
        
    </div>

    <script>
        const optionBtn = document.querySelector(".options");
        const clientForm = document.querySelector("#clientForm");
        const clientDocument = document.querySelector("#clientDocument");
        // const optionPopup = document.querySelector(".option-popup");

        function showPopup(e) {
            e.parentNode.children[3].classList.toggle("show");
        };

        clientForm.addEventListener("click", () => {
            document.location.href = 'health_detail_form.php?form=show';
        });
        clientDocument.addEventListener("click", () => {
            document.location.href = 'health_detail_form.php?documents=show';
        });
    </script>
    
</body>
</html>