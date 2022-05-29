@extends('admin.layouts.template')
@push('title')
<title> TNW JEANS | Home}</title>
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
    <section class="content">
    <!-- Default box -->
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Slider Home</h3>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
        </button>
        </div>
    </div>
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 10%">Imagem</th>
                <th style="width: 8%">Tipo</th>
                <th style="width: 8%"> Ordem</th>
                <th style="width: 8%" class="text-center">Status</th>
                <th style="width: 50%"></th>
            </tr>
        </thead>
        <tbody>
            @if($sliders)
            @foreach($sliders as $slider)
            <tr>
                <td>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <img alt="Tnw Jeans" class="product-image" src="{{ url("storage/{$slider->image}") }}">
                        </li>
                    </ul>
                </td>
                <td class="project-state">
                    @if($slider->page == 1) 
                        <span class="badge badge-info">Desktop</span>
                    @else    
                        <span class="badge badge-secondary">Mobile</span>
                    @endif                     
                </td>
                <td class="project_order"><span class="badge badge-secondary right">{{ $slider->order }}</span></td>
                <td class="project-state">
                    @if($slider->active == 1) 
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
                    <a class="btn btn-info btn-sm" href="{{ route('slider1.edit', $slider->id) }}">
                        <i class="fas fa-pencil-alt"></i> Editar
                    </a>
                    <a class="btn btn-danger btn-sm" href="{{ route('slider1.destroy', $slider->id) }}">
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
<script src="{{asset('admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('admin/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('admin/dist/js/demo.js')}}"></script>

<script>
  $(function() {
    
    $('#upload-form').validate({
      rules: {
        order: {
          required: true,
          number: true,
        },
        photo: {
          required: true,
          extension: "jpg|jpeg"
        },
        page: {
          required: true
        },
      },
      messages: {
        order: {
          required: "A ordem é obrigatória",
          number: "Por favor, insira um número valido"
        },
        photo: {
          required: "A imagem é obrigatória",
          extension: "Faça o upload da imagem apenas nestes formatos (jpg, jpeg)"
        },
        page: {
          required: "O tipo de imagem é obrigatório"
        }
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>
@endpush