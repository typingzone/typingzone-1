$(document).ready(function() {

    $('.mySelect2').select2({
        placeholder: 'Search',
        allowClear: true,
        theme: "classic",
        height: 'resolve',
        dropdownParent: $('#add-transaction-modal')
    }).on('select2:open', function() {
        var selectInstance = $(this).data('select2');
        if (!$('.select2-link').length) {
            selectInstance.$results.parents('.select2-results')
                .append('<div class="select2-link"><a href="/orders" class="mt-2 btn btn-primary btn-sm form-control">Add Customer</a></div>')
                .on('click', function() {
                    selectInstance.trigger('close');
                });
        }
    });

    $('.mySelect3').select2({
        placeholder: 'Search',
        allowClear: true,
        theme: "classic",
        height: 'resolve',
        dropdownParent: $('#add-transaction-modal')
    }).on('select2:open', function() {
        var selectInstance = $(this).data('select2');
        if (!$('.select2-link').length) {
            selectInstance.$results.parents('.select2-results')
                .append('<div class="select2-link"><a href="/services" class="mt-2 btn btn-primary btn-sm form-control">Add Service</a></div>')
                .on('click', function() {
                    selectInstance.trigger('close');
                });
        }
    });

    $('.mySelect4').select2({
        placeholder: 'Search',
        allowClear: true,
        theme: "classic",
        height: 'resolve',
        dropdownParent: $('#add-transaction-modal')
    })


});


