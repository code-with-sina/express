@extends('back.layouts.pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle : 'Set Labels')
@section('content')

<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col">
        <h2 class="page-title">
            Set Labels
        </h2>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6 mx-auto">
    <div class="card">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                  <h4>labels</h4>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-vcenter card-table table-striped">
                  <thead>
                    <tr>
                      <th>Labels</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $label = \App\Models\SetLabel::all(); 
                    @endphp
                    
                    @forelse ($label as $item)
                        <tr class="alert alert-primary" data-index='{{ $item->id }}' data-ordering='{{ $item->id }}'>
                            <td>{{ $item->name }}</td>
                           
                            <td>
                                 <form action="{{ route('author.edit-labels', $item->id) }}" method="post">
                                     @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" name="labels" class="form-control" placeholder="labels">
                                    </div>
                                    <div class="col-md-4 p-0">
                                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                                    </div>
                                </div>
                                    
                            </form>
                            </td>
                            <td>
                            <div class="btn-group">
                                <a href="{{ route('author.delete-labels', $item->id) }}" class="btn btn-sm btn-outline-danger" >Delete</a>
                            </div>
                            </td>
                        </tr>
                    @empty
                    <tr class="alert alert-danger">
                        <td colspan="4" class="text-danger">No subcategory found</td>
                    </tr> 
                    @endforelse
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 mx-auto">
        
        <form action="{{ route('author.set_labels')}}" method="post">
           @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row gap-auto">
                        <div class="col-md-12">
                            <div class="mb-3">
                              <label for="" class="form-label">Labels</label>
                              <input type="text"
                                class="form-control" name="labels" id="" aria-describedby="helpId" placeholder="labels">
                                <span  class="form-text error-text name_error text-danger"></span>                          
                            </div>

                            <button class="btn btn-primary">Set Labels</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection