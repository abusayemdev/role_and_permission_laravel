@extends('admin.dashboard')
@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

    
            <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Settings Index')}}</li>
                </ol>
                
            
            </div><!-- /.col -->
            <div class="col-sm-6">
                
                <a href="{{route('admin.settings.create')}}" class="btn btn-sm btn-primary float-right mr-3"> {{__('Create Settings')}}</a>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
        <div class="container-fluid">
            <div class="row">
        
                <div class="col-lg-12">

                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{__('Settings List')}} </h3>
                    
                        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                            
                                <tr>
                                <th>{{__('#SL')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Logo')}}</th>
                                <th>{{__('Active Status')}}</th>
                                <th>{{__('Action')}}</th>
                            
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                $sl=1;
                                ?>

                                @foreach($settings as $setting)
                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td>{{$setting->Name}}</td>
                                    <td> {{$setting->Email}}</td>
                                    <td><img src="{{URL::to($setting->Logo)}}"  width="50px"></td>

                                    <td class="text-center">
                                    @if($setting->Status ==1)
                                        <span class="badge badge-primary">{{__('Active')}}</span>
                                    @else
                                        <span class="badge badge-secondary">{{__('Inactive')}}</span>
                                    @endif

                                    
                                    @if($setting->Status ==1)
                                        <label class="switch ml-3 mt-1">
                                            <input type="checkbox" class="input_status" checked value="{{URL::to('/admin/inactive-settings/'.$setting->id)}}">
                                            <span class="slider round"></span>
                                        </label>
                                    @else
                                        <label class="switch">
                                            <input type="checkbox" class="input_status" value="{{URL::to('/admin/active-settings/'.$setting->id)}}">
                                            <span class="slider round"></span>
                                        </label>
                                    @endif
                                    
                                    </td>
                                    
                                    <td>
                                
                                        <a class="btn btn-info btn-sm" href="{{route('admin.settings.show', $setting->id)}}">{{__('View')}}</a>
                                        <a class="btn btn-success btn-sm" href="{{route('admin.settings.edit', $setting->id)}}">{{__('Edit')}}</a>
                                        <a href="javascript:;" class="btn btn-sm btn-danger delete" data-form-id="settings-delete-{{$setting->id}}">{{__('Delete')}} </a>
                                        <form action="{{route('admin.settings.destroy', $setting->id)}}" id="settings-delete-{{$setting->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        </form>
                                    </td>
                            
                                </tr>
                                @endforeach
                        
                            </tbody>
                    
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                    
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>



<style>
.switch {
  position: relative;
  display: inline-block;
  width: 35px;
  height: 20px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 3px;
  bottom: 2px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #0069D9;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(13px);
  -ms-transform: translateX(13px);
  transform: translateX(13px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 20px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>


@endsection