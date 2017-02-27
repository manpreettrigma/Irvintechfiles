<?php //print_r($this->session->userdata['user_info']);?>
<div class="container">
    <div class="wrapper">
        <div class="presenter top-36">
            <section class="width-100 about-text provider-l">
                <h2><span class="bold">Payment Successfull!</span></h2><br>
                <p>You have completed payment successfully.</p><br>
                <p>Redirecting your dashboard, Please wait......</p><br>
            </section>
        </div>
    </div>
</div>
<div class="clr"></div>
<script>
setTimeout(function() {
  window.location.href = '<?php echo base_url();?>account/dashboard';
}, 4000);
</script>