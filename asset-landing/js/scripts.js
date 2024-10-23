$(document).ready(function() {
    $('.navbar-nav a').on('click' , function(e) {
        console.log('aaaaaa');
        let target = $(this.hash);
        if(target.length) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop : target.offset().top
            },1000)
        }
    })
});