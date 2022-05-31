@extends('admin.layouts.template')

@push('title')
<title> TNW JEANS | Home</title>
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

    <!-- Main content -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-dark">
              <div class="card-header">
                <h4 class="card-title">Fotos: Slider Home</h4>
              </div>
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> Todas Fotos </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="1"> Desktop </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="2"> Mobile </a>
                  </div>
                  <div class="mb-2">
                    <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle=""> Embaralhar </a>
                    <div class="float-right">
                      <div class="btn-group">
                        <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Crescente </a>
                        <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Decrescente </a>
                      </div>

                      <select class="custom-select" style="width: auto;" data-sortOrder>
                        <option value="index"> - </option>
                        <option value="sortData">  </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="filter-container p-0 row" style="min-height: 500px;">
                    @if($sliders)
                        @foreach($sliders as $slider)
                            @php 
                                ($slider->page == 1) ? $page = 'Desktop' : $page = 'Mobile';
                                $path = explode('/', $slider->image);
                                $alt = substr($path[2], 0, -4);                               
                            @endphp
                            <div class="filtr-item col-sm-2" data-category="{{$slider->page}}" data-sort="white sample">
                                <a href="{{ url("storage/{$slider->image}")}}?text={{$loop->iteration}}" data-toggle="lightbox" data-title="{{$page}}: {{$slider->order}} <br> {{$alt}}">
                                    <img src="{{ url("storage/{$slider->image}")}}?text={{$loop->iteration}}" class="img-fluid mb-2" alt="white sample"/>
                                </a>
                            </div>
                        @endforeach
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="card card-dark">
              <div class="card-header">
                <h4 class="card-title">Fotos: Lookbook</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  @if($lookbooks)
                    @foreach($lookbooks as $lookbook)
                    @php 
                      $path = explode('/', $lookbook->image); 
                      $alt = substr($path[2], 0, -4);                               
                    @endphp
                    <div class="col-sm-2">
                      <a href="{{ url("storage/{$lookbook->image}")}}?text={{$loop->iteration}}" data-toggle="lightbox" data-title="{{$alt}}" data-gallery="gallery">
                        <img src="{{ url("storage/{$lookbook->image}")}}?text={{$loop->iteration}}" class="img-fluid mb-2" alt="{{$alt}}"/>
                      </a>
                    </div>
                    @endforeach
                  @endif
                </div>
              </div>
            </div>
          </div>          
        </div>


        </div>
      </div><!-- /.container-fluid -->
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

@push('scripts')
<script src="{{asset('admin/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('admin/plugins/filterizr/jquery.filterizr.min.js')}}"></script>
<script src="{{asset('admin/dist/js/demo.js')}}"></script>
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
@endpush

