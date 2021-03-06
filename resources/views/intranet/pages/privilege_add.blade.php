@extends('intranet.layouts.intranet_iframe_style')
@section('page-main')
<div class="x_panel">
<!-- 错误信息输出 -->
@if (! empty($errorMsg))
<div class="alert alert-danger alert-dismissible fade in" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
</button>
<strong>糟糕！</strong> @if (! empty($errorMsg)) {{$errorMsg}} @endif
</div>
@endif

  <div class="x_title">
    <h2>权限添加</h2>
    <ul class="nav navbar-right panel_toolbox">
      <li><a href="{{url('intranet/Privilege/list')}}"><button type="button" class="btn btn-default btn-sm">权限列表</button></a></li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br>
    <form action="" method="post" class="form-horizontal form-label-left">

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">权限名称 <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="" required="required" name="permission_name_en" class="form-control col-md-7 col-xs-12">
        </div>
        <span>英文名称, 类似"permission_name"</span>
      </div>
      
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">权限名称 <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="" required="required" name="permission_name_zh" class="form-control col-md-7 col-xs-12">
        </div>
        <span>中文名称, 类似"权限名称"</span>
      </div>
      
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">上级分类 <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="form-control" name="parent_id">
            <option value="0">顶级分类</option>
            @if (! empty($topPermissions))
            @foreach ($topPermissions as $item)
            <option value="{{$item['permission_id']}}">{{$item['permission_name_zh']}}</option>
            @endforeach
            @endif
          </select>
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        {{csrf_field()}}
        <button type="submit" class="btn btn-success">提交</button>
		<button class="btn btn-primary" type="reset" onclick="window.location.href=window.location.href;">重置</button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection