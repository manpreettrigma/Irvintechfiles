<script src="<?php echo base_url(); ?>assets/public/js/angular.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/public/css/flatpickr.min.css">
<div class="full-content">
    <div class="content-col">
        <span class="bold">Master Catalog Event Creation</span>
    </div>
 
    <div class="content-col">

        <form class="add-course" method="POST" id="add_course" enctype="multipart/form-data">
            <section class="catalogEvent">
                <div class="wrapper_provider">
                    <div class="leftFormCol">
                        <div class="fullWidth">
                            <label>Meeting Title</label>
                            <input type="text" name="adobe_meeting[title]" placeholder="Enter event title" value="<?php echo set_value('adobe_meeting[title]', ''); ?>">
                            <?php echo form_error('adobe_meeting[title]', '<p class="red">', '</p>'); ?>
                        </div>

                        <div class="fullWidth">

                            <div class="halfWidth">
                                <label>Start Date &amp; Time</label>
                                <div class="slct_datepicker">
                                    <div class="datepicker_outer">
                                        <input class="flatpickr form-control" type="text" name="adobe_meeting[date_begin]" placeholder="Select Date.." data-enable-time="true" value="<?php echo set_value('adobe_meeting[date_begin]', ''); ?>">
                                    </div>
                                </div>
                                <?php echo form_error('adobe_meeting[date_begin]', '<p class="red">', '</p>'); ?>
                            </div>
                            <div class="halfWidth fltRight">
                                <label>End Date &amp; Time</label>
                                <div class="slct_datepicker">
                                    <div class="datepicker_outer">
                                        <input class="flatpickr form-control" type="text" name="adobe_meeting[date_end]" placeholder="Select Date.." data-enable-time="true" value="<?php echo set_value('adobe_meeting[date_end]', ''); ?>">
                                    </div>
                                </div>
                                <?php echo form_error('adobe_meeting[date_end]', '<p class="red">', '</p>'); ?> 
                            </div>
                        </div>
                    </div>
                    <div class="rightFormCol">
                        <div class="fullWidth">
                            <label>Folder Parent</label>
                            <div class="select">
                                <select name="adobe_meeting[folder_id]">
                                    <?php
                                    if (!empty($get_folder)) {
                                        foreach ($get_folder as $key => $folder) {
                                            echo '<option value="' . $folder['folder_id'] . '">' . $folder['title'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div ng-app="">
                            <div class="fullWidth">
                                <label>Slug(https://cleseminars.adobeconnect.com/{{adobe_meeting[url]}})</label>
                                <input type="text" ng-model="adobe_meeting[url]" name="adobe_meeting[url]" placeholder="computer_science, engineering, mca etc" value="<?php echo set_value('adobe_meeting[url]', ''); ?>">
                                <?php echo form_error('adobe_meeting[url]', '<p class="red">', '</p>'); ?>
                            </div>
                        </div>
                        <input type="hidden" name="adobe_meeting[user_id]" value="<?php echo $get_profile['id']; ?>">
                        <input type="hidden" name="adobe_meeting[created_at]" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    </div>
                    <div class="clear"></div>
                    <button type="submit" name="create_adobe_meeting" class="login-today on-demand submit add_course_submit">Create Meeting</button>
                </div>
            </section>
            <div class="submit_button"></div>
        </form>
    </div>   
</div>


<script src="<?php echo base_url(); ?>assets/public/js/flatpickr.js"></script>
<script src="<?php echo base_url(); ?>assets/public/js/flatdatejquery.js"></script>