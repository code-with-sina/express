{{-- <div>

    @forelse ($props as $item)
        <div class="col-md-12 mb-1">
            <div class="card card-sm">
                <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="row">
                            <div class="col-12">
                                Name
                            </div>
                            <div class="col-12">
                                {{ $item->item }}
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <div class="col-12">
                                Pecentage
                            </div>
                            <div class="col-12">
                                {{ $item->percntage }}
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <div class="col-12">
                                Status
                            </div>
                            <div class="col-12">
                                {{ $item->active == 1 ? 'Active' : 'Not Active' }} 
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <div class="col-12">
                                Icon
                            </div>
                            <div class="col-12">
                                
                                <img src="/storage/images/exchange_images/thumbnails/thumb_{{ $item->image_path }}" alt="" width="40px" class="" />
                            </div>
                        </div>
                    
                    </div>
                </div>
                </div>
            </div>
            <div class="card">
                <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-outline-primary float-end" wire:click='deleteItem({{ $item->id }})'>Delete</button>
                        <a href="{{ route('author.edit-exchange-item', $item->id) }}" class="btn btn-outline-primary float-end me-2">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    @empty
    <div class="col-md-12 mb-1">
        <div class="card card-sm">
            <div class="card-body">
            <div class="alert alert-danger">
                <p>No data found yet</p>
            </div>
            </div>
        </div>
    </div>
    @endforelse
    
</div> --}}


<div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-vcenter card-table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Pecentage</th>
                            <th>Status</th>
                            <th>Icon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                   <tbody id="sortable_items">
                        @forelse ($props as $item)
                        
                            <tr class="rounded-full" data-index='{{$item->id}}' data-ordering='{{ $item->ordering}}'>
                       		   <td>
                       		       {{ $item->item }}
                       		   </td>
                               <td class="text-muted">
                                   {{ $item->percntage }}
                                </td>
                                <td class="text-muted">
                                   {{ $item->active == 1 ? 'Active' : 'Paused' }} 
                                </td>
                                <td class="text-muted">
                                   <img src="/storage/images/exchange_images/thumbnails/thumb_{{ $item->image_path }}" alt="" width="30px" class="" /> 
                                </td>
                                <td>
                                       <button class="btn btn-sm btn-outline-primary" wire:click='deleteItem({{ $item->id }})'>Delete</button>
                                        <a href="{{ route('author.edit-exchange-item', $item->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                                        
                                        @if($item->active == 1)
                                            <button class="btn btn-sm btn-outline-primary" wire:click='pauseItem({{ $item->id }})'>Pause</button>
                                        @else
                                            <button class="btn btn-sm btn-outline-primary" wire:click='unPauseItem({{ $item->id }})'>Activate</button>
                                        @endif
                                        
                                </td>
                            </tr>
                        @empty
                            <tr class="alert alert-danger">
                                <span aria-colspan="3" class="text-danger">No data found yet</span>
                            </tr>
                        @endforelse
                   </tbody>
             </table>
            </div>
        </div>
    </div>
    
</div>

