@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
    <h1>
        Categories      
    </h1>
    <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
        <li> Categories</li>
       
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
                data-toggle="modal" data-target="#modal-default" title="Add Categories">
            <span class="glyphicon glyphicon-plus"></span>Add
        </button>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>                    
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $categories as $category )
                <tr>
                    
                    <td>{{$category->cat_name}}</td>                   
                    <td> <a href="#editpackage{{$category->category_id}}" rel="" type="button" 
                            class="btn btn-info make-modal-large iframe-form-open" 
                            data-toggle="modal"  title="Edit Categories {{$category->cat_name}}">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="#deletepackage{{$category->category_id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Delete Categories">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a></td>                  
                </tr>

            <div class="modal fade" id="editpackage{{$category->category_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="POST" action="{{url('/admin/categories/update-category')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="category_id" value="{{$category->category_id}}">
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category Name</label>
                                        <input type="text" name="category_name" value="{{$category->cat_name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Category name" required="required">
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

            
            <div class="modal fade" id="deletepackage{{$category->category_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Delete Category</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to Delete this Category <b>{{$category->cat_name}}</b>?</p>  

                                            <div class="modal-footer">
                                               <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                               <a href="{{ url('/admin/categories/destroy/'.$category->category_id) }}">
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
                <h4 class="modal-title">Add New Category</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{url('/admin/categories/save-categories')}}">
                    {{ csrf_field() }}
                    <div class="box-body">                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Category name" required="required">
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
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>
@endsection

