(function($) {
	
	$(document).ready(function() {   

        if($('#_project049_posts_slider').length > 0 ) {
            var select2_options = {
                language: 'es',
                width: '100%',
                minimumInputLength: 5,
                data: project049_posts_slider,
                ajax: {
                    url: ajaxurl + '?action=project049_get_posts',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data) {
                        return data;
                    },
                    cache: true
                },
                placeholder: 'Introduce el título de un artículo'
            }
            $('#_project049_posts_slider').select2(select2_options);        
        }    

    });

})(jQuery);