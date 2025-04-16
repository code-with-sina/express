


<div>
    <div class="card px-0">
        <div class="card-body px-0">
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
            <div class="d-block my-2">
                {{ $props->links('livewire::simple-bootstrap') }}
            </div>
        </div>
    </div>
    
</div>

