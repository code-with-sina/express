<div>
    <form method="post" wire:submit.prevent='createRate()'>
            <div class="col-md-12 mb-1">
                <div class="card card-sm">
                    <div class="card-body">
                    <div class="mb-3">
                            <p>Manual Rate </p>
                        <label class="form-label">Rate</label>
                        <input type="text" class="form-control" name="example-text-input" placeholder="rate in decimal" wire:model='rate'>
                        @error('subject')
                            <span class="text-danger">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Create Rate</button>
                        <div class="my-2">
                            <div class="card card-sm py-0">
                                <div class="card-body py-0">
                                    {{ $former_rate->rate_normal }}
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    </div>
                </div>
            </div>
        </form>
</div>
