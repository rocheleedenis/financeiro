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

<!-- <div class="modal fade" id="editaContaModal" tabindex="-1" role="dialog" aria-labelledby="editaContaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" id="conta-form" method="POST" action="{{ route('contas.update', '#') }}">
            @csrf

            <div class="modal-body p-5">
                <div class="text-center">
                    <img src="'img/bancos/'+conta_old.banco.logo" class="rounded-circle mb-4" style="width: 60px;">
                </div>

                <div class="form-group">
                    <label for="banco_id">Banco / Instituição financeira</label>
                    <select class="form-control" id="banco_id" data-bancos></select>
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo da nova conta</label>
                    <select class="form-control" id="tipo">
                        <option value="CC">Conta corrente</option>
                        <option value="CP">Conta poupaça</option>
                        <option value="O">Outros</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="saldo">Saldo inicial</label>
                    <input class="form-control" id="saldo">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success rounded-circle">
                        <i class="fas fa-check"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div> -->

<div class="modal fade" id="criaContaModal" tabindex="-1" role="dialog" aria-labelledby="criaContaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" id="conta-form" method="POST" action="{{ route('contas.store') }}" style="min-height: 400px">
            @csrf
            <input type="hidden" name="tipo">
            <input type="hidden" name="banco_id">

            <div class="modal-body text-left p-5">
                <section data-conta="true" class="p-3">
                    <h5>Selecione o tipo da nova conta</h5>

                    <button type="button" class="btn btn-lg btn-outline-secondary w-100 my-3" data-conta="CC">
                        <i class="fas fa-university"></i> Conta corrente
                    </button>

                    <button type="button" class="btn btn-lg btn-outline-secondary w-100 my-3" data-conta="CC">
                        <i class="fas fa-piggy-bank"></i> Conta poupaça/Investimentos
                    </button>

                    <button type="button" class="btn btn-lg btn-outline-secondary w-100 my-3" data-conta="O">
                        <i class="fas fa-wallet"></i> Outros
                    </button>
                </section>

                <section data-banco="true">
                    <div class="row text-left">
                        <button type="button" class="btn-mini" data-banco="back">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                    </div>

                    <div class="row px-5 text-center">
                        <h5>Selecione a instituição financeira</h5>

                        @foreach($bancos as $banco)
                            <a class="select-banco" title="{{ $banco->nome }}" data-banco="bank" data-value="{{ $banco->id }}">
                                <img class="image-banco rounded-circle" src="/img/bancos/{{ $banco->logo }}" data-banco="select" alt="{{ $banco->nome }}">
                            </a>
                            <a href=""></a>
                        @endforeach
                    </div>
                </section>

                <section data-info="true">
                    <div class="row text-left">
                        <button class="btn-mini" type="button" data-info="back">
                            <i class="fas fa-arrow-left"></i>
                        </button>
                    </div>

                    <div class="section-content row px-5 w-100">
                        <div class="text-center w-100">
                            <img class="image-banco rounded-circle mb-3" data-info="logo">
                        </div>

                        <div class="text-center w-100 pb-2">
                            <h5>Adicione sua conta <span data-info="banco"></span></h5>
                        </div>

                        <div class="form-group w-100" data-nome>
                            <label for="banco_id">Nome da conta</label>
                            <input class="form-control" id="saldo" name="nome">
                        </div>

                        <div class="form-group w-100">
                            <label for="saldo">Saldo inicial</label>
                            <input class="form-control" id="saldo" name="saldo" value="0,00">
                        </div>
                    </div>

                    <div class="text-center pt-3">
                        <button type="submit" class="btn btn-success rounded-circle">
                            <i class="fas fa-check"></i>
                        </button>
                    </div>
                </section>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="/js/contas/index.js"></script>
<script type="text/javascript">
    $('section').hide();
    $('[data-conta]').show();

    const contas = {!! json_encode($contas) !!};
    const bancos = {!! json_encode($bancos) !!};
</script>
@endsection
