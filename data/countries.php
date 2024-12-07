<?php
$countries = [
    'USA' => [
        'name' => 'United States',
        'code' => 'US',
        'states' => [
            'AL' => 'Alabama', 'AK' => 'Alaska', 'AZ' => 'Arizona', 'AR' => 'Arkansas',
            'CA' => 'California', 'CO' => 'Colorado', 'CT' => 'Connecticut', 'DE' => 'Delaware',
            'FL' => 'Florida', 'GA' => 'Georgia', 'HI' => 'Hawaii', 'ID' => 'Idaho',
            'IL' => 'Illinois', 'IN' => 'Indiana', 'IA' => 'Iowa', 'KS' => 'Kansas',
            'KY' => 'Kentucky', 'LA' => 'Louisiana', 'ME' => 'Maine', 'MD' => 'Maryland',
            'MA' => 'Massachusetts', 'MI' => 'Michigan', 'MN' => 'Minnesota', 'MS' => 'Mississippi',
            'MO' => 'Missouri', 'MT' => 'Montana', 'NE' => 'Nebraska', 'NV' => 'Nevada',
            'NH' => 'New Hampshire', 'NJ' => 'New Jersey', 'NM' => 'New Mexico', 'NY' => 'New York',
            'NC' => 'North Carolina', 'ND' => 'North Dakota', 'OH' => 'Ohio', 'OK' => 'Oklahoma',
            'OR' => 'Oregon', 'PA' => 'Pennsylvania', 'RI' => 'Rhode Island', 'SC' => 'South Carolina',
            'SD' => 'South Dakota', 'TN' => 'Tennessee', 'TX' => 'Texas', 'UT' => 'Utah',
            'VT' => 'Vermont', 'VA' => 'Virginia', 'WA' => 'Washington', 'WV' => 'West Virginia',
            'WI' => 'Wisconsin', 'WY' => 'Wyoming'
        ]
    ],
    'UK' => [
        'name' => 'United Kingdom',
        'code' => 'GB',
        'states' => [
            'ENG' => 'England',
            'SCT' => 'Scotland',
            'WLS' => 'Wales',
            'NIR' => 'Northern Ireland'
        ]
    ],
    'CAN' => [
        'name' => 'Canada',
        'code' => 'CA',
        'states' => [
            'AB' => 'Alberta', 'BC' => 'British Columbia', 'MB' => 'Manitoba',
            'NB' => 'New Brunswick', 'NL' => 'Newfoundland and Labrador',
            'NS' => 'Nova Scotia', 'ON' => 'Ontario', 'PE' => 'Prince Edward Island',
            'QC' => 'Quebec', 'SK' => 'Saskatchewan'
        ]
    ],
    'AUS' => [
        'name' => 'Australia',
        'code' => 'AU',
        'states' => [
            'NSW' => 'New South Wales', 'VIC' => 'Victoria', 'QLD' => 'Queensland',
            'WA' => 'Western Australia', 'SA' => 'South Australia', 'TAS' => 'Tasmania'
        ]
    ],
    'GER' => [
        'name' => 'Germany',
        'code' => 'DE',
        'states' => []
    ],
    'FRA' => [
        'name' => 'France',
        'code' => 'FR',
        'states' => []
    ],
    'IRL' => [
        'name' => 'Ireland',
        'code' => 'IE',
        'states' => []
    ],
    'ESP' => [
        'name' => 'Spain',
        'code' => 'ES',
        'states' => []
    ]
];

// Output options for select element
foreach ($countries as $code => $country) {
    echo "<option value=\"{$code}\" data-has-states=\"" . (!empty($country['states']) ? 'true' : 'false') . "\">{$country['name']}</option>\n";
}
?> 