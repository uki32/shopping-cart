<nav class="navbar navbar-expand-lg bg-body-tertiary justify-content">
  <div class="container-fluid">
    <a class="navbar-brand pull-right" href="{{ route('product.index') }}">Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon pull-right"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('product.shoppingCart') }}"><i class="fa fa-shopping-cart" area-hidden="true"></i> Shopping Cart
          <span class="badge" style="background-color: #28a745">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
        </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa fa-user" area-hidden="true"></i>
         User Management
          </a>
          <ul class="dropdown-menu">
            @if(Auth::check())
              <li><a class="dropdown-item" href="/user/profile">User Profile</a></li>
              <li><a class="dropdown-item" href="/user/logout">Logout</a></li>
              <li role="separator" class="divider"></li>
            @else
              <li><a class="dropdown-item" href="/signupView">SignUp</a></li>
              <li><a class="dropdown-item" href="/signinView">SignIn</a></li>
            @endif        
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>