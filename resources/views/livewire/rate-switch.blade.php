<div>
    <div class="my-2 w-full px-2">
        <form method="post" wire:submit.prevent='swithRate()'>
            <button type="submit" class="btn btn-primary btn-block my-2 w-full">{{ $status->status }}</button>
        </form>
    </div>
</div>
