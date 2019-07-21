jQuery(function( $ ) {
	//
	wp.customize( 'true_color_scheme', function( value ) {
        //color scheme
		value.bind( function( to ) {
			if ( 'inverse' === to ) {
				$( 'body' ).css({
					'background-color': '#000',
					'color':      '#fff'
				});
                $( 'section.box' ).css({
					'background-color': 'rgba(255, 255, 255, 0.7)',
					'color':      '#000'
				});
                $( 'section.pg-header' ).css({
					'background-color': 'rgba(255, 255, 255, 0.7)',
					'color':      '#000'
				});
                $( 'footer' ).css({
                    'background-color': 'rgba(255, 255, 255, 0.7)',
					'color':      '#000'
				});
                $( '.navbar' ).css({
                    'background-color': 'rgba(255, 255, 255, 0.7)',
					'color':      '#000'
				});
			}else if( 'transpaent' === to ) {
                $( 'body' ).css({
					'background-color': '#fff',
					'color':      '#000'
				});
                $( 'section.box' ).css({
					'background-color': 'rgba(0, 0, 0, 0.7)',
					'color':      '#fff'
				});
                $( 'section.pg-header' ).css({
					'background-color': 'rgba(0, 0, 0, 0.7)',
					'color':      '#fff'
				});
                $( 'footer' ).css({
                    'background-color': 'rgba(0, 0, 0, 0.7)',
					'color':      '#fff'
				});
                $( '.navbar' ).css({
                    'background-color': 'rgba(0, 0, 0, 0.7)',
					'color':      '#fff'
				});
            }else {
				$( 'body' ).css({
					'background-color': '#efefef',
					'color':      '#383838'
				});
                $( 'section.box' ).css({
                    'background-image': 'linear-gradient(-45deg, #0eb075 0%, #0dd28a 100%)',
					'background-color': '#0eb075',
					'color':      '#fff'
				});
                $( 'section.pg-header' ).css({
                    'background-image': 'linear-gradient(-45deg, #0eb075 0%, #0dd28a 100%)',
					'background-color': '#0eb075',
					'color':      '#fff'
				});
                $( 'footer' ).css({
                    'background-color': '#fff',
					'color':      '#000'
				});
                $( '.navbar' ).css({
                    'background-color': '#fff',
					'color':      '#000'
				});
			}
		});
	});
    //fonts
	var sFont;
	wp.customize( 'true_font', function( value ) {
		value.bind( function( to ) {
			switch( to.toString().toLowerCase() ) {
				case 'circle':
					sFont = 'Circle, sans-serif';
					break;
				case 'roboto':
					sFont = 'Roboto';
					break;
                case 'opensans':
                    sFont = 'Open Sans';
				default:
					sFont = 'Circle, sans-serif';
					break;
			}
			$( 'body' ).css({
				fontFamily: sFont
			});
		});

	});
});