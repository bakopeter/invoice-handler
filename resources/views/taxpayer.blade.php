<h3>Adózó adatai</h3>
<table>
    <tbody>
    <tr>
        <th style="text-align: left">Név</th>
        <td>{{$taxpayer->taxPayerName}}</td>
    </tr>
    <tr>
        <th style="text-align: left">Bankszámlaszám</th>
        <td>{{$taxpayer->bankAccountNumber}}</td>
    </tr>
    <tr>
        <th style="text-align: left; width: 50%">Cím</th>
        <td>
            {{$taxpayer->postalCode}},
            {{$taxpayer->city}}
            {{$taxpayer->streetName}}
            {{$taxpayer->publicPlaceCategory}}
            {{$taxpayer->number}}.
        </td>
    </tr>
    <tr>
        <th style="text-align: left">Adószám</th>
        <td>
            {{$taxpayer->taxnumber->taxpayerId ?? null}}
            - {{$taxpayer->taxnumber->vatCode ?? null}}
            - {{$taxpayer->taxnumber->countyCode ?? null}}
        </td>
    </tr>
    </tbody>
</table>
<hr>
<h3>Adózó számlái</h3>
<?php dd($taxpayer->invoiceHeadSupplier[10]->invoiceLine) ?>


<table>
    <tbody>

    </tbody>
</table>
