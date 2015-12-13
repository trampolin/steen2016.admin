/**
 * Created by rmahr1 on 13.12.15.
 */
$(document).ready(function() {


    var gigTable =  Steen.tables.create('#venue-gigs');
    var personTable =  Steen.tables.create('#venue-persons');

    var id = $('#update-venue-form').data('id');

    $('#update-venue-form').ajaxForm({
        url: '/data/venue/submit/'+id,
        type: 'post',
        success: function(response) {
            if (Steen.request.isOk(response)) {
                Steen.messages.success('Venue erfolgreich aktualisiert');
                //$('#create-or-update-venue-form')[0].reset();
                /*if (typeof addVenueTableRow !== 'undefined') {
                    addVenueTableRow(response.data);
                }*/
            } else {
                Steen.messages.error(response.data);
            }

        }
    });


});