(function ($){
    $(function (){


$(document).ready( function(){
$('.short').each( function(){
    $(this).on('dblclick', (e)=>{    
       e.preventDefault();     
        $.ajax({
            type: 'POST',
            url: 'functions.php',
            data: {
                el: $(this).data('name'),
                action: 'render'
            },
            success:function(result){
               
                $('#info').html('').html(result).css('background','#B0C4DE');
            }
        })

    })
})
})

















    })
})(jQuery)