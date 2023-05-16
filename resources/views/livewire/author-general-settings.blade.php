<div>
    <form method="post" wire:submit.prevent='updateGeneralSettings()'>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Blog Name</label>
                    <input type="text" class="form-control" name="example-text-input" placeholder="Enter blog name" wire:model='blog_name'>
                    @error('blog_name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Blog Email</label>
                    <input type="text" class="form-control" name="example-text-input" placeholder="Enter blog email" wire:model='blog_email'>
                    @error('blog_email')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Blog Description</label>
                    <textarea type="text" class="form-control" cols="5" rows="3" wire:model='blog_description'>Enter description...
                    </textarea>
                    @error('blog_description')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <button class="btn btn-primary">Save Changes</button>
            </div>
            <div class="col-md-6">
                
            </div>
        </div>
    </form>
</div>
