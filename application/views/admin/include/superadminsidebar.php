<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>

<?php  $id= $this->session->userdata('c718b175bc162f27f740fbfa91a3f090');?>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
		<ul class="nav side-menu dropme">
			
			<?php /*<li><a><i class="fa fa-group"></i> Manage Users <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="<?php echo base_url(); ?>admin/manage_users">Users</a></li>
					<!--li><a href="<?php echo base_url(); ?>admin/page/provider_page">Provider</a></li-->
					<!--li><a href="">Presenter</a></li-->
					<!--<li><a href="<?php echo base_url(); ?>admin/manage_admins">Admins</a></li>-->
				</ul>
			</li> */ ?>
			<li><a href="<?php echo base_url(); ?>admin/page"><i class="fa fa-clone"></i> Pages</a></li>
			<li><a href="<?php echo base_url(); ?>admin/course"><i class="fa fa-book"></i> Courses</a></li>
			<li><a href="<?php echo base_url(); ?>admin/subject"><i class="fa fa-book"></i> Subjects</a></li>
			<li><a href="<?php echo base_url(); ?>admin/degree"><i class="fa fa-book"></i> Degrees</a></li>
			<li><a href="<?php echo base_url(); ?>admin/workshop"><i class="fa fa-book"></i> Workshops</a></li>
			<li><a href="<?php echo base_url(); ?>admin/instructor"><i class="fa fa-book"></i> Instructors</a></li>
			<li><a href="<?php echo base_url(); ?>admin/certificate"><i class="fa fa-book"></i> Certificates</a></li>
			<!--li><a href="#"><i class="fa fa-book"></i>  Adobe Connect</a>
				<ul class="nav child_menu">
					<li> <a href="<?php echo base_url(); ?>admin/mastercatalog/adobe_folder"><i aria-hidden="true" class="fa fa-angle-right"></i>Folder</a></li>
					<li><a href="<?php echo base_url(); ?>admin/mastercatalog/create_adobe_meeting"><i aria-hidden="true" class="fa fa-angle-right"></i>Create Meeting Room</a></li>
					
				</ul>
			</li>
			<li><a href="<?php echo base_url(); ?>admin/mastercatalog"><i class="fa fa-book"></i>Master Catalog</a></li>
			<li><a href="<?php echo base_url(); ?>admin/creditcategory"><i class="fa fa-book"></i>Credit Category</a></li>
			<li><a href="<?php echo base_url(); ?>admin/blog"><i class="fa fa-rss" aria-hidden="true"></i> Blogs</a></li-->			
		</ul>
	</div>
</div>
<script>
$('.dropme').sortable({
    connectWith: '.dropme',
    cursor: 'pointer'
}).droppable({
    accept: '.button',
    activeClass: 'highlight',
    drop: function(event, ui) {
        var $li = $('<div>').html('List ' + ui.draggable.html());
        $li.appendTo(this);
    }
});
</script>