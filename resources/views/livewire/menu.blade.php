<div>
    <div class="offcanvas offcanvas-start w-75 bg-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header bg-secondary">
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item pe-0">
                    <a class="nav-link active float-end celt pe-0" aria-current="page"  wire:click='moveToExchange()'>
                        <span class="bg-dark text-white fw-bold">Exchange Rate</span>
                    </a>
                </li>
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link float-end celt pe-0" wire:click='moveToCalculate()'>-->
                <!--        <span class="bg-dark text-white fw-bold">Calculator</span>-->
                <!--    </a>-->
                <!--</li>-->
                <li class="nav-item">
                    <a class="nav-link float-end celt pe-0" wire:click='moveToSell()'>
                        <span class="bg-dark text-white fw-bold">Sell</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link float-end celt pe-0" wire:click='moveToExchange()'>
                        <span class="bg-dark text-white fw-bold">Buy</span>

                        <span id="small" class="position-absolute text-sm start-80 translate-middle badge rounded-pill bg-success">
                            coming soon
                          </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link float-end celt pe-0" href="/blog">
                        <span class="bg-dark text-white fw-bold">Blog</span>

                        
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="container-fluid fixed-bottom text-white">
            <div class="row">
                <div class="col-3">
                   <a href="{{ route('about') }}" class="nav-link text-white">About</a>  
                </div>
                <div class="col-9">
                   <a href="{{ route('terms') }}" class="nav-link text-white">Terms and Condition</a>  
                </div>
                <div class="col-auto">
                     <a href="{{ route('legal') }}" class="nav-link text-white">Legal</a>
                </div>
                <div class="col-auto">
                  <a href="{{ route('fees') }}" class="nav-link text-white">Fees</a>  
                </div>
            </div>
        </div>
      </div>
</div>
