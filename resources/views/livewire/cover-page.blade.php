

<div>
<div class="container-fluid bg-dark">
    <nav class="navbar navbar-expand-lg container bg-dark mb-5 py-3 border-bottom fixed-top" data-bs-theme="dark">
      <div class="container-fluid">

        <a class="navbar-brand d-none d-sm-block" href="#">
          <img src="{{ \App\Models\Setting::find(1)->blog_logo }}" class="img-fluid rounded-top w-75" alt="">
        </a>

        <i class="fa fa-bars fa-2x navbar-brand d-block d-sm-none" data-bs-toggle="offcanvas" href="#offcanvasExample"
          role="button" aria-controls="offcanvasExample"></i>
          <a class="navbar-brandd-block d-sm-none" href="#">
            <img src="{{ \App\Models\Setting::find(1)->blog_logo }}" class="img-fluid rounded-top w-75" alt="">
          </a>
          <a href="{{ route('about') }}" class="nav-link">Login </a>
          <a href="{{ route('about') }}" class="btn btn-success">Register</a>
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
            </ul>
        </div>
        {{-- <livewire:notify-menu /> --}}
      </div>
    </nav>
  </div>

  <main class="container-fluid vh-75 mt-5">
    <div class="row">
      <livewire:desk-menu />
      <div class="col-md-8">
        @switch($showPage)
                @case(1)
                    <livewire:exchange-rate />  
                    @break
                @case(2)
                    <livewire:calculator-page /> 
                    @break
                @case(3)
                    <livewire:sales-page />
                    @break
                @case(4)
                    <livewire:notifications />
                    @break
                @default
                    <livewire:exchange-rate />   
            @endswitch  
      </div>
    </div>
  </main>

  <livewire:menu />
</div>