<p class="yiv7050401279MsoNormal">&nbsp;</p>
<table class="yiv7050401279MsoNormalTable" style="width: 100.0%;" border="0" width="100%" cellspacing="0"
    cellpadding="0">
    <tbody>
        <tr style="min-height: 22.5pt;">
            <td style="width: 418.5pt; background: #003ede;" colspan="4" valign="top" width="743"><strong><span
                        style="font-size: 15.0pt; font-family: Calibri,sans-serif; color: white; padding-left: 10px; float: left;">&nbsp;
                        PUCZONE NOTIFICATION</span></strong>
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr style="min-height: 22.5pt;">
            <td style="border: solid #DFE0E2 1.0pt; padding: 0in 0in 0in 0in; min-height: 22.5pt;" colspan="4">
                
                <p class="yiv7050401279MsoNormal" style="margin-bottom: 12.0pt;"><span style="font-size: 10.0pt;">
                        <strong>Transaction Details: </strong></span>
                </p>
            </td>
        </tr>
        
    </tbody>
</table>
<table class="yiv7050401279MsoNormalTable" style="width: 100.0%;" border="1" width="100%" cellspacing="3"
        cellpadding="0">
        <tbody>
            <tr style="min-height: 22.5pt;">
                <td style="border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt;">
                <!-- credit/debit  -->
                    <p class="yiv7050401279MsoNormal"><span style="font-size: 9.0pt;">&nbsp; <strong>Type</strong></span></p>
                </td>
                <td style="border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt;">
                @if($transaction->type == '1')
                <p class="yiv7050401279MsoNormal"><span style="font-size: 9.0pt;">&nbsp; &nbsp;Credit</span>
                    </p>
                @elseif($transaction->type == '2')
                <p class="yiv7050401279MsoNormal"><span style="font-size: 9.0pt;">&nbsp; &nbsp;Debit</span>
                    </p>
                @endif
                   
                </td>
            </tr>
            <tr style="min-height: 22.5pt;">
                <td style="border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt;">
                <!-- credit/debit  -->
                    <p class="yiv7050401279MsoNormal"><span style="font-size: 9.0pt;">&nbsp; <strong>Transaction Type</strong></span></p>
                </td>
                <td style="border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt;">
                @if($transaction->transaction_type == '1')
                <p class="yiv7050401279MsoNormal"><span style="font-size: 9.0pt;">&nbsp; &nbsp;Online</span>
                    </p>
                @elseif($transaction->transaction_type == '2')
                <p class="yiv7050401279MsoNormal"><span style="font-size: 9.0pt;">&nbsp; &nbsp;Manuall</span>
                    </p>
                @endif
                   
                </td>
            </tr>
            <tr style="min-height: 22.5pt;">
                <td style="border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt;">
                    <p class="yiv7050401279MsoNormal"><span style="font-size: 9.0pt;">&nbsp; <strong>User Name</strong></span></p>
                </td>
                <td style="border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt;">
                    <p class="yiv7050401279MsoNormal"><span style="font-size: 9.0pt;">&nbsp; &nbsp;{{$userName}}</span>
                    </p>
                </td>
            </tr>
            
            <tr style="min-height: 22.5pt;">
                <td style="border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt;">
                    <p class="yiv7050401279MsoNormal"><span style="font-size: 9.0pt;">&nbsp; 
                    @if($bankData->bank_type == 1)

                    <strong>UPI ID</strong></span></p>
                    @endif
                    @if($bankData->bank_type == 2)
                    <strong>Bank</strong></span></p>
                    @endif
                </td>
                <td style="border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt;">
                    <p class="yiv7050401279MsoNormal"><span style="font-size: 9.0pt;">&nbsp; &nbsp;
                    @if($bankData->bank_type == 1)

                     {{@$bankData->upi_id}}
                     @endif
                     @if($bankData->bank_type == 2)
                     {{@$bankData->bank_name}}
                     @endif
                </span>
                    </p>
                </td>
            </tr>
            <tr style="min-height: 22.5pt;">
                <td style="border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt;">
                    <p class="yiv7050401279MsoNormal"><span style="font-size: 9.0pt;">&nbsp; <strong>Amount</strong></span></p>
                </td>
                <td style="border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt;">
                    <p class="yiv7050401279MsoNormal"><span style="font-size: 9.0pt;">&nbsp; &nbsp;{{@$transaction->amount}}</span>
                    </p>
                </td>
            </tr>
            <tr style="min-height: 22.5pt;">
                <td style="border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt;">
                    <p class="yiv7050401279MsoNormal"><span style="font-size: 9.0pt;">&nbsp; <strong>UTR Number</strong></span></p>
                </td>
                <td style="border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt;">
                    <p class="yiv7050401279MsoNormal"><span style="font-size: 9.0pt;">&nbsp; &nbsp;{{@$transaction->transaction_number}}</span>
                    </p>
                </td>
            </tr>
            
            
            <tr style="min-height: 22.5pt;">
                <td style="border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt;">
                    <p class="yiv7050401279MsoNormal"><span style="font-size: 9.0pt;">&nbsp; <strong>Status</strong></span></p>
                </td>
                <td style="border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt;">
                    @if($transaction->status == '1')
                        <p class="yiv7050401279MsoNormal"><span style="font-size: 9.0pt;">&nbsp; &nbsp;Pending</span></p>
                    @elseif($transaction->status == '2')
                    <p class="yiv7050401279MsoNormal"><span style="font-size: 9.0pt;">&nbsp; &nbsp;Rejected</span></p>
                    @elseif($transaction->status == '3')
                    <p class="yiv7050401279MsoNormal"><span style="font-size: 9.0pt;">&nbsp; &nbsp;Approved</span></p>

                    @endif
                </td>
            </tr>
            <tr style="min-height: 22.5pt;">
                <td style="border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt;">
                    <p class="yiv7050401279MsoNormal"><span style="font-size: 9.0pt;">&nbsp; <strong>Date</strong></span></p>
                </td>
                <td style="border: solid #DFE0E2 1.0pt; padding: .75pt .75pt .75pt .75pt; min-height: 22.5pt;">
                   
                    <p class="yiv7050401279MsoNormal"><span style="font-size: 9.0pt;">&nbsp; &nbsp;{{$transaction->date}}</span></p>

                </td>
            </tr>

            <tr>
                <td style="width: 445.5pt; background: #F2F2F2; padding: 0in 5.4pt 0in 5.4pt;" colspan="8" valign="top"
                    width="743">
                    <p align="center">Copyright (c) {{date('Y')}}, PUCZONE. All rights reserved.</p>
                </td>
            </tr>

        </tbody>
    </table>
