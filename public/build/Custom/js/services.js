
$(document).ready(function () {

    $('.mySelect3').select2({
        placeholder: 'Search Services',
        allowClear: true,
        theme: "classic",
        height: 'resolve',
        dropdownParent: $('#show-quotation-modal')
    });


    $('#add-service-modal-form').on('submit', function (e) {
        e.preventDefault();
        let formData = $(this).serialize();
        $.ajax({
            url: "/service-store",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function (response) {
                $('#add-service-modal').modal('hide');
                toastr.success('Service added successfully');
                location.reload();
            },
            error: function (xhr) {
                toastr.error('Something went wrong. Please try again.');
            }
        });
    });
});




$(document).on('click', '.delete-service', function () {
    var serviceId = $(this).data('id');
    var row = $(this).closest('tr');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/services/' + serviceId,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    toastr.success('Service deleted successfully');
                    row.remove(); 
                },
                error: function (xhr) {
                    toastr.error('Something went wrong. Please try again.');
                }
            });
        }
    });
});




$(document).ready(function () {
    // Handle edit button click
    $(document).on('click', '.edit-service', function () {
        var serviceId = $(this).data('id');
        $.get('/services/' + serviceId + '/edit', function (data) {
            $('#edit-service-id').val(data.id);
            $('#edit-service-name').val(data.service_name);
            $('#edit-govt-cost').val(data.govt_cost);
            $('#edit-service-cost').val(data.service_cost);
            $('#edit-service-modal').modal('show');
        });
    });

    // Handle form submission via AJAX
    $('#edit-service-modal-form').on('submit', function (e) {
        e.preventDefault();  
        var formData = $(this).serialize();
        $.ajax({
            url: '/services/' + $('#edit-service-id').val(),
            type: 'PUT',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function (response) {
                toastr.success('Service updated successfully');
                $('#edit-service-modal').modal('hide');
                location.reload(); 
            },
            error: function (xhr) {
                toastr.error('Something went wrong. Please try again.');
            }
        });
    });
});




const QuotationSystem = {
    init() {
        this.selectedServices = new Set()
        this.bindEvents()
        this.initSelect2()
    },

    bindEvents() {
        $('#serviceDropdown').on('change', this.handleServiceSelection.bind(this))
        $('#downloadPdfBtn').on('click', this.handlePdfDownload.bind(this))
    },

    initSelect2() {
        $('.mySelect3').select2({
            dropdownParent: $('#show-quotation-modal'),
            width: '100%'
        })
    },

    handleServiceSelection() {
        const $selected = $('#serviceDropdown option:selected')
        const serviceId = $selected.val()
        
        if (!serviceId || this.selectedServices.has(serviceId)) {
            return
        }

        const serviceName = $selected.text()
        const govtCost = parseFloat($selected.data('govt-cost'))
        const serviceCost = parseFloat($selected.data('service-cost'))
        
        this.selectedServices.add(serviceId)
        this.addServiceRow(serviceId, serviceName, govtCost, serviceCost)
    },

    addServiceRow(serviceId, serviceName, govtCost, serviceCost) {
        const defaultDiscount = 5
        const total = this.calculateTotal(govtCost, serviceCost, defaultDiscount)
        
        const row = `
            <tr id="service-${serviceId}">
                <td class="align-middle">${serviceName}</td>
                <td class="align-middle text-end">${govtCost.toFixed(2)}</td>
                <td class="align-middle text-end">${serviceCost.toFixed(2)}</td>
                <td class="align-middle" style="width: 150px">
                    <input type="number" 
                           class="form-control form-control-sm discount-input" 
                           value="${defaultDiscount}"
                           min="0" 
                           max="100"
                           data-govt-cost="${govtCost}"
                           data-service-cost="${serviceCost}">
                </td>
                <td class="align-middle text-end total-cell">${total.toFixed(2)}</td>
                <td class="align-middle text-center">
                    <button class="btn btn-danger btn-sm delete-row">
                        <i data-feather="x"></i>
                    </button>
                </td>
            </tr>`

        $('#quotationTableBody').append(row)
        this.bindRowEvents(serviceId)
        this.updateGrandTotal()
        feather.replace()
    },

    bindRowEvents(serviceId) {
        const $row = $(`#service-${serviceId}`)
        
        $row.find('.discount-input').on('input', (e) => {
            const $input = $(e.target)
            const govtCost = parseFloat($input.data('govt-cost'))
            const serviceCost = parseFloat($input.data('service-cost'))
            const discount = parseFloat($input.val()) || 0
            
            const total = this.calculateTotal(govtCost, serviceCost, discount)
            $row.find('.total-cell').text(total.toFixed(2))
            this.updateGrandTotal()
        })

        $row.find('.delete-row').on('click', () => {
            this.selectedServices.delete(serviceId)
            $row.remove()
            this.updateGrandTotal()
        })
    },

    calculateTotal(govtCost, serviceCost, discount) {
        const discountAmount = (serviceCost * discount) / 100
        return govtCost + serviceCost - discountAmount
    },

    updateGrandTotal() {
        const total = [...$('.total-cell')]
            .reduce((sum, cell) => sum + parseFloat($(cell).text()), 0)
        $('#grandTotal').text(total.toFixed(2))
    },

    handlePdfDownload() {
        const customerName = $('#customerName').val()
        if (!customerName.trim()) {
            Swal.fire({
                title: 'Error',
                text: 'Please enter customer name',
                icon: 'error'
            })
            return
        }

        if (this.selectedServices.size === 0) {
            Swal.fire({
                title: 'Error',
                text: 'Please select at least one service',
                icon: 'error'
            })
            return
        }

        window.location.href = `/quotation/download?customer=${encodeURIComponent(customerName)}`
    }
}

$(document).ready(() => QuotationSystem.init())