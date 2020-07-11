<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <!-- Title Page-->
    <title>Registration Form</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Name" name="name" required value = "<?php echo (isset($_POST['name']))?$_POST['name']:'';?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="email" required value = "<?php echo (isset($_POST['email']))?$_POST['email']:'';?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Password" name="password" required>   
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Address" name="address" required value = "<?php echo (isset($_POST['address']))?$_POST['address']:'';?>">   
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Phone" name="phone" required value = "<?php echo (isset($_POST['phone']))?$_POST['phone']:'';?>">
                        </div>
                        <?php 
                            if(isset($_POST['btn-submit'])){
                                include_once "db/user.php";
                                $user = new user();
                                $user->setUserName($_POST['name']);
                                $user->setUserPassword(sha1($_POST['password']));
                                $user->setUserEmail($_POST['email']);
                                $user->setUserAddress($_POST['address']);
                                $user->setUserPhone($_POST['phone']);
                                $result = $user->add();
                                if($result=="success"){
                                    echo("<h4 class='alert alert-success border-success '>Your Account Has Been Created</h4>");
                                    header("Refresh:3,url=login.php");
                                }
                                else if(strpos($result,'UQPhone'))
                                    echo ("<h5 class='alert alert-danger border-danger'> your phone is used </h5>");  
                                else if(strpos($result,'UQEmail'))
                                    echo ("<h5 class='alert  alert-danger border-danger '> your email is used </h5>");  
                                else
                                    echo ("<h5 class='alert alert-danger border-danger '>".$result."</h5>"); 
                            
                            }

                        ?>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit" name="btn-submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
   
    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
