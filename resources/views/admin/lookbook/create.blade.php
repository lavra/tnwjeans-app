@extends('admin.layouts.template')
@push('title')
<title> TNW JEANS | Lookbook</title>
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
            <h1>Lookbook</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Lookbook</li>
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
                <h3 class="card-title">Adicionar Imagem <small> Lookbook</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="upload-form" method="POST" action="{{ route('lookbook.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">

                    <div class="col-1">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="active" id="image_active" checked>
                        <label class="form-check-label" for="image_active"><b>Ativo</b></label>
                      </div>
                    </div>

                    <div class="col-2">
                      <div class="form-group">
                        <label for="image_order">Ordem</label>
                        <input type="number" name="order" class="form-control" id="image_order" placeholder="Order">
                      </div>
                    </div>

                    <div class="col-5">
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
          photo: {
            required: true,
            extension: "jpg|jpeg"
          }
        },
        messages: {
          order: {
            required: "A ordem é obrigatória",
            number: "Por favor, insira um número valido"
          },
          photo: {
            required: "A imagem é obrigatória",
            extension: "Faça o upload da imagem apenas nestes formatos (jpg, jpeg)"
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