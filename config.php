<?php

return [
    "dhl" => [
        "base_url" => 'https://nolp.dhl.de/nextt-online-public/set_identcodes.do?lang=de&idc=',
        "filter" => 'h2[class="hidden-xs"]',
        "search_string" => 'Verlauf Ihrer Sendung',
    ],
    "gls" => [
        "base_url" => 'https://www.fedex.com/apps/fedextrack/?action=track&tracknumbers=',
        "filter" => null,
        "search_string" => null,
    ],
    "dpd" => [
        "base_url" => 'https://tracking.dpd.de/parcelstatus?locale=de_DE&query=',
        "filter" => null,
        "search_string" => null,
    ],
    "hermes" => [
        "base_url" => 'https://www.myhermes.de/wps/portal/paket/Home/privatkunden/sendungsverfolgung/?auftragsNummer=',
        "filter" => 'div[id="shipmentOverview"]',
        "search_string" => 'Übersicht für Ihre Sendungs-ID',
    ],
    "ups" => [
        "base_url" => 'https://wwwapps.ups.com/WebTracking/processRequest?HTMLVersion=5.0&Requester=NES&AgreeToTermsAndConditions=yes&tracknum=',
        "filter" => null,
        "search_string" => null,
    ],
    "fedex" => [
        "base_url" => 'https://www.fedex.com/apps/fedextrack/?action=track&tracknumbers=',
        "filter" => null,
        "search_string" => null,
    ],
];
