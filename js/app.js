$(document).foundation()
$('.button').on('click', function(){
    $(this).next('.reveal-modal').foundation('reveal', 'open');
});