@extends('layouts.app')

@section('content')
<!-- #section:basics/content.breadcrumbs -->
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="{{ url('/quantri') }}">Dashboard</a>
        </li>
        <li>
            <a href="{{ route('admin.roles.index') }}">Roles</a>
        </li>
        <li class="active">Edit</li>
    </ul><!-- /.breadcrumb -->
    <!-- /section:basics/content.searchbox -->
</div>
<!-- /section:basics/content.breadcrumbs -->

<div class="page-content">
    <div class="page-header">
        <h1>
            Roles
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Edit
            </small>
            <a class="btn btn-primary pull-right" href="{{ route('admin.roles.index') }}">
                <i class="ace-icon fa fa-list" aria-hidden="true"></i>
                <span class="hidden-xs">List</span>
            </a>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            @include('common.errors')
            
            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                {!! method_field('PUT') !!}

                @include('admin.roles._form')
            </form>
        </div>
    </div>
</div><!-- /.page-content -->
@endsection