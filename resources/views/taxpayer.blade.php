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
@foreach($taxpayer->invoiceHeadSupplier as $invoicehead)
<table style="border: #2d3748 solid 1px; border-collapse: collapse; margin: 5px">
    <tr>
        <td style="border: #2d3748 solid 1px; text-align: center" colspan="5">SZÁMLA</td>
    </tr>
    <tr>
        <td colspan="3" style="text-align: left; width: 50%; padding: 5px">
            <p>Szállító</p>
            <p>{{$invoicehead->supplierTP->taxPayerName ?? "Hiányzik"}}</p>
            <p>
                {{$invoicehead->supplierTP->postalCode}},
                {{$invoicehead->supplierTP->city}}
                {{$invoicehead->supplierTP->streetName}}
                {{$invoicehead->supplierTP->publicPlaceCategory}}
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
        <td colspan="2" style="text-align: left; width: 50%; border: #2d3748 solid 1px; padding: 5px">
            <p>Vevő</p>
            <p>{{$invoicehead->customerTP->taxPayerName}}</p>
            <p>
                {{$invoicehead->customerTP->postalCode}},
                {{$invoicehead->customerTP->city}}
                {{$invoicehead->customerTP->streetName}}
                {{$invoicehead->customerTP->publicPlaceCategory}}
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
        <td style="border: #2d3748 solid 1px; height: 20px" colspan="3"> </td>
        <td style="border: #2d3748 solid 1px" colspan="2"> </td>
    </tr>
    <tr style="vertical-align: bottom">
        <td style="border: #2d3748 solid 1px; padding: 5px; width: 16rem">
            <p>Teljesítés:</p>
            <p>{{$invoicehead->invoiceDetail->invoiceDeliveryDate}}</p>
        </td>
        <td style="border: #2d3748 solid 1px; padding: 5px; width: 17rem">
            <p>Számla kelte:</p>
            <p>{{$invoicehead->invoiceIssueDate}}</p>
        </td>
        <td style="border: #2d3748 solid 1px; padding: 5px; width: 17rem">
            <p>Fizetés esedékessége:</p>
            <p>{{$invoicehead->invoiceDetail->paymentDate}}</p>
        </td>
        <td style="border: #2d3748 solid 1px; padding: 5px; width: 25rem">
            <p>Fizetés módja:</p>
            <p>{{$invoicehead->invoiceDetail->paymentMethod}}</p>
        </td>
        <td style="border: #2d3748 solid 1px; padding: 5px; width: 25rem">
            <p>Számla sorszáma:</p>
            <p>{{$invoicehead->invoiceNumber}}</p>
        </td>
    </tr>
</table>
@endforeach

@foreach($taxpayer->invoiceHeadCustomer as $invoicehead)
<table style="border: #2d3748 solid 1px; border-collapse: collapse; margin: 5px">
    <tr>
        <td style="border: #2d3748 solid 1px; text-align: center" colspan="5">SZÁMLA</td>
    </tr>
    <tr>
        <td colspan="3" style="text-align: left; width: 50%; padding: 5px">
            <p>Szállító</p>
            <p>{{$invoicehead->supplierTP->taxPayerName ?? "Hiányzik"}}</p>
            <p>
                {{$invoicehead->supplierTP->postalCode}},
                {{$invoicehead->supplierTP->city}}
                {{$invoicehead->supplierTP->streetName}}
                {{$invoicehead->supplierTP->publicPlaceCategory}}
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
        <td colspan="2" style="text-align: left; width: 50%; border: #2d3748 solid 1px; padding: 5px">
            <p>Vevő</p>
            <p>{{$invoicehead->customerTP->taxPayerName}}</p>
            <p>
                {{$invoicehead->customerTP->postalCode}},
                {{$invoicehead->customerTP->city}}
                {{$invoicehead->customerTP->streetName}}
                {{$invoicehead->customerTP->publicPlaceCategory}}
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
        <td style="border: #2d3748 solid 1px; height: 20px" colspan="3"> </td>
        <td style="border: #2d3748 solid 1px" colspan="2"> </td>
    </tr>
    <tr style="vertical-align: bottom">
        <td style="border: #2d3748 solid 1px; padding: 5px; width: 16rem">
            <p>Teljesítés:</p>
            <p>{{$invoicehead->invoiceDetail->invoiceDeliveryDate}}</p>
        </td>
        <td style="border: #2d3748 solid 1px; padding: 5px; width: 17rem">
            <p>Számla kelte:</p>
            <p>{{$invoicehead->invoiceIssueDate}}</p>
        </td>
        <td style="border: #2d3748 solid 1px; padding: 5px; width: 17rem">
            <p>Fizetés esedékessége:</p>
            <p>{{$invoicehead->invoiceDetail->paymentDate}}</p>
        </td>
        <td style="border: #2d3748 solid 1px; padding: 5px; width: 25rem">
            <p>Fizetés módja:</p>
            <p>{{$invoicehead->invoiceDetail->paymentMethod}}</p>
        </td>
        <td style="border: #2d3748 solid 1px; padding: 5px; width: 25rem">
            <p>Számla sorszáma:</p>
            <p>{{$invoicehead->invoiceNumber}}</p>
        </td>
    </tr>
</table>
@endforeach