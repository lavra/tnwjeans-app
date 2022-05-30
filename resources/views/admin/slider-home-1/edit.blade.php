@extends('admin.layouts.template')
@push('title')
<title> TNW JEANS | Home}</title>
@endpush
@push('head')
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
            <h1>Slider Home</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Slider Home</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Editar Imagem <small> Slider Home</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="upload-form" method="POST" action="{{ route('slider1.update', $slider->id)}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                  <div class="row">

                    <div class="col-2">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="active" id="image_active" @if($slider->active == 1) checked @endif>
                        <label class="form-check-label" for="image_active"><b>Ativo</b></label>
                        <div><img src="{{ url("storage/{$slider->image}") }}" alt="" width="100px" /></div>
                        
                      </div>
                    </div>

                    <div class="col-3">
                      <div class="form-group">
                        <label for="image_order">Ordem</label>
                        <input type="number" name="order" class="form-control" id="image_order" value="{{ $slider->order }}">
                      </div>
                    </div>

                    <div class="col-3">
                      <div class="form-group">
                        <label for="image_page">Tipo da Imagem</label>
                        <select class="form-control" name="page" id="image_page">
                          <option value="1" @if($slider->page == 1) selected @endif>Desktop</option>
                          <option value="2"  @if($slider->page == 2) selected @endif>Moble</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-4">
                       <div class="form-group">
                        <label for="image__file">Imagem</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photo" id="image__file">
                            <label class="custom-file-label" for="image__file">Escolher arquivo</label>
                          </div>
                        </div>
                      </div> '
                      
                    </div>

                  </div>
                  
                  @if($errors->any())
                    @foreach($errors->all() as $error)

                        <p>{{ $error }}</p>

                    @endforeach
                  @endif

                </div>

                <!-- /.card-body -->
                <div class="card-footer d-flex flex-row-reverse">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
                </div>
              </form>
            </div><!-- /.card -->

          </div>
        </div>
      </div><!-- /.container-fluid -->
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
          page: {
            required: true
          },
        },
        messages: {
          order: {
            required: "A ordem é obrigatória",
            number: "Por favor, insira um número valido"
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