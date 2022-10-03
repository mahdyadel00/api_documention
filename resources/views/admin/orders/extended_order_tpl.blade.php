<!DOCTYPE html>
<html lang="ar">
<head>
    <title>{{ $title }}</title>
    <meta charset="UTF-8"/>
  
    <style>
        body {
            font-family: XB Riyaz;

        }
        body {
    margin: 0;
    font-size: 16px;
    font-weight: 400;
    line-height: 25px;
    color: #212529;
    text-align: left;
    background-color: #fff;
}
       #invoice{
    padding: 15px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 0;
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}

.col {
    -ms-flex-preferred-size: 0;
    flex-basis: 0;
    -ms-flex-positive: 1;
    flex-grow: 1;
    max-width: 100%;
}
.col {
    -ms-flex-preferred-size: 0;
    flex-basis: 0;
    -ms-flex-positive: 1;
    flex-grow: 1;
    max-width: 100%;
}
.col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
.contacts tr td{
    background: #fff;
}
    </style>

    @if(isset($lang) && $lang == "rtl")
        <style>
            body {
                direction: rtl;
            }

            .table tr td {
                direction: rtl;
            }

            p {
                text-align: right;
                direction: rtl;
            }

            .total {
                text-align: left;
                direction: rtl;
            }
        </style>
    @endif
</head>
<body>
<div id="invoice">
    <div class="invoice overflow-auto">
        <div style="min-width: 100%">
            <header>
                <table >
                    <tr>
                        <td>
                            <img src="{{ asset('img/logo_ejarly.png') }}" data-holder-rendered="true" />
                            </td>
                   
                    <td class="col company-details">
                       
                            <h2 class="name">
                               Ejarly
                            </h2>
<!--                            <div>455 Foggy Heights, AZ 85004, US</div>
                            <div>(123) 456-789</div>-->
                            <div>info@ejarly.com</div>
                        
                    </tr>
                </table>
            </header>
            <main>
                <table class=" contacts">
                    <tbody>
                    <tr>
                    <td class="invoice-to">
                       <!--<h4 class="to">INVOICE TO: {{ $order->user->full_name }}</h4>-->
                        
                        <div class="address">{{ $order->user->full_name }}</div>
                        <div class="email"></div>
<!--                        <div class="email"><a href="javascript:void(0)">{{ $order->user->email }}</a></div>
                        <div class="email">{{ $order->user->phone }}</div>-->
<div style="clear:both"></div>
                    </td>
                    </tr><!-- comment -->
                    <tr>
                    <td class="col invoice-details">
                        <h3 class="invoice-id">INVOICE #{{ $order->id }}</h3>
                        <div class="date">Date of Invoice: {{ $order->created_at }}</div>
                    </td>
                </tr>
                    </tbody>
                </table>
                <table border="0" cellspacing="0" cellpadding="0">
            
            <tbody>
                
                <tr> 
                         <td >
                             <b>Days: {{ $extended_order->duration }}</b>
                         </td> 
                     </tr> 
                
                 <tr> 
                         <td ><b>From:</b> {{ \Carbon\Carbon::parse($extended_order->from_date)->format(' M d, Y') }} - <b>To:</b> {{ \Carbon\Carbon::parse($extended_order->to_date)->format(' M d, Y') }}</td> 
                     </tr>
                
               @foreach($order->products as $product) 
                     <tr > 
                      <td >
                          @if($product->product->main_photo && $product->product->main_photo != "")
                            <img style="width:80px;height:50px;border: 1px solid #ddd;border-radius:4px " src="{{ asset("uploads/".$product->product->main_photo) }}" />
                            @endif
                         <strong>{{ $product->product->en_title }}</strong>
                      </td> 
                     </tr> 
                     <tr> 
                      <td>
                          {{ $product->product->en_description }}
                      </td> 
                     </tr>
                     
                     <tr> 
                         <td ><b>Owner: </b>{{ $product->product->user->name }}</td> 
                     </tr>
                     
                    
                     
                     <tr> 
                         <td ><b>Quantity:&nbsp;{{ $product->quantity }}</b></td> 
                     </tr> 
                     
                     
                     <tr> 
                      <td >
                          <b>Price/Day:&nbsp;{{ $product->price_per_day }} SAR</b><br />
                          
                          @if($product->price_per_month !=0 && $product->price_per_month != "")
                            <b>Price/Month:&nbsp;{{ $product->price_per_month }} SAR</b><br />
                          @endif
                          
                          @if($product->price_per_year !=0 && $product->price_per_year != "")
                             <b>Price/Year:&nbsp;{{ $product->price_per_year }} SAR</b>
                          @endif
                      </td> 
                     </tr> 
                     
                     <tr> 
                      <td ><b>Total Price:&nbsp;{{ $product->total  }} SAR</b></td> 
                     </tr>
                 
             @endforeach
             
            
            </tbody>
        </table>
         <div>
             <h3 style="color:#900">Application Commission : {{ $extended_order->application_amount }} SAR</h3>
             <h3 style="color:#900">Tax : {{ $extended_order->tax_amount }} SAR</h3>
             <h2 style="color:#900">Sub Total : {{ $extended_order->sub_total }} SAR</h2>
             <h2 style="color:#900">Total Order : {{ $extended_order->total }} SAR</h2>
                 
             </div>
    </div>
</div>
</div>

</body>
</html>