require('./bootstrap');
require('./materialize.js');


document.addEventListener("DOMContentLoaded", function(event) {
    //Menu Side Nav
    const sideNav = document.querySelectorAll('.sidenav');
    const instSideNav = M.Sidenav.init(sideNav);

    //BTN Add
    const tap = document.querySelectorAll('.tap-target');
    instTap = M.TapTarget.init(tap);

    const btnTap = document.querySelector('#tap');
    if(btnTap) {
        btnTap.addEventListener('mouseenter', function () {
            instTap[0].open();
        });
        btnTap.addEventListener('mouseleave', function () {
            setTimeout(function () {
                instTap[0].close();
            }, 500);
        });
    }

    //DropDown Menu
    const drop = document.querySelectorAll('.dropdown-trigger');
    const instDrop = M.Dropdown.init(drop);

    //Tooltip
    const toolpip = document.querySelectorAll('.tooltipped');
    const instTool = M.Tooltip.init(toolpip);

    //Modal
    const modals = document.querySelectorAll('.modal');
    const instModal = M.Modal.init(modals);

    //Parallax
    const parax = document.querySelectorAll('.parallax');
    const instParax = M.Parallax.init(parax);

    //LightBox
    const box = document.querySelectorAll('.materialboxed');
    const instBox = M.Materialbox.init(box);

    //DatePicker
    const dateOptions = {
        firstDay: 1,
        showClearBtn: true,
        format: 'yyyy-mm-dd',
        i18n: {
            cancel: "Annuler",
            clear: "Effacer",
            done: "Ok",
            weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
            weekdays: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
            monthsShort: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aou', 'Sept', 'Oct', 'Nov', 'Déc'],
            months: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S']
        }
    };

    const date = document.querySelectorAll('.datepicker');
    const instDate = M.Datepicker.init(date, dateOptions);

    //FormSelect
    const select = document.querySelectorAll('select');
    const instSelect = M.FormSelect.init(select);

    //Collapsible
    const collab = document.querySelectorAll('.collapsible');
    const instCollab = M.Collapsible.init(collab);

    //Auto complete
    require('./autocomplete');

    //Textaera count
    const textCount = document.querySelectorAll('textarea#description, textarea[name="ent_description"]');
    const instCount = M.CharacterCounter.init(textCount);

    //Distance Range count
    let range = document.getElementById('distance');
    if(range) {
        range.addEventListener('input', function () {
            let textRange = document.querySelector('#rangeValue');
            textRange.innerHTML = range.value + ' km';
        }, false)
    }

    //Confirmation suppression user
    let btnSupprUser = document.getElementById('btnSupprUser');
    const checkUser = document.getElementById('checkUser');
    if(checkUser) {
        checkUser.addEventListener('change', function () {
            if (this.checked) {
                btnSupprUser.removeAttribute('disabled')
            } else {
                btnSupprUser.setAttribute('disabled', true)
            }
        })
    }
});

