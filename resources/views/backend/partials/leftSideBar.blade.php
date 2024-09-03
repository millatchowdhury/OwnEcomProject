<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#product" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-floor-plan"></i>
          <span class="menu-title">Manage Product</span>
          <i class="menu-arrow"></i> 
        </a>
        <div class="collapse" id="product">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('manage.product') }}">Manage Product</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('create.product') }}">Create Product</a></li>
            
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-floor-plan"></i>
          <span class="menu-title">Manage Category</span>
          <i class="menu-arrow"></i> 
        </a>
        <div class="collapse" id="category">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('manage.category') }}">Manage Category</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('create.category') }}">Create Category</a></li>
            
            
          </ul>
        </div>
      </li> 
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#brand" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-floor-plan"></i>
          <span class="menu-title">Manage Brand</span>
          <i class="menu-arrow"></i> 
        </a>
        <div class="collapse" id="brand">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('manage.brand') }}">Manage Brand</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('create.brand') }}">Create Brand</a></li>
          </ul>
        </div>
      </li> 
     
      
     
    </ul>
  </nav>