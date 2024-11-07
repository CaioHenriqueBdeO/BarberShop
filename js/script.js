$(document).ready(function() {

	
	
})

$('.barba-menu').click(() => {
		$('#Serviços-barba').removeClass('.hidden')
		$('#Serviços-corte').addClass('.hidden')
		$('.quimica').addClass('.hidden')
		$('.combo').addClass('.hidden')
	})

	$('.corte-menu').click(() => {
		$('#Serviços-corte').removeClass('.hidden')
		$('#Serviços-barba').addClass('.hidden')
		$('.quimica').addClass('.hidden')
		$('.combo').addClass('.hidden')
	})

	$('.quimica-menu').click(() => {
		$('.quimica').removeClass('.hidden')
		$('#Serviços-barba').addClass('.hidden')
		$('#Serviços-corte').addClass('.hidden')
		$('.combo').addClass('.hidden')
	})

	$('.combo-menu').click(() => {
		$('.combo').removeClass('.hidden')
		$('#Serviços-barba').addClass('.hidden')
		$('.quimica').addClass('.hidden')
		$('#Serviços-corte').addClass('.hidden')
	})