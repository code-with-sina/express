
@extends('back.layouts.users-pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle: 'Ratefy | Accounts')
@section('content')


  <div class="container px-0 px-sm-0 px-md-5 py-5 mx-auto">
     <div class="row">
      <div class="col-md-12">
          <nav class="navbar navbar-expand-lg navbar-dark bg-body-tertiary dashnoard-active-bar-thin-line py-0 px-0">
              <div class="container-fluid px-0">
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link active-active dashboard-inner-active-bar" href="#">Bank Accounts</a>
                    </li>
                  </ul>
                </div>
              </div>
          </nav>
          <div class="row">
              <div class="col-md-12 my-4">
                  <span class="float-end dashboard-inner-active-bar"> + Add New</span>
              </div>
              <livewire:new-user-bank-form />
              <livewire:user-bank-detail />
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