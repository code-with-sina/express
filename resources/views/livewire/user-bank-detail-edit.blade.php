<div class="col-md-12 dashboard-activity-box my-2">
    <form method='post' wire:submit.prevent='Action()'>
    <div class="row my-4 px-2 px-sm-2 px-md-4">
     <div class="col-md-1 d-flex">
         <i class="bi bi-bank2 h1 d-flex align-items-center text-success"></i>
     </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-12 col-form-label  dashboard-timer">Bank Name</label>
                        <div class="col-sm-12">
                            <input type="text"  class="form-control dashboard-timer dashboard-activity-box" id="staticEmail" value="FCMB" wire:model='bank_name'>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="inputPassword" class="col-sm-12 col-form-label dashboard-timer">Account</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control dashboard-timer dashboard-activity-box" id="inputPassword" value="{{ auth()->user()->name }}">
                        </div>
                    </div>

                   

                    <div class="mb-1 row">
                        <label for="inputPassword" class="col-sm-12 col-form-label dashboard-timer">Account Number</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control dashboard-timer dashboard-activity-box" id="inputPassword" value="adesanya izzilolo" wire:model='account_number'>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="col-md-2 d-flex">
            <div class="d-flex align-items-end w-100">
                <div class="ms-5">
                    <button type="submit" class="ms-5 btn dashboard-inner-active-bar">Save</button>
                </div>
            </div>
        </div>
     </form>
    </div>


 </div>
