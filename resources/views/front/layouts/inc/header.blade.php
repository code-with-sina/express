<div class="container-fluid bg-dark">
    <nav class="navbar navbar-expand-lg container bg-dark mb-5 py-3 border-bottom fixed-top" data-bs-theme="dark">
      <div class="container-fluid">

        <a class="navbar-brand d-none d-sm-block" href="/">
          <img src="{{ blogInfo()->blog_logo }}" class="img-fluid rounded-top w-75" alt="">
        </a>

        <i class="fa fa-bars fa-2x navbar-brand d-block d-sm-none" data-bs-toggle="offcanvas" href="#offcanvasExample"
          role="button" aria-controls="offcanvasExample"></i>
        <div class="d-none d-sm-block d-flex">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('terms') }}" class="nav-link">Terms and Condition</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('legal') }}" class="nav-link">Legal</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('fees') }}" class="nav-link">Fees</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('howto') }}" class="nav-link">How to's</a>
                </li>
            </ul>
        </div>
      </div>
    </nav>
  </div>

 