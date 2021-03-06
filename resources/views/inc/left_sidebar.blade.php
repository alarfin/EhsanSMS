<div id="sidebar" class="navbar-collapse collapse">
	<!-- BEGIN Navlist -->
	<ul class="nav nav-list">
		<!-- BEGIN Search Form -->
		{{-- <li>
			<form target="#" method="GET" class="search-form">
				<span class="search-pan">
				<button type="submit">
					<i class="fa fa-search"></i>
				</button>
				<input type="text" name="search" placeholder="Search ..." autocomplete="off" />
				</span>
			</form>
		</li> --}}
		<!-- END Search Form -->
		<li class="@yield('dashboard')">
			<a href="{{ route('home') }}">
				<i class="fa fa-dashboard"></i>
				<span>Dashboard</span>
			</a>
		</li>

		<li class="@yield('client')">
			<a href="#" class="dropdown-toggle">
				<i class="fa fa-user"></i>
				<span>Clients</span>
				<b class="arrow fa fa-angle-right"></b>
			</a>

			<!-- BEGIN Submenu -->
			<ul class="submenu">
				<li><a href="{{ route('client_list') }}">All Client</a></li>
				<li><a href="{{ route('client_add') }}">Add New Client</a></li>
			</ul>
			<!-- END Submenu -->
		</li>

		<li class="@yield('sms_send')">
			<a href="#" class="dropdown-toggle">
				<i class="fa fa-envelope"></i>
				<span>SEND SMS</span>
				<b class="arrow fa fa-angle-right"></b>
			</a>

			<!-- BEGIN Submenu -->
			<ul class="submenu">
				<li><a href="{{ route('single_sms') }}">Send Single SMS</a></li>
				<li><a href="{{ route('send_multi_sms') }}">Send Multi SMS</a></li>
				<li><a href="{{ route('send_group_sms') }}">Send Group SMS</a></li>
				{{-- <li><a href="javascript:void(0);">Schedule SMS From File</a></li> --}}
			</ul>
			<!-- END Submenu -->
		</li>
		<li class="@yield('contacts')">
			<a href="#" class="dropdown-toggle">
				<i class="fa fa-phone-square"></i>
				<span>Contacts</span>
				<b class="arrow fa fa-angle-right"></b>
			</a>

			<!-- BEGIN Submenu -->
			<ul class="submenu">
				<li><a href="{{ route('phonebook_group_add') }}">Group Add</a></li>
				<li><a href="{{ route('phonebook_group_list') }}">Group List</a></li>
				<li><a href="{{ route('phonebook_list') }}">Phone Book</a></li>
				<li><a href="{{ route('phonebook_add') }}">Add Contacts</a></li>
				<li><a href="{{ route('phonebook_import') }}">Import Contacts</a></li>
				<li><a href="{{ route('phonebook_blocked_list') }}">Blacklist Contacts</a></li>
			</ul>
			<!-- END Submenu -->
		</li>

		<li class="@yield('recharge')">
			<a href="#" class="dropdown-toggle">
				<i class="fa fa-shopping-cart"></i>
				<span>Account Recharge</span>
				<b class="arrow fa fa-angle-right"></b>
			</a>

			<!-- BEGIN Submenu -->
			<ul class="submenu">
				<li><a href="{{ route('recharge') }}">Bkash Recharge </a></li>
				<li><a href="{{ route('balance') }}">Check Balance</a></li>
				<li><a href="{{ route('recharge_history') }}">Recharge History</a></li>
				<li><a href="{{ route('recharge_docs') }}">How to recharge</a></li>
			</ul>
			<!-- END Submenu -->
		</li>


		<li class="@yield('report')">
			<a href="#" class="dropdown-toggle">
				<i class="fa fa-book"></i>
				<span>Reports</span>
				<b class="arrow fa fa-angle-right"></b>
			</a>

			<!-- BEGIN Submenu -->
			<ul class="submenu">
				<li><a href="{{ route('report_list') }}">SMS History</a></li>
				<li><a href="{{ route('month_report_list') }}">This Month</a></li>
			</ul>
			<!-- END Submenu -->
		</li>
		<li class="@yield('developer')">
			<a href="#" class="dropdown-toggle">
				<i class="fa fa-edit"></i>
				<span>Developer Zone</span>
				<b class="arrow fa fa-angle-right"></b>
			</a>

			<!-- BEGIN Submenu -->
			<ul class="submenu">
				<li><a href="{{ route('api_sender_id') }}">API & Sender ID</a></li>
				<li><a href="{{ route('api_docs') }}">API Documentation</a></li>
			</ul>
			<!-- END Submenu -->
		</li>
		<li class="@yield('administrator')">
			<a href="#" class="dropdown-toggle">
				<i class="fa fa-edit"></i>
				<span>Administrators</span>
				<b class="arrow fa fa-angle-right"></b>
			</a>

			<!-- BEGIN Submenu -->
			<ul class="submenu">
			    <li><a href="{{ route('recharge_admin') }}">Reacharge Client</a></li>
				<li><a href="{{ route('all_recharge_history') }}">Reacharge History</a></li>
				<li><a href="{{ route('direct_sms_admin') }}">Direct SMS Add</a></li>
				<li><a href="{{ route('direct_sms_admin_list') }}">Direct SMS List</a></li>
				<li><a href="{{ route('sms_sender') }}">SMS Sender</a></li>
				<li><a href="{{ route('post_method_sms') }}">Unlimited SMS</a></li>
				{{-- <li><a href="{{ route('service_status_add') }}">Add SMS Rate</a></li> --}}
			</ul>
			<!-- END Submenu -->
		</li>

		<li>
			<a href="#"><i class="fa fa-sign-out"></i><span>Logout</span></a>
		</li>


	</ul>
	<!-- END Navlist -->

	<!-- BEGIN Sidebar Collapse Button -->
	<div id="sidebar-collapse" class="visible-lg">
		<i class="fa fa-angle-double-left"></i>
	</div>
	<!-- END Sidebar Collapse Button -->
</div>
