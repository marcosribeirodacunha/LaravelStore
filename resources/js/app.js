// Functions

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

// ----------------------------------------------------------------
$(disableActive);

$('#units_in_stock').on('click change', disableActive);
