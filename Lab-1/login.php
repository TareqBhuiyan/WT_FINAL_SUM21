<?php
        //session_start();
        $uname="";
        $err_uname="";
        $pass="";
        $err_pass="";
       
        $hasError=false;
       
        $users = array("tareq"=>"1234","sabbir"=>"123","karim"=>"456","rahim"=>"789");
       
        if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_POST["uname"]))
                {
                    $hasError=true;
                    $err_uname="Username Required";
                }
                else
                        {
                            $uname=$_POST["uname"];
                        }
                       
                if(empty($_POST["pass"]))
                {
                    $hasError=true;
                    $err_pass="Password Required";
                }
                else
                        {
                            $pass=$_POST["pass"];
                        }
                       
                if(!$hasError){
                    foreach($users as $u=>$p){
                        if($uname == $u && $pass == $p){
                            //$_SESSION["loggeduser"] = $uname;
                            setcookie("loggeduser",$uname,time()+120);
                            header("Location: dashboard.php");
                        }
                    }
                    echo "Invalid username";
                }
        }
?>
<html>
    <body>
        <form action="" method="post">
            Username: <input type="text" name="uname" value="<?php echo $uname;?>"><br>
             <span><?php echo $err_uname; ?></span><br>
            Password: <input type="password" name="pass" value="<?php echo $pass;?>"><br>
             <span><?php echo $err_pass; ?></span><br>
            <input type="submit" value="Login">
        </form>
    </body>
</html>