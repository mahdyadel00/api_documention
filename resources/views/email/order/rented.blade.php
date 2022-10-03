@extends('email.layout')

@section('content')
  

<table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
         <tr style="border-collapse:collapse;"> 
          <td align="center" style="padding:0;Margin:0;"> 
           <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;"> 
              <tr style="border-collapse:collapse;"> 
               <td align="right" style="padding:0;Margin:0;padding-top:20px;padding-right:20px;padding-left:20px;background-position:center top;"> 
               <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="560" align="center" valign="top" style="padding:0;Margin:0;"> 
                   <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="center" style="padding:0;Margin:0;"><h2 style="Margin:0;line-height:31px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:26px;font-style:normal;font-weight:bold;color:#659C35;">#{{ $order->id }} :طلب رقم </h2></td> 
                     </tr> 
                     {{-- <tr style="border-collapse:collapse;"> 
                      <td align="center" style="padding:0;Margin:0;padding-top:10px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;">Awaiting approval of the order.</p></td> 
                     </tr>  --}}
                     <tr style="border-collapse:collapse;"> 
                      <td align="center" style="Margin:0;padding-right:10px;padding-left:10px;padding-top:20px;padding-bottom:20px;"><span class="es-button-border" style="border-style:solid;border-color:#659C35;background:#659C35;border-width:0px;display:inline-block;border-radius:0px;width:auto;"><a href="#" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:18px;color:#FFFFFF;border-style:solid;border-color:#659C35;border-width:10px 20px;display:inline-block;background:#659C35;border-radius:0px;font-weight:normal;font-style:normal;line-height:22px;width:auto;text-align:center;">
                        {{ $order->status->ar_name }}
                      </a></span></td> 
                     </tr> 

                     @if ($body)                        
                     <tr style="border-collapse:collapse;"> 
                       <td align="center" style="padding:0;Margin:0;padding-top:10px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;">{{$body}}</p></td> 
                     </tr> 
                     @endif
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
             <tr style="border-collapse:collapse;"> 
                <td align="right" style="Margin:0;padding-bottom:10px;padding-top:20px;padding-right:20px;padding-left:20px;background-position:center top;"> 
               <!--[if mso]><table width="560" cellpadding="0" cellspacing="0"><tr><td width="280" valign="top"><![endif]--> 
               {{-- <table class="es-right" cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td class="es-m-p20b" width="280" align="right" style="padding:0;Margin:0;">  --}}
                   <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#EFEFEF;background-position:center top;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#efefef" role="presentation"> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="right" style="Margin:0;padding-bottom:10px;padding-top:20px;padding-right:20px;padding-left:20px;">
                        <h4 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#659C35;">:الملخص</h4></td> 
                     </tr> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="right" style="padding:0;Margin:0;padding-bottom:20px;padding-right:20px;padding-left:20px;"> 
                       <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;" class="cke_show_border" cellspacing="1" cellpadding="1" border="0" align="right" role="presentation"> 
                         <tr style="border-collapse:collapse;"> 
                          <td style="padding:0;Margin:0;"><strong><span style="font-size:14px;line-height:21px;">#{{ $order->id }}</span></strong></td> 
                          <td style="padding:0;Margin:0;font-size:14px;line-height:21px;"> :طلب رقم</td> 
                         </tr> 
                         <tr style="border-collapse:collapse;"> 
                          <td style="padding:0;Margin:0;"><strong><span style="font-size:14px;line-height:21px;">{{ date("Y-m-d H:i:s", strtotime($order->created_at." +3 hours")) }}</span></strong></td> 
                          <td style="padding:0;Margin:0;font-size:14px;line-height:21px;">:تاريخ الطلب</td> 
                         </tr>     
                         <tr style="border-collapse:collapse;"> 
                          <td style="padding:0;Margin:0;"><strong><span style="font-size:14px;line-height:21px;">{{ $order->user->username }}</span></strong></td> 
                          <td style="padding:0;Margin:0;font-size:14px;line-height:21px;">:المستأجر</td> 
                         </tr> 

                       </table><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;"><br></p></td> 
                     </tr> 
                   </table>
                  {{-- </td> 
                 </tr> 
               </table>  --}}
               <!--[if mso]></td><td width="0"></td><td width="280" valign="top"><![endif]--> 
               {{-- <table class="es-right" cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="280" align="right" style="padding:0;Margin:0;"> 
                   <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-right:1px solid transparent;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#EFEFEF;background-position:center top;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#efefef" role="presentation"> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="right" style="Margin:0;padding-bottom:10px;padding-top:20px;padding-right:20px;padding-right:20px;"><h4 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#659C35;">المستأجر:</h4></td> 
                     </tr> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="right" style="padding:0;Margin:0;padding-bottom:20px;padding-right:20px;padding-right:20px;">
                          <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;"></p>
                          @if($order->user->username != "")
                          <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;">{{ $order->user->username }}</p>
                          @endif
                          <!--                          <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#ddd;">.</p>-->
                      </td> 
                     </tr> 
                   </table>
                  
                  
                  </td> 
                 </tr> 
               </table>  --}}
               <!--[if mso]></td></tr></table><![endif]-->
              </td> 
             </tr> 
             <tr style="border-collapse:collapse;"> 
              <td align="right" style="Margin:0;padding-bottom:10px;padding-top:20px;padding-right:20px;padding-left:20px;background-position:center top;"> 
             <!--[if mso]><table width="560" cellpadding="0" cellspacing="0"><tr><td width="280" valign="top"><![endif]--> 
             {{-- <table class="es-right" cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right;"> 
               <tr style="border-collapse:collapse;"> 
                <td class="es-m-p20b" width="280" align="right" style="padding:0;Margin:0;">  --}}
                 <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-right:1px solid transparent;border-top:1px solid transparent;border-bottom:1px solid transparent;background-color:#EFEFEF;background-position:center top;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#efefef" role="presentation"> 
                   <tr style="border-collapse:collapse;"> 
                    <td align="right" style="Margin:0;padding-bottom:10px;padding-top:20px;padding-right:20px;padding-left:20px;">
                      <h4 style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#659C35;">:نصائح المعاينة</h4></td> 
                   </tr> 
                   <tr style="border-collapse:collapse;"> 
                    <td align="right" style="padding:0;Margin:0;padding-bottom:20px;padding-right:20px;padding-left:20px;"> 
                     <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;" class="cke_show_border" cellspacing="1" cellpadding="1" border="0" align="right" role="presentation"> 
                       <tr style="border-collapse:collapse;"> 
                        <td style="padding:0;Margin:0;"  align="right"><strong><span style="font-size:14px;line-height:21px;">الالتقاء في مناطق امنة و أماكن عامة</span></strong></td> 
                        <td style="padding:0;Margin:0;font-size:14px;line-height:21px;"> -1</td> 
                       </tr> 
                       <tr style="border-collapse:collapse;"> 
                        <td style="padding:0;Margin:0;"  align="right"><strong><span style="font-size:14px;line-height:21px;">تصوير المنتج صوره وفيديو قبل التسليم</span></strong></td> 
                        <td style="padding:0;Margin:0;font-size:14px;line-height:21px;"> -2</td> 
                       </tr>     
                       <tr style="border-collapse:collapse;"> 
                        <td style="padding:0;Margin:0;"  align="right"><strong><span style="font-size:14px;line-height:21px;">لا تبادل معلومات أو بيانات التواصل للطرف الثاني</span></strong></td> 
                        <td style="padding:0;Margin:0;font-size:14px;line-height:21px;"> -3</td> 
                       </tr>      
                       <tr style="border-collapse:collapse;"> 
                        <td style="padding:0;Margin:0;"  align="right"><strong><span style="font-size:14px;line-height:21px;">مراجعه المنتج ومطابقته مع الوصف إكمال العملية</span></strong></td> 
                        <td style="padding:0;Margin:0;font-size:14px;line-height:21px;"> -4</td> 
                       </tr>      
                       <tr style="border-collapse:collapse;"> 
                        <td style="padding:0;Margin:0;"  align="right"><strong>
                          <span style="font-size:14px;line-height:21px;">في حال يوجد اختلاف في المنتج عن العرض اطلب من المالك تسجيلها في الملاحظات</span></strong></td> 
                        <td style="padding:0;Margin:0;font-size:14px;line-height:21px;"> -5</td> 
                       </tr>      

                     </table><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;"><br></p></td> 
                   </tr> 
                 </table>
              
            </td> 
           </tr> 
           </table>
          </td> 
         </tr> 
       </table> 
       <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
         <tr style="border-collapse:collapse;"> 
          <td align="center" style="padding:0;Margin:0;"> 
           <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;"> 
         
               @foreach($order->products as $product) 
       
            <tr style="border-collapse:collapse;"> 
              <td align="right" style="Margin:0;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;background-position:center top;"> 
               <!--[if mso]><table width="560" cellpadding="0" cellspacing="0"><tr><td width="154" valign="top"><![endif]--> 
               <table cellpadding="0" cellspacing="0" class="es-right" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="154" class="es-m-p20b" align="right" style="padding:0;Margin:0;"> 
                   <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:right top;" role="presentation"> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="center" style="padding:0;Margin:0;font-size:0;"><a target="_blank" href="#" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:14px;text-decoration:none;color:#659C35;">
                        <img class="adapt-img" src="{{ asset('thumbs/'.$product->product->photos[0]->image) }}" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;" width="154"></a></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table> 
               <!--[if mso]></td><td width="20"></td><td width="386" valign="top"><![endif]--> 
               <table cellpadding="0" cellspacing="0" class="es-right" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="386" align="right" style="padding:0;Margin:0;"> 
                   <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="right" class="es-m-txt-l" style="padding:0;Margin:0;padding-top:10px;"><h3 style="Margin:0;line-height:23px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:19px;font-style:normal;font-weight:normal;color:#659C35;"><strong>{{ $product->product->ar_title }}</strong></h3></td> 
                     </tr> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="right" style="padding:0;Margin:0;padding-top:5px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;">{{ $product->product->ar_description }}</p></td> 
                     </tr>
                     


                     <tr style="border-collapse:collapse;"> 
                      <td align="right" style="padding:0;Margin:0;padding-top:5px;">
                        <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;">
                          <strong>الفئة: </strong>
                          @foreach ($product->product->main_categories as $k=>$cat)                                              
                          {{ $cat->ar_name }} 
                            @if ($k+1 != $product->product->main_categories->count())                                
                            /
                            @endif
                          @endforeach
                        </p></td> 
                    </tr>

                    <tr style="border-collapse:collapse;"> 
                      <td align="right" style="padding:0;Margin:0;padding-top:5px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;">
                        <strong>المهنة: </strong>
                        {{ $product->product->job->ar_name }}                         
                      </p></td> 
                  </tr>

                    <tr style="border-collapse:collapse;"> 
                      <td align="right" style="padding:0;Margin:0;padding-top:5px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;">
                        <strong>الحالة: </strong>
                        {{ $product->product->status_val->ar_name }} 
                       </p></td> 
                  </tr>

                  @if ($product->delivery_type_obj)                      
                  <tr style="border-collapse:collapse;"> 
                    <td align="right" style="padding:0;Margin:0;padding-top:5px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;">
                      <strong>طريقة التوصيل: </strong>
                      {{ $product->delivery_type_obj->ar_name }} 
                    </p>
                  </td> 
                  </tr>
                  @endif

                  @if ($order->payment_method)                      
                  <tr style="border-collapse:collapse;"> 
                    <td align="right" style="padding:0;Margin:0;padding-top:5px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;">
                      <strong>طريقة الدفع: </strong>
                      {{ $order->payment_method->ar_name }} 
                    </p>
                  </td> 
                  </tr>
                  @endif

                     <tr style="border-collapse:collapse;"> 
                         <td align="right" style="padding:0;Margin:0;padding-top:5px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;">{{ $product->product->user->name }} <strong>:المالك </strong></p></td> 
                     </tr>
                     
                     <tr style="border-collapse:collapse;"> 
                         <td align="right" style="padding:0;Margin:0;padding-top:5px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;"> {{ \Carbon\Carbon::parse($product->to_date)->format(' M d, Y') }}<strong>:الى</strong> -{{ \Carbon\Carbon::parse($product->from_date)->format(' M d, Y') }} <strong>:من</strong>  </p></td> 
                     </tr>
                     
                     <tr style="border-collapse:collapse;"> 
                         <td align="right" class="es-m-txt-l" style="padding:0;Margin:0;padding-top:10px;"><h4 style="Margin:0;line-height:23px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:15px;font-style:normal;font-weight:normal;color:#659C35;"><strong>{{ $product->quantity }}&nbsp;<span style="color:#000000;">:الكمية</span></strong></h4></td> 
                     </tr> 
                     
                     <tr style="border-collapse:collapse;"> 
                         <td align="right" class="es-m-txt-l" style="padding:0;Margin:0;padding-top:10px;"><h4 style="Margin:0;line-height:23px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:15px;font-style:normal;font-weight:normal;color:#659C35;"><strong>{{ $product->no_days }}&nbsp;<span style="color:#000000;">:عدد الأيام</span></strong></h4></td> 
                     </tr> 
                     
                     <tr style="border-collapse:collapse;"> 
                        <td align="right" class="es-m-txt-l" style="padding:0;Margin:0;padding-top:10px;"><h4 style="Margin:0;line-height:23px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:15px;font-style:normal;font-weight:normal;color:#659C35;"><strong>SAR {{ $product->price_per_day }}&nbsp;<span style="color:#000000;">:السعر في اليوم</span></strong></h4></td> 
                     </tr> 
                     
                     {{-- <tr style="border-collapse:collapse;"> 
                        <td align="right" class="es-m-txt-l" style="padding:0;Margin:0;padding-top:10px;"><h4 style="Margin:0;line-height:23px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:15px;font-style:normal;font-weight:normal;color:#659C35;"><strong>ريال سعودي {{ $product->total  }}&nbsp;<span style="color:#000000;">:السعر الكلي</span></strong></h4></td> 
                     </tr> --}}
                     
                   </table></td> 
                 </tr> 
               </table> 
               <!--[if mso]></td></tr></table><![endif]--></td> 
             </tr> 
             @endforeach
             
       
           </table></td> 
         </tr> 
       </table> 
       <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
         <tr style="border-collapse:collapse;"> 
          <td align="center" style="padding:0;Margin:0;"> 
           <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;"> 
             <tr style="border-collapse:collapse;"> 
              <td align="right" style="padding:0;Margin:0;padding-top:15px;padding-right:20px;padding-left:20px;background-position:center top;"> 
               <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="560" align="center" valign="top" style="padding:0;Margin:0;"> 
                   <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;border-top:1px solid #CCCCCC;border-bottom:1px solid #CCCCCC;background-position:center top;" role="presentation"> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="right" style="padding:0;Margin:0;padding-top:10px;"> 
                       <table border="0" cellspacing="1" cellpadding="1" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:500px;" class="cke_show_border" role="presentation"> 
                        




                        <tr style="border-collapse:collapse;"> 
                            <td style="padding:0;Margin:0;color:#FF0000;"><strong> SAR {{ $order->service_fees }} </strong></td> 
                            <td style="padding:0;Margin:0;"><h4 style="Margin:0;line-height:200%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#333333;">:رسوم الخدمة</h4></td> 
                           </tr>
                           
                        <tr style="border-collapse:collapse;"> 
                            <td style="padding:0;Margin:0;color:#FF0000;"><strong> SAR {{ $order->tax_amount }} </strong></td> 
                            <td style="padding:0;Margin:0;"><h4 style="Margin:0;line-height:200%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#333333;">:الضريبة</h4></td> 
                           </tr>
                           
                         <tr style="border-collapse:collapse;"> 
                          <td style="padding:0;Margin:0;color:#659C35;font-size: 20px;"><strong> SAR {{ $order->total }}  </strong></td> 
                          <td style="padding:0;Margin:0;"><h4 style="Margin:0;line-height:200%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#333333;">:التكلفة الإجمالية</h4></td> 
                         </tr> 

            

                        </table></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table><br /></td> 
             </tr> 
             
             
             
             
           </table></td> 
         </tr> 
       </table> 
@endsection
