@extends('admin.index')

@section('menu')



  <!-- start page title -->
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
            <h4 class="page-title">Profil Balai</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

 <!-- Right Sidebar -->
 @if (session('profil'))

      <div class="alert alert-success" role="alert">
        <i class="mdi mdi-check-all mr-2"></i>  {{ session('profil') }}
    </div>
@endif


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <a data-toggle="modal" data-target="#add-balai" href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle mr-2"></i>Tamba</a>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-right">
                            <button type="button" class="btn btn-success mb-2 mr-1"><i class="mdi mdi-cog"></i></button>
                            <button type="button" class="btn btn-light mb-2 mr-1">Import</button>
                            <button type="button" class="btn btn-light mb-2">Export</button>
                        </div>
                    </div><!-- end col-->
                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                        <thead>
                            <tr>
                                <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Url Img</th>
                                {{-- <th>Isi Content</th> --}}
                                <th>Create at</th>
                                <th>Update at</th>
                                <th>Status</th>
                                <th style="width: 75px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($profil as $item)

                            
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck4">
                                        <label class="custom-control-label" for="customCheck4">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                   
                                   {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $item->judul }}
                                </td>

                                <td>
                                    <img style="border-radius: 20cm" width="50" height="50" src="{{ asset('storage/' . $item->img_p) }}" alt="image-error">
                                </td>

                                {{-- <td>
                                    {{ $item->isi }}
                                </td> --}}

                                <td>
                                    {{ $item->created_at }}
                                </td>
                                <td>
                                   {{ $item->updated_at }}
                                </td>

                                <td>
                               
                                    <span class="badge badge-soft-success">Berhasil</span>
                                </td>

                                <td>
                                    <a href="#" data-toggle="modal" data-target="#edit-balai{{ $item->id }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <form action="/profil_b/{{ $item->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                    
                                    <button onclick="return confirm('apakah Anda akan menghapus data ini?')" class="action-icon border-0"><i class="mdi mdi-delete"></i></button>
                                    </form>
                                   
                                </td>
                            </tr>

                            {{-- modal edit hewan --}}
                            <form method="POST" action="/profil_b/{{ $item->id }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div id="edit-balai{{ $item->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            
                            
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                            
                                                <h4 class="modal-title">Edit {{ $item->judul }}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body p-4">
                            
                            
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="field-1" class="control-label">Judul</label>
                                                            <input value="{{ $item->judul }}" type="text"  name="judul" class="form-control" id="field-1" required="required" placeholder="Enter Text">
                                                        </div>
                                                    </div>
                                                   
                                                    
                                                </div>

                                                <div class="form-group">
                       
                                                    <textarea class="summernote" name="isi" >{{ $item->isi }}</textarea>
                                                 </div> 
                                                    
                            
                                                <div class="form-group">
                                                    <input name="image" readonly type="file" class="form-control">
                                                 </div>
                            
                                                <div class="form-group m-b-0">
                                                    <div class="text-right">
                                                       
                                
                                                        <button class="btn btn-success waves-effect waves-light"> Update</button>
                                                    </div>
                                                </div>
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

                            {{-- end edit modal --}}

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

<form method="POST" action="/profil_b" enctype="multipart/form-data">
    @csrf
    <div id="add-balai" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">


        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">New Balai</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">


                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Judul</label>
                            <input type="text" name="judul" required="required" class="form-control" placeholder="Enter Text">
                        </div>
                    </div>
                </div>

               

               
                

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Content </label>
                                <textarea name="isi" class="summernote" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Set the image File</label>
                            <input type="file" name="img_p" class="form-control">
                        </div>
                    </div>
                   
                    
                </div>

                
               

                <div class="row">
                  
                
                  
                       



               

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info waves-effect waves-light">Ok, Simpan</button>
        </div>



    </div>
</div>

    
@endsection
  
