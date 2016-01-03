
<div class="header-section">
	<!--notification menu start -->
	<div class="menu-right">
		<div class="user-panel-top">
			<div class="profile_details">
				<ul>
					<li class="dropdown profile_details_drop"><a href="#"
						class="dropdown-toggle" data-toggle="dropdown"
						aria-expanded="true">
							<div class="profile_img">
								<span>
								<i class="fa fa-user"></i>
								</span>
								<div class="user-name">
									<p>
										<?php echo $_SESSION["user"]->firstname;?> <span><?php echo $_SESSION["user"]->email;?></span>
									</p>
								</div>
								<i class="lnr lnr-chevron-down"></i> <i
									class="lnr lnr-chevron-up"></i>
								<div class="clearfix"></div>
							</div>
					</a>
						<ul class="dropdown-menu drp-mnu">
							<li><a href="<?php echo URL_WITH_INDEX_FILE . 'home/editProfile' ?>"><i class="fa fa-user"></i>Profile</a></li>
							<li><a href="<?php echo URL_WITH_INDEX_FILE . 'home/logout' ?>"><i class="fa fa-sign-out"></i> Logout</a>
							</li>
						</ul></li>
					<div class="clearfix"></div>
				</ul>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>
	<!--notification menu end -->
</div>