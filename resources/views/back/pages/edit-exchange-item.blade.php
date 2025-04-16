@extends('back.layouts.pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle : 'Add Exchange Item')
@section('content')
<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col">
        <h2 class="page-title">
            Edit Payment Option
        </h2>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6 mx-auto">
        <form action="{{ route('author.edit_option', $item->id)}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row gap-auto">
                        <div class="col-md-12">
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <div class="mb-3">
                              <label for="" class="form-label">Name</label>
                              <input type="text"
                                class="form-control" name="name" id="" aria-describedby="helpId" placeholder="Paypal" value="{{ $item->item }}">
                                <span  class="form-text error-text name_error text-danger"></span>                          
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Sub Title</label>
                                <input type="text"
                                  class="form-control" name="sub_item" placeholder="sub title" value="{{ $item->sub_item}}">
                                  <span  class="form-text error-text sub_item_error text-danger"></span>                          
                            </div>
                            
                            <div class="mb-3">
                                <label for="" class="form-label">Label</label>
                                <select class="form-control" name="labels" placeholder="label">
                                    <option selected value="{{ $item->labels }}">
                                            {{ $item->labels }}
                                    </option>
                                    @php
                                       $label = \App\Models\SetLabel::all();
                                    @endphp
                                    
                                    @foreach($label as $items)
                                        <option value="{{  $items->name }}">
                                            {{ $items->name }}
                                        </option>
                                    @endforeach
                                        
                                   
                                    
                                </select>
                                  <span  class="form-text error-text labels_error text-danger"></span>                          
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Percentage</label>
                                <input type="text"
                                  class="form-control" name="percentage" id="" aria-describedby="helpId" placeholder="0:00%" value="{{ $item->percntage }}">
                                  <span  class="form-text error-text percentage_error text-danger"></span>                          
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Currency</label>
                                <input type="text"
                                  class="form-control" name="currency" id="" aria-describedby="helpId" placeholder="USD, NGN, EUR, NIR" value="{{ $item->currency}}">
                                  <span  class="form-text error-text sub_item_error text-danger"></span>                          
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Seller's Note</label>
                                <textarea 
                                  class="form-control" name="seller_note" id="" aria-describedby="helpId" placeholder="Seller's Note" value="{{ $item->seller_note}}"> {{$item->seller_note }} </textarea>
                                  <span  class="form-text error-text sub_item_error text-danger"></span>                          
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Inner Seller's Note</label>
                                <textarea 
                                  class="form-control" name="inner_seller_note" id="" aria-describedby="helpId" placeholder="Seller's Note">{{$item->inner_seller_note }}</textarea>
                                  <span  class="form-text error-text sub_item_error text-danger"></span>                          
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Payment Confirmation Note</label>
                                <textarea
                                  class="form-control" name="confirmation_note" id="" aria-describedby="helpId" placeholder="Payment Confirmation Note" value="{{ $item->confirmation_note}}"> {{ $item->confirmation_note }}</textarea>
                                  <span  class="form-text error-text sub_item_error text-danger"></span>                          
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="" class="form-label">Duration Section </label>
                                       <select 
                                          class="form-control" name="duration_cap" id="" aria-describedby="helpId" placeholder="30">
                                           <option selected value="{{ $item->duration_cap ?? ''}}">{{ $item->duration_cap ?? ''}}</option>
                                            <option value="day">Day</option>
                                            <option value="hour">Hour</option>
                                            <option value="mins">Minutes</option>
                                            </select>
                                          <span  class="form-text error-text sub_item_error text-danger"></span> 
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="form-label">Transaction Duration</label>
                                        <input type="number"
                                          class="form-control" name="duration" id="" aria-describedby="helpId" placeholder="30" value="{{ $item->duration }}">
                                          <span  class="form-text error-text sub_item_error text-danger"></span>   
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="" class="form-label">Amount From </label>
                                        <input type="number"
                                          class="form-control" name="price_from" id="" aria-describedby="helpId" placeholder="50" value="{{ $item->price_from }}" >
                                          <span  class="form-text error-text sub_item_error text-danger"></span>  
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="form-label">Amount To</label>
                                        <input type="number"
                                          class="form-control" name="price_to" id="" aria-describedby="helpId" placeholder="500.." value="{{ $item->price_to }}">
                                          <span  class="form-text error-text sub_item_error text-danger"></span>   
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="" class="form-label">Google Form (optional)</label>
                                        <input type="text"
                                          class="form-control" name="google_form" id="" aria-describedby="helpId" placeholder="50" value="{{ $item->google_form }}" >
                                          <span  class="form-text error-text sub_item_error text-danger"></span>  
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="form-label">WhatsApp (optional)</label>
                                        <input type="text"
                                          class="form-control" name="whatsapp" id="" aria-describedby="helpId" placeholder="500.." value="{{ $item->whatsapp }}">
                                          <span  class="form-text error-text sub_item_error text-danger"></span>   
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-label">Exchange image</div>
                                <input type="file" class="form-control" name="exchange_image" id="exchange_image" value="{{ $item->exchange_image}}">
                                <span  class="form-text error-text exchange_image_error text-danger"></span>
                            </div>
                            <div class="mb-3 image_holder" style="max-width: 300px;">
                                <img src="/storage/images/exchange_images/thumbnails/thumb_{{ $item->image_path }}"  class="img-thumbnail w-full"  id="image-preview" data-ijabo-default-image="">
                            </div>
                            <button class="btn btn-primary">Insert</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(function(){
            $('input[name="exchange_image"]').ijaboViewer({
                preview: '#image-preview',
                imageShape: 'square',
                allowedExtensions:['jpg', 'jpeg', 'png'],
                onErrorShape:function(message, element){
                alert(message);
                },
                onInvaliedType:function(message, element){
                alert(message);
                },
                onSuccess:function(message, element){
                }
            });
        });
         
        $('form#addExchangeForm').on('submit', function(e){
            e.preventDefault();
            toastr.remove();
           
            let form = this;


               

            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function(){
                    $(form).find('span.error-text').text('');
                },
                success: function(response){
                    toastr.remove();
                    if(response.code == 1){
                        $(form)[0].reset();
                        $('div.image_holder').html('');
                      
                        
                        toastr.success(response.msg);
                    }else{
                        toastr.error(response.msg);
                    }
                },
                error: function(response){
                    toastr.remove();
                    $.each(response.responseJSON.errors, function(prefix, val){
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                }
            });
        });
    </script>
@endpush