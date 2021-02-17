require('./bootstrap');

$(document).ready(function(){
   let instance = $('.sidenav').sidenav();
   let tap = $('.tap-target').tapTarget();
    $('.tap').mouseenter(function(){
        $('.tap-target').tapTarget('open');
    })
    $('.tap').mouseleave(function(){
        setTimeout(function (){
            $('.tap-target').tapTarget('close');
        },500)

    })
    //Tooltip
    $('.tooltipped').tooltip();

    //Modal
    $('.modal').modal();

    //DatePicker
    $('.datepicker').datepicker();

    //FormSelect
    $('select').formSelect();

    //Collapsible
    $('.collapsible').collapsible();
    //Auto complete
    require('./autocomplete');

    let range = document.getElementById('distance');
    range.addEventListener('input', function (){
        $('#rangeValue').text(range.value + ' km');
    }, false)


});

