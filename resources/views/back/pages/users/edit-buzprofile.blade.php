@extends('back.layouts.users-pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle: 'Ratefy | Business Profile')
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
            <form class="px-0" method="post" action="{{ route('users.buzprofiles') }}" enctype='multipart/form-data'>
                @csrf
              <div class="col-lg-12 dashboard-activity-box my-3 py-5">

                      <div class="row px-5 my-4">
                          <div class="col-12 col-lg-2">
                                <span class="dashboard-timer my-4">Business Logo</span>
                          </div>
                          <div class="col-12 col-lg-10">
                            <label for="business-logo">
                                @if( @$props->logo_path !== null )
                                    <img src="/storage/images/business_profile/thumbnails/resized_{{ $props->logo_path }} " height="80px" width="100%"  class="rounded-3" id="businessProfileLogo" for="business-logo" />
                                @else
                                    <img src="https://i.ibb.co/47wNnMB/business-logo.png" class="rounded-3" id="businessProfileLogo" for="business-logo" style="height:80px;  width:160px; " />
                                @endif
                                
                            </label>
                            
                            <input type="file" name="businesslogo" id="business-logo" class="d-none" accept="image/jpeg, image/png, image/jpg">
                          </div>
                      </div>
                      <div class="row px-5 my-2">
                        <div class="col-12 col-lg-2">
                              <span class="dashboard-timer my-1">Business Name</span>
                        </div>
                        <div class="col-12 col-lg-6">
                            <p>
                                {{ $props->business_name ?? ' ' }}
                            </p>
                            <input type="text" name="businessname" class="form-control dashboard-activity-box dashboard-timer" id="exampleFormControlInput1" placeholder="Enter brand name" value="{{ $props->business_name ?? ' ' }}">
                        </div>
                    </div>
                    <div class="row px-5 my-2">
                        <div class="col-12 col-lg-2">
                              <span class="dashboard-timer my-1">Category</span>
                        </div>
                        <div class="col-12 col-lg-6">
                            
                            <select class="form-select dashboard-timer dashboard-activity-box" aria-label="Select Category" name="category">
                                <option selected value="{{ $props->category ?? '' }}">{{ $props->category ?? '' }}</option>
                                <option value="graphic-designs-others">Graphic Designs </option>
                                <option value="marketing-others">Digital Marketing </option>
                                <option value="writing-others">Writing </option>
                                <option value="video-animation-others">Video and Animation </option>
                                <option value="music-audio-others">Music </option>
                                <option value="programming-others">Programming </option>
                                <option value="photography-others">Photograpgy </option>
                                <option value="businesses-others">Business </option>
                                <option value="ai-services-others">AI Services </option>
                              </select>
                        </div>
                    </div>
                    <div class="row px-5 my-2">
                        <div class="col-12 col-lg-2">
                              <span class="dashboard-timer my-4">Description</span>
                        </div>
                        <div class="col-12 col-lg-10">
                            
                            <textarea class="form-control dashboard-activity-box dashboard-timer" name="description" id="exampleFormControlTextarea1" rows="5" value="{{ $props->description ?? ' ' }}">{{ $props->description ?? ' ' }}</textarea>
                        </div>
                    </div>
                    <div class="row px-5 my-2">
                        <div class="col-12 col-lg-2">
                              <span class="dashboard-timer my-1">URL to LinkedIn</span>
                        </div>
                        <div class="col-12 col-lg-10">
                            
                            <input type="text" name="linkedin" class="form-control dashboard-activity-box dashboard-timer" id="exampleFormControlInput1" placeholder="https://www.linkedin.com/in/username" value="{{ $props->linkedin ?? '' }}">
                        </div>
                    </div>
                    <div class="row px-5 my-2">
                        <div class="col-12 col-lg-2">
                              <span class="dashboard-timer my-1">Url to Profile</span>
                        </div>
                        <div class="col-12 col-lg-10">
                            
                            <input type="text" name="siteprofiles" class="form-control dashboard-activity-box dashboard-timer" id="exampleFormControlInput1" placeholder="Link to Fiverr, Upwork, Instagram, Twitter, Indeed etc." value="{{ $props->siteprofiles ?? '' }}">
                        </div>
                    </div>
                    <div class="row px-5 my-2">
                        <div class="col-lg-2 py-3">
                        </div>
                        <div class="col-12 col-lg-10 d-grid">
                            <button type="submit" class="btn btn-md btn-suucess text-white buttonSecondary">Save</button>
                        </div>
                    </div>
              </div>
            </form>
          </div>
      </div>
     </div>
  </div>



@endsection

@push('scripts')
 
@endpush