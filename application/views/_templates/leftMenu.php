<section>
<div class="left-side sticky-left-side">

	<!--logo and iconic logo start-->
	<div class="logo">
		<h1>
			<a href="index.php">Bib <span>Manager</span></a>
		</h1>
	</div>
	<div class="logo-icon text-center">
		<a href="index.php"><i class="lnr lnr-home"></i> </a>
	</div>

	<!--logo and iconic logo end-->
	<div class="left-side-inner">

		<!--sidebar nav start-->
		<ul class="nav nav-pills nav-stacked custom-nav">
			<li><a
				href="<?php echo URL_WITH_INDEX_FILE . 'home/index/' . $unfiledLib->id; ?>"><i
					class="lnr lnr-menu"></i> <span>Unfiled</span></a></li>

			<li class="menu-list"><a href="#"><i class="lnr lnr-menu"></i> <span>My
						Libraries</span></a>
				<ul class="sub-menu-list">

									<?php foreach ($ownedLibs as $ownedLib) { ?>
										<li><a
						href="<?php echo URL_WITH_INDEX_FILE . 'home/index/' . $ownedLib->id; ?>"><?php echo $ownedLib->name; ?></a></li>
									<?php }?>
								</ul></li>

			<li class="menu-list"><a href="#"><i class="lnr lnr-menu"></i> <span>Libs
						shared with me</span></a>
				<ul class="sub-menu-list">
									<?php foreach ($sharedLibs as $sharedLib) { ?>
										<li><a
						href="<?php echo URL_WITH_INDEX_FILE . 'home/index/' . $sharedLib->id; ?>"><?php echo $sharedLib->name; ?></a></li>
									<?php }?>
								</ul></li>

			<li><a
				href="<?php echo URL_WITH_INDEX_FILE . 'home/index/' .$trashLib->id ?>"><i
					class="lnr lnr-menu"></i> <span>Trash</span></a></li>
		</ul>
		<!--sidebar nav end-->
	</div>

	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#newLibModal">Create New Library</button>
</div>
</section>

<!-- Modal New Library -->
<div class="modal fade" id="newLibModal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">New Library</h4>
			</div>
			<form action="<?php echo URL_WITH_INDEX_FILE . 'libraries/addLibrary';?>" method="post" >
				<div class="modal-body">
					<p>Please choose a name for your library.</p>

					<fieldset>
						<label for="name">Library Name: </label> 
						<input type="text" name="libName" id="libName"
							class="text ui-widget-content ui-corner-all">
					</fieldset>


				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default" >Create
						Library</button>
				</div>
			</form>
		</div>

	</div>
</div>

