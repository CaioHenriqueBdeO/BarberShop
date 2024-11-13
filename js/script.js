$(document).ready(function () {
	servicos.eventos.init();
})

var servicos = {};

servicos.eventos = {

	init: () => {
		servicos.metodos.obterItensServicos();
	}

}

servicos.metodos = {

	obterItensServicos: (categoria = 'barba', vermais = false) => {

		var filtro = MENU[categoria];

		if (!vermais) {
			$("#itensServicos").html('');
			$("#btnVerMais").removeClass('hidden');
		}

		$.each(filtro, (i, e) => {

			let temp = servicos.templates.item.replace(/\${img}/g, e.img)
			.replace(/\${nome}/g, e.name)
			.replace(/\${preco}/g, e.price.toFixed(2).replace('.', ','))
			.replace(/\${pontos}/g, e.points)
			.replace(/\${id}/g, e.id)


			if (vermais && i >= 8 && i < 100) {
				$("#itensServicos").append(temp)
			}

			if (!vermais && i < 8) {
				$("#itensServicos").append(temp)
			}

		})

		//remove active
		$(".container-menu a").removeClass('active');

		//seta o active
		$("#menu-" + categoria).addClass('active')

	},

	verMais: () => {

		var ativo = $(".container-menu a.active").attr('id').split('menu-')[1];
		grupos.metodos.obterItensServicos(ativo, true);

		$("#btnVerMais").addClass('hidden');
	},

}

servicos.templates = {
	item: `
	<div class="col-sm-3 col-9 mb-5"  id="itensServicos">
		<div class="card card-item" id="\${id}">
                  <div class="img-produto">
                    <img src="\${img}"/ class="imagem-prod">
                    <p class="title-produto text-center mt-4">
                    <b>\${nome}</b>
                  </p>
                  <p class="price-produto text-center">
                    <b>R$ \${preco}</b>
                  </p>
                  <div class="add-agendar">
                    <span class="btn btn-add mb-2"><a href="https://wa.me/5511990155204?text=Olá,+quero+agendar+um+horário+para+\${nome},+lembre+que+estou+ganhando+\${pontos}+pontos!" target="_blank">Agendar</a></span><br>
                  </div>
                    <p class="texto-pontos mt-1">Estou recbendo \${pontos} pontos ao agendar!</p>
                  </div>
                  
        </div>
    </div>         
	`
}

	$('.combo-menu').click(() => {
		$('.combo').removeClass('.hidden')
		$('#Serviços-barba').addClass('.hidden')
		$('.quimica').addClass('.hidden')
		$('#Serviços-corte').addClass('.hidden')
	})
