
<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        <?php if (!empty($login_error)) { ?>
            <div  id="error_message_temp" class="login_wrapper" style="">
                <fieldset class="form login_form " style="padding:7px;margin-top:-18px;border:1px solid indianred;text-align:center; color:indianred;">
                    <p id="error_message_temp_text"><?php echo $login_error; ?></p>
                </fieldset>
            </div>
        <?php } ?>		
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form name="admin_login" method="POST" action="" >
                        <h1>Login</h1>
                        <div>
                            <input type="text" id="user_id" class="form-control" name="username" placeholder="Email / Username" value="<?php if (isset($_REQUEST['username'])) {
            echo $_REQUEST['username'];
        } ?>" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" name="password" value="<?php if (isset($_REQUEST['password'])) {
            echo $_REQUEST['password'];
        } ?>" required="" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit">Log in</a>

                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />

                        </div>

                    </form>
                </section>

                <center>
                    <a href="javascript:void(0)" id="anchor_reset">Forgot Password?</a>
                </center>


            </div> 

        </div>

    </div>
</body>
</html>
<script>
    $(document).ready(function () {
        $('#user_id').focus();
        setTimeout(function () {
            $('#error_message_temp').fadeTo('slow', 0);
        }, 5000);
        setTimeout(function () {
            $('#error_message_temp').remove();
        }, 8000);
    });

</script>
<script>
    $(function () {
        $("#anchor_reset").click(function () {
            var seconds = 2;
            $("#dvCountDown").show();
            $("#lblCount").html(seconds);
            setInterval(function () {
                seconds--;
                $("#lblCount").html(seconds);
                if (seconds == 0) {
                    $("#dvCountDown").hide();
                    window.location = "<?php echo base_url() . "admin/request_password"; ?>";
                }
            }, 1000);
        });
    });
</script>