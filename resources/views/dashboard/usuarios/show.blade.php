@extends('layouts.delta')

@section('style')

@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Detalles historial usuario
        </div>
        <div class="card-body">
            <ul class="nav nav-pills flex-column flex-sm-row mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="flex-sm-fill text-center nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-historial" role="tab"
                        aria-controls="pills-profile" aria-selected="false">Historial de navegacion</a>
                </li>
                <li class="nav-item">
                    <a class="flex-sm-fill text-center nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-perfil" role="tab"
                        aria-controls="pills-home" aria-selected="true">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="flex-sm-fill text-center nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                        aria-controls="pills-contact" aria-selected="false">Otros</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-historial" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row col-12 col-md-3 ml-auto">
                        <div class="input-group mb-3">
                            <input id="searchInput" data-url="{{route('dashboard.usuarios.show', ['usuario_id' => $user->id])}}" type="text" class="form-control col-12" placeholder="Buscar" aria-label="Buscar" aria-describedby="button-addon2">
                        </div>
                    </div>
                    @include('dashboard.usuarios.detalles._historial')
                </div>
                <div class="tab-pane fade" id="pills-perfil" role="tabpanel" aria-labelledby="pills-home-tab">
                    @include('dashboard.usuarios.detalles._perfil')
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script type="text/javascript">
        let typingTimer;
        let doneTypingInterval = 500;
        let url = "{{route('dashboard.usuarios.show', ['usuario_id' => $user->id])}}"
        let loadingAjax = `
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                </br>
                <span class="">Cargando</span>
            </div>
        `;

        // $(window).on('hashchange', function() {
        //     if (window.location.hash) {
        //         var page = window.location.hash.replace('#', '');
        //         if (page == Number.NaN || page <= 0) {
        //             return false;
        //         }else{
        //             alert('haschange')
        //             getData(page);
        //         }
        //     }
        // });

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
                getData(page);
            });
            $(document).on('keyup', '#searchInput', function() {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(getData, doneTypingInterval);
            })

            $(document).on('keydown', '#searchInput', function() {
                clearTimeout(typingTimer);
            });
        });
    </script>
@endpush
