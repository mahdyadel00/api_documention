@extends('email.layout')

@section('content')
  <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
         <tr style="border-collapse:collapse;"> 
          <td align="center" style="padding:20px;Margin:0;"> 
                
              <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;"> 
               @foreach($share_list as $share)
               @php
                    $product = $share->product;
               @endphp
                <tr style="border-collapse:collapse;"> 
                  <td align="left" style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px;background-position:center top;"> 
                   <!--[if mso]><table width="560" cellpadding="0" cellspacing="0"><tr><td width="154" valign="top"><![endif]--> 
                   <table cellpadding="0" cellspacing="0" class="es-left" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td width="154" class="es-m-p20b" align="left" style="padding:0;Margin:0;"> 
                       <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:left top;" role="presentation"> 
                         <tr style="border-collapse:collapse;"> 
                          <td align="center" style="padding:0;Margin:0;font-size:0;"><a target="_blank" href="#" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:14px;text-decoration:none;color:#659C35;"><img class="adapt-img" src="{{ asset('thumbs/'.$product->photos[0]->image) }}" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;" width="154"></a></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table> 
                   <!--[if mso]></td><td width="20"></td><td width="386" valign="top"><![endif]--> 
                   <table cellpadding="0" cellspacing="0" class="es-right" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td width="386" align="left" style="padding:0;Margin:0;"> 
                       <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                         <tr style="border-collapse:collapse;"> 
                          <td align="left" class="es-m-txt-l" style="padding:0;Margin:0;padding-top:10px;"><h3 style="Margin:0;line-height:23px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:19px;font-style:normal;font-weight:normal;color:#659C35;"><strong>{{ $product->en_title }}</strong></h3></td> 
                         </tr> 
                         <tr style="border-collapse:collapse;"> 
                          <td align="left" style="padding:0;Margin:0;padding-top:5px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;">{{ $product->en_description }}</p></td> 
                         </tr>

                         <tr style="border-collapse:collapse;"> 
                             <td align="left" style="padding:0;Margin:0;padding-top:5px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;"><b>Owner: </b>{{ $product->user->name }}</p></td> 
                         </tr>

                         <tr style="border-collapse:collapse;"> 
                             <td align="left" style="padding:0;Margin:0;padding-top:5px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;"><b>From:</b> {{ \Carbon\Carbon::parse($product->from_date)->format(' M d, Y') }} - <b>To:</b> {{ \Carbon\Carbon::parse($product->to_date)->format(' M d, Y') }}</p></td> 
                         </tr>

                         <tr style="border-collapse:collapse;"> 
                             <td align="left" class="es-m-txt-l" style="padding:0;Margin:0;padding-top:10px;"><h4 style="Margin:0;line-height:23px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:15px;font-style:normal;font-weight:normal;color:#659C35;"><strong><span style="color:#000000;">Days:</span>&nbsp;{{ $product->quantity }}</strong></h4></td> 
                         </tr> 
                         <tr style="border-collapse:collapse;"> 
                          <td align="left" class="es-m-txt-l" style="padding:0;Margin:0;padding-top:10px;"><h4 style="Margin:0;line-height:23px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:15px;font-style:normal;font-weight:normal;color:#659C35;"><strong><span style="color:#000000;">Price/Day:</span>&nbsp;{{ $product->rent_price }} SAR</strong></h4></td> 
                         </tr> 

                         <tr style="border-collapse:collapse;"> 
                          <td align="left" class="es-m-txt-l" style="padding:0;Margin:0;padding-top:10px;"><h4 style="Margin:0;line-height:23px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:15px;font-style:normal;font-weight:normal;color:#659C35;"><strong><span style="color:#000000;">Total Price:</span>&nbsp;{{ $product->rent_price * $product->quantity  }} SAR</strong></h4></td> 
                         </tr>

                       </table></td> 
                     </tr> 
                   </table> 
                        </td> 
                 </tr> 
                @endforeach
             
       
           </table>
              
          </td>
         </tr>
  </table>
@endsection
