@extends('layouts.app')

@section('styles')
    <style type="text/css">
        .cria-conta-div { border-radius: 0.25rem; background-color: transparent; border: 1px dashed rgba(0, 0, 0, 0.125); height: 200px; line-height: 200px; text-align: center; cursor: pointer; }
        .cria-conta-div span { vertical-align: bottom; }
        .select-banco { display: inline-block; margin: auto; margin: 15px 0; width: 33%; }
        .select-banco img:hover { border: 2px solid #00c2cc; }
        .image-banco { width: 65px; display: block; margin: auto; }
        .card img { width: 50px; display: inline-block; margin: auto; margin-left: 30px; }
        .card h4 { font-size: ; font-weight: 600; color: #4d4d4d; }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content">
            <div class="col-md-10 offset-md-1">
                <p>Contas e carteiras</p>
                <div class="row">
                    @foreach($contas as $conta)
                        <div class="col-md-6">
                            <div class="card mb-4" style="height: 200px">
                                <div class="card-body text-center">
                                    <div class="d-flex">
                                        <div class="w-100">
                                            <img class="image-banco rounded-circle" src="img/bancos/{{ $conta->banco->logo }}">
                                        </div>

                                        <button type="button" class="btn-mini" data-editar="{{ $conta->id }}" data-editar="{{ $conta->id }}">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </div>

                                    <h4 class="mt-3">
                                        R$ {{ number_format($conta->saldo/100, 2, ',', '.') }}
                                    </h4>

                                    <p style="color: #808080">{{ $conta->tipo }}</p>

                                    <p>{{ $conta->detalhes }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-6">
                        <div class="cria-conta-div" data-toggle="modal" data-target="#criaContaModal">
                            <span>+ nova conta</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('contas/partials/modal-criar')

    @include('contas/partials/modal-editar')
@endsection

@section('scripts')
    <script type="text/javascript">
        const contas = {!! json_encode($contas) !!};
        const bancos = {!! json_encode($bancos) !!};

        $('section').hide();
        $('[data-conta]').show();

        $('#criaContaModal').on('hidden.bs.modal', function (e) {
            $('[data-conta="true"]').show();
            $('[data-banco="true"]').hide();
            $('[data-info="true"]').hide();

            $('input, select').val('');
        });
    </script>
@endsection
