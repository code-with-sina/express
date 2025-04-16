<div>
<div class="row  my-5 vh-75" id="sell-to-me">
    <div class="col col-md-7 py-5 px-4">
      <div class="container py-3 px-1">
        
        @forelse ($announces as $announcement)
          <div class="card rounded-4 mb-3">
            <div class="card-body text-dark text-center">
              <div class="container d-grid gap-2">
                <p class="h2 fw-bold text-start">
                  ${{ $announcement->amount }} {{ $announcement->subject }}
                </p>
                <p class="text-start">
                  {{ $announcement->description }}
                </p>
              </div>
            </div>
            <div class="card-body text-dark">
              <div class="row px-3">
                <div class="col-6">
                  <img src="/front/image/seller.png" class="img-fluid mx-auto" alt="">
                </div>
                <div class="col-6"></div>
              </div>
              <div class="row">
                <div class="col-6 py-2">
                  <span class="fs-6">Femi Odeyemi</span>

                </div>
                <div class="col-6">
                  <p class="fs-6 float-end">{{ \Carbon\Carbon::parse($announcement->created_at) }}</p>
                </div>
              </div>
            </div>

            <div class="card-footer text-muted">
              <small class="float-end">
                Rate is updated every <span class="fw-bold"> 1 hours </span>
              </small>
            </div>
          </div>
        @empty
          <div class="card rounded-4 mb-3">
            <div class="card-body text-dark text-center">
              <div class="container d-grid gap-2">
                <p class="h2 fw-bold text-start">
                  No urgent need yet
                </p>

              </div>
            </div>
          </div>
        @endforelse
       

        

      </div>
      <div class="d-block my-2">
        {{ $announces->links('livewire::simple-bootstrap') }}
    </div>
    </div>
  </div>
 </div>
