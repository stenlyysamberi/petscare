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
            <h4 class="page-title">Jenis Hewan</h4>
        </div>
    </div>
</div>

@if (session('jenis'))

      <div class="alert alert-success" role="alert">
        <i class="mdi mdi-check-all mr-2"></i>  {{ session('jenis') }}
    </div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <a data-toggle="modal" data-target="#add-dokter" href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle mr-2"></i>New Hewan</a>
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
                                <th>Jenis Hewan</th>
                                <th>Category</th>
                                <th>Create at</th>
                                <th>Update at</th>
                                
                                <th>Status</th>
                                <th style="width: 75px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($hewan as $item)

                            
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
                                    {{ $item->nama_hewan }}
                                </td>

                                <td>
                                    {{ $item->category }}
                                </td>

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
                                    <a href="#" data-toggle="modal" data-target="#edit-hewan{{ $item->id }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <form action="/hewan_p/{{ $item->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('apakah Anda akan menghapus data ini?')" class="action-icon border-0"><i class="mdi mdi-delete"></i></button>
                                    </form>
                                   
                                </td>
                            </tr>

                            {{-- modal edit hewan --}}
                            <form method="POST" action="/hewan_p/{{ $item->id }}">
                                @csrf
                                @method('put')
                                <div id="edit-hewan{{ $item->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            
                            
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                            
                                                <h4 class="modal-title">Edit Hewan</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body p-4">
                            
                            
                                               <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Nama</label>
                                                        <input type="text" value="{{ $item->nama_hewan }}" name="nama_hewan" required="required" class="form-control" placeholder="Enter Text">
                                                    </div>
                                                </div>
                                            </div>
                            
                                           
                            
                                           
                                            
                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label">ID </label>
                                                        <input readonly value="{{ auth()->user()->id }}" type="text" maxlength="12"  class="form-control" id="field-1" required="required" placeholder="+62">
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-2"  class="control-label">Category</label>
                                                        <select class="form-control" name="category" id="">
                                                            <option value="dog">Anjing</option>
                                                            <option value="cat">Kucing</option>
                                                        </select>
                                                           
                                                           
                                                        
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


{{-- add form model --}}

<form method="POST" action="/hewan_p">
    @csrf
    <div id="add-dokter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">New Hewan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">


                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Nama</label>
                            <input type="text" name="nama_hewan" required="required" class="form-control" placeholder="Enter Text">
                        </div>
                    </div>
                </div>

               

               
                

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">ID </label>
                            <input readonly value="{{ auth()->user()->id }}" type="text" maxlength="12" name="email_verified_at" class="form-control" id="field-1" required="required" placeholder="+62">
                        </div>
                    </div>
                   
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2"  class="control-label">Category</label>
                            <select class="form-control" name="category" id="">
                                <option value="dog">Anjing</option>
                                <option value="cat">Kucing</option>
                            </select>
                               
                               
                            
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

</div>

</form>

{{-- and add --}}

@endsection
