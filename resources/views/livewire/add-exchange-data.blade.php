{{-- <div>
    <div class="col-md-12 mb-1">
        <div class="card card-sm">
            <div class="card-body d-grid">
                <a href="{{ route('author.exchange-item') }}" class="btn btn-primary">Add | Edit Data</a>
              
            </div>
          </div>
      </div>
</div> --}}




<div>
  <div class="col-md-12 mb-1">
      <div class="card card-sm">
         
          <div class="card-body d-grid">
              <div class="row my-2">
                <div class="col-md-4">
                    <a href="{{ route('author.set-labels') }}" class="btn btn-primary">Set Labels</a>
                </div>
            </div>
              <a href="{{ route('author.exchange-item') }}" class="btn btn-primary">Add | Edit Data</a>
            {{-- <form action="" method="post" wire:submit.prevent='addExchangeData()'>
              <div class="row">
                  <div class="col-12 mb-2">
                      <input type="file" name="" id="" class="form-control" wire:model='exchange_image'>
                      @error('exchange_image')
                          <span class="text-danger mb-2">{{ $message }}</span>
                      @enderror
                  </div>
                  
              </div>
              <div class="row ">
                <div class="col-7">
                  <input type="text" name="" id="" class="form-control" placeholder="add exhange rate" wire:model='name'>
                 
                </div>
                <div class="col-2">
                  <input type="text" name="" id="" class="form-control w-full" placeholder="0:00%" wire:model='percent'>
                  
                </div>
                <div class="col-3  d-grid gap-2">
                  <button class="btn btn-primary">ADD</button>
                </div>
              </div>
              <div class="row">
                  @error('name')
                      <span class="text-danger mb-2">{{ $message }}</span>
                  @enderror
                  @error('percent')
                      <span class="text-danger mb-2"> {{ $message }}</span>
                  @enderror
              </div>
            </form> --}}
            
            
             
          </div>
        </div>
    </div>
</div>

