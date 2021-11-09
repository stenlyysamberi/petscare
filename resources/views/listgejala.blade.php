@extends('admin.index')

@section('menu')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Contents</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Gejala</a></li>
                    <li class="breadcrumb-item active">New Gejala</li>
                </ol>
            </div>
            <h4 class="page-title">Gejala</h4>
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
                        <a data-toggle="modal" data-target="#add-dokter" href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle mr-2"></i> Add Gejala</a>
                    </div>
                   
                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                        <thead>
                            <tr>
                               
                                <th>ID</th>
                                <th>Nama Hewan</th>
                                <th>Nama Gejala </th>
                                <th>Created at</th>
                                <th>Update at</th>
                               
                                <th style="width: 75px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($gejala as $item)
                                
                            <tr>
                               
                                <td >
                                   {{ $loop->iteration }}
                                </td>

                                <td>
                                   {{ $item->nama_hewan}}
                                </td>

                                <td>
                                  {{ $item->nama_gejala }}
                                </td>
                                <td>
                                   {{ $item->created_at }}
                                </td>
                                <td>
                                    {{ $item->updated_at }}
                                </td>
                                

                                <td>
                                    <a data-toggle="modal" data-target="#put-dokter{{ $item->id }}" href="#" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    
                                    <form action="/list_gejala/{{ $item->id }}" method="POST">
                                      
                                        @csrf
                                        @method('delete')
                                       
                                      
                                        <button onclick="return confirm('Are you sure?')" class="action-icon border-0"><i class="mdi mdi-delete"></i></button>
                                    </form>
                                    
                                </td>
                            </tr>
                         

                         


                            {{-- add form model --}}

<form method="POST" action="/list_gejala/{{ $item->id }}">
    @csrf
    @method('put')

    <div id="put-dokter{{ $item->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Edit Gejala</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">


                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Nama Gejala</label>
                            <input type="text" value="{{ $item->nama_gejala }}" name="nama_gejala"  class="form-control" id="field-3" placeholder="Nama Lengkap">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Jenis Hewan</label>
                            <select name="tabel_jenis_hewan_id" id="" class="form-control">
                                @foreach ($jenis_hewan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_hewan }}</option>
                                @endforeach
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
@endforeach
</div>

</form>


{{-- and add --}}
                                
                        
                            
                           
                            
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>


{{-- add form model --}}
<form method="POST" action="/list_gejala" >
    @csrf
    <div id="add-dokter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">News Gejala</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">


                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Nama Gejala</label>
                            <input type="text" required name="nama_gejala"  class="form-control" id="field-3" placeholder="Enter Text">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Jenis Hewan</label>
                            
                            <select class="form-control" name="tabel_jenis_hewan_id" id="">
                               @foreach ($jenis_hewan as $item)
                                   <option value="{{ $item->id }}">{{ $item->nama_hewan}}</option>
                               @endforeach
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
