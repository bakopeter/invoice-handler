<tr style="border-collapse: collapse">
    <td colspan="5" style="border-collapse: collapse">
        <table style="border-collapse: collapse">
            <tr style="border-collapse: collapse">
                <td style="border-bottom: #2d3748 solid 1px; border-right: #2d3748 solid 1px; padding: 5px; width: 20rem">
                    Megnevezés
                </td>
                <td style="border-bottom: #2d3748 solid 1px; border-right: #2d3748 solid 1px; padding: 5px; width: 5rem">
                    Áfa
                </td>
                <td style="border-bottom: #2d3748 solid 1px; border-right: #2d3748 solid 1px; padding: 5px; width: 15rem">
                    Mennyiség
                </td>
                <td style="border-bottom: #2d3748 solid 1px; border-right: #2d3748 solid 1px; padding: 5px; width: 15rem">
                    Egységár ÁFA nélkül Ft
                </td>
                <td style="border-bottom: #2d3748 solid 1px; border-right: #2d3748 solid 1px; padding: 5px; width: 15rem">
                    Nettó érték Ft
                </td>
                <td style="border-bottom: #2d3748 solid 1px; border-right: #2d3748 solid 1px; padding: 5px; width: 15rem">
                    ÁFA összege Ft
                </td>
                <td style="border-bottom: #2d3748 solid 1px; padding: 5px; width: 15rem">Összesen Ft</td>
            </tr>
            @foreach($invoicehead->invoiceLines as $invoiceLine)
                <tr style="border-collapse: collapse">
                    <td style="border-bottom: #2d3748 solid 1px; border-right: #2d3748 solid 1px; padding: 5px">
                        {{$invoiceLine->lineDescription}}
                    </td>
                    <td style="border: #2d3748 solid 1px; text-align: right; padding: 5px">
                        {{$invoiceLine->vatPercentage*100}}%
                    </td>
                    <td style="border: #2d3748 solid 1px; text-align: right; padding: 5px">
                        {{round($invoiceLine->quantity)}}
                    </td>
                    <td style="border: #2d3748 solid 1px; text-align: right; padding: 5px">
                        {{round($invoiceLine->unitPrice, 2)}}
                    </td>
                    <td style="border: #2d3748 solid 1px; text-align: right; padding: 5px">
                        {{round($invoiceLine->lineNetAmount)}}
                    </td>
                    <td style="border: #2d3748 solid 1px; text-align: right; padding: 5px">
                        {{round($invoiceLine->lineVatAmount)}}
                    </td>
                    <td style="border-bottom : #2d3748 solid 1px; text-align: right; padding: 5px">
                        {{round($invoiceLine->lineGrossAmount)}}
                    </td>
                </tr>
            @endforeach
