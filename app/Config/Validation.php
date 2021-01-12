<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	/* public $signin = [
		'email' => 'required|valid_email|min_length[6]|max_length[50]',
		'password' => "required|min_length[8]|max_length[22]" 
	]; */

	/* public $signin = [
		'email' => [
			'required' => "This field can't be empty.",
			'valid_email' => "Please check the Email field.",
			'min_length[6]' => "Please check the Email field.",
			'max_length[22]' => "Please check the Email field.",
		],
		'password' => [
			'required' => "This field can't be empty.",
		],
	]; */

	public $signin = [
        'email' => [
            'rules'  => 'required|valid_email|min_length[6]|max_length[50]',
            'errors' => [
				'required' => "This field can't be empty.",
				'valid_email' => "Please check the {field} field.",
				'min_length' => "Please check the {field} field.",
				'max_length' => "Please check the {field} field.",
            ]
        ],
        'password'    => [
            'rules'  => 'required|min_length[8]|max_length[22]',
            'errors' => [
				'required' => "This field can't be empty.",
				'min_length' => "Password incorrect.",
				'max_length' => "Password incorrect.",
            ]
        ],
    ];
}
