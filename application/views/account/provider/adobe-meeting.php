<link rel="stylesheet" href="<?php echo base_url(); ?>assets/public/css/bootstrap-table.css">
<div class="full-content">

    <div class="content-col">
        <div class="row">
            <div class="col-xs-12 col-md-85">
                <h2>Adobe Meeting</h2>                                          
            </div>
            <div id="profile_snapshot" class="col-xs-12 col-md-15">
                <a href="<?php echo base_url(); ?>account/provider/create-adobe-meeting"/>
                <button type="submit" class="btn btn-success btn-sm"><i class="fa  fa-plus-square"></i> Add Meeting</button>
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
                                <th>Title</th>
                                <th>URL</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($get_meeting)) {
                                foreach ($get_meeting as $key => $meeting) {     
                                    ?><tr class="active">
                                        <td><?php echo $meeting['title']; ?></td>
                                        <td><a href="<?php echo $meeting['url']; ?>" target="_blank"><?php echo $meeting['url']; ?></a></td>
                                        <td><?php echo $meeting['date_begin']; ?></td>
                                        <td><?php echo $meeting['date_end']; ?></td>
                                        <td><a href="<?php echo base_url(); ?>account/provider/delete/adobe-meeting/<?php echo $meeting['id']; ?>" onclick="return confirm('Are you sure you want to delete?');">DELETE</a></td>
                                    </tr><?php
                                }
                            }else{
                                echo '<tr class="active"><td colspan="6" align="center">No Meeting Found.....</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

