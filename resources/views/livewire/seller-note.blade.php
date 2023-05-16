<div wire:poll>
    <div class="col-12 my-2">
        <h4 class="seller-note">
            @if ($props->pop_path !== '' && $props->seller_payment_approval == 1)
                {{ __('Confirmation Note')}} 
            @else 
                {{ __('Payment Instruction')}} 
            @endif
            
        </h4>
        <div class="border border-secondary rounded-1 px-3 py-2">
            <p class="seller-param">
                
                @if ($props->pop_path !== '' && $props->seller_payment_approval == 1)
                <span> {{ $props->express_binding_confirmatio_note }}</span>
                @else 
                    <span>Payment tag: {{ auth()->user()->username }}</span>
                    <br>
                    <span> {{ $props->express_binding_detail_note }}</span>
                @endif
                
            </p>
        </div>
    </div>
</div>
