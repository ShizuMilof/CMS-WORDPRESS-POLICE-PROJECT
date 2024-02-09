jQuery(document).ready(function ($) {

    $('#my-first-table').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.2/i18n/hr.json'
        }
    });

    $('.policeEdit').on('submit', function(e) {
        e.preventDefault();
        
        var post_id = $(this).find('.post_id').val();
        var policijsko_zvanje = $(this).find('.policijsko_zvanje').val();
        // ajax codes for submission
        
        $.ajax({
        type: 'POST',
        context: this,
        url: ajaxurl,
        data: {
        "action": "SubmitReservation", 
        "post_id": post_id,
        "policijsko_zvanje": policijsko_zvanje
        },
        
        success: function(data) {
          //do nothing
        }
        });
        
        });

  
});