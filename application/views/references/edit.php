<section>
		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			<?php require APP . 'views/_templates/profileHeader.php'?>
		    <!-- header-ends -->
			
			<!--body wrapper start-->
			<div id="page-wrapper">
				<div class="graphs">
				
					<h3 class="blank1 myHeader" style="display: inline-block;margin: 0px 20px 30px 0px"> 
					Edit Reference Details 
					</h3>
								
					<form  class="form-horizontal" role="form" action="<?php echo URL_WITH_INDEX_FILE . 'references/updateReference';?>" method="post" >
						<div class="modal-body">
								<div class="form-group">
									<label class="control-label col-sm-2" for="refTitle">Title:</label>
									<div class="col-sm-10">
										<input name="refTitle"type="text" class="form-control" id="refTitle"
											value="<?php echo $reference->title?>" required="required" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="refAuthor">Author:</label>
									<div class="col-sm-10">
										<input name="refAuthor"type="text" class="form-control" id="refAuthor"
											value="<?php echo $reference->author?>" required />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="refJournal">Journal:</label>
									<div class="col-sm-10">
										<input name="refJournal"type="text" class="form-control" id="refJournal"
											value="<?php echo $reference->journal?>" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="refDate">Publication Date:</label>
									<div class="col-sm-10">
										<input name="refDate"type="text" class="form-control" id="refDate"
											value="<?php echo $reference->publishDate?>" />
									</div>
								</div>
								
						</div>
						<div class="modal-footer">
							<input name="refId" type="hidden" value="<?php echo $reference->id;?>" />
							<button type="submit" class="btn btn-danger" >Edit Reference</button>
						</div>
					</form>
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