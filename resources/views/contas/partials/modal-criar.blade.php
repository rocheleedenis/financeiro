<div class="modal fade" id="criaContaModal" tabindex="-1" role="dialog" aria-labelledby="criaContaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" id="criar-conta-form" method="POST" action="{{ route('contas.store') }}" style="min-height: 400px">
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

                        <div class="form-group w-100">
                            <label for="banco_id">Nome da conta</label>
                            <input class="form-control" id="nome" name="nome">
                        </div>

                        <div class="form-group w-100">
                            <label for="saldo">Saldo inicial</label>
                            <input class="form-control" id="saldo" name="saldo" value="0,00" data-money>
                        </div>
                    </div>

                    <div class="text-center pt-3">
                        <button type="submit" class="btn btn-success rounded-circle">
                            <i class="fas fa-check"></i>
                        </button>
                    </div>
                </section>

                <section data-outros="true">
                    <div class="row text-left">
                        <button class="btn-mini" type="button" data-outros="back">
                            <i class="fas fa-arrow-left"></i>
                        </button>
                    </div>

                    <div class="section-content row px-5 w-100">
                        <div class="text-center w-100">
                            <img class="image-banco rounded-circle mb-3" data-outros="logo">
                        </div>

                        <div class="form-group w-100">
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

@push('scripts')
<script type="text/javascript">
    $(function() {
        var CriarConta = function () {
            let sectionConta = function () {
                $('[data-conta="CC"], [data-conta="CP"]').on('click', function (e) {
                    let tipo = $(e.currentTarget).attr('data-conta');

                    $('input[name="tipo"]').val(tipo);
                    $('[data-conta="true"]').hide();
                    $('[data-banco="true"]').show(600);
                });
            };

            let sectionBanco = function () {
                $('[data-banco="back"]').on('click', function () {
                    $('[data-banco="true"]').hide();

                    $('[data-conta="true"]').show(600);
                });

                $('[data-banco="bank"]').on('click', function (e) {
                    let banco_id = $(e.currentTarget).attr('data-value');

                    bancos.map((banco, index) => {
                        if (banco.id == banco_id) {
                            $('[data-info="banco"]').text(banco.nome);
                            $('[data-info="logo"]').attr('src', '/img/bancos/'+banco.logo);
                            $('input[name="banco_id"]').val(banco.id);
                        }
                    });

                    $('[data-banco="true"]').hide();
                    $('[data-info="true"]').show(600);
                });
            };

            let sectionInfo = function () {
                $('[data-info="back"]').on('click', function () {
                    $('[data-info="true"]').hide();

                    $('[data-banco="true"]').show(600);
                });

                $('[data-banco="bank"]').on('click', function (e) {
                    let banco_id = $(e.currentTarget).attr('data-value');

                    bancos.map((banco, index) => {
                        if (banco.id == banco_id) {
                            $('[data-info="banco"]').text(banco.nome);
                        }
                    });

                    $('[data-banco="true"]').hide();
                    $('[data-info="true"]').show(600);
                });
            };

            return {
                init: function () {
                    sectionConta();
                    sectionBanco();
                    sectionInfo();
                }
            };
        }();

        CriarConta.init();

        $('[data-money]').maskMoney({
            prefix       : 'R$ ',
            allowNegative: true,
            thousands    : '.',
            decimal      : ',',
            affixesStay  : false
        });
    });

    $('#criaContaModal').on('hidden.bs.modal', function (e) {
        $('[data-conta="true"]').show();
        $('[data-banco="true"]').hide();
        $('[data-info="true"]').hide();

        $('input, select').val('');
    });
</script>
@endpush
