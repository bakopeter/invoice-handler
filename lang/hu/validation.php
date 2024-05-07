<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted'             => ':attribute el kell legyen fogadva!',
    'active_url'           => ':attribute nem érvényes url!',
    'after'                => ':attribute :date utáni dátum kell, hogy legyen!',
    'after_or_equal'       => ':attribute nem lehet korábbi dátum, mint :date!',
    'alpha'                => ':attribute kizárólag betűket tartalmazhat!',
    'alpha_dash'           => ':attribute kizárólag betűket, számokat és kötőjeleket tartalmazhat!',
    'alpha_num'            => ':attribute kizárólag betűket és számokat tartalmazhat!',
    'array'                => ':attribute egy tömb kell, hogy legyen!',
    'before'               => ':attribute :date előtti dátum kell, hogy legyen!',
    'before_or_equal'      => ':attribute nem lehet későbbi dátum, mint :date!',
    'between'              => [
        'numeric' => ':attribute :min és :max közötti szám kell, hogy legyen!',
        'file'    => ':attribute mérete :min és :max kilobájt között kell, hogy legyen!',
        'string'  => ':attribute hossza :min és :max karakter között kell, hogy legyen!',
        'array'   => ':attribute :min - :max közötti elemet kell, hogy tartalmazzon!',
    ],
    'boolean'              => ':attribute mező csak true vagy false értéket kaphat!',
    'confirmed'            => ':attribute nem egyezik a megerősítéssel.',
    'date'                 => ':attribute nem érvényes dátum.',
    'date_format'          => ':attribute nem egyezik az alábbi dátum formátummal :format!',
    'different'            => ':attribute és :other értékei különbözőek kell, hogy legyenek!',
    'digits'               => ':attribute :digits számjegyű kell, hogy legyen!',
    'digits_between'       => ':attribute értéke :min és :max közötti számjegy lehet!',
    'dimensions'           => ':attribute felbontása nem megfelelő.',
    'distinct'             => ':attribute értékének egyedinek kell lennie!',
    'email'                => ':attribute nem érvényes email formátum.',
    'exists'               => ':attribute már létezik.',
    'file'                 => ':attribute fájl kell, hogy legyen!',
    'filled'               => ':attribute megadása kötelező!',
    'gt'                   => [
        'numeric' => ':attribute nagyobb kell, hogy legyen, mint :value!',
        'file'    => ':attribute mérete nagyobb kell, hogy legyen, mint :value kilobájt.',
        'string'  => ':attribute hosszabb kell, hogy legyen, mint :value karakter.',
        'array'   => ':attribute több, mint :value elemet kell, hogy tartalmazzon.',
    ],
    'gte'                  => [
        'numeric' => ':attribute nagyobb vagy egyenlő kell, hogy legyen, mint :value!',
        'file'    => ':attribute mérete nem lehet kevesebb, mint :value kilobájt.',
        'string'  => ':attribute hossza nem lehet kevesebb, mint :value karakter.',
        'array'   => ':attribute legalább :value elemet kell, hogy tartalmazzon.',
    ],
    'image'                => ':attribute képfájl kell, hogy legyen!',
    'in'                   => 'A kiválasztott :attribute érvénytelen.',
    'in_array'             => ':attribute értéke nem található :other értékek között.',
    'integer'              => ':attribute értéke szám kell, hogy legyen!',
    'ip'                   => ':attribute érvényes IP cím kell, hogy legyen!',
    'ipv4'                 => ':attribute érvényes IPv4 cím kell, hogy legyen!',
    'ipv6'                 => ':attribute érvényes IPv6 cím kell, hogy legyen!',
    'json'                 => ':attribute érvényes JSON szöveg kell, hogy legyen!',
    'lt'                   => [
        'numeric' => ':attribute kisebb kell, hogy legyen, mint :value!',
        'file'    => ':attribute mérete kisebb kell, hogy legyen, mint :value kilobájt.',
        'string'  => ':attribute rövidebb kell, hogy legyen, mint :value karakter.',
        'array'   => ':attribute kevesebb, mint :value elemet kell, hogy tartalmazzon.',
    ],
    'lte'                  => [
        'numeric' => ':attribute kisebb vagy egyenlő kell, hogy legyen, mint :value!',
        'file'    => ':attribute mérete nem lehet több, mint :value kilobájt.',
        'string'  => ':attribute hossza nem lehet több, mint :value karakter.',
        'array'   => ':attribute legfeljebb :value elemet kell, hogy tartalmazzon.',
    ],
    'max'                  => [
        'numeric' => ':attribute értéke nem lehet nagyobb, mint :max!',
        'file'    => ':attribute mérete nem lehet több, mint :max kilobájt.',
        'string'  => ':attribute hossza nem lehet több, mint :max karakter.',
        'array'   => ':attribute legfeljebb :max elemet kell, hogy tartalmazzon.',
    ],
    'mimes'                => ':attribute kizárólag az alábbi fájlformátumok egyike lehet: :values.',
    'mimetypes'            => ':attribute kizárólag az alábbi fájlformátumok egyike lehet: :values.',
    'min'                  => [
        'numeric' => ':attribute értéke nem lehet kisebb, mint :min!',
        'file'    => ':attribute mérete nem lehet kevesebb, mint :min kilobájt.',
        'string'  => ':attribute hossza nem lehet kevesebb, mint :min karakter.',
        'array'   => ':attribute legalább :min elemet kell, hogy tartalmazzon.',
    ],
    'not_in'               => ':attribute értéke érvénytelen.',
    'not_regex'            => 'The :attribute format is invalid.',
    'numeric'              => ':attribute szám kell, hogy legyen!',
    'present'              => ':attribute mező nem található!',
    'regex'                => ':attribute formátuma érvénytelen.',
    'required'             => ':attribute megadása kötelező!',
    'required_if'          => ':attribute megadása kötelező, ha :other értéke :value!',
    'required_unless'      => ':attribute megadása kötelező, ha :other értéke nem :values!',
    'required_with'        => ':attribute megadása kötelező, ha :values érték létezik.',
    'required_with_all'    => ':attribute megadása kötelező, ha :values értékek léteznek.',
    'required_without'     => ':attribute megadása kötelező, ha :values érték nem létezik.',
    'required_without_all' => ':attribute megadása kötelező, ha egyik :values érték sem létezik.',
    'same'                 => ':attribute és :other mezőknek egyezniük kell!',
    'size'                 => [
        'numeric' => ':attribute értéke :size kell, hogy legyen!',
        'file'    => ':attribute mérete :size kilobájt kell, hogy legyen!',
        'string'  => ':attribute hossza :size karakter kell, hogy legyen!',
        'array'   => ':attribute :size elemet kell tartalmazzon!',
    ],
    'string'               => ':attribute szöveg kell, hogy legyen.',
    'timezone'             => ':attribute nem létező időzona.',
    'unique'               => ':attribute már foglalt.',
    'uploaded'             => ':attribute feltöltése sikertelen.',
    'url'                  => ':attribute érvénytelen link.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name'     => 'Név',
        'password' => 'Jelszó',
        'id' => 'azonosító',
        'lineNumber' => 'Tétel sorszáma',
        'invoiceLines->lineNumber' => 'Tétel sorszáma',
        'lineDescription' => 'Megnevezés',
        'invoiceLines->lineDescription' => 'Megnevezés',
        'lineNatureIndicator' => 'Termék/szolgáltatás',
        'invoiceLines->lineNatureIndicator' => 'Termék/szolgáltatás',
        'PRODUCT' => 'Termék',
        'SERVICE' => 'Szolgáltatás',
        'OTHER' => 'Egyéb',
        'quantity' => 'Mennyiség',
        'invoiceLines->quantity' => 'Mennyiség',
        'unitOfMeasure' => 'Mennyiségi egység',
        'invoiceLines->unitOfMeasure' => 'Mennyiségi egység',
        'PIECE' => 'tétel',
        'unitPrice' => 'Egységár',
        'invoiceLines->unitPrice' => 'Egységár',
        'lineNetAmount' => 'Nettó összeg',
        'invoiceLines->lineNetAmount' => 'Nettó összeg',
        'vatPercentage' => 'ÁFA mértéke',
        'invoiceLines->vatPercentage' => 'ÁFA mértéke',
        'lineVatAmount' => 'ÁFA összege',
        'invoiceLines->lineVatAmount' => 'ÁFA összege',
        'lineGrossAmount' => 'Bruttó összeg',
        'invoiceLines->lineGrossAmount' => 'Bruttó összeg',
        'invoiceCategory' => 'Számla típusa',
        'invoiceDetail->invoiceCategory' => 'Számla típusa',
        'NORMAL' => 'Normál',
        'SIMPLIFIED' => 'Egyszerűsített',
        'invoiceDeliveryDate' => 'Teljesítés dátuma',
        'invoiceDetail->invoiceDeliveryDate' => 'Teljesítés dátuma',
        'paymentDate' => 'Fizetési határidő',
        'invoiceDetail->paymentDate' => 'Fizetési határidő',
        'paymentMethod' => 'Fizetés módja',
        'invoiceDetail->paymentMethod' => 'Fizetés módja',
        'TRANSFER' => 'Banki utalás',
        'CASH' => 'Készpéz',
        'CARD' => 'Bankkártya',
        'VOUCHER' => 'Utalvány',
        'currencyCode' => 'Pénznem',
        'exchangeRate' => 'Átváltási árfolyam',
        'smallBusinessIndicator' => 'Kisadózó',
        'invoiceNetAmount' => 'Nettó összeg',
        'invoiceDetail->invoiceNetAmount' => 'Nettó összeg',
        'invoiceVatAmount' => 'ÁFA összege',
        'invoiceDetail->invoiceVatAmount' => 'ÁFA összege',
        'invoiceGrossAmount' => 'Bruttó összeg',
        'invoiceDetail->invoiceGrossAmount' => 'Bruttó összeg',
        'invoiceNumber' => 'Számla sorszáma',
        'invoiceIssueDate' => 'Számla kelte',
        'communityVatNumber' => 'Közösségi adószám',
        'individualExemption' => 'Alanyi áfamentes',
        'incorporation' => 'Gazdasági típus',
        'ORGANIZATION' => 'Gazdasági társaság',
        'SELF_EMPLOYED' => 'Egyéni vállalkozó',
        'TAXABLE_PERSON' => 'Adószámos magánszemély',
        'taxPayerVatStatus' => 'Adóalany ÁFA sz. státusza',
        'bankAccountNumber' => 'Bankszámlaszám',
        'taxPayerName' => 'Adózó neve',
        'postalCode' => 'Irányítószám',
        'city' => 'Település neve',
        'streetName' => 'Közterület neve',
        'publicPlaceCategory' => 'Közterület jellege',
        'number' => 'Házszám',
        'additionalAddressDetail' => 'További címadatok',
        'groupMemberTaxNumber->taxpayerId' => 'Adó törzsszám',
        'groupMemberTaxNumber->vatCode' => 'Áfakód',
        'groupMemberTaxNumber->countyCode' => 'Megyekód',
        'taxNumber->taxpayerId' => 'Adó törzsszám',
        'taxNumber->vatCode' => 'Áfakód',
        'taxNumber->countyCode' => 'Megyekód',
        'taxnumber_id' => 'Adószám',
        'groupmember_taxnumber_id' => 'Csoporttag adószáma',
        'supplierName' => 'Eladó neve',
        'customerName' => 'Vevő neve',
        'customerVatStatus' => 'Eladó  ÁFA sz. státusza',
        'DOMESTIC' => 'Belföldi áfaalany',
        'PRIVATE_PERSON' => 'Nem áfaalany (belföldi vagy külföldi) természetes személy'
    ],
];
