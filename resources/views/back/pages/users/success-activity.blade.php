@extends('back.layouts.users-pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle: 'Ratefy | Transactions')
@section('content')


  <div class="container px-0 px-sm-0 px-md-5 py-5 mx-auto">
     <div class="row">
      <div class="col-md-12">
          <div class="row dashnoard-active-bar-thin-line">
                  <div class="col-6 col-lg-3">
                        <a class="nav-link fs-5 @if (url()->current() == route('users.activities'))
                  active-active
                @endif  dashboard-inner-active-bar" href="{{ route('users.activities') }}">Pending <small>   </small></a>
                  </div>
                  <div class="col-6 col-lg-3">
                      <a class="nav-link fs-5 @if (url()->current() == route('users.success-activities'))
                      active-active
                    @endif dashboard-inner-active-bar" href="{{ route('users.success-activities') }}">Completed <small>  </small></a>
                  </div>
                  
        </div>
          <div class="row">

              <div class="col-md-12 my-5">
                @php
                $props = \App\Models\ExpressTransaction::where('seller_id', auth()->user()->id)
                                                            ->where('transaction_status', 'success')
                                                            ->orWhere('seller_id', auth()->user()->id)
                                                            ->where('transaction_status', 'closed')
                                                            ->get();
                @endphp
                @if (!$props->isEmpty())
                    @foreach ($props as $item)
                        <div class="row mb-3 d-none d-sm-none d-md-block">
                            <div class="col-md-12 my-2">
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-3 dashboard-activity-devider p-0">
                                        <small class="dashboard-status float-start">{{ ($item->transaction_status == 'processing' ? 'Waiting for you to make payment' :  ($item->transaction_status == 'success' ? ($item->buyer_disbursment_confirmation == 1 ? 'Payment has been disbursed' : 'Waiting for admin to make payment') :  ($item->transaction_status == 'pending' ? 'Pending' : ($item->transaction_status == 'closed' ? 'Cancelled' : 'Opps failure somewhere')))) }} </small>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-9 p-0 text-truncate">
                                        <small class="dashboard-timer float-start ms-1">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</small>
                                        <small class="dashboard-timer float-end ">Order No: {{ $item->order_id }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 dashboard-activity-box">
                                <div class="row my-3">
                                    <div class="col-1 py-3">
                                        
                                        @php
                                            $image = \App\Models\ExchangeItem::where('id', $item->wallet_id)->first();
                                        @endphp
                                        <img src="/storage/images/exchange_images/thumbnails/thumb_{{ $image->image_path ?? '' }}"  height="35" alt="{{ $image->item ?? '' }}" class="navbar-brand-image">  
                                    </div>
                                    <div class="col-2 mb-0 py-3">
                                        <span class="dashboard-currency me-3">{{ $item->wallet_name }}</span>
                                        <small class="dashboard-currency-protocall">Transfer</small>
                                    </div>
                                    <div class="col mb-0 py-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="dashboard-rest-box-small">Amount to Send</span>
                                            </div>
                                            <div class="col-12">
                                                <span class="dashboard-rest-box-bg">${{ $item->wallet_amount }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-0 py-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="dashboard-rest-box-small">Amount to Receive</span>
                                            </div>
                                            <div class="col-12">
                                                <span class="dashboard-rest-box-bg">₦{{ number_format($item->conversion_amount, 2) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-0 py-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="dashboard-rest-box-small">Rate</span>
                                            </div>
                                            <div class="col-12">
                                                <span class="dashboard-rest-box-bg">{{ number_format($item->conversion_amount / $item->wallet_amount, 2)   }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-0 py-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="dashboard-rest-box-small">Status</span>
                                            </div>
                                            <div class="col-12">
                                                <span class="dashboard-rest-box-bg">{{ $item->transaction_status }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-0 py-3">
                                        <div class="d-grid gap-2 py-2">
                                            <a href="{{ url('users/device?message='.$item->order_id) }}" class="btn btn-success">view</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 d-block d-sm-block d-md-none">
                            <div class="col-md-12 my-2">
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-3 dashboard-activity-devider p-0 m-0">
                                        <small class="dashboard-status">{{ ($item->transaction_status == 'processing' ? 'Waiting for you to make payment' :  ($item->transaction_status == 'success' ? ($item->buyer_disbursment_confirmation == 1 ? 'Payment has been disbursed' : 'Waiting for admin to make payment') :  ($item->transaction_status == 'pending' ? 'Pending' : ($item->transaction_status == 'closed' ? 'Cancelled' : 'Opps failure somewhere')) )) }} </small>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-9 p-0 text-truncate">
                                        <small class="dashboard-timer ms-1">{{ Str::limit(\Carbon\Carbon::parse($item->created_at)->diffForHumans(), 10) }}</small>
                                        <small class="dashboard-timer text-truncate">Order No: {{ Str::limit($item->order_id, 10) }}</small>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 dashboard-activity-box">
                                <div class="row p-0">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="row p-2">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-9">  
                                                                <div class="row">
                                                                    <div class="col-1 p-0 py-3">
                                                                        <img src="/storage/images/exchange_images/thumbnails/thumb_{{ $image->image_path ?? '' }}"  height="25" alt="{{ $image->item ?? '' }}" class="navbar-brand-image">  
                                                                    </div>
                                                                    <div class="col-10 py-3">
                                                                        <span class="dashboard-currency me-2">{{ $item->wallet_name }}</span>
                                                                        <small class="dashboard-currency-protocall float-end my-1">Transfer</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-3 px-0">
                                                                <div class="row">
                                                                    <div class="col-12 px-0 py-3">
                                                                        <span class="dashboard-rest-box-bg">₦ {{ number_format($item->conversion_amount / $item->wallet_amount, 2)   }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span class="dashboard-rest-box-small  float-start">Amount to Receive</span>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <span class="dashboard-rest-box-bg  float-start">₦{{ number_format($item->conversion_amount, 2) }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span class="dashboard-rest-box-small float-end">Amount to Send</span>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <span class="dashboard-rest-box-bg float-end">${{ $item->wallet_amount }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 py-5">
                                                <div class="d-grid">
                                                    <a href="{{ url('users/device?message='.$item->order_id) }}" class="btn btn-success btn-font-small">view</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else 
                    <span class="dashboard-timer">No pending transactions</span>
                @endif
            </div>
          </div>
      </div>
     </div>
  </div>



@endsection
@push('scripts')
  <script>
    $('#changeAuthorPictureFile').ijaboCropTool({
          preview : '',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route('author.change-profile-picture') }}',
          withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
            //  alert(message);
            Livewire.emit('updateAuthorProfileHeader');
            Livewire.emit('updateTopHeader');
            toastr.success(message);
          },
          onError:function(message, element, status){
            // alert(message);
            toastr.error(message);
          }
    });



    

  </script>
@endpush