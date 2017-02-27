  <body class="login" >
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
        <?php if (!empty($error)) { ?>
		<div  id="error_message_temp" class="login_wrapper" style="">
		<fieldset class="form login_form " style="padding:7px;margin-top:-18px;border:1px solid indianred;text-align:center; color:indianred;">
		<p id="error_message_temp_text"><?php echo $error; ?></p>
		</fieldset>
		</div>
		<?php } ?>	
		<?php if (!empty($success)) { ?>
		<div  id="success_message_temp" class="login_wrapper" style="">
		<fieldset class="form login_form " style="padding:7px;margin-top:-18px;border:1px solid #1ABB9C;text-align:center; color:#1ABB9C;">
		<p id="error_message_temp_text"><?php echo $success; ?></p>
		</fieldset>
		</div>
		<?php }  echo "</br>"; ?>			
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form name="admin_login" method="POST" action="" >
		
              <h2>Request New Password</h2>
			  
              <div>
                <input type="text" class="form-control" name="username" placeholder="Email / Username" value="<?php if(isset($_REQUEST['username'])){echo $_REQUEST['username']; } ?>" required="" />
              </div>
              
              <div>
                <button type="submit" class="btn btn-default submit">Request Password</a>
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                
                <div class="clearfix"></div>
                <br />

              </div>
            </form>
          </section>
		 <center> <h1><img src="<?php echo base_url()."public/"?>/images/pinkIcon.png"> TheLadress</h1></center>
        </div>            
      </div>
    </div>
  </body>
</html>
  <script>
  $(document).ready(function(){
   setTimeout(function(){
  $('#error_message_temp').fadeTo('slow', 0);
    }, 5000);
    setTimeout(function(){
    $('#error_message_temp').remove();
      }, 8000);
	});
	  $(document).ready(function(){
   setTimeout(function(){
  $('#success_message_temp').fadeTo('slow', 0);
    }, 8000);
    setTimeout(function(){
    $('#success_message_temp').remove();
      }, 10000);
	});
  </script>