<div class="full-content">
    <div class="content-col">
        <span class="bold">Adobe Folder Creation</span>
    </div>

    <div class="content-col">

        <form class="add-course" method="POST" id="add_course" enctype="multipart/form-data">
            <section class="catalogEvent">
                <div class="wrapper_provider">
                    <div class="leftFormCol">
                        <div class="fullWidth">
                            <label>Folder Title*</label>
                            <input type="text" name="adobe_folder[title]" placeholder="Enter event title" value="<?php echo set_value('adobe_folder[title]', ''); ?>">
                            <?php echo form_error('adobe_folder[title]', '<p class="red">', '</p>'); ?>
                        </div>
                    </div>

                    <div class="rightFormCol">
                        <div class="fullWidth">
                            <label>Folder Parent</label>
                            <div class="select">
                                <select name="adobe_folder[folder_id]">
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

                        <input type="hidden" name="adobe_folder[user_id]" value="<?php echo $get_profile['id']; ?>">
                        <input type="hidden" name="adobe_folder[created_at]" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    </div>
                    <div class="fullWidth">
                        <div class="fullWidth">
                            <textarea class="provider_textarea" name="adobe_folder[desc]" placeholder="Enter folder description"><?php echo set_value('desc[desc]', ''); ?></textarea>

                        </div>
                    </div>
                    <div class="clear"></div>
                    <button type="submit" name="create_adobe_folder" class="login-today on-demand submit add_course_submit">Create Folder</button>
                </div>
            </section>
            <div class="submit_button"></div>
        </form>
    </div>   
</div>