<div class="container login-bg">
    <div class="wrapper">
        <div class="login-box">
            <h2>Log In</h2>
            <form class="login-fields" name="user_login" method="POST" action="<?php echo base_url(); ?>Account/login" >
                <?php
                if (isset($msg)) {
                    echo $msg;
                }
                ?>
                <input type="text" placeholder="Username" autofocus="" required="" name="username">
                <input type="password" placeholder="Password" autofocus="" required="" name="password">
                <div class="remember"><input type="checkbox"><span>Remember username</span></div>
                <p class="log-button"><button type="submit"  name="login_submit" class="login-today on-demand submit log-in">Log In</button></p>
                <a class="light" href="#">Forgotten your username or password?</a>
                <p class="dark">                <?php
					if (!empty($authUrl)) {
					echo '<a href="' . $authUrl . '"><img width="200" src="' . base_url() . 'assets/frontend/images/flogin.png" alt=""/></a>';
					}else {
					}
				?>
         </p>
            </form>
        </div>
      
         
    </div>
</div> 