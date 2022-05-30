@extends('admin.layouts.template')
@push('title')
<title> TNW JEANS | </title>
@endpush
@push('head')
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}?123">
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
            <h1>Imagens</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('lookbook.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Lookbook</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
    <!-- Default box -->
    <div class="card">
    <div class="card-header">
        
        <div class="card-tools">
        <a href="{{ route('lookbook.create') }}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar</a>
        </div>
    </div>
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 10%">Imagem</th>
                <th style="width: 8%"> Ordem</th>
                <th style="width: 8%" class="text-center">Status</th>
                <th style="width: 50%"></th>
            </tr>
        </thead>
        <tbody>
            @if($lookbooks)
            @foreach($lookbooks as $lookbook)
            <tr>
                <td>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <img alt="Tnw Jeans" class="product-image" src="{{ url("storage/{$lookbook->image}") }}">
                        </li>
                    </ul>
                </td>               
                <td class="project_order"><span class="badge badge-secondary right">{{ $lookbook->order }}</span></td>
                <td class="project-state">
                    @if($lookbook->active == 1) 
                        <span class="badge badge-success">Ativo</span>
                    @else    
                        <span class="badge badge-danger">Inativo</span>
                    @endif                     
                </td>
                <td class="project-actions text-right">
                    {{-- 
                    <a class="btn btn-primary btn-sm" href="#">
                        <i class="fas fa-folder"></i> Ver
                    </a>
                    --}}
                    <a class="btn btn-info btn-sm" href="{{ route('lookbook.edit', $lookbook->id) }}">
                        <i class="fas fa-pencil-alt"></i> Editar
                    </a>
                    <a class="btn btn-danger btn-sm" href="{{ route('lookbook.destroy', $lookbook->id) }}">
                        <i class="fas fa-trash"></i> Excluir                        
                    </a>
                </td>
            </tr>
            @endforeach
            @endif

        </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
</div>

@include('admin.footers.footer-1')


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
@endsection

@push('scripts')
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('admin/dist/js/demo.js')}}"></script>
@endpush