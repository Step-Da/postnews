$( ".menu-toggle" ).click(function() {
	$(".menu-toggle").toggleClass('open');
    $(".menu-round").toggleClass('open');
	$(".menu-line").toggleClass('open');
});

$('.toolbar-button-up').click(function(){
    $('body').animate({'scrollTop' : 0}, 1000);
    $('html').animate({'scrollTop' : 0}, 1000);
});

$('.fa-vk').click(() => { window.open('https:vk.com'); });
$('.fa-facebook').click(() => { window.open('https:facebook.com'); });
$('.fa-instagram').click(() => {window.open('https:instagram.com'); });
$('.fa-twitter').click(() => {window.open('https:twitter.com'); });

$('.fa-quote-right').click(() => { 
    window.location.href = '/posting/index';
});

$('.fa-i-cursor').click(() => { 
    window.location.href = '/editor/create';
});

$('.gallery').click(() => {
    window.location.href = '/editor/upload';
});