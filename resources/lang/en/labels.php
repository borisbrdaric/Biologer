<?php

return [
    'id' => 'ID',
    'actions' => 'Actions',

    'tables' => [
        'from_to_total' => 'Showing :from-:to of :total',
    ],

    'login' => [
        'email' => 'Email',
        'password' => 'Password',
        'forgot_password' => 'Forgot password?',
        'remember_me' => 'Remember me',
    ],

    'register' => [
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'institution' => 'Institution',
        'email' => 'Email',
        'password' => 'Password',
        'password_confirmation' => 'Repeat Password',
        'verification_code' => 'Verification Code',
    ],

    'forgot_password' => [
        'email' => 'Email',
    ],

    'reset_password' => [
        'email' => 'E-Mail Address',
        'password' => 'Password',
        'password_confirmation' => 'Confirm Password',
    ],

    'users' => [
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'institution' => 'Institution',
        'roles' => 'Roles',
        'curated_taxa' => 'Curated Taxa',
        'email' => 'Email',
    ],

    'taxa' => [
        'rank' => 'Rank',
        'name' => 'Name',
        'parent' => 'Parent',
        'author' => 'Author',
        'native_name' => 'Native Name',
        'description' => 'Description',
        'fe_old_id' => '(old) FaunaEuropea ID',
        'fe_id' => 'FaunaEuropea ID',
        'restricted' => 'Is taxon data restricted?',
        'allochthonous' => 'Is allochthonous?',
        'invasive' => 'Is invasive?',
        'stages' => 'Stages',
        'conservation_legislations' => 'Conservation Legislations',
        'conservation_documents' => 'Other Conservation Documents',
        'red_lists' => 'Red Lists',
        'add_red_list' => 'Add red list',
        'search_for_taxon' => 'Search for taxon...',
        'yes' => 'Yes',
        'no' => 'No',
    ],

    'field_observations' => [
        'taxon' => 'Taxon',
        'original_identification' => 'Original Identification',
        'search_for_taxon' => 'Search for taxon...',
        'date' => 'Date',
        'year' => 'Year',
        'month' => 'Month',
        'day' => 'Day',
        'photos' => 'Photos',
        'upload' => 'Upload',
        'map' => 'Map',
        'latitude' => 'Latitude',
        'longitude' => 'Longitude',
        'accuracy_m' => 'Accuracy/Radius (m)',
        'accuracy' => 'Accuracy',
        'elevation_m' => 'Elevation (m)',
        'elevation' => 'Elevation',
        'location' => 'Location',
        'details' => 'Details',
        'more_details' => 'More Details',
        'less_details' => 'Less Details',
        'note' => 'Note',
        'number' => 'Number',
        'project' => 'Project',
        'project_tooltip' => 'If the data is gathered in the course of a project write the project name/number here.',
        'found_on' => 'Found On',
        'found_on_tooltip' => 'You can fill this field if the species is observed on a host (i.e. latin name of the caterpillar host plant), dung (i.e. goat dung for scarabs), carrion (for carrion beetles), etc.',
        'sex' => 'Sex',
        'stage' => 'Stage',
        'time' => 'Time',
        'observer' => 'Observer',
        'identifier' => 'Identifier',
        'found_dead' => 'Found dead?',
        'found_dead_note' => 'Note on dead observation',
        'data_license' => 'Data License',
        'image_license' => 'Image License',
        'default' => 'Default',
        'choose_a_stage' => 'Choose a stage',
        'choose_a_value' => 'Choose a value',
        'click_to_select' => 'Click to select...',
        'status' => 'Status',
        'types' => 'Observation Type',
        'types_placeholder' => 'Select Observation Type',

        'male' => 'Male',
        'female' => 'Female',

        'statuses' => [
            'approved' => 'Approved',
            'unidentifiable' => 'Unidentifiable',
            'pending' => 'Pending',
        ],

        'save_tooltip' => 'Saves current observation and returns you to the list of your records. You can also use keyboard shortcut: Ctrl+Enter.',
        'save_more_tooltip' => 'Saves current observations, but allows you to enter more data from the same place. You can also use keyboard shortcut: Ctrl+Shift+Enter.',
    ],

    'view_groups' => [
        'name' => 'Name',
        'parent' => 'Parent',
        'description' => 'Description',
        'taxa' => 'Taxa',
    ],
];
