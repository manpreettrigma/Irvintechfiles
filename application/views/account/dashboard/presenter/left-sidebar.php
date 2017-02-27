<div class="left-content">
    <div class="left-group">
        <h2>Navigation</h2>
        <ul>
            <li>
                <a class="main-link" href="javascript:void(0)"><span><i class="fa fa-book" aria-hidden="true"></i></span>My Courses</a>
                <ul class="sublinks">
                    <li>
                        <a href="javascript:void(0)">
                            <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                            Upcoming Webinars
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                            In Progress On-Demand Courses
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                            Completed Courses
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:void(0)"><span><i class="fa fa-calendar" aria-hidden="true"></i></span>Calendar</a>
            </li>
        </ul>
    </div><!--left-group close here-->
    <div class="left-group">
        <h2>Private Files</h2>
        <ul>
            <li>
                <a class="main-link" href="javascript:void(0)"><span><i class="fa fa-files-o" aria-hidden="true"></i></span>My Files</a>
            </li>
            <li>
                <a href="javascript:void(0)"><span><i class="fa fa-file-archive-o" aria-hidden="true"></i></span>Manage Private Files</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>Account/edit_profile">
                    <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    Edit Profile
                </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>Account/edit_password">
                    <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    Edit Password
                </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>Account/logout">
                    <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    Log out
                </a>
            </li>
        </ul>
    </div><!--left-group close here-->
</div><!--left-content close here-->
<script>
    $(".main-link").click(function () {
        $(".sublinks").toggle();
    });
</script>

<script>
    $(".profile").click(function (e) {
        e.stopPropagation();
        $(".p-options").toggle();
    });
    $(".p-options").on("click", function (e) {
        e.stopPropagation();
    });
    $(document).on("click", function () {
        $(".p-options").hide();
    });
</script>
