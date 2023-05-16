@extends('back.layouts.users-pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle: 'Ratefy | Verification')
@section('content')

  <div class="container px-0 px-sm-0 px-md-5 py-5 mx-auto">
     <div class="row">
      <div class="col-md-12">
            <div class="row dashnoard-active-bar-thin-line py-0 px-0">
                  <div class="col-4 col-lg-3">
                       <a class="nav-link @if (url()->current() == route('users.profile')) active-active @endif dashboard-inner-active-bar" href="{{ route('users.profile') }}">Profile</a>
                  </div>
                  <div class="col-4 col-lg-3">
                      <a class="nav-link  @if (url()->current() == route('users.verification')) active-active @endif  dashboard-inner-active-bar" href="{{ route('users.verification') }}">Verification </a>
                      
                  </div>
                  <div class="col-4 col-lg-3">
                     <a class="nav-link  @if (url()->current() == route('users.buzprofile')) active-active @endif dashboard-inner-active-bar" href="{{ route('users.buzprofile') }}">Business Profile</a> 
                  </div>
                  
                  
          </div>
          <div class="row">  
              <div class="col-md-12 dashboard-activity-box my-2">
                  <h2 class="my-5 mx-5">
                      Comming Soon
                  </h2>
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