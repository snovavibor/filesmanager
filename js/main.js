(function ($){
    $(function (){


$(document).ready( function(){
$('.short').each( function(){
    $(this).on('dblclick', (e)=>{
    
       e.preventDefault();
       let target = $(this).data('name');       
       console.log(target);
        $.ajax({
            type: 'POST',
            url: 'functions.php',
            data: {
                el: target,
                action: 'render'
            },
            success:function(result){
               
                $('#info').html('').text(result).css('background','#B0C4DE');
            }
        })

    })
})
})

















    })
})(jQuery)