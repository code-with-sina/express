<div>
    <form wire:submit.prevent='UpdateDetails()' method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="example-text-input" placeholder="name" wire:model='name'>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="example-text-input" placeholder="username" wire:model='username'>
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="example-text-input" placeholder="email" disabled wire:model='email'>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Biography <span class="form-label-description"><span class="text-success">56</span> | <span class="text-warning">800</span></span></label>
            <textarea class="form-control" name="example-textarea-input" rows="6" placeholder="Content.." wire:model='biography'>Biography...
            </textarea>
            @error('biography')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
</div>
