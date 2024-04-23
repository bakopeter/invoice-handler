<!--
 "invoiceCategory" => "NORMAL"
    "invoiceDeliveryDate" => "2022-01-07"
    "paymentDate" => "2022-01-07"
    "paymentMethod" => "CASH"
    "currencyCode" => "HUF"
    "exchangeRate" => "1.000000"
    "smallBusinessIndicator" => 0
    "invoiceNetAmount" => "12069.00"
    "invoiceVatAmount" => "603.00"
    "invoiceGrossAmount" => "12672.00"
-->
<?php dd($invoicehead->invoiceLine) ?>

<table>
    <tr>
        <td colspan="5">SZÁMLA</td>
    </tr>
    <tr>
        <td colspan="3" style="text-align: left; width: 50%">
            <p>Szállító</p>
            <p>{{$invoiceheads->supplierTP->taxPayerName ?? "Hiányzik"}}</p>
            <p>
                {{$invoicehead->supplierTP->postalCode}},
                {{$invoicehead->supplierTP->city}}
                {{$invoicehead->supplierTP->streetName}}
                {{$$invoicehead->supplierTP->publicPlaceCategory}}
                {{$invoicehead->supplierTP->number}}.
            </p>
            <p>Bankszámlaszám:</p>
            <p>{{$invoicehead->supplierTP->bankAccountNumber}}</p>
            <p>
                Adószám:
                {{$invoicehead->supplierTP->taxnumber->taxpayerId ?? null}}
                - {{$invoicehead->supplierTP->taxnumber->vatCode ?? null}}
                - {{$invoicehead->supplierTP->taxnumber->countyCode ?? null}}
            </p>
        </td>
        <td colspan="2" style="text-align: left; width: 50%">
            <p>Vevő</p>
            <p>{{$invoicehead->customerTP->taxPayerName}}</p>
            <p>
                {{$invoicehead->customerTP->postalCode}},
                {{$invoicehead->customerTP->city}}
                {{$invoicehead->customerTP->streetName}}
                {{$$invoicehead->customerTP->publicPlaceCategory}}
                {{$invoicehead->customerTP->number}}.
            </p>
            <p>Bankszámlaszám:</p>
            <p>{{$invoicehead->customerTP->bankAccountNumber}}</p>
            <p>
                Adószám:
                {{$invoicehead->customerTP->taxnumber->taxpayerId ?? null}}
                - {{$invoicehead->customerTP->taxnumber->vatCode ?? null}}
                - {{$invoicehead->customerTP->taxnumber->countyCode ?? null}}
            </p>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>