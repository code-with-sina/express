{{-- @extends('back.layouts.pages-layouts') --}}
@extends('back.layouts.users-pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle: 'Users Profile')
@section('content')
{{-- <livewire:author-profile-header /> --}}

{{-- <div class="row">
    <div class="card">
        <ul class="nav nav-tabs" data-bs-toggle="tabs">
          <li class="nav-item">
            <a href="#tabs-detail" class="nav-link active" data-bs-toggle="tab">Personal Detail</a>
          </li>
          <li class="nav-item">
            <a href="#tabs-bank" class="nav-link" data-bs-toggle="tab">Bank Details</a>
          </li>
          <li class="nav-item">
            <a href="#tabs-password" class="nav-link" data-bs-toggle="tab">Change Password</a>
          </li>
        </ul>
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active show" id="tabs-detail">
              <div>
                <livewire:author-personal-details />
              </div>
            </div>
            <div class="tab-pane" id="tabs-bank">
              <div>
                <livewire:user-bank-form />
              </div>
            </div>
            <div class="tab-pane" id="tabs-password">
              <div>
                <livewire:author-change-password-form />
              </div>
            </div>
          </div>
        </div>
      </div>
</div> --}}



  <div class="container px-0 px-sm-0 px-md-5 py-5 mx-auto">
     <div class="row">
      <div class="col-md-12">
          <nav class="navbar navbar-expand-lg navbar-dark bg-body-tertiary dashnoard-active-bar-thin-line py-0 px-0">
              <div class="container-fluid px-0">
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link active-active dashboard-inner-active-bar" href="#">Profile | <small class="text-small">Edit detail</small></a>
                    </li>
                  </ul>
                </div>
              </div>
          </nav>
          <div class="row">
              
            <livewire:edit-user-profile-detail />
            <livewire:users-profile-address />
              

              <div class="col-md-12 dashboard-activity-box my-2">
                  <div class="row p-2 p-sm-2 p-md-5">
                      <div class="col-md-12">
                          <h2>
                              Phone Number
                          </h2>
                      </div>
                      <div class="row">
                          <div class="col-md-4 dashboard-timer">
                              <p>Primary phone number</p>
                          </div>
                          <div class="col-md-4">
                              <p>+234 {{ auth()->user()->mobile_number }}</p>
                          </div>
                          <div class="col-md-4">
                              <span class="float-end">
                                  {{-- <i class="bi bi-pencil-fill h4 dashboard-timer"></i> --}}
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
     </div>
  </div>



@endsection
@push('scripts')
  <script>
    $('#changeAuthorPictureFile').ijaboCropTool({
          preview : '',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route('author.change-profile-picture') }}',
          withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
            //  alert(message);
            Livewire.emit('updateAuthorProfileHeader');
            Livewire.emit('updateTopHeader');
            toastr.success(message);
          },
          onError:function(message, element, status){
            // alert(message);
            toastr.error(message);
          }
    });
  </script>
@endpush