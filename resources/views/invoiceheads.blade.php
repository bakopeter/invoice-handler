<table>
    <thead>
    <tr>
        <th style="text-align: left; width: 25%">Eladó neve</th>
        <th style="text-align: left; width: 25%">Vevő neve</th>
        <th style="text-align: left; width: 25%">Számlaszám</th>
        <th style="text-align: left; width: 25%">Számla kelte</th>
        <th style="text-align: left; width: 25%">Műveletek</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoiceheads as $invoicehead)
        <tr>
            <td>{{$invoicehead->supplier->taxPayerName ?? "Nem találom!"}}</td>
            <td>{{$invoicehead->customer->taxPayerName ?? "Nem találom!"}}</td>
            <td>{{$invoicehead->invoiceNumber}}</td>
            <td>{{$invoicehead->invoiceIssueDate}}</td>
            <td>
                <a href="{{route('invoiceheads.show', ['invoicehead' => $invoicehead])}}">Részletek</a>
            </td>
        </tr>
        <tr>
            <td colspan="2">Tábla kapcsolatai: <?php var_dump($invoicehead["relations"]); ?></td>
        </tr>
    @endforeach

    </tbody>
</table>
