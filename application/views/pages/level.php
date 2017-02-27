<?php //echo  $this->session->userdata['user_info']['meta_info']['payment_id'];?>
<div class="container">
    <div class="wrapper">
        <div class="presenter top-36">
            <section class="width-100 about-text provider-l">
                <h2>Select Provider Level to <span class="bold">Apply</span></h2> <br>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et doloru m fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p><br>
                <p>Aenean volutpat aliquet diam, id venenatis nisi faucibus sit amet. In hac habitasse platea dictumst. Integer vel sem est. Nulla pharetra, justo vitae placerat dapibus, dui massa pellentesque magna, a sagittis magna lorem a massa. Integer convallis augue eu felis euismod, vel iaculis velit pretium. Nam et diam ut sem aliquet ultrices non eu ante.lectus. Nam blandit odio nisl, ac malesuada lacus fermentum sit amet. Vestibulum vitae aliquet felis, ornare feugiat elit. Nulla varius condimentum elit, sed pulvinar leo sollicitudin vel. </p>
            </section>

            <section class="tab-grid">
                <ul>
                    <li>
                        <h3>Free</h3>
                        <h1>$0</h1>
                        <p>Aenean volutpat aliquet diam, id venenatis nisi faucibus sit amet. Integer convallis augue eu felis euismod</p>
                        <button id="free" class="btn">Free</button>
                    </li>
                    <li>

                        <h3>Platinum Provider</h3>
                        <h1>$10</h1>
                        <p>Aenean volutpat aliquet diam, id venenatis nisi faucibus sit amet. Integer convallis augue eu felis euismod</p>
                        <button id="platinum_provider" onclick="paypal_payment('platinum_provider', 2)" class="btn">Select</button>

                    </li>
                    <li>

                        <h3>Gold Provider</h3>
                        <h1>$15</h1>
                        <p>Aenean volutpat aliquet diam, id venenatis nisi faucibus sit amet. Integer convallis augue eu felis euismod</p>
                        <button id="gold_provider" onclick="paypal_payment('gold_provider', '3')" class="btn">Select</button>

                    </li>
                    <li>

                        <h3>Legal Aid Provider</h3>
                        <h1>$20</h1>
                        <p>Aenean volutpat aliquet diam, id venenatis nisi faucibus sit amet. Integer convallis augue eu felis euismod</p>
                        <button id="legal_aid_provider" onclick="paypal_payment('legal_aid_provider', 4)" class="btn">Select</button>

                    </li>
                    <li>

                        <h3>Provider</h3>
                        <h1>$25</h1>
                        
                        <p>Aenean volutpat aliquet diam, id venenatis nisi faucibus sit amet. Integer convallis augue eu felis euismod</p>
                        <button id="provider" onclick="paypal_payment('provider', 5)" class="btn">Select</button>
                    </li>
                </ul>
                <form method="post" id="form_provider" action="https://www.sandbox.paypal.com/cgi-bin/webscr"></form>	
            </section>

            <section class="width-100 about-text provider-l">
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et doloru m fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
            </section>
        </div>

    </div>
</div>
<div class="clr"></div>
<script>
    function paypal_payment(name, type) {
        $.ajax({
            url: "<?php echo base_url(); ?>" + "page/level",
            type: "post",
            beforeSend: function () {
                $("#" + name).html('loading.....');
            },
            data: 'name=' + name + '&type=' + type,
            success: function (response) {
                //return false;
                var responseArr = $.parseJSON(response);
                if (responseArr.response == 'failed') {
                    alert(responseArr.msg);
                    window.location.href = '<?php echo base_url();?>account/create-provider';
                }else if(responseArr.response == 'failed_found'){
                    alert(responseArr.msg);
                    location.reload();
                }else{
                    $("#" + name).attr('onclick', '');
                    $('#form_provider').append(responseArr.form_data);
                    $('#form_provider').submit();
                }
            }
        });
    }




</script>