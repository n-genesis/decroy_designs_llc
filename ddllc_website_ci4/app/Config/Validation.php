<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public array $imagesRules = [
        'images' => [
            'label' => 'Project Files',
            'rules' => 'uploaded[images]'
                        . '|mime_in[images,image/jpg,image/jpeg,image/png,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document]'
                        . '|max_size[images,4096]', // 4MB individual limit
        ],
    ];
    public array $siteInfoRules = [
        'appName' => [
            'label' => 'Website Name',
            'rules' => 'required|min_length[3]|max_length[100]',
            'errors' => [
                'required' => 'You must provide a Website Name.',
            ],
        ],
        'appEmail' => [
            'label' => 'Contact Email',
            'rules' => 'required|valid_email|max_length[254]',
            'errors' => [
                'valid_email' => 'Please check the Email Address format.',
            ],
        ],
        'appPhone' => [
            'label' => 'Business Phone',
            'rules' => 'permit_empty|regex_match[/^(?:\+?1[-. ]?)?\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/]',
            'errors' => [
                'regex_match' => 'The Phone field must be a valid 10-digit US phone number (e.g., 555-555-1234).',
            ],
        ],
        'appTitle' => [
            'label' => 'SEO Title Tag',
            'rules' => 'permit_empty|min_length[10]|max_length[70]',
            'errors' => [
                'max_length' => 'SEO Title should be kept under 70 characters for best display results.',
            ],
        ],
        'appDesc' => [
            'label' => 'Meta Description',
            'rules' => 'permit_empty|min_length[20]|max_length[160]',
            'errors' => [
                'max_length' => 'Meta descriptions should be kept under 160 characters for search engines.',
            ],
        ],
        'appOwner' => [
            'label' => 'Full Name',
            'rules' => 'required|min_length[3]|max_length[100]|regex_match[/^[\p{L}\'\-\.]+(?:\s+[\p{L}\'\-\.]+)+$/u]',
            'errors' => [
                'required'    => 'Please enter your full name.',
                'regex_match' => 'Please enter both your first and last name (letters, spaces, hyphens, apostrophes, and periods only).',
            ],
        ],
        'appAddress' => [
            'label' => 'Physical Address',
            'rules' => 'permit_empty|min_length[5]|max_length[255]',
        ],
        'appBusHours' => [
            'label' => 'Operating Hours',
            'rules' => 'permit_empty|min_length[3]|max_length[150]',
        ],
    ];

    // Contact Message Rules
    public array $contectMessageRules = [
        'first_name' => [
            'label' => 'First Name',
            'rules' => 'required|min_length[2]|max_length[50]|regex_match[/^[\p{L}\s\'\-]+$/u]',
            'errors' => [
                'regex_match' => 'The First Name field can only contain letters, spaces, hyphens, and apostrophes.',
            ],
        ],
        'last_name' => [
            'label' => 'Last Name',
            'rules' => 'required|min_length[2]|max_length[50]|regex_match[/^[\p{L}\s\'\-]+$/u]',
            'errors' => [
                'regex_match' => 'The Last Name field can only contain letters, spaces, hyphens, and apostrophes.',
            ],
        ],
        'email' => [
            'label' => 'Email Address',
            'rules' => 'required|valid_email|max_length[255]',
            'errors' => [
                'valid_email' => 'Please check the formatting of your email address.',
            ],
        ],
        'phone' => [
            'label' => 'Phone Number',
            // Optional field, but strictly verifies standard US formats if filled
            'rules' => 'permit_empty|regex_match[/^(?:\+?1[-. ]?)?\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/]',
            'errors' => [
                'regex_match' => 'Please enter a valid 10-digit phone number (e.g., 555-555-1234).',
            ],
        ],
        'service' => [
            'label' => 'Service Type',
            // In-list blocks arbitrary value spoofing via browser inspect tools
            'rules' => 'required|in_list[new-construction,new-construction,remodel,renovation,roofing,other]',
            'errors' => [
                'in_list' => 'Please choose a valid option from the dropdown menu.',
            ],
        ],
        'project_location' => [
            'label' => 'Location / Address',
            'rules' => 'required|min_length[3]|max_length[255]|regex_match[/^[\p{L}0-9\s\,\.\#\-\/]+$/u]',
            'errors' => [
                'required'    => 'Please enter a city and state or a full address.',
                'regex_match' => 'The location field can only contain letters, numbers, spaces, commas, periods, hyphens, and unit signs (# or /).',
            ],
        ],
        'estimated_budget' => [
            'label' => 'Estimated Budget Range',
            'rules' => 'required|min_length[3]|max_length[10]',
        ],
        'start_date' => [
            'label' => 'Start Date',
            'rules' => 'required|valid_date[Y-m-d]',
            'errors' => [
                'required'   => 'Please select a date.',
                'valid_date' => 'The date format must be exactly Year-Month-Day (YYYY-MM-DD).',
            ],
        ],
        'project_description' => [
            'label' => 'Project Description',
            'rules' => 'required|min_length[25]|max_length[3000]',
            'errors' => [
                'min_length' => 'Your message must be at least 25 characters long to help us understand your request.',
                'max_length' => 'Messages are capped at 3,000 characters.',
            ],
        ],
    ];
}
