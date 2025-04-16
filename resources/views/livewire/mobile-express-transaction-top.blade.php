<div wire:poll>
    <div class="continer-fuild @if($props->pop_path !== '' & $props->seller_payment_approval !== 0)  @if ($props->buyer_disbursment_confirmation == 1)
        {{ 'complete-transaction-status-and-countdown'}}
        @else
        {{ 'awaiting-confirmation-status-and-countdown'}}
    @endif   @else  {{'expressTransaction-status-and-countdown' }}  @endif">

            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 py-3 py-sm-3 px-4 px-sm-4 px-md-5">
                    <h4 class="heading">
                        @if ($props->pop_path !== '' & $props->seller_payment_approval !== 0)
                            @if ($props->buyer_disbursment_confirmation == 1)
                                <span class="light">{{ __('Completed')}}</span>,  {{ __('We’ve sent you Naira!')}}
                            @else
                                {{ __('Awaiting Confirmation') }}
                            @endif
                        @else
                             {{ __('Make Payment') }}
                        @endif
                    </h4>
                    <div class="paragraph">
                        @if ($props->pop_path !== '' & $props->seller_payment_approval !== 0)
                            @if ($props->buyer_disbursment_confirmation == 1)
                                 {{ __('Good news; Ratety has sent the Naira payment on your way.')}}
                            @else
                                {{ __('The order is created. Please, go through the instruction.') }}
                            @endif
                        @else
                             {{ __('The order is created. Please, go through the instruction.') }}
                        @endif
                        
                        <div class="wrap-countdown mercado-countdown" data-expire="{{ Carbon\Carbon::parse($props->express_binding_detail_end_time)->format('Y/m/d h:i:s') }}">

                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-none d-md-block">
                    <div class="row">
                        <div class="col-md-12 my-1">
                            <small class="float-end">
                                <span class="order-stamps">
                                    Order id:
                                </span>
                                <span class="order-stamps-details">
                                    {{ substr($props->order_id, 0,  30) }} 
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
                <div class="col-sm-12 d-block d-sm-block d-md-none d-lg-none">
                    <div class="row">
                        <div class="col-6">

                        </div>
                        <div class="col-6">
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





