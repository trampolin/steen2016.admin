<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 09.01.16
 * Time: 10:29
 */


class VenueDetailsWidget extends SteenWidget {
    function __construct($id, $oVenue, $writable = true, $showDetailsButton = false) {

        $oVenue->writable = $writable;
        $oVenue->showDetailsButton = $showDetailsButton;

        parent::__construct(
            $id,
            'Venue: ' . $oVenue->name,
            'venue/widgets/venue_details',
            [
                'oVenue' => $oVenue
            ]
        );

        $this->icon = 'fa-globe';

    }
}