<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">     
      <li class="active">
          <a href="{{ url('/admin/dashboard') }}">
            <i class="fa fa-dashboard" aria-hidden="true"></i> <span>Dashboard</span>            
          </a>          
        </li>   
        
        
        <li>
          <a href="{{ url('/admin/categories') }}">
              <i class="fa fa-gift" aria-hidden="true"></i> <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        </li> 
        
        
        <li>
          <a href="{{ url('/admin/brands') }}">
              <i class="fa fa-gift" aria-hidden="true"></i> <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        </li> 
      
        <li>
          <a href="{{ url('/admin/products') }}">
            <i class="fa fa-product-hunt" aria-hidden="true"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>     
            
        </li>        
        
       
        
        
        
        
        <li>
          <a href="{{ url('/admin/change-password') }}">
            <i class="fa fa-user" aria-hidden="true"></i> <span>Change Password</span>                    
          </a>
        </li>
        
        <li>
          <a href="{{ url('admin/logout') }}">
            <i class="fa fa-sign-out" aria-hidden="true"></i> <span>Logout</span>  
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>