
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Provider</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Provider</h2>
                        <div class="clearfix"></div>						
                        <?php
                        if ($this->session->flashdata('provider_message')) {
                            $message = $this->session->flashdata('provider_message');
                            ?>
                            <div class="<?php echo $message; ?>"><?php echo $message; ?>

                            </div>
                            <?php
                        }
                        ?>

                    </div>
                    <div class="x_content">


                        <form class="form-horizontal form-label-left" data-parsley-validate="" id="edit_provider_form" name="edit_provider_form" enctype="multipart/form-data" method="POST" novalidate="">

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Type</label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                    <select class="form-control" name="field_type" required id="field_types" >
                                        <option value="text">Select Field Type</option>
                                        <option value="text">Text</option>
                                        <option value="textarea">Text Area</option>
                                        <option value="select">Select Box</option>
                                        <option value="checkbox">Checkbox</option>
                                        <option value="radio">Radio</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="field_wrapper">  
                                </div>
                            </div>

                            <br>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>/admin/page/provider_page">Cancel</a>
                                    <button id="sumbit_provider" class="btn btn-success" type="submit"> <i class="fa fa-plus-square" style="color:rgb(228, 228, 228) !important; font-size:18px;padding:0px;"> </i> Save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/backend/js/signup/jquery.js"></script>
