<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Pages</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                      <!--<input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                      </span>-->
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List of Pages</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>

                                <a href="<?php echo base_url(); ?>admin/page/add_provider"><button type="submit" class="btn btn-success btn-sm"><i class="fa  fa-plus-square"></i>Add Field</button></a>
                            </li>


                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                  
                                    <th>Filed Id</th>
                                    <th>Role Type</th>
                                    <th>Field</th>
                                 
                                </tr>
                            </thead>

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
    var jq = jQuery.noConflict();
    jq(document).ready(function () {
        jq('#datatable-responsive').DataTable({
            "bProcessing": true,
            "serverSide": true,
            "ajax": {
                url: "<?php echo base_url(); ?>admin/page/admin_manage_fields_table",
                type: "post",
                error: function () {
                    jq("#employee_grid_processing").css("display", "none");
                }
            }

        });
    });

    function confirm_delete(params) {
        var x = confirm("Are you sure you want to delete?");
        if (x)
            window.location.href = "<?php echo base_url(); ?>admin/page/delete/"+params;
        else
            return false;
    }
</script> 

<!-- /Datatables -->