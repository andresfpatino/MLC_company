jQuery(document).ready(function ($) {

    // Hero Services
	$('.MLC-hero-services').slick({
		dots: false,
		arrows: false,
        // prevArrow: "<img class='slick-prev slick-arrow' src='http://localhost/mlc_company/wp-content/themes/mlc_company/assets/img/left.png'>",
        // nextArrow: "<img class='slick-next slick-arrow'src='http://localhost/mlc_company/wp-content/themes/mlc_company/assets/img/right.png' >",
		infinite: true,
		autoplay: true,
		autoplaySpeed: 7000,
		speed: 1000,
		slidesToShow: 3,
		slidesToScroll: 1,
        centerMode: true,
        focusOnSelect: true,
        variableWidth: false,
		responsive: [
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
					arrows: false,
					dots: true
				}
			}
		]     
	});

    function setSlideVisibility() {       
        var visibleSlides = $('.slick-slide[aria-hidden="false"]');       
        $(visibleSlides).each(function() {
            $(this).css('opacity', 1);
        });        
        $(visibleSlides).first().prev().css('opacity', 0.2);
        $(visibleSlides).last().next().css('opacity', 0.2);
    }
      
    $(setSlideVisibility());
      
    $('.MLC-hero-services').on('beforeChange', function() {
        $('.slick-slide').each(function() {
            $(this).css('opacity', 1);
        });
    });
      
    $('.MLC-hero-services').on('afterChange', function() {
        setSlideVisibility();
    });

    // PopUp add to cart
    $( ".add_to_cart_button.ajax_add_to_cart").click(function() {
        swal({
            title: "Producto añadido",
            text: '¡El producto fue añadido al carrito!',
            type: "success",
            toast: true,
            position: 'top-end',
            confirmButtonText: 'Finalizar compra',
            confirmButtonColor: '#006480',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            closeOnConfirm: false,
            allowOutsideClick: true,
            allowEscapeKey: true
        },function() {
            document.location.href = "http://localhost/mlc_company/finalizar-compra/";
        });
    });	
});
