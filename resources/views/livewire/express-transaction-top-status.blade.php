<div wire:poll>
    <div class="continer-fuild @if($props->pop_path !== '' & $props->seller_payment_approval !== 0)  @if ($props->buyer_disbursment_confirmation == 1)
        {{ 'complete-transaction-status-and-countdown'}}
        @else
        {{ 'awaiting-confirmation-status-and-countdown'}}
    @endif   @else  {{'expressTransaction-status-and-countdown' }}  @endif">
            <div class="row py-2">
                <div class="col-12 col-sm-12 col-md-6 py-3 py-sm-3 px-4 px-sm-4 px-md-5">
                    <h4 class="heading">
                        @if ($props->pop_path !== '' & $props->seller_payment_approval !== 0)
                            @if ($props->buyer_disbursment_confirmation == 1)
                                <span class="light">{{ __('Completed')}}</span>,  {{ __('We’ve sent you Naira!')}}
                            @else
                                {{ __('Awaiting Confirmation') }}
                            @endif
                        @else
                             @if($props->transaction_status == 'closed')
                                {{ __('Transaction Cancelled') }}
                             @else
                                {{ __('Make Payment') }}
                             @endif
                        
                        @endif
                    </h4>
                    <div class="paragraph">
                        @if ($props->pop_path !== '' & $props->seller_payment_approval !== 0)
                            @if ($props->buyer_disbursment_confirmation == 1)
                                 {{ __('Good news; Ratety has sent the Naira payment on your way.')}}
                            @else
                                {{ __('Kindly wait while the receiver confirms your payment') }}
                            @endif
                        @else
                             {{ __('The order is created. Please, go through the instruction.') }}
                        @endif
                        
                        
                        
                    </div>
                </div>
                <div class="col-md-6 px-md-5">
                    <div class="row">
                        <div class="col-md-12 my-1">
                            <small class="float-end">
                                <span class="order-stamps">
                                    Order number:
                                </span>
                                <span class="order-stamps-details">
                                    {{ substr($props->order_id, 0,  30) }} <i class="bi bi-clipboard-check super"></i>
                                </span>
                            </small>
                        </div>
                        <div class="col-md-12 my-1">
                            <small class="float-end">
                                <span class="order-stamps">
                                    Time created: 
                                </span>
                                <span class="order-stamps-details">
                                    {{ \Carbon\Carbon::parse($props->created_at)->diffForHumans() }}
                                </span>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>




