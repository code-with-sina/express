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
                  <!-- <div class="col-4 col-lg-3">
                     <a class="nav-link  @if (url()->current() == route('users.buzprofile')) active-active @endif dashboard-inner-active-bar" href="{{ route('users.buzprofile') }}">Business Profile</a> 
                  </div> -->
           
            </div>
          <div class="row">  
              <div class="col-md-12 dashboard-activity-box py-2 my-2">
                  <h2 class="my-2 mx-5">
                      Verification
                  </h2>
                  
                  <div class="px-5">
                    <div class="row py-1">
                      <div class="col-md-6">
                        <p>
                          @if(session('status'))
                              {{ session('status')}}
                          @endif
                        </p>
                        <div class="mb-3 row">
                          
                        @if(@$status->users_id == null || (int)$status->users_id !== (int)auth()->user()->id  )
                                  <form action="{{ route('users.verified')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                      <label for="disabledTextInput" class="form-label">NiN Slip</label>
                                      <input type="file" id="disabledTextInput" name="nin_slip" class="form-control
                                        @if(@$status->status == 'pending' || @$status == 'approved' || @$status == 'denied' )
                                          disabled
                                        @else
                                          focus
                                        @endif
                                      " placeholder="NiN Slip">
                                    </div>
                                    @error('nin_slip')
                                        <div class="alert alert-danger">{{ $message }} <br> <b>Cause::</b> {{ __('Too large file | video, svg and pdf are allowed')}}</div>
                                    @enderror
                                    <div class="mb-3">
                                      <label for="disabledTextInput" class="form-label">Selfie Picture</label>
                                      <input type="file" id="disabledTextInput" name="selfie" class="form-control 
                                      @if(@$status->status == 'pending' || @$status == 'approved' || @$status == 'denied' )
                                        disabled
                                      @else
                                        focus
                                      @endif
                                      " placeholder="Selfie Picture">
                                    </div>
                                    @error('selfie')
                                        <div class="alert alert-danger">{{ $message }} <br> <b>Cause::</b>  {{ __('Too large file | video, svg and pdf are allowed')}}</div>
                                    @enderror
                                    <button class="btn btn-secondary">Verify</button> 
                                  </form>
                        @else
                            @if($status->status == 'denied')
                              <h4>Status: ... {{ $status->status }}</h4>
                              <p>Please, kindly upload an new document that meets our requirement for approval</p>
                              <form action="{{ route('users.update-verified')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                      <label for="disabledTextInput" class="form-label">NiN Slip</label>
                                      <input type="file" id="disabledTextInput" name="nin_slip" class="form-control
                                        @if(@$status->status == 'pending' || @$status == 'approved' || @$status == 'denied' )
                                          disabled
                                        @else
                                          focus
                                        @endif
                                      " placeholder="NiN Slip">
                                    </div>
                                    @error('nin_slip')
                                        <div class="alert alert-danger">{{ $message }} <br> <b>Cause::</b>  {{ __('Too large file | video, svg and pdf are allowed')}}</div>
                                    @enderror
                                    <div class="mb-3">
                                      <label for="disabledTextInput" class="form-label">Selfie Picture</label>
                                      <input type="file" id="disabledTextInput" name="selfie" class="form-control 
                                      @if(@$status->status == 'pending' || @$status == 'approved' || @$status == 'denied' )
                                        disabled
                                      @else
                                        focus
                                      @endif
                                      " placeholder="Selfie Picture">
                                    </div>
                                    @error('selfie')
                                        <div class="alert alert-danger">{{ $message }} <br> <b>Cause::</b>  {{ __('Too large file | video, svg and pdf are allowed')}}</div>
                                    @enderror
                                    <button class="btn btn-secondary">Update</button> 
                                  </form>
                            @else
                              <h4>Status: ... {{ $status->status }}</h4>
                            @endif
                            
                        @endif
                        </div>
                      </div>

                      <div class="col-md-6">
                        <!-- <p>
                          Ratefy takes a user's virtual NIN - one-time verification code from the 
                          official NIMC Application or code generated via USSD request *346*3*Your NIN*715461# 
                          to verify your identity through the National Identity Management Commission (NIMC) database.
                          You can reach out to the official NIMC article to learn more about the tokenization initiative.
                        </p> -->
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
          setRatio: 1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route('author.change-profile-picture') }}',
          withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
            Livewire.emit('updateAuthorProfileHeader');
            Livewire.emit('updateTopHeader');
            toastr.success(message);
          },
          onError:function(message, element, status){
            toastr.error(message);
          }
    });
  </script>
@endpush