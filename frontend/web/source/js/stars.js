 $('.rating-hide').hover(
            function(){
                var stars = $(this).val();
                $('#rating-updated').attr('class','icon-large-stars-'+ stars);
            },
            function(){
                var start = $('input:radio[name=rating]:checked').val()
                if(typeof  start == 'undefined' ){start = 0; }
                    $('#rating-updated').attr('class','icon-large-stars-'+ start)

            })
    $('.rating-hide').click(function(){
        /*убираем checked у всех элементов*/
        $('.rating-hide').each(function(){
            $(this).attr( 'checked', false )
        });

        /*добавляем checked необходимому элементу*/
        $(this).attr( 'checked', true );
    });

