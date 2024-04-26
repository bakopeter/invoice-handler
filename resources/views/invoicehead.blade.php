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
<table style="border: #2d3748 solid 1px; border-collapse: collapse; margin: 5px">
    <tr style="vertical-align: bottom">
        <td style="border: #2d3748 solid 1px; padding: 5px; width: 20rem">Megnevezés</td>
        <td style="border: #2d3748 solid 1px; padding: 5px; width: 5rem">Áfa</td>
        <td style="border: #2d3748 solid 1px; padding: 5px; width: 15rem">Mennyiség</td>
        <td style="border: #2d3748 solid 1px; padding: 5px; width: 15rem">Egységár ÁFA nélkül Ft</td>
        <td style="border: #2d3748 solid 1px; padding: 5px; width: 15rem">Nettó érték Ft</td>
        <td style="border: #2d3748 solid 1px; padding: 5px; width: 15rem">ÁFA összege Ft</td>
        <td style="border: #2d3748 solid 1px; padding: 5px; width: 15rem">Összesen Ft</td>
    </tr>
    @foreach($invoicehead->invoiceLines as $invoiceLine)
    <tr style="vertical-align: bottom">
        <td style="border: #2d3748 solid 1px; padding: 5px">{{$invoiceLine->lineDescription}}</td>
        <td style="border: #2d3748 solid 1px; padding: 5px">{{$invoiceLine->vatPercentage}}</td>
        <td style="border: #2d3748 solid 1px; padding: 5px">{{$invoiceLine->quantity}}</td>
        <td style="border: #2d3748 solid 1px; padding: 5px">{{$invoiceLine->unitPrice}}</td>
        <td style="border: #2d3748 solid 1px; padding: 5px">{{$invoiceLine->lineNetAmount}}</td>
        <td style="border: #2d3748 solid 1px; padding: 5px">{{$invoiceLine->lineVatAmount}}</td>
        <td style="border: #2d3748 solid 1px; padding: 5px">{{$invoiceLine->lineGrossAmount}}</td>
    </tr>
    @endforeach
</table>