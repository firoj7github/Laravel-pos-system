@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="{{route('home')}}" class="brand-link">
		<img src="{{asset('public/backend')}}/dist/img/smslogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8;background-color: white; height: 50px;">
		<span class="brand-text font-weight-light">SMSBD Dashboard</span>
	</a>
	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="{{(!empty(Auth::user()->image))?asset('public/user_images/upload_img/'.Auth::user()->image):asset('public/user_images/no_image.png')}}" class="img-circle elevation-2" alt="User Image" style="opacity: .8;background-color: white; height: 50px; width: 80px">
			</div>
			<div class="info">
				<a href="#" class="d-block">{{ Auth::user()->name}}</a>
			</div>
		</div>
		<!-- SidebarSearch Form -->
		<div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
				<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-sidebar">
					<i class="fas fa-search fa-fw"></i>
					</button>
				</div>
			</div>
		</div>
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
				with font-awesome or any other icon font library -->

				<!---Manage Supplier menu---->
				<li class="nav-item has-treeview {{($prefix =='/suppliers')?'menu-open':''}}">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Manage Suppliers
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{route('suppliers.index')}}" class="nav-link {{($route=='suppliers.index')?'active':''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>View Supplier</p>
							</a>
						</li>

						
					</ul>
				</li>

				<!---Manage Customer menu---->
				<li class="nav-item has-treeview {{($prefix =='/customers')?'menu-open':''}}">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Manage Customer
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{route('customers.index')}}" class="nav-link {{($route=='customers.index')?'active':''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>View Customer</p>
							</a>
						</li>

						
					</ul>
				</li>

			<!---Manage Units menu---->
				<li class="nav-item has-treeview {{($prefix =='/units')?'menu-open':''}}">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Manage Units
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{route('units.index')}}" class="nav-link {{($route=='units.index')?'active':''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>View Units</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('units.add')}}" class="nav-link {{($route=='units.add')?'active':''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>Add Units</p>
							</a>
						</li>

						
					</ul>
				</li>

				<!---Manage Product menu---->
				<li class="nav-item has-treeview {{($prefix =='/product')?'menu-open':''}}">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Manage Product
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{route('product.index')}}" class="nav-link {{($route=='product.index')?'active':''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>View Product</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="{{route('product.add')}}" class="nav-link {{($route=='product.add')?'active':''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>Add Product</p>
							</a>
						</li>

						
					</ul>
				</li>

				<!---Manage Category menu---->
				<li class="nav-item has-treeview {{($prefix =='/category')?'menu-open':''}}">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Manage Type
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{route('category.index')}}" class="nav-link {{($route=='category.index')? 'active' :''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>View Type</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="{{route('category.add')}}" class="nav-link {{($route=='category.add')? 'active' :''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>Add Type</p>
							</a>
						</li>

						
					</ul>
				</li>

				<!---Manage Quation menu---->
				<li class="nav-item has-treeview {{($prefix =='/quotation')?'menu-open':''}}">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Manage Quation
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{route('quotation.index')}}" class="nav-link {{($route=='quotation.index')?'active':''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>View Quation</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="{{route('quotation.add')}}" class="nav-link {{($route=='quotation.add')?'active':''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>Add Quation</p>
							</a>
						</li>

						
					</ul>
				</li>

				<!---Manage Bill menu---->
					<li class="nav-item has-treeview {{($prefix =='/bill')?'menu-open':''}}">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Manage Bill
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{route('bill.index')}}" class="nav-link {{($route=='bill.index')?'active':''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>View Bill</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="{{route('bill.add')}}" class="nav-link {{($route=='bill.add')?'active':''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>Add Bill</p>
							</a>
						</li>

						
					</ul>
				</li>

				<!---Manage Challan menu---->
				<li class="nav-item has-treeview {{($prefix =='/challan')?'menu-open':''}}">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Manage Challan
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{route('challan.index')}}" class="nav-link {{($route=='challan.index')?'active':''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>View Challan</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="{{route('challan.add')}}" class="nav-link {{($route=='challan.add')?'active':''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>Add Challan</p>
							</a>
						</li>

						
					</ul>
				</li>

			<!---Manage Purchase menu---->
				<li class="nav-item has-treeview {{($prefix =='/purchase')?'menu-open':''}}">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Manage Purchase
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{route('purchase.index')}}" class="nav-link {{($route=='purchase.index')? 'active' :''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>View Purchase</p>
							</a>
						</li>

						
					</ul>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{route('purchase.pendng.list')}}" class="nav-link {{($route=='purchase.pendng.list')? 'active' :''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>Approval Purchase</p>
							</a>
						</li>

						
					</ul>
				</li>


			<!---Manage User menu---->

			@if(Auth::user()->role=="Admin")
				<li class="nav-item has-treeview {{($prefix =='/users')?'menu-open':''}}">
					<a href="#" class="nav-link ">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Manage Users
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{route('users.index')}}" class="nav-link {{($route=='users.index')?'active':''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>All User</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('user.add')}}" class="nav-link {{($route=='user.add')?'active':''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>Add New User</p>
							</a>
						</li>
					</ul>
				</li>
				@endif

				<li class="nav-item has-treeview {{($prefix =='/profile')?'menu-open':''}}">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Manage Profile
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{route('profile.index')}}" class="nav-link {{($route=='profile.index')?'active':''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>View profile</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="{{route('profile.password-change')}}" class="nav-link {{($route=='profile.password-change')?'active':''}}">
								<i class="far fa-circle nav-icon"></i>
								<p>Password Change</p>
							</a>
						</li>
					
						
				
					</ul>
				</li>


				<li class="nav-item">
					<a href="{{route('logout')}}" class="nav-link"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
						<i class="nav-icon far fa-circle text-info"></i>
						<p>logout</p>
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>