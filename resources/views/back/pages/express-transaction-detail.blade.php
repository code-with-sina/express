@extends('back.layouts.pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle : $detail->seller_account_name )
@section('content')

@push('styles')
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0" />
@endpush
@vite(['resources/js/adminchats.js'])
<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col-9">
            <h2 class="page-title">
                {{ $detail->seller_account_name }}
            </h2>
        </div>
        <div class="col-2">
            <a class="btn btn-success float-end my-1" href="{{ route('author.get-status',  $detail->order_id)}}">check payment status</a>
        </div>
        <div class="col-1">
            <botton class="btn btn-success float-end my-1">{{ $detail->transaction_status}}</botton>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2 border-top pt-2">
        <div class="card">
            <div class="card-body">
                <span class="text-secondary float-end">
                    Transaction Date
                </span>
                <br>
                <span class="float-end">{{ $detail->created_at }}</span>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <span class="text-secondary float-end">
                    Bank
                </span>
                <br>
                <span class="float-end">{{ $detail->seller_bank_name }}</span>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <span class="text-secondary float-end">
                    Account Number
                </span>
                <br>
                <span class="float-end">{{ $detail->seller_account_number }}</span>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <span class="text-secondary float-end">
                    Amount
                </span>
                <br>
                <span class="float-end">USD {{ $detail->wallet_amount }}</span>
                <br>
                <span class="float-end">NGN {{ $detail->conversion_amount }}</span>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <span class="text-secondary float-end">
                    Status
                </span>
                <br>
                <span class="float-end">{{ $detail->transaction_status }}</span>
            </div>
        </div>
        <div class="card">
            
            @if($detail->transaction_status !== "closed" && $detail->transaction_status !== "success")
                <button class="btn btn-success" id="clientPay">
                    Pay client
                </button>
            @endif
           
        </div>
        <div class="card">
            <button class="btn btn-success" id="manualPay">
                Manual Payment
            </button>
            <input type="hidden" value="{{$detail->seller_id }}" id="manualPayId">
        </div>
        <div class="card">
            <button class="btn btn-success" id="cancelPay">
                cancel Transaction
            </button>
            <input type="hidden" value="{{$detail->seller_id }}" id="cancelTransactionId">
        </div>

    </div>
    <div class="col-md-10 border-top pt-2">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-2">
                    <div class="card-body">
                        <p class="fw-bold text-secondary mb-2">
                            Exchange Items
                        </p>
                        <p class="mb-3">{{ @$xitem->item }} <small class="ms-3">Percentage: {{ @$xitem->percntage }}
                            %</small></p>
                        
                        <small class="float-start me-3">Tag: {{ @$xitem->sub_item }}
                        </small>
                        <small class="float-start me-3">Status: {{ @$xitem->active == 1 ? 'active' : 'pause' }}
                        </small>
                        <small class="float-start me-3">Ranges: {{ @$xitem->price_from }} {{ @$xitem->price_to }}
                        </small>
                        <small class="float-end">Cat: {{ @$xitem->labels }} </small>
                        <br>
                        <small class="float-end">
                        @php
                            $percentage = $detail->conversion_amount / $detail->wallet_amount;
                        @endphp
                           Exchange at  ₦ {{ number_format($percentage, 2) }}
                        </small>
                        <hr>
                        

                        <p class="fw-bold text-secondary mb-2">
                            Seller's Binding Note
                        </p>
                        <p class="mb-3">{{ @$detail->express_binding_detail_note }}</p>
                        <small class="float-start me-3">Duration: {{ @$detail->express_binding_detail_duration }}
                            mins</small>
                        <small class="float-start me-3">Starts: {{@$detail->express_binding_detail_start_time }}
                        </small>
                        <small class="float-end">Ends: {{ @$detail->express_binding_detail_end_time }} </small>
                        <br>
                        <hr>
                        <small class="float-end">Expiry: {{ @$detail->express_binding_detail_expires == 0 ? 'Ongoing' :
                            'Expired' }} </small>
                    </div>
                </div>

                <div class="card mb-2">
                    <div class="card-body">
                        <p class="fw-bold text-secondary mb-2">
                           User Verification
                        </p>
                        <div class="row w-100">
                            <div class="col-6">
                                <p class="mb-3">Selfie </p>
                                <img src="/storage/images/verification/thumbnails/resized_{{ @$userverify->selfie_path }}" alt="" class="img-fluid" />
                            </div>
                            <div class="col-6">
                                <p class="mb-3">NiN </p>
                                <img src="/storage/images/verification/thumbnails/resized_{{ @$userverify->nin_path }}" alt="" class="img-fluid" />
                            </div>
                        </div>
                            <br>
                        <small class="float-end me-3 @if(@$userverify->status == 'approved') text-success @else if(@$userverify->status == 'denied') text-danger @endif ">status: {{ @$userverify->status }}
                        </small>
                        <hr>
                        

                        <p class="fw-bold text-secondary mb-2">
                           Business Profile
                        </p>
                        <p class="mb-3">Business Name:  {{ @$businessProfile->business_name }}</p>
                        <p class="mb-3">Category:       {{ @$businessProfile->category }}</p>
                        <p class="mb-3">Description:    {{ @$businessProfile->description }}</p>
                        <p class="mb-3">Linkedin:       {{ @$businessProfile->linkedin }}</p>
                        <p class="mb-3">Siteprofiles:   {{ @$businessProfile->siteprofiles }}</p>
                        
                    </div>
                </div>

                
                <div class="card mb-2">
                    <div class="card-body">
                        <p class="fw-bold text-secondary mb-2">
                            Prove of Payment
                        </p>
                        @if($detail->pop_path !== null)
                            <img src="/storage/images/pop_payment/thumbnails/original_{{ $detail->pop_path }}" class="img-fluid" alt="Prove of Payment" />
                        @endif
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-2">
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-center fw-bold text-seondary">Seller</p>
                                        <li class="list-group-item border-0"><span class="float-start">Name: </span>
                                            <span class="float-end">{{ $seller->name }}</span></li>
                                        <li class="list-group-item border-0"><span class="float-start">Email: </span>
                                            <span class="float-end">{{ $seller->email }}</span></li>
                                        <li class="list-group-item border-0"><span class="float-start">Username: </span>
                                            <span class="float-end">{{ $seller->username }}</span></li>
                                        <li class="list-group-item border-0"><span class="float-start">Mobile: </span>
                                            <span class="float-end">{{ $seller->mobile_number }}</span></li>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="text-center fw-bold text-seondary">Address</p>
                                        <li class="list-group-item border-0"><small class="float-start">Country:
                                            </small> <small class="float-end">{{ $address->country }}</small></li>
                                        <li class="list-group-item border-0"><small class="float-start">City: </small>
                                            <small class="float-end">{{ $address->city }}</small></li>
                                        <li class="list-group-item border-0"><small class="float-start">LandMark:
                                            </small> <small class="float-end">{{ $address->landmark }}</small></li>
                                        <li class="list-group-item border-0"><small class="float-start">Postal: </small>
                                            <small class="float-end">{{ $address->postal_code }}</small></li>
                                        <li class="list-group-item border-0"><span class="">Address: {{
                                                $address->first_address }}</span></li>
                                    </div>
                                </div>
                                <div class="row">
                                    <p class="text-center">Banks</p>
                                    <div class="col-md-12">
                                        <li class="list-group-item border-0"><small class="float-start">Bank: </small>
                                            <small class="float-end"> {{ $banks->bank_name}}</small></li>
                                        <li class="list-group-item border-0"><small class="float-start">Name: </small>
                                            <small class="float-end"> {{ $banks->account_name}}</small></li>
                                        <li class="list-group-item border-0"><small class="float-start">Account:
                                            </small> <small class="float-end" id="accountNumber"> {{ $banks->account_number}}</small></li>
                                        <li class="list-group-item border-0"><small class="float-start">code: </small>
                                            <small class="float-end" id="code"> {{ $banks->bank_nipcode}}</small></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-center fw-bold text-seondary">Buyer</p>
                                        <li class="list-group-item border-0"><span class="float-start">Name: </span>
                                            <span class="float-end">{{ $buyer->name }}</span></li>
                                        <li class="list-group-item border-0"><span class="float-start">Email: </span>
                                            <span class="float-end">{{ $buyer->email }}</span></li>
                                        <li class="list-group-item border-0"><span class="float-start">Username: </span>
                                            <span class="float-end">{{ $buyer->username }}</span></li>
                                        <li class="list-group-item border-0"><span class="float-start">Mobile: </span>
                                            <span class="float-end">{{ $buyer->mobile_number }}</span></li>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <span id="node_id" class="invisible">
                        {{ auth()->user()->id }}
                        
                    </span>
                   
                    <div class="card-body">
                        <span id="online" class="ms-2 text-success"> </span>
                        <span id="momento" class="ms-2 text-success"> </span>
                        <div class="row" id="list-message" style="height: 500px; overflow-y:auto">
                                    {{-- Chat div. Developer must take note of this area with caution --}}
                        </div>
                        <form id="form">
                            <em><span id="span-typing" class="m-2 text-success"></span></em>
                            <div class="input-group">
                                <input type="text" class="form-control border-0" id="input-message" name="message" placeholder="start type..." autocomplete="off">
                                <span class="input-group-text bg-white border border-0 common" id="send"><i class="bi bi-send text-ratefy"></i></span>
                                <span class="input-group-text bg-white border border-0 common" id="upload"><i class="bi bi-paperclip text-ratefy"></i></span>
                            </div>
                        </form>
                         
                    </div>        
                </div>
                <div class="card mt-2">
                    <div class="card-body py-2">
                        <p class="text-center fw-bold text-seondary">Payment Channel</p>
                        @php
                            $channel = \App\Models\ExpressPayoutHistory::where('session_id', $detail->order_id)->first();
                        @endphp

                        @if ($channel != null)
                            <li class="list-group-item border-0"><span class="float-start">Name: </span>
                                <span class="float-end">{{ $channel->channel }}</span></li>
                            <li class="list-group-item border-0"><span class="float-start">Email: </span>
                                <span class="float-end">{{ $channel->amount }}</span></li>
                            <li class="list-group-item border-0"><span class="float-start">Username: </span>
                                <span class="float-end">{{ $channel->bank }}</span></li>
                            <li class="list-group-item border-0"><span class="float-start">Mobile: </span>
                                <span class="float-end">{{ $channel->tx_ref }}</span></li>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body py-2">
                <span class="float-start">Order Id</span>
                <span class="float-end" id="session_id">{{ $detail->order_id}}</span>
            </div>
        </div>
    </div>
</div>

</div>
@endsection