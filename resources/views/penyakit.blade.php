@extends('admin.index')

@section('menu')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $menu1 }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $menu2 }}</a></li>
                    <li class="breadcrumb-item active">{{ $menu3 }}</li>
                </ol>
            </div>
            <h4 class="page-title">News</h4>
        </div>
    </div>
</div> 

@if (session('news'))

      <div class="alert alert-success" role="alert">
        <i class="mdi mdi-check-all mr-2"></i>  {{ session('news') }}
    </div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-8">
                    <form class="form-inline">
                        <div class="form-group">
                            <label for="inputPassword2" class="sr-only">Search</label>
                            <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                        </div>
                        <div class="form-group mx-sm-3">
                            <label for="status-select" class="mr-2">Sort By</label>
                            <select class="custom-select" id="status-select">
                                <option selected="">All</option>
                               
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="text-lg-right mt-3 mt-lg-0">
                        <button type="button" class="btn btn-success waves-effect waves-light mr-1"><i class="mdi mdi-cog"></i></button>
                        <a data-toggle="modal" data-target="#add-news" href="#" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-plus-circle mr-1"></i> Add New</a>
                    </div>
                </div><!-- end col-->
            </div> <!-- end row -->
        </div> <!-- end card-box -->
    </div> <!-- end col-->
</div>

<div class="row">
   
    @foreach ($news as $item)
    <div class="col-md-6 col-xl-3">
        <div class="card-box product-box">
            
            <div class="product-action">
                <a data-toggle="modal" data-target="#edit-news{{ $item->id }}"  class="btn btn-success btn-xs waves-effect waves-light"><i class="mdi mdi-pencil"></i></a>
               
                <form action="/Gejala_p/{{ $item->id }}" method="POST">
                    @method('delete')
                    @csrf
                 
                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs waves-effect waves-light border-0"><i class="mdi mdi-close"></i></button>

                </form>
            </div>

            <div class="bg-light">

                @if ($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" alt="product-pic" class="img-fluid" />
                @else
                    
                @endif

                
            </div>

            <div class="product-info">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="font-16 mt-0 sp-line-1"><a href="ecommerce-product-detail.html" class="text-dark">{{ $item->title }}</a> </h5>
                        {{ $item->created_at }}
                        <h5 class="m-0"> <span class="text-muted"> {{ $item->jenis }}</span></h5>
                    </div>
                    {{-- <div class="col-auto">
                        <div class="product-price-tag">
                            $98
                        </div>
                    </div> --}}
                </div> <!-- end row -->
            </div> <!-- end product info-->
        </div> <!-- end card-box-->
    </div> <!-- end col-->
    {{-- form edit model  --}}
<form method="POST" action="/Gejala_p/{{ $item->id }}" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div id="edit-news{{ $item->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">


        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Edit News</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">


                   <div class="row">
                   
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Title</label>
                            <input type="text" value="{{ $item->title }}"  name="title" class="form-control" id="field-1" required="required" placeholder="Enter Text">
                        </div>
                    </div>
                   
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2"  class="control-label">Jenis Hewan</label>
                            <select name="jenis" required="required" class="form-control">
                                <option value="{{ $item->jenis }}">{{ $item->jenis }}</option>
                                <option value="dog">Anjing</option>
                                <option value="cat">Cat</option>
                               
                            </select>
                        </div>
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group no-margin">
                            <label for="field-7" class="control-label">Content</label>
                            <textarea name="isi" required="required" class="form-control summernote" id="product-description" rows="10" placeholder="Enter Text">{{ $item->isi }}</textarea>
                        </div>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                         <h4 class="header-title">Image Profil</h4>
                        <p class="sub-header">
                           Set your Profil Image.
                        </p>

                        <input disabled type="file" id="image" @error('image') @enderror  
                        name="image" class="form-control" width="100" />
                        
                    </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info waves-effect waves-light">Ok, Simpan</button>
        </div>



    </div>
</div>

</div>

</form>
{{-- and edit --}}
    @endforeach

   

   
   
</div>

{{-- add form model --}}

<form method="POST" action="/Gejala_p" enctype="multipart/form-data">
    @csrf
    <div id="add-news" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">


        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">News</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">


                   <div class="row">
                   
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Nama Penyakit</label>
                            <input type="text"  name="title" class="form-control" id="field-1" required="required" placeholder="Enter Text">
                        </div>
                    </div>
                   
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2"  class="control-label">Jenis Hewan</label>
                            <select name="jenis" required="required" class="form-control">
                                <option value="">Pilih Jenis Hewan</option>
                                <option value="dog">Anjing</option>
                                <option value="cat">Kucing</option>
                               
                            </select>
                        </div>
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group no-margin">
                            <label for="field-7" class="control-label">Pencegahan</label>
                            <textarea name="isi" rows="10" required="required" class="form-control summernote" id="product-description" placeholder="Enter Text"></textarea>
                        </div>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                         <h4 class="header-title">Image Profil</h4>
                        <p class="sub-header">
                           Set your Profil Image.
                        </p>

                        <input type="file" id="image" @error('image') @enderror  
                        name="image" class="form-control" width="100" />
                        
                    </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info waves-effect waves-light">Ok, Simpan</button>
        </div>



    </div>
</div>

</div>

</form>
{{-- and add --}}




@endsection