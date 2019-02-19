<div class="modal fade" id="editaContaModal" tabindex="-1" role="dialog" aria-labelledby="editaContaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" id="editar-conta-form" method="POST" action="{{ route('contas.update') }}">
            @csrf
            <input type="hidden" name="id">

            <div class="modal-body p-5">
                <div class="text-center">
                    <img src="" class="rounded-circle mb-4" style="width: 60px;" id="img-banco-edit">
                </div>

                <div class="form-group">
                    <label for="banco_id">Banco / Instituição financeira</label>
                    <select class="form-control" name="banco_id" id="banco_id" data-bancos>
                        @foreach($bancos as $banco)
                        <option value="{{ $banco->id }}">{{ $banco->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input class="form-control" name="nome" id="nome">
                </div>

                <div class="form-group">
                    <label for="saldo">Saldo inicial</label>
                    <input class="form-control" name="saldo" id="saldo" data-money>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success rounded-circle">
                        <i class="fas fa-check"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script src="/vendor/maskMoney/jquery.maskMoney.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('[data-editar]').on('click', (e) => {
                let conta_id = $(e.currentTarget).attr('data-editar');
                contas.map((conta, index) => {
                    if (conta.id == conta_id) {
                        var saldo  = (conta.saldo / 100)+'0';

                        $('#img-banco-edit').attr('src', 'img/bancos/'+conta.banco.logo);
                        $('input[name="id"]').val(conta.id);
                        $('select[name="banco_id"]').val(conta.banco_id);
                        $('select[name="tipo"]').val(conta.tipo);
                        $('input[name="nome"]').val(conta.nome);
                        $('input[name="saldo"]').val(saldo.replace('.', ','));
                    }
                });

                $('#editaContaModal').modal('show');
            });

            $('[data-money]').maskMoney({
                prefix       : 'R$ ',
                allowNegative: true,
                thousands    : '.',
                decimal      : ',',
                affixesStay  : false
            });
        });

        $('#editaContaModal').on('hidden.bs.modal', function (e) {
            $('[data-conta="true"]').show();
            $('[data-banco="true"]').hide();
            $('[data-info="true"]').hide();

            $('input, select').val('');
        });
    </script>
@endpush
