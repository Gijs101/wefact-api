<?php

return [
    /*
     * The WeFact / HostFact API key.
     */
    'key' => env('WEFACT_API_KEY', false),

    'type' => \Media101\WeFactApi\WeFact::class,

    'client' => [
        /**
         * Pass the WeFact / HostFact base URI.
         */
        'base_uri' => env('WEFACT_BASE_URI', 'https://mijnwefact.nl/apiv2/api.php'),

        /*
         * Whether SSL verification should be enabled.
         */
        'verify' => true,
    ]
];