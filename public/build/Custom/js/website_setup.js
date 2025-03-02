$(document).ready(function() {
    $('#add-service').click(function() {
        $('#services-wrapper').append(`
            <div class="input-group mb-3 service-item">
                <input type="text" name="our_services[]" class="form-control" placeholder="Enter new service">
                <div class="input-group-append">
                    <button type="button" class="btn btn-outline-danger remove-service">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>
        `);
        animateNew($('#services-wrapper').children().last());
    });
    $('#add-faq').click(function() {
        $('#faqs-wrapper').append(`
            <div class="faq-item mb-4 border-bottom pb-3">
                <div class="form-group">
                    <label>Question</label>
                    <input type="text" name="faqs[${faqCounter}][question]" class="form-control" placeholder="Enter new question">
                </div>
                <div class="form-group">
                    <label>Answer</label>
                    <textarea name="faqs[${faqCounter}][answer]" class="form-control" rows="3" placeholder="Enter new answer"></textarea>
                </div>
                <button type="button" class="btn btn-outline-danger remove-faq">
                    <i class="fas fa-trash-alt"></i> Remove
                </button>
            </div>
        `);
        animateNew($('#faqs-wrapper').children().last());
        faqCounter++;
    });
    $(document).on('click', '.remove-service', function() {
        animateRemove($(this).closest('.service-item'));
    });
    $(document).on('click', '.remove-faq', function() {
        animateRemove($(this).closest('.faq-item'));
    });
    function animateNew(element) {
        element.css('background-color', '#f8f9fa');
        setTimeout(function() {
            element.css('transition', 'background-color 0.5s');
            element.css('background-color', 'transparent');
        }, 100);
    }
    function animateRemove(element) {
        element.css('transition', 'all 0.3s');
        element.css('opacity', '0');
        element.css('transform', 'translateX(20px)');
        setTimeout(function() {
            element.remove();
        }, 300);
    }
    $('#cover-photo-input').change(function() {
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                let img = $('<img class="img-thumbnail" style="max-height: 100px;">').attr('src', e.target.result);
                $('#cover-photo-input').parent().prev().html(img);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
    $('#websiteSetupForm').submit(function() {
        $('.btn-primary[type="submit"]').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');
        return true;
    });
});