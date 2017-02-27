<script>
     $(document).ready(function () {
        $('#profile_img').on('change', function (event) {
            var tmppath = URL.createObjectURL(event.target.files[0]);
            $('#preview_profile_src').attr('src', tmppath);
            $('.modal-footer').append('<button class="btn btn-default submit_picture" type="submit">Save</button>');
        });

        $("#update_profile_form").submit(function (e) {
            e.preventDefault();
            var post_url = $(this).attr("action"); 
            var request_method = $(this).attr("method"); 
            var form_data = new FormData(this);
            var d = new Date();
            var time = d.getTime();
            $.ajax({
                url: post_url,
                type: request_method,
                beforeSend: function () {
                    $("#profile_snapshot").append('<p class="uploading_progress"><img src="<?php echo base_url() . 'assets/public/img/progress_bar.gif'; ?>"></p>');
                    $("#profile_picture_image").append('<p class="uploading_progress"><img src="<?php echo base_url() . 'assets/public/img/progress_bar.gif'; ?>"></p>');
                },
                data: form_data,
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false
            }).done(function (res) {
                $(".submit_picture").remove();
                $(".uploading_progress").remove();
                $(".profileBtnOuterLogin img").attr('src', '<?php echo base_url(); ?>uploads/user_profile/large/' + res.file_name + '?timestamp=' + time);
                $("#profile_picture_image img").attr('src', '<?php echo base_url(); ?>uploads/user_profile/large/' + res.file_name + '?timestamp=' + time);
                if (res.success == "error") {
                    $("#contact_results").html('<div class="error">' + res.text + "</div>");
                }
                if (res.type == "done") {
                    $("#contact_results").html('<div class="success">' + res.text + "</div>");
                }
            });

        });
        
        $('.close_modal').click(function(){
             $(".submit_picture").remove();
        });
    });
    
    
    /*function change_profile_picture(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview_profile_src').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }*/
</script>