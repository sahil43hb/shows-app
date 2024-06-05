 <aside id="sidebar" class="sidebar">
     <ul class="sidebar-nav" id="sidebar-nav">
         <li class="nav-item ">
             <a class="nav-link collapsed" href="{{ url('/admin-panel') }}">
                 <i class="bi bi-grid"></i>
                 <span>Dashboard</span>
             </a>
         </li><!-- End Dashboard Nav -->
         <li class="nav-item">
             <a class="nav-link collapsed" href="{{ url('/admin-panel/products') }}">
                 <i class="bi bi-person"></i>
                 <span>Products</span>
             </a>
         </li><!-- End Profile Page Nav -->
         <li class="nav-item">
             <!-- <a class="nav-link collapsed" href=" {{ url('/admin-panel/categories') }}">
          <i class=" bi bi-question-circle"></i>
          <span>Categories</span>
        </a> -->
             <a class="nav-link collapsed" id='main-category' data-bs-target="#components-nav"
                 data-bs-toggle="collapse">
                 <i class="bi bi-menu-button-wide"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="{{ url('/admin-panel/categories') }}">
                         <i class="bi bi-circle"></i><span>Main Categories</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ url('/admin-panel/sub_categories') }}">
                         <i class="bi bi-circle"></i><span>Sub Categories</span>
                     </a>
                 </li>
             </ul>
         </li><!-- End F.A.Q Page Nav -->
         <li class="nav-item  ">
             <a class="nav-link collapsed" href="{{ url('/admin-panel/brands') }}">
                 <i class=" bi bi-question-circle"></i>
                 <span>Brands</span>
             </a>
         </li><!-- End F.A.Q Page Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" href="{{ url('/admin-panel/orders') }}">
                 <i class="bi bi-envelope"></i>
                 <span>Orders</span>
             </a>
         </li><!-- End Contact Page Nav -->

         <li class="nav-item ">
             <a class="nav-link  collapsed" href="{{ url('/admin-panel/users') }}">
                 <i class="bi bi-box-arrow-in-right"></i>
                 <span>Users</span>
             </a>
         </li><!-- End Login Page Nav -->


         <li class="nav-item">
             <a class="nav-link collapsed" href="pages-register.html">
                 <i class="bi bi-card-list"></i>
                 <span>Product Reviews</span>
             </a>
         </li><!-- End Register Page Nav -->

     </ul>
 </aside>
