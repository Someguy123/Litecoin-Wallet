<?php include("core/header.php"); ?>

    <div class="container">
      <div class="content">
        <div class="page-header">
          <h1>Register</h1>
        </div>
        <div class="row">
          <div class="span10">
            <form action="register.php" method="POST">
                <?php
                $form = '<table class="zebra-striped"><tr><td><p>Username: </td><td><input type="text" name="user" value="' . $_POST['user'] . '"/><br /><small>Usernames must be longer than 3 characters, and less than 35 characters</small></p></td></tr>
                <tr><td><p>Password: </td><td><input type="password" name="password" /> <br /><small>Your password must be longer than 3 characters, maximum of 40 characters</small></p></td></tr>
                <tr><td><p>E-mail: </td><td><input type="text" name="email" value="' . $_POST['email'] . '"/> <br /><small>Incase you lose your password, or get compromised</small></p></td></tr>
                <tr><td><p>Cash-out LTC address (optional): </td><td><input type="text" name="address" value="' . $_POST['address'] . '" /> <br /><small>This is optional, it\'s for cashing your entire wallet out to an address of your choice in a single click</small></p></td></tr></table>
                <input type="hidden" name="shit" value="derp" />
                <input type="submit" class="primary btn" value="Register!"/> ';
                
                /**
                 * srserr() - Returns a serious error for bootstrap
                 * 
                 * @param mixed $e
                 * @example srserr("invalid username")
                 * @return
                 */
                function srserr($e) {
                    return '<div class="alert-message error" data-alert="alert"><a class="close" onclick="\$().alert()" href="#">&times</a><p>' . $e . '</p></div>';
                }
                
                if($_POST['shit']) {
                    if($_POST['user'] && $_POST['password'] && $_POST['email']) {
                        $str = strlen($_POST['user']);
                       if($str >= 3 && $str <= 35) {
                            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                echo "<h3>EVERYTHING IS RIGHT O_O</h3>";
                            } else {
                                echo srserr("Please enter a real email address.");
                                echo $form;
                            }
                       } else {
                           echo srserr("Usernames must be longer than 3 characters, and less than 35 characters");
                           echo $form;
                       }
                       
                    } else {
                        echo srserr('You missed something out, go back and check it again');
                        echo $form;
                    }
                } else {
                echo $form;
                } 
                ?>
            </form>
          </div>
<?php include("core/sidebar.php"); ?>
        </div>
      </div>

<?php include("core/footer.php"); ?>