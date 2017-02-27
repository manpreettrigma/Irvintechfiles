<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Users</h3>
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
                        <h2>List of Users</h2>
                        <ul class="nav navbar-right panel_toolbox">
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <?php echo $this->session->flashdata('flash_data'); ?>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($userlist as $users) {
                                    ?>
                                    <tr>
                                        <td><?php echo $users['username']; ?></td>
                                        <td><?php echo $users['email']; ?></td>
                                        <td><?php echo ucfirst($users['role']); ?></td>
                                        <td><?php
                                            if ($users['status'] == 0) {
                                                echo "<p style='color:rgb(255, 193, 14)'>Inactive</p>";
                                            }
                                            if ($users['status'] == 1) {
                                                echo "<p style='color:green;'>User Verified & Active</p>";
                                            }
                                            ?>
                                        </td>
                                        <td>

                                            <div class="modal fade" id="viewMetaData_<?php echo $users['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="exampleModalLabel">View User</h4>
                                                        </div>
                                                        <div class="modal-body">

                                                            <?php
                                                            if (!empty($users['meta_info'])) {
                                                                foreach ($users['meta_info'] as $meta_key => $metaInfo) {
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


                                            <a title="View" class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewMetaData_<?php echo $users['id']; ?>" data-whatever="@getbootstrap"><i class="fa fa-folder"></i></a>
                                            <?php if ($users['status'] == 1) { ?>
                                                <a title="Deactivate" class="btn btn-danger btn-xs " href="<?php echo base_url() . "admin/block_user/" . $users['id']; ?>"><i class="glyphicon glyphicon-remove"></i></a> 
                                            <?php } if ($users['status'] == 0) { ?>
                                                <a title="Activate" class="btn btn-success btn-xs " href="<?php echo base_url() . "admin/unblock_user/" . $users['id']; ?>"><i class="glyphicon glyphicon-ok"></i></a> 
                                            <?php } ?>
                                            <a title="Edit" class="btn btn-success btn-xs " href="<?php echo base_url() . "admin/manage/edit_user/" . $users['id']; ?>"><i class="glyphicon glyphicon-pencil"></i></a> 
                                            <a title="Delete" onclick="return confirm('Are you sure to want to delete?');" class="btn btn-danger btn-xs" href="<?php echo base_url() . "admin/manage/delete_user/" . $users['id']; ?>"><i class="fa fa-trash-o"></i></a>
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
