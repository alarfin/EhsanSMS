<div id="navbar" class="navbar">
	<button type="button" class="navbar-toggle navbar-btn collapsed" data-toggle="collapse" data-target="#sidebar">
		<span class="fa fa-bars"></span>
	</button>
	<a class="navbar-brand" href="#">
		<small>
			<i class="fa fa-desktop"></i>
			Ehsan SMS
		</small>
	</a>

	<!-- BEGIN Navbar Buttons -->
	<ul class="nav flaty-nav pull-right">
		<!-- BEGIN Button Tasks -->
		{{-- <li class="hidden-xs">
			<a data-toggle="dropdown" class="dropdown-toggle" href="#">
				<i class="fa fa-tasks"></i>
				<span class="badge badge-warning">4</span>
			</a>

			<!-- BEGIN Tasks Dropdown -->
			<ul class="dropdown-navbar dropdown-menu">
				<li class="nav-header">
					<i class="fa fa-check"></i> 4 Tasks to complete
				</li>

				<li>
					<a href="#">
						<div class="clearfix">
							<span class="pull-left">Software Update</span>
							<span class="pull-right">75%</span>
						</div>

						<div class="progress progress-mini">
							<div style="width:75%" class="progress-bar progress-bar-warning"></div>
						</div>
					</a>
				</li>

				<li class="more">
					<a href="#">See tasks with details</a>
				</li>
			</ul>
			<!-- END Tasks Dropdown -->
		</li>
		<!-- END Button Tasks -->

		<!-- BEGIN Button Notifications -->
		<li class="hidden-xs">
			<a data-toggle="dropdown" class="dropdown-toggle" href="#">
				<i class="fa fa-bell"></i>
				<span class="badge badge-important">5</span>
			</a>

			<!-- BEGIN Notifications Dropdown -->
			<ul class="dropdown-navbar dropdown-menu">
				<li class="nav-header">
					<i class="fa fa-warning"></i> 5 Notifications
				</li>

				<li class="notify">
					<a href="#">
						<i class="fa fa-shopping-cart green"></i>
						<p>You have some new orders</p>
						<span class="badge badge-success">+10</span>
					</a>
				</li>

				<li class="more">
					<a href="#">See all notifications</a>
				</li>
			</ul>
			<!-- END Notifications Dropdown -->
		</li>
		<!-- END Button Notifications -->

		<!-- BEGIN Button Messages -->
		<li class="hidden-xs">
			<a data-toggle="dropdown" class="dropdown-toggle" href="#">
				<i class="fa fa-envelope"></i>
				<span class="badge badge-success">3</span>
			</a>

			<!-- BEGIN Messages Dropdown -->
			<ul class="dropdown-navbar dropdown-menu">
				<li class="nav-header">
					<i class="fa fa-comments"></i> 3 Messages
				</li>

				<li class="msg">
					<a href="#">
						<img src="img/demo/avatar/avatar3.jpg" alt="Sarah's Avatar" />
						<div>
							<span class="msg-time">
								<i class="fa fa-clock-o"></i>
							<span>a moment ago</span>
							</span>
						</div>
						<p>Lorem ipsum dolor sit amet</p>
					</a>
				</li>

				<li class="more">
					<a href="#">See all messages</a>
				</li>
			</ul>
			<!-- END Notifications Dropdown -->
		</li> --}}
		<!-- END Button Messages -->

			<!-- BEGIN Button User -->
			<li class="user-profile">
				<a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
					<img class="nav-user-photo" src="{{Auth::user()->photo? asset('storage/app/'. Auth::user()->photo):asset('storage/app/public/images/user.png')}}" alt="User Photo" />
					<span class="hhh" id="user_info">
						{{ Auth::user()->name }}
					</span>
					<i class="fa fa-caret-down"></i>
				</a>

				<!-- BEGIN User Dropdown -->
				<ul class="dropdown-menu dropdown-navbar" id="user_menu">
					<li>
						<a href="{{ route('profile') }}">
							<i class="fa fa-cog"></i> Profile
						</a>
					</li>

					<li>
						<a href="{{ route('profile_edit', Auth::user()->id) }}">
							<i class="fa fa-user"></i> Edit Profile
						</a>
					</li>

					<li>
						<a href="{{ route('password_update') }}">
							<i class="fa fa-key"></i> Password Update
						</a>
					</li>

					<li class="divider visible-xs"></li>

				{{-- <li>
					<a href="#">
						<i class="fa fa-question"></i> My Billing
					</a>
				</li> --}}

				<li class="divider"></li>

				<li>
					<a href="{{ route('logout') }}">
						<i class="fa fa-off"></i> Logout
					</a>
				</li>
			</ul>
			<!-- BEGIN User Dropdown -->
		</li>
		<!-- END Button User -->
	</ul>
	<!-- END Navbar Buttons -->
</div>
