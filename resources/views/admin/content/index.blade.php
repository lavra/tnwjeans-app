@extends('admin.layouts.template')

@push('title')
<title> TNW JEANS | Conteúdos</title>
@endpush

@push('head')
<!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{asset('admin/plugins/ekko-lightbox/ekko-lightbox.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
@endpush

@push('body')
<body class="hold-transition sidebar-mini">
@endpush

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Conteúdos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Conteúdo</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        @if(isset($data))
            @foreach($data as $content)
                @if($content->page == 'lookbook')
                    <div class="col-md-6">
                        <form action="{{route('content.update', $content->id)}}" method="post">
                            @csrf  
                            <input type="hidden" name="page" value="lookbook" >
                            <input type="hidden" name="id" value="{{ $content->id }}" >
                            <div class="card card-dark">
                                <div class="card-header">
                                    <h3 class="card-title">Lookbook</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputTitle">Título</label>
                                        <input type="text" id="title" name="title" class="form-control" value="{{ $content->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText">Texto</label>
                                        <input type="text" id="text" name="text" class="form-control" value="{{ $content->text }}">
                                    </div>              
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-dark float-right">Alterar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            @endforeach
        @endif

        <div class="col-md-6">
        </div>

      </div>       
    </section>
    <!-- /.content -->
  </div>
   <!-- /.content-wrapper -->

   @include('admin.footers.footer-1')

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
@endsection
