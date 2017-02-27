<link rel="stylesheet" href="<?php echo base_url(); ?>assets/public/css/bootstrap-table.css">
<div class="full-content">

    <div class="content-col">
        <div class="row">
            <div class="col-xs-12 col-md-85">
                <h2>Adobe Folder</h2>                                          
            </div>
            <div id="profile_snapshot" class="col-xs-12 col-md-15">
                <a href="<?php echo base_url(); ?>account/provider/create-adobe-folder"/>
                <button type="submit" class="btn btn-success btn-sm"><i class="fa  fa-plus-square"></i> Add Folder</button>
                </a>
            </div>
        </div>
    </div>

    <div class="content-col">
        <?php
        if ($this->session->flashdata('message_status')) {
            $message = $this->session->flashdata('message_status');
            ?><div class="Profile updated succcessfully"><?php echo $message; ?></div><?php
        }
        ?>
        <div class="upcome webinarss">
            <div class="row">
                <div class="panel-primary filterable">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Folder ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($get_folder)) {
                                foreach ($get_folder as $key => $folder) {     
                                    ?><tr class="active">
                                        <td><?php echo "#".$folder['folder_id']; ?></td>
                                        <td><?php echo $folder['title']; ?></td>
                                        <td><?php echo $folder['created_at']; ?></td>
                                        <td><?php if($folder['id']!=1): ?><a href="<?php echo base_url(); ?>account/provider/delete/adobe-folder/<?php echo $folder['id']; ?>" onclick="return confirm('Are you sure you want to delete?');">DELETE</a><?php endif; ?></td>
                                    </tr><?php
                                }
                            }
                            else{
                                echo '<tr class="active"><td colspan="4" align="center">No Folder Found.....</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

