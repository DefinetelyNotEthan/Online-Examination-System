<!DOCTYPE html>
<html lang='en'>

    <head>
        <meta charset="UTF-8" />
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>Login</title>
    </head>
    
    <body>
       
        <div class="container" id="container">
             
            <div class="form-container sign-up-container">
                   <form action="signup-check.php" method="POST">
                   
                    <h1 style="position:absolute;top:15px;font-size:25px;">CREATE ACCOUNT</h1>
                    <div style="height:0px;"><br></div>
                    <input type="text" placeholder="LOGIN ID" class="textboxSignUp" id="loginID" name="loginID"/>
                    <input type="text" placeholder="FIRSTNAME" class="textboxSignUp" id="FN" name="FN" />
                    <input type="text" placeholder="LASTNAME" class="textboxSignUp" id="LN" name="LN"/>
                    <input type="text" placeholder="NICKNAME" class="textboxSignUp" id="NN" name="NN"/>
                    <input type="email" placeholder="EMAIL" class="textboxSignUp" id="EM" name="EM"/>
                    <input type="password" placeholder="PASSWORD" class="textboxSignUp" id="PW" name="PW"/>
                    <input type="text" placeholder="COURSE (FOR TEACHER)" class="textboxSignUp" id="COU" name="COU"/>
                    <input type="text" placeholder="GENDER M/F (FOR STUDENT)" class="textboxSignUp" id="GEN" name="GEN"/>
                    <input type="text" placeholder="BIRTHDAY (FOR STUDENT)" class="textboxSignUp" id="BD" name="BD"/>
                    <div style="height:10px;"></div>
                    <button type="submit" class="CreateButton" onclick="return submitForm()" >CREATE</button>
                    
                    <div class="box-3"></div>
                   </form>     
            </div>

            <div class="form-container sign-in-container" id="Log_In">
                <form action="login_process.php" method="POST">
                 
                    <h1>ONLINE<br>EXAMINATION<br>SYSTEM</h1>
                    
                    <input type="text" placeholder="ID" class="textbox" id="userID" name="userID" />
                    <input type="password" placeholder="PASSWORD" class="textbox" id="password" name="password"/>
                    <p>
                    <button type="submit" class="loginButton" id="loginButton">LOGIN</button>
                   </p>
                   <?php if (isset($_GET['error'])) { ?>
                       <p class="Error"><?php echo $_GET['error']; ?> </p>
                    <?php } ?>
                 <div class="box-1"></div>
                </form>                
            </div>

            <div class="overlay-container">
                <div class="overlay">

                    <div class="overlay-panel overlay-left">
                    <h1>WELCOME &nbsp BACK!</h1>
                    <p class="linesHeight">
                        To keep connected with us please login with your <br> personal info
                    </p>
                    <button class="ghost SignButton" id="signIn">SIGN IN</button>
                    <div class="box-2"></div>
                    </div>


                    <div class="overlay-panel overlay-right">
                    <h1>Hello &nbsp And &nbsp Welcome!</h1>
                    <p class="linesHeight">Enter your personal details and login the system!</p>
                    <p>OR</p>
                    <br>
                    <button class="ghost SignButton" id="signUp">SIGN UP</button>
                    <div class="box-2"></div>
                    </div>

                </div>
            </div>          
        </div>

        <script src="main.js"></script>
        <script src="signup-validate.js"></script>
        

        
    </body>

</html>
