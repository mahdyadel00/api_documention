@extends('email.layout')

@section('content')
  <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
         <tr style="border-collapse:collapse;"> 
          <td align="center" style="padding:20px;Margin:0;"> 
                {!! $content !!}
          </td>
         </tr>
  </table>
@endsection
