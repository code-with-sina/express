<div wire:poll>
    <div class="m-0 p-3 
    
    @if($props->pop_path !== '' & $props->seller_payment_approval !== 0)  @if ($props->buyer_disbursment_confirmation == 1)
        chat-status
        @else
        chat-status-b
    @endif   @else  chat-status-c  @endif
    
    ">
        <div class="row m-0 p-0">
            <div class="col-12 m-0 py-3">
                <p class="text-white status-title m-0 p-0">
                    TRANSACTION STATUS
                </p>
            </div>
            <div class="col-12 m-0 p-0">
                <div class="row m-0">
                    <div class="col-8 m-0 py-2">
                        <p class="status-subtitle m-0 p-0">
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
                        <p class="status-paragraph m-0 p-0">
                            @if ($props->pop_path !== '' & $props->seller_payment_approval !== 0)
                                @if ($props->buyer_disbursment_confirmation == 1)
                                    {{ __('Good news; Ratety has sent the Naira payment on your way.')}}
                                @else
                                    {{ __('Kindly wait while the receiver confirms your payment') }}
                                @endif
                            @else
                                {{ __('The order is created. Please, go through the instruction.') }}
                            @endif
                        </p>
                    </div>
                    <div class="col-4 d-flex align-items-end">
                        <div class="w-100 d-block">
                            <div class="row">
                                <div class="col-12">
                                    <span id="online" class="nav-right-font"></span>
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
