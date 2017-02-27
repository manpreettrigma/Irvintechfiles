
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Subjects</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">

                        <fieldset>
                            <input class="form-control"   id="s"  type="search" placeholder="Search for subject"/>

                        </fieldset>

                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List of Subjects</h2>

                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a href="<?php echo base_url(); ?>admin/subject/add"><button class="btn btn-success btn-sm" type="submit"><i class="fa  fa-plus-square"></i> Add Subject</button></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <?php echo $this->session->flashdata('flash_data'); ?>
                    <?php //echo $this->session->flashdata('flash_data'); ?>
                    <div class="x_content ">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"  width="100%">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody >

                                <?php
                                foreach ($subjectList as $subjects) {
									
                                    ?>
                                    <tr>
                                        <td><?php if(isset($subjects['title'])){ echo $subjects['title']; } ?></td>
                                        <td><?php if(isset($subjects['description'])){  echo $subjects['description']; } ?></td>

                                        <td><?php
                                            if ($subjects['status'] == 0) {
                                                echo "<p style='color:rgb(255, 193, 14)'>Inactive</p>";
                                            }
                                            if ($subjects['status'] == 1) {
                                                echo "<p style='color:green;'>User Verified & Active</p>";
                                            }
                                            ?>
                                        </td>
                                        <td>

                                            <div class="modal fade" id="viewMetaData_<?php echo $subjects['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="exampleModalLabel">View Subject</h4>
                                                        </div>
                                                        <div class="modal-body">

                                                            <?php
                                                            if (!empty($subjects['meta_info'])) {
                                                                foreach ($subjects['meta_info'] as $meta_key => $metaInfo) {
                                                                    if (!empty($metaInfo)) {
                                                                        ?> <div class="row"><div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="recipient-name" class="control-label"><?php echo sentence($meta_key); ?></label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3"><?php echo $metaInfo; ?></div></div><?php
                                                                    }
                                                                }
                                                            } else {
                                                                echo '<label for="recipient-name" class="control-label">No Extra Information Found....</label>';
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                                   <!-- <a title="View" class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewMetaData_<?php echo $subjects['id']; ?>" data-whatever="@getbootstrap"><i class="fa fa-folder"></i></a>-->
                                            <?php if ($subjects['status'] == 1) { ?>
                                                <a title="Deactivate" class="btn btn-danger btn-xs " href="<?php echo base_url() . "admin/subject/block_subject/" . $subjects['id']; ?>"><i class="glyphicon glyphicon-remove"></i></a> 
                                            <?php } if ($subjects['status'] == 0) { ?>
                                                <a title="Activate" class="btn btn-success btn-xs " href="<?php echo base_url() . "admin/subject/unblock_subject/" . $subjects['id']; ?>"><i class="glyphicon glyphicon-ok"></i></a> 
                                            <?php } ?>
                                            <a title="Edit" class="btn btn-success btn-xs " href="<?php echo base_url() . "admin/subject/edit_subject/" . $subjects['id']; ?>"><i class="glyphicon glyphicon-pencil"></i></a> 
                                            <a title="Delete" onclick="return confirm('Are you sure to want to delete?');" class="btn btn-danger btn-xs" href="<?php echo base_url() . "admin/subject/delete/" . $subjects['id']; ?>"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr><?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>/public/js/admin/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script>
    // var jq = jQuery.noConflict();
    // jq(document).ready(function () {
        // jq('#datatable-responsive').DataTable({
            // "bProcessing": true,
            // "serverSide": true,
            // "ajax": {
                // url: "<?php echo base_url(); ?>admin/course/admin_data_table",
                // type: "post",
                // error: function () {
                    // jq("#employee_grid_processing").css("display", "none");
                // }
            // }

        // });
    // });


</script> 