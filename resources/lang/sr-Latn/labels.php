<?php

return [
    'id' => 'ID',
    'actions' => 'Akcije',

    'tables' => [
        'from_to_total' => 'Prikazuje se :from-:to od ukupno :total',
    ],

    'sexes' => [
        'male' => 'Mužjak',
        'female' => 'Ženka',
    ],

    'transfer' => [
        'available' => 'Dostupne',
        'chosen' => 'Odabrane',
    ],

    'login' => [
        'email' => 'E-pošta',
        'password' => 'Lozinka',
        'forgot_password' => 'Zaboravili ste lozinku?',
        'remember_me' => 'Zapamti me',
    ],

    'register' => [
        'first_name' => 'Ime',
        'last_name' => 'Prezime',
        'institution' => 'Institucija',
        'email' => 'E-pošta',
        'password' => 'Lozinka',
        'password_confirmation' => 'Ponovite lozinku',
        'verification_code' => 'Verifikacioni kod',
        'accept' => 'Slažem se sa <a href=":url" title="Politika privatnosti" target="_blank">Politikom privatnosti</a>',
    ],

    'forgot_password' => [
        'email' => 'E-pošta',
    ],

    'reset_password' => [
        'email' => 'Adresa e-pošte',
        'password' => 'Lozinka',
        'password_confirmation' => 'Potvrdite lozinku',
    ],

    'users' => [
        'first_name' => 'Ime',
        'last_name' => 'Prezime',
        'institution' => 'Institucija',
        'roles' => 'Uloge',
        'curated_taxa' => 'Taksoni koje uređuje',
        'email' => 'E-pošta',
        'search' => 'Traži',
    ],

    'taxa' => [
        'rank' => 'Kategorija',
        'name' => 'Naziv',
        'parent' => 'Roditeljski takson',
        'author' => 'Autor',
        'native_name' => 'Narodni naziv',
        'description' => 'Opis',
        'fe_old_id' => '(stara) FaunaEuropea ID',
        'fe_id' => 'FaunaEuropea ID',
        'restricted' => 'Takson sa ograničenim podacima',
        'allochthonous' => 'Takson je alohton',
        'invasive' => 'Takson je invazivan',
        'stages' => 'Stadijumi',
        'conservation_legislations' => 'Zakonska zaštita',
        'conservation_documents' => 'Ostala dokumenta',
        'red_lists' => 'Crvene liste',
        'add_red_list' => 'Dodaj crvenu listu',
        'search_for_taxon' => 'Traži takson...',
        'yes' => 'Da',
        'no' => 'Ne',
    ],

    'field_observations' => [
        'taxon' => 'Takson',
        'original_identification' => 'Originalna identifikacija',
        'search_for_taxon' => 'Traži takson...',
        'date' => 'Datum',
        'year' => 'Godina',
        'month' => 'Mesec',
        'day' => 'Dan',
        'photos' => 'Fotografije',
        'upload' => 'Otpremi',
        'map' => 'Mapa',
        'latitude' => 'Geografska širina',
        'longitude' => 'Geografska dužina',
        'accuracy_m' => 'Preciznost/Poluprečnik (m)',
        'accuracy' => 'Preciznost',
        'elevation_m' => 'Nadmorska visina (m)',
        'elevation' => 'Nadmorska visina',
        'location' => 'Lokacija',
        'details' => 'Detalji',
        'more_details' => 'Više detalja',
        'less_details' => 'Manje detalja',
        'note' => 'Beleška',
        'number' => 'Broj',
        'project' => 'Projekat',
        'project_tooltip' => 'Ako su podaci prikupljeni u okviru projekta, ovde upišite naziv/broj projekta.',
        'found_on' => 'Nađeno na',
        'found_on_tooltip' => 'Možete popuniti ovo polje ako je vrsta nađena na domaćinu (npr. latinski naziv biljke hraniteljkegusenice), izmet (npr. izmet koze za skarabeje), strvina (za tvrdokrilce strvinare), itd.',
        'sex' => 'Pol',
        'stage' => 'Stadijum',
        'time' => 'Vreme',
        'observer' => 'Uočio',
        'identifier' => 'Identifikovao',
        'found_dead' => 'Jedinka nađena mrtva?',
        'found_dead_note' => 'Beleške o mrtvoj jedinki',
        'data_license' => 'Licenca podataka',
        'image_license' => 'Licenca slika',
        'default' => 'Podrazumevano',
        'choose_a_stage' => 'Odaberite stadijum',
        'choose_a_value' => 'Odaberite vrednost',
        'click_to_select' => 'Kliknite kako biste odabrali...',
        'status' => 'Status',
        'types' => 'Tip nalaza',
        'types_placeholder' => 'Odaberite tip nalaza',
        'dataset' => 'Set podataka',

        'male' => 'Mužjak',
        'female' => 'Ženka',

        'statuses' => [
            'approved' => 'Odobreno',
            'unidentifiable' => 'Nemoguća identifikacija',
            'pending' => 'Na čekanju',
        ],

        'save_tooltip' => 'Čuva trenutni nalaz i vraća vas u listu nalaza. Možete koristiti i prečicu Ctrl+Enter na tastaturi.',
        'save_more_tooltip' => 'Čuva trenutni nalaz, ali vam omogućava da unesete još podataka sa istog mesta. Možete koristiti i prečicu Ctrl+Shift+Enter na tastaturi.',

        'include_lower_taxa' => 'Uključujući niže taksone',
    ],

    'view_groups' => [
        'name' => 'Naziv',
        'parent' => 'Viša grupa',
        'description' => 'Opis',
        'taxa' => 'Taksoni',
    ],

    'exports' => [
        'title' => 'Izvoz',
        'processing' => 'Izvoz u toku... Ovo može potrajati.',
        'only_checked' => 'Izvezi samo čekirane',
        'apply_filters' => 'Primeni filtere',
        'with_header' => 'Sa nazivima kolona',
        'finished' => 'Gotovo! Možete preuzeti izvezen fajl.',
        'columns' => 'Kolone',
    ],

    'imports' => [
        'choose_columns' => 'Odaberi kolone',
        'select_csv_file' => 'Odaberi CSV fajl',
        'available' => 'Dostupne',
        'chosen' => 'Odabrane',
        'import' => 'Uvezi',
        'row_number' => 'Broj reda',
        'error' => 'Greška',
        'has_heading' => 'Prvi red sadrži nazive kolona',
        'columns' => 'Kolone',
    ],
];
