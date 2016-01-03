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
					Edit Your Profile 
					</h3>
								
					<form  class="form-horizontal" role="form" action="<?php echo URL_WITH_INDEX_FILE . 'home/updateProfile';?>" method="post" >
						<div class="modal-body">
								<div class="form-group">
									<label class="control-label col-sm-2" for="firstName">firstname:</label>
									<div class="col-sm-10">
										<input name="firstName"type="text" class="form-control" id="firstName"
											value="<?php echo $user->firstname;?>" required="required" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="surname">Surname:</label>
									<div class="col-sm-10">
										<input name="surname"type="text" class="form-control" id="surname"
											value="<?php echo $user->surname?>" required />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="refJournal">email:</label>
									<div class="col-sm-10">
										<input name="email" type="email" class="form-control" id="email"
											value="<?php echo $user->email?>" />
									</div>
								</div>							
								
						</div>
						<div class="modal-footer">
							<input name="userId" type="hidden" value="<?php echo $user->id;?>" />
							<button type="submit" class="btn btn-danger" >Edit Profile</button>
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