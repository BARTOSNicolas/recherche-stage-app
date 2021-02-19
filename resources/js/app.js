require('./bootstrap');
require('./materialize.js');

$(document).ready(function(){
    //Menu Side Nav et Button Add
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
    $('.datepicker').datepicker({
        firstDay: 1,
        showClearBtn: true,
        format: 'yyyy-mm-dd',
        i18n: {
            weekdaysShort : ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
            weekdays : ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
            monthsShort : ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aou', 'Sept', 'Oct', 'Nov', 'Déc'],
            months : ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            weekdaysAbbrev : ['D', 'L', 'M', 'M', 'J', 'V', 'S']
        }
    });

    //FormSelect
    $('select').formSelect();

    //Collapsible
    $('.collapsible').collapsible();

    //Auto complete
    require('./autocomplete');

    //Textaera count
    $('textarea#description, textarea[name="ent_description"]').characterCounter();

    //Distance Range count
    let range = document.getElementById('distance');
    if(range) {
        range.addEventListener('input', function () {
            $('#rangeValue').text(range.value + ' km');
        }, false)
    }

});

