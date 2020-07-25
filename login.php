
<?php
    //required functions php file
    require('header.php');
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['submit-register'])){
            // call method addToCart
            $User->insertIntoUser($_POST['name'],$_POST['lastname'],$_POST['email'],$_POST['tel'],$_POST['sexe'],$_POST['pwd'],"user");
        }
        if(isset($_POST['submit-login'])){
            $User->loginUser($_POST['nom'],$_POST['pw'],"user");
        }
    }
    //$_SESSION['id'];
?>

<link rel="stylesheet" href="login.css">
<body class="log">
<div class="container">
    <div class="login-box">
        <div class="row">
            <div class="col-md-6 login-left">
                <h3 class="font-baloo">Login Here</h3>
                <form method="post">
                    <div class="form-group">
                        <label class="user">Username</label>
                        <input type="text" name="nom" class="font-baloo font-size-16 form-control"  required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pw" class="font-baloo font-size-16 form-control"  required>
                    </div>
                    <button type="submit" name="submit-login" class="btn btn-warning font-size-12">Login</button>
                </form>
            </div>

            <div class="col-md-6 login-right">
                <h3 class="font-baloo">Register Here</h3>
                <form  method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="name" class="font-baloo font-size-16 form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Lastname</label>
                        <input type="text" name="lastname" class="font-baloo font-size-16 form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="font-baloo font-size-16 form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" name="sexe" type="radio"  value="male">
                            <span class="form-check-label"> Male </span>
                        </label>
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" name="sexe" type="radio"  value="female">
                            <span class="form-check-label"> Female</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Tel</label>
                        <input type="text" name="tel" class="font-baloo font-size-16 form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pwd" class="font-baloo font-size-16 form-control"  required>
                    </div>
                    <button type="submit" name="submit-register" class="btn btn-warning font-size-12">Register</button>
                </form>
            </div>

        </div>
    </div>
</div>
</body>

<?php
//required functions php file
require('footer.php');
?>