@extends('layouts.delta')

@section('style')

@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Lista de usuarios que se registraron
        </div>
        <div class="card-body">
            <div class="row col-12 col-md-3 ml-auto">
                <div class="input-group mb-3">
                    <input id="searchInput" data-url="{{route('dashboard.usuarios.index')}}" type="text" class="form-control col-12" placeholder="Buscar" aria-label="Buscar" aria-describedby="button-addon2">
                </div>
            </div>
            <div id="table-container" class="table-responsive">
                @include('dashboard.usuarios._list')
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        let typingTimer;
        let doneTypingInterval = 500;
        let url = "{{route('dashboard.usuarios.index')}}"
        let loadingAjax = `
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                </br>
                <span class="">Cargando</span>
            </div>
        `;



        function getData(page){
            page == null ? 1 : page
            $.ajax({
                url: url,
                type: "get",
                data: {page: page, query: $('#searchInput').val() },
                beforeSend: function() {
                    // $(target).fadeOut(200);
                    $('#table-container').html(loadingAjax);
                }
            }).done(function(data){
                $("#table-container").empty().html(data);
                location.hash = page;
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                alert(' No response from server');
            });
        }

        $(document).ready(function() {
            $(document).on('click', '.pagination a' ,function(event) {
                event.preventDefault();
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
                let myurl=$(this).attr('href');
                let page=$(this).attr('href').split('page=')[1];
                alert('click pagination a')
                getData(page);
            });
            $(document).on('keyup', '#searchInput', function() {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(getData, doneTypingInterval);
                alert('key up')
            })

            $(document).on('keydown', '#searchInput', function() {
                clearTimeout(typingTimer);
                alert('key down')
            });
        });
    </script>
@endsection
