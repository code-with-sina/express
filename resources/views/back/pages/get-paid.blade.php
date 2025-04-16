<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col-10">
            <h2 class="page-title">
               {{ $status->data->id }}
            </h2>
        </div>
        <div class="col-2">
            <botton class="btn btn-success float-end my-1">
                @if($failed == null)
                    {{ $status->data->attributes->status }}
                @else
                    REPAID
                @endif
               
            </botton>
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
                <span class="float-end fs-6">
                    {{ $status->data->attributes->createdAt }}
                </span>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
            @if( $status->data->attributes->status == 'COMPLETED')
                <span class="text-secondary float-end">
                    session Id
                </span>
                <br>
                <span class="fs-6">
                    {{ $status->data->attributes->sessionId }}
                </span>
                @endif
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <span class="text-secondary float-end">
                    Amount
                </span>
                <br>
                <span class="float-end">NGN 
                 {{ $status->data->attributes->amount / 100 }}
                </span>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <span class="text-secondary float-end">
                    Status
                </span>
                <br>
                <span class="float-end">
                @if($failed == null)
                    {{ $status->data->attributes->status }}
                @else
                    REPAID
                @endif
                </span>
            </div>
        </div>
        <div class="card">
            @if($status->data->attributes->status == 'FAILED')
                @if($failed == null)
                    <input type="hidden" id="session_id" value="{{ $history->session_id }}">
                    <input type="hidden" id="accountNumber" value="{{ $history->account_number }}">
                    <input type="hidden" id="failed_id" value="{{ $status->data->id }}">
                    <button class="btn btn-success" id="clientPay">
                        Re-initiate 
                    </button>
                @endif
                
            @endif
        </div>
    </div>
    <div class="col-md-10 border-top pt-2">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-2">
                    <div class="card-body">
                        <p class="fw-bold text-secondary mb-2">
                            Access 
                        </p>
                        <p class="mb-3">
                            
                        </p>
                        <small class="float-start me-3">
                            Wallet Name: {{ $user->wallet_name }}
                        </small>
                        <small class="float-start me-3">
                            Amount: {{ $user->wallet_currency }} {{ $user->wallet_amount }}
                        </small>
                        <small class="float-start me-3">
                            Conversion: {{ $user->conversion_name }} {{ $user->conversion_amount }}
                        </small>
                       
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                       
                        
                        <p class="fw-bold text-secondary mb-2">
                            Seller's Account Detail
                        </p>
                        <p class="mb-3">
                            Name: {{ $user->seller_name }}
                        </p>
                        <small class="float-start me-3">
                            Bank: {{ $user->seller_bank_name }}
                        </small>
                        <small class="float-start me-3">
                            Number: {{ $user->seller_account_number }}
                        </small>
                        <small class="float-end">
                            Name:  {{ $user->seller_account_name }} 
                        </small>                    
                    </div>
                </div>
                
                
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row" id="list-message" style="height: 200px; overflow-y:auto">
                        <span class="fs-5">Reason: {{ $status->data->attributes->reason }} </span>
                            <br>
                        <span class="fs-5">Reference Id:    {{ $status->data->attributes->reference }} </span>
                            <br>
                        @if($status->data->attributes->status == 'FAILED')
                            <span class="fs-5">    {{ $status->data->attributes->failureReason }}</span>
                        @else
                            <span class="fs-5">    {{ $status->data->attributes->status }}</span>
                        @endif  
                        </div>
                    </div>        
                </div>
                <div class="card mt-2">
                    <div class="card-body py-2">
                        <p class="text-center fw-bold text-seondary">Payment Channel -- Get Anchor</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>