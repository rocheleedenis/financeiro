$(function () {
	// CRIAR CONTA
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

	// $('[data-editar]').on('click', (e) => {
	// 	let conta_id = $(e.currentTarget).attr('data-editar');

	// 	contas.map((conta, index) => {
	// 		if (conta.id == conta_id) {
	// 			$('select[name="banco_id"]').val(conta.banco_id);
	// 			$('select[name="tipo"]').val(conta.tipo);
	// 			$('input[name="saldo"]').val(conta.saldo);
	// 		}
	// 	});

	// 	$('#editaContaModal').modal('show');
	// });

	// options = '<option value="" selected>Selecione</option>';
	// $.each(bancos, function(index, banco) {
	// 	options += '<option value="'+ banco.id +'">'+ banco.nome +'</option>';
	// });

	// $('[data-bancos]').html(options);

	// $('[data-bancos]').on('change', function (e) {
	// 	let banco_id = $(e.currentTarget).val();

	// 	$('[data-criar="image"]').attr('src', '');

	// 	if (!banco_id) return;

	// 	$.each(bancos, function (index, banco) {
	// 		if (banco.id == banco_id) {
	// 			$('[data-criar="image"]').attr('src', '/img/bancos/'+banco.logo);
	// 		}
	// 	});
	// });

	// $('[data-banco="true"]').hide(600);
	// $('[data-nome]').hide(600);

	// $('[data-conta').on('change', function (e) {
	// 	let tipo = $(e.currentTarget).val();

	// 	if (tipo == 'O') {
	// 		$('[data-banco="true"]').hide(600);
	// 		$('[data-nome]').show(600);

	// 		return;
	// 	}

	// 	$('[data-banco="true"]').show(600);
	// 	$('[data-nome]').hide(600);
	// });
});
