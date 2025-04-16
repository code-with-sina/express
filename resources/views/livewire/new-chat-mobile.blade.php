<div wire:poll class="px-0">
    <div class="px-3 pt-2 pb-3 @if($props->pop_path !== '' & $props->seller_payment_approval !== 0)  @if ($props->buyer_disbursment_confirmation == 1)
        chat-status
        @else
        chat-status-b
    @endif   @else  chat-status-c  @endif">
        <div class="row pb-1">
            <div class="col-12 pt-3 pb-1">
                <p class="chat-status-title py-0 my-0">
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
                </p>
            </div>
            <div class="col-12 py-0">
                <div class="row py-0">
                    <div class="col-7">
                        <span class="chat-status-paragraph">
                            @if ($props->pop_path !== '' & $props->seller_payment_approval !== 0)
                                @if ($props->buyer_disbursment_confirmation == 1)
                                    {{ __('Good news; Ratety has sent the Naira payment on your way.')}}
                                @else
                                    {{ __('Kindly wait while the receiver confirms your payment') }}
                                @endif
                            @else
                                {{ __('The order is created. Please, go through the instruction.') }}
                            @endif
                        </span>
                    </div>
                    <div class="col-5 d-flex align-items-end">
                    <div class="w-100 d-block">
                            <div class="row">
                                <div class="col-12">
                                    <span id="online" class="top-navigation-right"></span>
                                </div>
                                <div class="col-12">
                                    <span id="span-typing" class="fs-5"></span>
                                </div>
                            </div>
                            
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