<script>
    $('select').on('change', function () {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        if ($(this).val() == "text") {
            $('.field_wrapper').html('<div><div class="form-group"><label class="control-label col-md-2 col-sm-3 col-xs-12">Field Label<span class="required">*</span></label>  <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_label[]" value="" class="form-control required"> </div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Name<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_name[]" value="" class="form-control  required"></div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Placeholder<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_placeholder[]" value="" class="form-control  required"></div> </div><a href="javascript:void(0);" class="add_button" title="Add field"><img src="<?php echo base_url(); ?>assets/backend/images/add-icon.png"/></a></div>');
        } else if ($(this).val() == "textarea") {
            $('.field_wrapper').html('<div><div class="form-group"><label class="control-label col-md-2 col-sm-3 col-xs-12">Field Label<span class="required">*</span></label>  <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_label[]" value="" class="form-control  required"> </div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Name<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_name[]" value="" class="form-control  required"></div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Placeholder<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_placeholder[]" value="" class="form-control  required"></div> </div><a href="javascript:void(0);" class="add_button" title="Add field"><img src="<?php echo base_url(); ?>assets/backend/images/add-icon.png"/></a></div>');
        } else if ($(this).val() == "file") {
            $('.field_wrapper').html('<div><div class="form-group"><label class="control-label col-md-2 col-sm-3 col-xs-12">Field Label<span class="required">*</span></label>  <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_label[]" value="" class="form-control  required"> </div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Name<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_name[]" value="" class="form-control  required"></div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Placeholder<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_placeholder[]" value="" class="form-control  required"></div> </div><a href="javascript:void(0);" class="add_button" title="Add field"><img src="<?php echo base_url(); ?>assets/backend/images/add-icon.png"/></a></div>');
        } else if ($(this).val() == "select") {
            $('.field_wrapper').html('<div><div class="form-group"><label class="control-label col-md-2 col-sm-3 col-xs-12">Field Label<span class="required">*</span></label>  <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_label[]" value="" class="form-control  required"> </div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Name<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_name[]" value="" class="form-control  required"></div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Placeholder<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_placeholder[]" value="" class="form-control  required"></div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Choice<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><textarea rows="4" cols="50" name="field_choice[]" ></textarea></div> </div><a href="javascript:void(0);" class="add_button" title="Add field"><img src="<?php echo base_url(); ?>assets/backend/images/add-icon.png"/></a></div>');
        } else if ($(this).val() == "checkbox") {
            $('.field_wrapper').html('<div><div class="form-group"><label class="control-label col-md-2 col-sm-3 col-xs-12">Field Label<span class="required">*</span></label>  <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_label[]" value="" class="form-control  required"> </div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Name<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_name[]" value="" class="form-control  required"></div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Placeholder<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_placeholder[]" value="" class="form-control  required"></div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Choice<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><textarea rows="4" cols="50" name="field_choice[]"> </textarea></div> </div><a href="javascript:void(0);" class="add_button" title="Add field"><img src="<?php echo base_url(); ?>assets/backend/images/add-icon.png"/></a></div>');
        } else if ($(this).val() == "radio") {
            $('.field_wrapper').html('<div><div class="form-group"><label class="control-label col-md-2 col-sm-3 col-xs-12">Field Label<span class="required">*</span></label>  <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_label[]" value="" class="form-control  required"> </div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Name<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_name[]" value="" class="form-control  required"></div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Placeholder<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_placeholder[]" value="" class="form-control  required"></div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Choice<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><textarea rows="4" cols="50" name="field_choice[]"></textarea></div> </div><a href="javascript:void(0);" class="add_button" title="Add field"><img src="<?php echo base_url(); ?>assets/backend/images/add-icon.png"/></a></div>');
        } else {
            $('.field_wrapper').html('');
        }

        if($(this).val() == "select"){
            var fieldHTML = '<div><div class="form-group"><label class="control-label col-md-2 col-sm-3 col-xs-12">Field Label<span class="required">*</span></label>  <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_label[]" value="" class="form-control  required"> </div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Name<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_name[]" value="" class="form-control  required"></div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Placeholder<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_placeholder[]" value="" class="form-control  required"></div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Choice<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><textarea rows="4" cols="50" name="field_choice[]"></textarea></div> </div><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?php echo base_url(); ?>assets/backend/images/remove-icon.png"/></a></div>'; //New input field html 
        }else if ($(this).val() == "checkbox"){
            var fieldHTML = '<div><div class="form-group"><label class="control-label col-md-2 col-sm-3 col-xs-12">Field Label<span class="required">*</span></label>  <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_label[]" value="" class="form-control  required"> </div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Name<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_name[]" value="" class="form-control  required"></div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Placeholder<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_placeholder[]" value="" class="form-control  required"></div> </div> <div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Choice<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><textarea rows="4" cols="50" name="field_choice[]"></textarea></div> </div><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?php echo base_url(); ?>assets/backend/images/remove-icon.png"/></a></div>'; //New input field html 
        }else if ($(this).val() == "radio"){
            var fieldHTML = '<div><div class="form-group"><label class="control-label col-md-2 col-sm-3 col-xs-12">Field Label<span class="required">*</span></label>  <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_label[]" value="" class="form-control  required"> </div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Name<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_name[]" value="" class="form-control  required"></div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Placeholder<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_placeholder[]" value="" class="form-control  required"></div> </div> <div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Choice<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><textarea rows="4" cols="50" name="field_choice[]"> </textarea></div> </div><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?php echo base_url(); ?>assets/backend/images/remove-icon.png"/></a></div>'; //New input field html 
        }else{
            var fieldHTML = '<div><div class="form-group"><label class="control-label col-md-2 col-sm-3 col-xs-12">Field Label<span class="required">*</span></label>  <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_label[]" value="" class="form-control has-feedback-left required"> </div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Name<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_name[]" value="" class="form-control  required"></div> </div><div class="form-group">  <label class="control-label col-md-2 col-sm-3 col-xs-12">Field Placeholder<span class="required">*</span></label><div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" name="field_placeholder[]" value="" class="form-control has-feedback-left required"></div> </div> <a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?php echo base_url(); ?>assets/backend/images/remove-icon.png"/></a></div>'; //New input field html 
        }
        var x = 1; 
        $('.add_button').on('click', function () { //Once add button is clicked
            if (x < maxField) { //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
            }
        });
        $('.field_wrapper').on('click', '.remove_button', function (e) { //Once remove button is clicked
            e.preventDefault();
            $(this).parent('div').remove(); 
            x--; 
        });
    });
</script>