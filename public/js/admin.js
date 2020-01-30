// -------------------------------------------------------------------------------------------------------------
// Functions
// -------------------------------------------------------------------------------------------------------------

// Validate if 'units_in_stock' input is empty or 0 to set active check box as true or false
function disableActive () {
    let units_in_stock = $('#units_in_stock').val();
    let active = $('#active');

    if (units_in_stock === '' || units_in_stock == 0) {
        active.prop('disabled', true);
        active.prop('checked', false);
    } else {
        active.prop('disabled', false);
    }
}

// -------------------------------------------------------------------------------------------------------------

$(function () {

    // Toggle sidebar
    $('.menu-button').click(() => {
        $('#sidebar').toggleClass('hide-sidebar')
    });

    disableActive();

});

// -------------------------------------------------------------------------------------------------------------

$('#units_in_stock').on('click change', disableActive);
