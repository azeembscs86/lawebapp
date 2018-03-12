@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
    <h1>
        Brands      
    </h1>
    <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
        <li> Brands</li>
       
    </ol>
</section>
<div class="box">
    @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
    <div class="box-header">
        <button rel="{{url('')}}" type="button" 
                class="btn btn-info make-modal-large iframe-form-open" 
                data-toggle="modal" data-target="#modal-default" title="Add Brand">
            <span class="glyphicon glyphicon-plus"></span>Add
        </button>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>       
                    <th>Image</th>
                    <th>Name</th>                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $brands as $brand )
                <tr>
                    <td>@if($brand->brand_image)<img src="{{asset('public/'.$brand->brand_image)}}">@endif</td>
                    <td>{{$brand->brand_name}}</td> 
                    <td> <a href="#editpackage{{$brand->brand_id}}" rel="" type="button" 
                            class="btn btn-info make-modal-large iframe-form-open" 
                            data-toggle="modal"  title="Edit Brand {{$brand->cat_name}}">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="#deletepackage{{$brand->brand_id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Delete Brand">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a></td>                  
                </tr>

            <div class="modal fade" id="editpackage{{$brand->brand_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Brand</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="POST" action="{{url('/admin/brands/update-brand')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="brand_id" value="{{$brand->brand_id}}">
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Brand Name</label>
                                        <input type="text" name="brand_name" value="{{$brand->brand_name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Category name" required="required">
                                    </div>                  
                                     
                                    <div class="form-group">
                                       <label for="exampleInputFile">Upload Image</label>
                                       <input type="file" name="img_path" id="exampleInputFile">
                                       <input type="hidden" name="logo_image" value="{{$brand->brand_image}}">
                                       <img style="float:right;" src="{{asset('public/'.$brand->brand_image)}}"> 
                                    </div>        
                                                    
                                    
                                </div>
                                <!-- /.box-body -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="btn_save">Save</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

            
            <div class="modal fade" id="deletepackage{{$brand->brand_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Delete Brand</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to Delete this Brand <b>{{$brand->brand_name}}</b>?</p>  

                                            <div class="modal-footer">
                                               <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                               <a href="{{ url('/admin/brands/destroy/'.$brand->brand_id) }}">
                                               <button 
                                                     class="btn btn-primary">Delete</button>
                                                </a>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
            @endforeach
            </tbody>

        </table>
    </div>
    <!-- /.box-body -->
</div>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Brand</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{url('/admin/brands/save-brand')}}" role="form" enctype="multipart/form-data" data-toggle="validator">
                    {{ csrf_field() }}
                    <div class="box-body">                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Name</label>
                            <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" placeholder="Enter brand name" required="required">
                        </div>                  
                                          
                              <div class="form-group">
                                       <label for="exampleInputFile">Upload Image</label>
                                       <input type="file" name="img_path" id="exampleInputFile">                                       
                                    </div>          
                        
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn_save">Save</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
        })
    })
</script>
@endsection

