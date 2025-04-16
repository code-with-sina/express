<div class="px-0 mx-0" wire:poll>
    <div class="continer-fuild px-0 @if($props->pop_path !== '' & $props->seller_payment_approval !== 0)  @if ($props->buyer_disbursment_confirmation == 1)
        {{ 'complete-transaction-status-and-countdown'}}
        @else
        {{ 'awaiting-confirmation-status-and-countdown'}}
    @endif   @else  {{'expressTransaction-status-and-countdown' }}  @endif">

            <div class="row mx-0 px-0">
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
                    <div class="paragraph w-100">
                        @if ($props->pop_path !== '' & $props->seller_payment_approval !== 0)
                            @if ($props->buyer_disbursment_confirmation == 1)
                                 {{ __('Good news; Ratety has sent the Naira payment on your way.')}}
                            @else
                                {{ __('Kindly wait while the receiver confirms your payment') }}
                            @endif
                        @else
                            @if($props->transaction_status == 'closed')
                                {{ __('Please chat with the admin if you have any issue regarding the canceled order') }}
                            @else
                            {{ __('The order is created. Please, go through the instruction.') }}
                            @endif
                        
                             
                        @endif
                        
                    </div>
                </div>
                
                <div class="col-sm-12 d-block d-sm-block d-md-none d-lg-none">
                    <div class="row">
                       
                        <div class="col-12 px-0">
                            <span class="float-end m-0 chat-bar" data-bs-toggle="modal" data-bs-target="#chat-modal">
                                Chat
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 py-3 py-sm-2 px-4 d-block d-sm-block d-md-none d-lg-none">
                    <div class="row">
                        <div class="col-md-12 my-0">
                            <small class="float-end">
                                <span class="order-stamps float-end">
                                    Order id:
                                    <span class="order-stamps-details">
                                        {{ substr($props->order_id, 0,  30) }}
                                    </span>
                                </span>
                                
                            </small>
                        </div>
                        <div class="col-md-12 my-1">
                            <small class="float-end">
                                <span class="order-stamps float-end">
                                    Time created: &nbsp;
                                    <span class="order-stamps-details">
                                        {{ \Carbon\Carbon::parse($props->created_at)->diffForHumans() }}
                                    </span> 
                                </span>
                                
                            </small>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
