<div>
    <div class="page-header d-print-none mb-3">
        <div class="row align-items-center">
            <div class="col">
            <h2 class="page-title">
                Authors
            </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
            <div class="d-flex">
                <input type="search" class="form-control d-inline-block w-9 me-3" placeholder="Search author" wire:model='search'>
                <button class="btn btn-primary" data-bs-target='#add_author_modal' data-bs-toggle='modal'>
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                New Author
                </button>
            </div>
            </div>
        </div>
    </div>
    
    
    
    <div class="row row-cards">
      
      @forelse ($authors as $author)
        <div class="col-md-6 col-lg-3">
          <div class="card">
            <div class="card-body p-4 text-center">
              <span class="avatar avatar-xl mb-3 avatar-rounded" style="background-image: url({{ $author->picture }})"></span>
              <h3 class="m-0 mb-1"><a href="#">{{ $author->name }}</a></h3>
              <div class="text-muted">{{ $author->username }}</div>
              <div class="mt-3">
                <span class="badge bg-purple-lt">{{ $author->authorType->name}}</span>
              </div>
            </div>
            <div class="d-flex">
              <a href="#" class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="3" y="5" width="18" height="14" rx="2"></rect><polyline points="3 7 12 13 21 7"></polyline></svg>
                 {{ $author->email}}</a>
              <a href="#" class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                  @if ($author->blocked == 1)
                      <svg xmlns:dc="http://purl.org/dc/elements/1.1/" class="icon me-2 text-muted" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" width="64px" height="64px" viewBox="0 0 30 30" version="1.1" id="svg822" inkscape:version="0.92.4 (f8dce91, 2019-08-02)" sodipodi:docname="block.svg" fill="#07d529" stroke="#07d529">

                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                        
                        <g id="SVGRepo_iconCarrier"> <defs id="defs816"> <inkscape:path-effect only_selected="false" apply_with_weight="true" apply_no_weight="true" helper_size="0" steps="2" weight="33.333333" is_visible="true" id="path-effect1025" effect="bspline"/> <inkscape:path-effect only_selected="false" apply_with_weight="true" apply_no_weight="true" helper_size="0" steps="2" weight="33.333333" is_visible="true" id="path-effect1021" effect="bspline"/> </defs> <sodipodi:namedview id="base" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0" inkscape:pageopacity="0.0" inkscape:pageshadow="2" inkscape:zoom="17.833333" inkscape:cx="15" inkscape:cy="15" inkscape:document-units="px" inkscape:current-layer="layer1" showgrid="true" units="px" inkscape:window-width="1366" inkscape:window-height="713" inkscape:window-x="0" inkscape:window-y="0" inkscape:window-maximized="1" showguides="false" inkscape:guide-bbox="true"> <sodipodi:guide position="21.126168,22.794393" orientation="1,0" id="guide1575" inkscape:locked="false"/> <sodipodi:guide position="22.682243,23.285047" orientation="1,0" id="guide1635" inkscape:locked="false"/> <sodipodi:guide position="22.682243,7.6455921" orientation="0,1" id="guide1639" inkscape:locked="false"/> <sodipodi:guide position="18.859863,18.859863" orientation="1,0" id="guide1242" inkscape:locked="false"/> <inkscape:grid type="xygrid" id="grid1103"/> </sodipodi:namedview> <metadata id="metadata819"> <rdf:rdf> <cc:work rdf:about=""> <dc:format>image/svg+xml</dc:format> <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"/> <dc:title> </dc:title> </cc:work> </rdf:rdf> </metadata> <g inkscape:label="Layer 1" inkscape:groupmode="layer" id="layer1" transform="translate(0,-289.0625)"> <path style="color:#07d529;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:medium;line-height:normal;font-family:sans-serif;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-feature-settings:normal;text-indent:0;text-align:start;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#07d529;letter-spacing:normal;word-spacing:normal;text-transform:none;writing-mode:lr-tb;direction:ltr;text-orientation:mixed;dominant-baseline:auto;baseline-shift:baseline;text-anchor:start;white-space:normal;shape-padding:0;clip-rule:nonzero;display:inline;overflow:visible;visibility:visible;opacity:1;isolation:auto;mix-blend-mode:normal;color-interpolation:sRGB;color-interpolation-filters:linearRGB;solid-color:#07d529;solid-opacity:1;vector-effect:none;fill:#07d529;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:2;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;color-rendering:auto;image-rendering:auto;shape-rendering:auto;text-rendering:auto;enable-background:accumulate" d="M 15 3 C 8.3844276 3 3 8.38443 3 15 C 3 21.61557 8.3844276 27 15 27 C 21.615572 27 27 21.61557 27 15 C 27 8.38443 21.615572 3 15 3 z M 15 5 C 17.40637 5 19.609062 5.8448271 21.332031 7.2539062 L 7.2539062 21.332031 C 5.8448274 19.609062 5 17.406369 5 15 C 5 9.46531 9.4653079 5 15 5 z M 22.746094 8.6679688 C 24.155173 10.390938 25 12.593631 25 15 C 25 20.53469 20.534692 25 15 25 C 12.59363 25 10.390938 24.155173 8.6679688 22.746094 L 22.746094 8.6679688 z " transform="translate(0,289.0625)" id="path913"/> </g> </g>
                        
                        </svg>
                  @else
                    <svg width="64px" height="64px" class="icon me-2 text-muted" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#32cd1d">

                      <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                      
                      <g id="SVGRepo_iconCarrier">
                      
                      <path d="M10.7905 15.17C10.5905 15.17 10.4005 15.09 10.2605 14.95L7.84055 12.53C7.55055 12.24 7.55055 11.76 7.84055 11.47C8.13055 11.18 8.61055 11.18 8.90055 11.47L10.7905 13.36L15.0905 9.06003C15.3805 8.77003 15.8605 8.77003 16.1505 9.06003C16.4405 9.35003 16.4405 9.83003 16.1505 10.12L11.3205 14.95C11.1805 15.09 10.9905 15.17 10.7905 15.17Z" fill="#32cd1d"/>
                      
                      <path d="M12.0009 22.75C11.3709 22.75 10.7409 22.54 10.2509 22.12L8.67086 20.76C8.51086 20.62 8.11086 20.48 7.90086 20.48H6.18086C4.70086 20.48 3.50086 19.28 3.50086 17.8V16.09C3.50086 15.88 3.36086 15.49 3.22086 15.33L1.87086 13.74C1.05086 12.77 1.05086 11.24 1.87086 10.27L3.22086 8.68C3.36086 8.52 3.50086 8.13 3.50086 7.92V6.2C3.50086 4.72 4.70086 3.52 6.18086 3.52H7.91086C8.12086 3.52 8.52086 3.37 8.68086 3.24L10.2609 1.88C11.2409 1.04 12.7709 1.04 13.7509 1.88L15.3309 3.24C15.4909 3.38 15.8909 3.52 16.1009 3.52H17.8009C19.2809 3.52 20.4809 4.72 20.4809 6.2V7.9C20.4809 8.11 20.6309 8.51 20.7709 8.67L22.1309 10.25C22.9709 11.23 22.9709 12.76 22.1309 13.74L20.7709 15.32C20.6309 15.48 20.4809 15.88 20.4809 16.09V17.79C20.4809 19.27 19.2809 20.47 17.8009 20.47H16.1009C15.8909 20.47 15.4909 20.62 15.3309 20.75L13.7509 22.11C13.2609 22.54 12.6309 22.75 12.0009 22.75ZM6.18086 5.02C5.53086 5.02 5.00086 5.55 5.00086 6.2V7.91C5.00086 8.48 4.73086 9.21 4.36086 9.64L3.01086 11.23C2.66086 11.64 2.66086 12.35 3.01086 12.76L4.36086 14.35C4.73086 14.79 5.00086 15.51 5.00086 16.08V17.79C5.00086 18.44 5.53086 18.97 6.18086 18.97H7.91086C8.49086 18.97 9.22086 19.24 9.66086 19.62L11.2409 20.98C11.6509 21.33 12.3709 21.33 12.7809 20.98L14.3609 19.62C14.8009 19.25 15.5309 18.97 16.1109 18.97H17.8109C18.4609 18.97 18.9909 18.44 18.9909 17.79V16.09C18.9909 15.51 19.2609 14.78 19.6409 14.34L21.0009 12.76C21.3509 12.35 21.3509 11.63 21.0009 11.22L19.6409 9.64C19.2609 9.2 18.9909 8.47 18.9909 7.89V6.2C18.9909 5.55 18.4609 5.02 17.8109 5.02H16.1109C15.5309 5.02 14.8009 4.75 14.3609 4.37L12.7809 3.01C12.3709 2.66 11.6509 2.66 11.2409 3.01L9.66086 4.38C9.22086 4.75 8.48086 5.02 7.91086 5.02H6.18086Z" fill="#32cd1d"/>
                      
                      </g>
                      
                      </svg>
                  @endif
              </a>
            </div>
            <div class="d-flex">
              <a href="#" class="card-btn" wire:click.prevent='editAuthor({{ $author }})'><!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                 Edit</a>
              <a href="#" class="card-btn"  wire:click.prevent='deleteAuthor({{ $author }})'><!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                Delete</a>
            </div>
          </div>
        </div>
      @empty
        <span class="text-danger alert alert-info col-md-6 col-lg-3">No Author Found!</span>
      @endforelse
    </div>

    <div class="row mt-4">
      {{ $authors->links('livewire::simple-bootstrap')}}
    </div>

