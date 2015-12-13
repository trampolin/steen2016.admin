/**
 * Created by rmahr1 on 08.12.15.
 */
$(document).ready(function() {

    $('.venue-delete').click(function() {
        var id = $(this).data('id');

        var that = this;

        Steen.messages.confirm('Wollen Sie diesen Ort wirklich löschen?',false,function() {
            Steen.request.simpleCall('data/venue/delete/'+id,function() {
                Steen.messages.success('Venue gelöscht');

                venueTable.row($(that).parents('tr'))
                    .remove()
                    .draw();

            },function(error) {
                Steen.messages.error(error);
            })
        });
    });

    var venueTable =  Steen.tables.create('#dt_basic');

    addVenueTableRow = function(row) {
        venueTable.row.add(
            [
                row.name,
                row.street + ' ' + row.number,
                row.zip,
                row.city,
                ''
            ]
        ).draw(false);
    };
});