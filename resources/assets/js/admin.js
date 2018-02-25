import sortable from 'sortablejs/Sortable';

window._sortable = sortable;


// remove action active dropdown in widget-holder
$(".widget-holder").on('click', function (){
    return false;
});

// remove action close dropdown
$(document).on('click', '.widget-inner .dropdown-menu', function (e) {
    e.stopPropagation();
});