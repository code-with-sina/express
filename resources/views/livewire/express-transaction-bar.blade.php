{{-- <div wire:poll>
    @if ($props->pop_path !== '' & $props->seller_payment_approval !== 0)
        @if ($props->buyer_disbursment_confirmation == 1)
            <div class="progressbar-wrapper px-0">
                <ul class="progressbar px-0 mx-0">
                    <li class="active"> Payment</li>
                    <li class="active">Awaiting Confirmation</li>
                    <li class="active">Completed</li>
                </ul>
                <ul class="overlay">
                    <li class="li inner-progress">
                        1
                    </li>
                    <li class="li inner-progress">
                        2
                    </li>
                    <li class="li inner-progress">
                        3
                    </li>
                </ul>
            </div> 
        @else
            <div class="progressbar-wrapper px-0">
                <ul class="progressbar px-0 mx-0">
                    <li class="active"> Payment</li>
                    <li class="active">Awaiting Confirmation</li>
                    <li class="">Completed</li>
                </ul>
                <ul class="overlay">
                    <li class="li inner-progress">
                        1
                    </li>
                    <li class="li inner-progress">
                        2
                    </li>
                    <li class="li inner-progress">
                        3
                    </li>
                </ul>
            </div>
        @endif
        @else
        <div class="progressbar-wrapper px-0">
            <ul class="progressbar px-0 mx-0">
                <li class="active"> Payment</li>
                <li class="">Awaiting Confirmation</li>
                <li class="">Completed</li>
            </ul>
            <ul class="overlay">
                <li class="li inner-progress">
                    1
                </li>
                <li class="li inner-progress">
                    2
                </li>
                <li class="li inner-progress">
                    3
                </li>
            </ul>
        </div>
    @endif
</div> --}}