{{-- Modals --}}
<div wire:ignore.self class="modal modal-blur fade" id="add_author_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Author</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="addAuthor()" method="post">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="example-text-input" placeholder="Name" wire:model='name'>
            @error('name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="example-text-input" placeholder="Email" wire:model='email'>
            @error('email')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="example-text-input" placeholder="Username" wire:model='username'>
            @error('username')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Author Type</label>
            <select class="form-select" name="author_type" wire:model='author_type'>
              <option>--- No Selected ---</option>
              
              @foreach (\App\Models\Type::all() as  $type)
              <option value="{{ $type->id }}">{{ $type->name }}</option>
              @endforeach
            </select>
            @error('author_type')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <div class="form-label">Is direct publishers</div>
            <div>
              <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="direct_publisher" value="1" wire:model='direct_publisher'>
                <span class="form-check-label">No</span>
              </label>
              <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="direct_publisher" value="0" wire:model='direct_publisher'>
                <span class="form-check-label">Yes</span>
              </label>
              @error('direct_publisher')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <hr>
          <div class="modal-footer p-0">
            <button type="submit" class="btn btn-primary float-right">Add Author</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div wire:ignore.self class="modal modal-blur fade" id="edit_author_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Author</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="updateAuthor()" method="post">
          <input type="hidden" wire:model='selected_author_id'>
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="example-text-input" placeholder="Name" wire:model='name'>
            @error('name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="example-text-input" placeholder="Email" wire:model='email'>
            @error('email')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="example-text-input" placeholder="Username" wire:model='username'>
            @error('username')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Author Type</label>
            <select class="form-select" name="author_type" wire:model='author_type'>              
              @foreach (\App\Models\Type::all() as  $type)
              <option value="{{ $type->id }}">{{ $type->name }}</option>
              @endforeach
            </select>
            @error('author_type')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <div class="form-label">Is direct publishers</div>
            <div>
              <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="direct_publisher" value="1" wire:model='direct_publisher'>
                <span class="form-check-label">No</span>
              </label>
              <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="direct_publisher" value="0" wire:model='direct_publisher'>
                <span class="form-check-label">Yes</span>
              </label>
              @error('direct_publisher')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>


          <div class="mb-3">
            <div class="form-label">Blocked</div>
            <label class="form-check form-switch">
              <input class="form-check-input" type="checkbox" checked="" name="blocked" value="1" wire:model='blocked'>
            </label>
          </div>

          <hr>
          <div class="modal-footer p-0">
            <button type="submit" class="btn btn-primary float-right">update Author</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> 


</div>

