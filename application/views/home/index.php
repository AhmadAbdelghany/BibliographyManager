
    <section>
		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			<?php require APP . 'views/_templates/profileHeader.php'?>
		    <!-- header-ends -->
			
			<!--body wrapper start-->
			<div id="page-wrapper">
				<div class="graphs">
				
				<div class="container">	
					<h3 class="blank1 myHeader" style="display: inline-block;margin: 0px 20px 30px 0px"> 
					<?php echo $activeLib->name;?> 
					</h3>
					<?php if (!$activeLib->isSysLib) { ?>				
					<div class="" style="display: inline-block;">
						<div class="dropdown" style="display: inline-block;">
							<a href="#" title="" class="btn btn-default"
								data-toggle="dropdown" aria-expanded="false"> <i
								class="fa fa-cog icon_8"></i> <i
								class="fa fa-chevron-down icon_8"></i>
								<div class="ripple-wrapper"></div></a>
							<ul class="dropdown-menu">
								<li><a href="#renameLibModal" data-toggle="modal"> <i class="fa fa-pencil-square-o icon_9"></i>
										Rename
								</a></li>
								<li class="divider"></li>
								<li><a href="#" class="font-red" title=""> <i class="fa fa-times"
										icon_9=""></i> Delete
								</a></li>
							</ul>
						</div>
					</div>
					
					<div class="dropdown" style="display: inline-block;">
					    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Share
					    <span class="caret"></span></button>
					    <ul class="dropdown-menu">
					      <li class="dropdown-header">Currently shared with:</li>
					      <?php foreach ($activeLibViewers as $viewer) { ?>
					      <li>
					      	<?php echo $viewer->email;?>
					      	<form style="display: inline-block;" action="<?php echo URL_WITH_INDEX_FILE . 'libraries/unshare';?>" method="post">
					      	<input name="userId" type="hidden" value="<?php echo $viewer->id;?>" />
					      	<button type="submit" class="btn btn-link btn-sm">unshare</button>
					      	</form>
					      </li>
					      <?php } ?>
					      <li class="divider"></li>
					      <li>
					      	<button type="button" class="btn btn-link btn-block" data-toggle="modal" data-target="#shareModal">Share with others</button>
					      </li>
					    </ul>
					  </div>
					  <?php }?>
				</div>
				<div class="clearfix"></div>
				
				<h4 class="blank1">References</h4>
				<div style="margin-bottom: 10px;">
				<?php if ($activeLib->name != "Trash") {?>
				<button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#newRefModal">Add a reference</button>
				<?php } else {?>
				<a class="btn btn-default btn-md" href="<?php echo URL_WITH_INDEX_FILE.'references/emptyTrash'?>">Empty Trash!</a>
				<?php }?>
				</div>
				<div class="clearfix"></div>
				<div class="bs-example4" data-example-id="contextual-table">
						<table id="example" class="table table-hover">
						  <thead>
							<tr>
							  <th>Id</th>
							  <th>Title</th>
							  <th>Author</th>
							  <th>Journal</th>
							  <th>Actions</th>
							</tr>
						  </thead>
						  <tbody>
							<?php foreach ($activeLibReferences as $reference) { ?>
							<tr>
							  <th scope="row"><?php echo $reference->id;?></th>
							  <td><?php echo $reference->title;?></td>
							  <td><?php echo $reference->author;?></td>
							  <td><?php echo $reference->journal;?></td>
							  <td>
								<?php if ($activeLib->name != "Trash") {?>
							  	<a href="<?php echo URL_WITH_INDEX_FILE.'references/edit/'.$reference->id?>">
						          <span class="glyphicon glyphicon-pencil"></span>
						        </a>
								&nbsp;
						        <a href="<?php echo URL_WITH_INDEX_FILE.'references/delete/'.$reference->id?>">
						          <span class="glyphicon glyphicon-trash"></span>
						        </a>
								<?php }?>
							  </td>
							</tr>
							<?php }?>
						  </tbody>
						</table>
					   </div>
				</div>
			</div>
			 <!--body wrapper end-->
		</div>
        <!--footer section start-->
			<footer>
			   <p>&copy 2015 Easy Admin Panel. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts.</a></p>
			</footer>
        <!--footer section end-->

      <!-- main content end-->
   </section>

<!-- Modal New Reference -->
<div class="modal fade" id="newRefModal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">New Reference</h4>
			</div>
			<form  class="form-horizontal" role="form" action="<?php echo URL_WITH_INDEX_FILE . 'references/addReference';?>" method="post" >
				<div class="modal-body">
					<p>Please enter reference details.</p>
						<div class="form-group">
							<label class="control-label col-sm-2" for="refTitle">Title:</label>
							<div class="col-sm-10">
								<input name="refTitle"type="text" class="form-control" id="refTitle"
									placeholder="Enter title" required />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="refAuthor">Author:</label>
							<div class="col-sm-10">
								<input name="refAuthor"type="text" class="form-control" id="refAuthor"
									placeholder="Enter Author" required />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="refJournal">Journal:</label>
							<div class="col-sm-10">
								<input name="refJournal"type="text" class="form-control" id="refJournal"
									placeholder="Enter Journal" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="refDate">Publication Date:</label>
							<div class="col-sm-10">
								<input name="refDate"type="text" class="form-control" id="refDate"
									placeholder="YYYY/MM/DD" />
							</div>
						</div>
						
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default" >Create Reference</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Modal Share -->
<div class="modal fade" id="shareModal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Share Reference</h4>
			</div>
			<form  class="form-horizontal" role="form" action="<?php echo URL_WITH_INDEX_FILE . 'libraries/share';?>" method="post" >
				<div class="modal-body">
					<p>Please enter email to share with.</p>
						<div class="form-group">
							<label class="control-label col-sm-2" for="refTitle">email:</label>
							<div class="col-sm-10">
								<input name="emailToShare" type="email" class="form-control" id="emailToShare"
									placeholder="email" required />
							</div>
						</div>						
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default" >Done</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Rename Library -->
<div class="modal fade" id="renameLibModal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Rename Library</h4>
			</div>
			<form action="<?php echo URL_WITH_INDEX_FILE . 'libraries/renameLibrary';?>" method="post" >
				<div class="modal-body">
					<p>Please choose a new name for your library.</p>

					<fieldset>
						<label for="name">Library Name: </label> 
						<input type="text" name="newLibName" id="newLibName" value="<?php echo $activeLib->name;?>"
							class="text ui-widget-content ui-corner-all">
					</fieldset>


				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default" >Rename
						Library</button>
				</div>
			</form>
		</div>

	</div>
</div>