
    <div class="col-md-4 d-none d-sm-block">
        <div class="container-fluid mt-5 pt-5">
          <div class="row">
            <div class="col-md-12 calt mb-3" wire:click='moveToExchanges()'>
              <div class="row">
                <div class="col-md-4">
                  <hr class="
                  @if ($cssMenu == 0)
                    fw-bold border-bottom
                  @else
                    d-none
                  @endif
                  ">
                </div>
                <div class="col-md-8">
                  <span class="
                  
                  @if ($cssMenu == 0)
                    fw-bold fs-4
                  @else
                    fw-light text-secondary fs-5
                  @endif
                  
                  
                  ">Exchange Rate</span>
                </div>
              </div>
            </div>
            <div class="col-md-12 calt mb-3" wire:click='moveToSells()'>
              <div class="row">
                <div class="col-md-4">
                  <hr class="
                  @if ($cssMenu == 2)
                    fw-bold border-bottom
                  @else
                    d-none
                  @endif
                  ">
                </div>
                <div class="col-md-8">
                  <span class="
                    @if ($cssMenu == 2)
                    fw-bold fs-4
                  @else
                    fw-light text-secondary fs-5
                  @endif
                  ">Sell</span>
                </div>
              </div>
            </div>
            <div class="col-md-12 calt mb-3">
              <div class="row">
                <div class="col-md-4">
                  <hr class="
                  @if ($cssMenu == 3)
                    fw-bold border-bottom
                  @else
                    d-none
                  @endif
                  ">
                </div>
                <div class="col-md-8 position-relative">
                  <span class="
                    @if ($cssMenu == 3)
                    fw-bold fs-4
                  @else
                    fw-light text-secondary fs-5
                  @endif
                  ">Buy</span>
                  <small class="position-absolute end-50  translate-middle badge rounded-pill bg-success">
                        Coming Soon
                            <small class="visually-hidden">unread messages</small>
                    </small>
                </div>
              </div>
            </div>
            <div class="col-md-12 calt mb-3">
              <div class="row">
                <div class="col-md-4">
                  <hr class="
                    @if ($cssMenu == 4)
                        fw-bold border-bottom
                      @else
                        d-none
                      @endif
                  ">
                </div>
                <div class="col-md-8 calt ">
                  <a href="/blog" class=" nav-link
                    @if ($cssMenu == 4)
                    fw-bold fs-4
                  @else
                    fw-light text-secondary fs-5
                  @endif
                  ">
                    <span>  Blog</span>
                      
                </a>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>

