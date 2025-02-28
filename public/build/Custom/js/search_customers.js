$(document).ready(function() {
    $('#searchCustomer').on('input', function() {
        var searchQuery = $(this).val();
        if (searchQuery.length > 0) {
            $.ajax({
                url: '/search-customers', 
                type: 'GET',
                data: { query: searchQuery },
                success: function(response) {
                    $('.customers').empty();
                    if(response.length > 0) {
                        $.each(response, function(index, customer) {
                            $('.customers').append(
                                '<li><a href="/customer-profile/' + customer.id + '">' + customer.customer_name + '<img src="/build/profile_photos/customer.jpg" alt="" class="img-fluid"></a></li>'
                            );
                        });
                    } else {
                        $('.customers').append('<li>No customers found</li>');
                    }
                },
                error: function() {
                    $('.customers').empty().append('<li>Error fetching results</li>');
                }
            });
        } else {
            $('.customers').empty();
        }
    });
});
