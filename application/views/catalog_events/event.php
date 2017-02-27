<section class="catalogForm">
    <div class="wrapper">
        <ul>
            <li><a href="#">Master Catalog</a></li>
            <li><a href="#">Provider Catalog</a></li>
            <li><a href="#">Reports</a></li>
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">My Account</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</section>
<form method="post" enctype="multipart/form-data">
    <section class="catalogEvent">
        <div class="wrapper">
            <h1>Master Catalog Event Creation</h1>
            <div class="eventBar">
                <ul>
                    <li><a href="#">Create Event</a></li>
                    <li><a href="#">Create Speaker</a></li>
                    <li><a href="#">Related Publications</a></li>
                </ul>
                <div class="eventSearchBar">
                    <input type="search" value="" placeholder="Search">
                    <input type="button" value="" class="searchBtn">
                </div>
            </div>
            <?php
            if ($this->session->flashdata('catalogevent_name')) {
                $message = $this->session->flashdata('catalogevent_name');
                ?><div class="success message"><?php echo $message; ?></div><?php
            }
            ?>

            <h1>Event Information</h1>

            <div class="leftFormCol">
                <div class="fullWidth">
                    <label>Event Name</label>
                    <input type="text" name="event[event_name]"value="<?php echo set_value('event', ''); ?>" required="required" />
                    <?php echo form_error('event', '<p class="red">', '</p>'); ?>
                </div>
                <div class="fullWidth">
                    <label>Short Description</label>
                    <textarea name="event[description]"></textarea>
                </div>
                <div class="fullWidth">
                    <label>Longer Description</label>
                    <textarea></textarea>
                </div>
                <div class="fullWidth">
                    <div class="halfWidth">
                        <label>Start Date & Time</label>
                        <div class="slct_datepicker">
                            <div class="datepicker_outer">
                                <input class="form-control" value="" name="event[start_date]" id="date" data-select="datepicker" type="text" placeholder="dd/mm/yyyy">
                                <span class="date_icon">
                                    <button type="button" class="btn btn-primary" data-toggle="datepicker"><i class="fa fa-calendar"></i></button>
                                </span> </div>
                        </div>
                    </div>
                    <div class="halfWidth fltRight">
                        <label>End Date & Time</label>
                        <div class="slct_datepicker">
                            <div class="datepicker_outer">
                                <input class="form-control" value="" name="event[end_date]" id="date" data-select="datepicker" type="text" placeholder="dd/mm/yyyy">
                                <span class="date_icon">
                                    <button type="button" class="btn btn-primary" data-toggle="datepicker"><i class="fa fa-calendar"></i></button>
                                </span> </div>
                        </div>
                    </div>
                </div>
                <div class="fullWidth">
                    <label>Time Zone</label>
                    <input name="event_meta[time_zone]" type="text" value="">
                </div>


                <div class="fullWidth">
                    <label> <input name="event_meta[webinar]" type="radio" value="">Live Webinar</label>

                    <div class="radioCol"> <label>Select Existing Adobe Connect Meeting Room</label>
                        <input type="text" name="event_meta[existing_meeting_room]" value="">
                        <br>
                        <label>Create New Adobe Connect Meeting Room</label>
                        <input type="text" name="event_meta[new_meeting_room]" value=""></div>

                </div>


                <div class="fullWidth">
                    <label> <input name="event_meta[webinar]" type="radio" value="">On-Demand Webinar</label>

                    <div class="radioCol"> <label>Select Adobe Connect Server Content</label>
                        <input type="text"  name="event_meta[server_room]"  value="">
                        <br>
                        <label>Upload On-Demand Content</label>
                        <input type="text" name="event_meta[on_demand_content]" value=""></div>

                </div>
            </div>


            <div class="rightFormCol">

                <div class="fullWidth">
                    <div class="halfWidth">
                        <label>Select Topic Tags for the Event</label>
                        <select name="event_meta[practice_management]">
                            <option>Practice Management</option>
                            <option>Legal Ethics</option>
                            <option>Technology</option>
                            <option>Tag 4</option>
                            <option>Tag 5</option>
                            <option>Tag 6</option>

                        </select>
                    </div>

                    <div class="halfWidth fltRight">
                        <label>Select Type(s) of credit for the Event</label>
                        <select name="event_meta[credit_events]">
                            <option>General</option>
                            <option>Legal Ethics</option>
                            <option>Practice Skills</option>
                            <option>Tag 4</option>
                            <option>Tag 5</option>
                            <option>Tag 6</option>

                        </select>
                    </div>
                </div>

                <div class="fullWidth">

                    <div class="halfWidth">
                        <label>Select a Speaker the Event</label>
                        <select name="event_meta[speaker_events]">
                            <option>Speaker 1</option>
                            <option>Speaker 2</option>
                            <option>Speaker 3</option>
                            <option>Speaker 4</option>
                            <option>Speaker 5</option>
                            <option>Speaker 6</option>
                        </select>
                    </div>


                    <div class="halfWidth fltRight">
                        <label>Select catalog(s) to add event to</label>
                        <select name="event_meta[add_events]">
                            <option>Catalog 1</option>
                            <option>Catalog 2</option>
                            <option>Catalog 3</option>
                            <option>Catalog 4</option>
                            <option>Catalog 5</option>
                            <option>Catalog 6</option>
                        </select>
                    </div>
                </div>

                <div class="fullWidth">
                    <!--    <label>Upload Handout (PDF)</label>
                       <input type="file" name="pdf_file" value="">
                      </div>-->
                    <div class="fullWidth">
                        <label>Select User Id</label>
                        <select name="event[user_id]">
                            <?php foreach ($user_id as $UserId) {
                                ?>
                                <option value="<?php echo $UserId['id']; ?>"><?php echo $UserId['id']; ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="fullWidth">
                        <label>Upload Main Event Photo</label>
                        <input type="file" name="event_photo" value="">
                    </div>

                    <input type="submit" name="event_meta[create_event]" value="Create Event">

                </div>


                <div class="clear"></div>
            </div>
    </section>
</form>
<script>
    //Menu Slide Js
    jQuery(document).ready(function ($) {
        $('.smobitrigger').smplmnu();
    });
</script> 
<script type="text/javascript">
    $('select').each(function () {
        var $this = $(this), numberOfOptions = $(this).children('option').length;

        $this.addClass('select-hidden');
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled"></div>');

        var $styledSelect = $this.next('div.select-styled');
        $styledSelect.text($this.children('option').eq(0).text());

        var $list = $('<ul />', {
            'class': 'select-options'
        }).insertAfter($styledSelect);

        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
        }

        var $listItems = $list.children('li');



        $styledSelect.click(function (e) {
            if ($('.select-options').is(':visible')) {
                e.stopPropagation();
                $styledSelect.text($(this).text()).removeClass('active');
                $this.val($(this).attr('rel'));

                $list.hide();
                //console.log($this.val());   

            } else {
                e.stopPropagation();
                $('div.select-styled.active').each(function () {
                    $(this).removeClass('active').next('ul.select-options').hide();
                });
                $(this).toggleClass('active').next('ul.select-options').toggle();
            }//end if
        });

        $listItems.click(function (e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            $list.hide();
            //console.log($this.val());
        });

        $(document).click(function () {
            $styledSelect.removeClass('active');
            $list.hide();
        });

    });
</script> 
<link href="<?php echo base_url(); ?>assets/frontend_dashboard/css/jquery.datepicker.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/frontend_dashboard/js/jquery.datepicker.js"></script>
<script type="text/javascript">
    $('.tabs-1').jQueryTab({
        initialTab: 2,
        tabInTransition: 'fadeIn',
        tabOutTransition: 'fadeOut',
        cookieName: 'active-tabs-1'
    });
</script>
