<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposal EZBIZZ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .page {
            width: 21cm;
            min-height: 29.7cm;
            margin: 0 auto;
            padding: 1cm;
            border-radius: 5px;
            background: white;
            box-sizing: border-box;
            position: relative;
        }

        .company-title {
            color: #313131;
            font-family: Roboto;
            padding-top: 20px !important;
            font-size: 22px !important;
            font-style: normal;
            font-weight: bold;
            line-height: normal;
            display: block;
        }

        .logo {
            width: 100%;
            display: inline-block;
        }

        .page-header {
            text-align: center;
            margin-top: 50px;
            margin-left: 50px;
        }

        .page-header img {
            width: 200px;
            float: left;
        }

        .page-header .contact-info {
            margin-top: 10px;
            text-align: left;
        }

        .contact-info p {
            padding: 3px 0px;
            margin: 0;
            font-size: 18px;
        }

        .title {
            text-align: left;
            font-size: 70px;
            font-weight: bold;
            margin: 70px 50px;
        }

        .company {
            color: #FFF;
            font-family: Roboto;
            font-size: 22px !important;
            font-style: normal;
            font-weight: bold;
            line-height: normal;
        }

        .prepared-for p {
            padding: 3px 0px;
            margin: 0;
            color: #fff;
            font-family: Roboto;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .proposal {
            padding: 84px 54px;
            background-color: #292563;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .proposal-dates {
            margin-top: 40px;
            text-align: center;
            display: inline-block;
            width: 100%;
            color: #fff;
        }

        .proposal-dates p {
            float: left;
            width: 30%;
            text-align: left;
            margin: 0;
        }

        .proposal-dates p span.small {
            color: #8583A5;
            font-family: Roboto;
            font-size: 13px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            padding-bottom: 5px !important;
            display: block;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #292563 !important;
        }

        thead tr,
        thead th {
            background: #292563 !important;
            color: #fff;
            border: none !important;
            padding: 15px;
        }

        thead th {
            padding-top: 15px !important;
            padding-bottom: 15px !important;
        }

        tfoot,
        tfoot tr {
            background: #BC964B !important;
            border: none !important;
        }

        tfoot td {
            border: none !important;
            padding: 15px !important;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .table tr:nth-child(odd) {
            background-color: #fff;
        }

        .table tr:nth-child(even) {
            background-color: #F1F1F1;
        }

        .table tfoot td {
            font-weight: bold;
        }

        .payment-method {
            margin-top: 20px;
            text-align: left;
            color: #313131;
            font-family: Roboto;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 22px;
			font-family: 'Poppins';
        }

        .payment-method h3 {
            padding-top: 50px;
			font-family: 'Poppins';
        }

        .payment-method p {
            padding: 3px 0px;
            margin: 0;
            font-size: 16px;
			font-family: 'Poppins';
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            position: absolute;
            bottom: 10px;
            width: 100%;
            left: 0px;
			font-family: 'Poppins';
        }

.footer p{color:#313131c4 ;}
        

        ol li {
            padding: 3px 0px;
            color: #313131;
        }
       .terms h2{margin-top: 40px ;}
	   .terms{margin-bottom: 20px ;}
	   
        /* Page Breaks */
        @media print {
            .page {
                page-break-after: always;
                position: relative;
            }

            .proposal {
                position: absolute;
                bottom: 0;
                left: 1cm;
                right: 1cm;
                margin: 0;
            }
        }
    </style>
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body style="font-family: 'Poppins';">
    <div class="page">
        <div class="page-header">
            <div class="logo"><img src="/uploads/{{$user_dt->logo}}" alt="Logo"> </div>

            <div class="contact-info">
                <p class="company-title">{{$user_dt->company_name}}</p>
                <p>{{$user_dt->address}},{{$user_dt->location}},{{$user_dt->country}}.</p>
                <p>+{{$user_dt->country_code." ".$user_dt->mobile_number}}</p>
                <p>{{$user_dt->email}}</p>
                <p>{{$user_dt->website}}</p>
            </div>
        </div>
        <div class="title">
            BUSINESS <br>PROPOSAL
        </div>
        <div class="proposal">
            <div class="prepared-for">
                <p>Prepared for</p>
                <p class="company">{{$prop->company}}</p>
                <p>{{$prop->address}}</p>
                <p>{{$prop->location.", ".$prop->country}}
				@if($prop->pincode!="")
				{{", ".$prop->pincode}}
				@endif
			</p>
                <!--<p>Kozhikode, Kerala 673016</p>-->
            </div>
            <div class="proposal-dates">
                <p>
                   <span class="small"> Proposal issued:</span> 
                    <span>{{date_create($prop->issued_date)->format('d-F-Y')}}</span>
                </p>
                <p>
                   <span class="small">Proposal valid to:</span>  
                    <span>{{date_create($prop->valid_to)->format('d-F-Y')}}</span>
                </p>
                <p>
                   <span class="small">Proposal number:</span> 
                    <span>{{$prop->ref_no}}</span>
                </p>
            </div>
        </div>
         
    </div>

    <div class="page">
        <div class="page-header" style="margin-left: 0px;">
            <h2 style="text-align: left;">Service we provide</h2>
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Qty</th>
                        <th width="100px">Price</th>
                        <th width="100px">Amount</th>
                    </tr>
                </thead>
                <tbody>
				@php
				  $tot=0;
				  $currency="";
				@endphp
				
				@foreach($pitems as $row)
				@php
				$tot+=$row->total_price;
				$currency=$row->currency;
				@endphp
				
                    <tr>
                        <td>{{$row->description}}</td>
                        <td>{{$row->qty}}</td>
                        <td>{{$row->price." ".$row->currency}}</td>
                        <td>{{$row->total_price." ".$row->currency}}</td>
                    </tr>
                @endforeach
                    <!-- More rows here -->
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" style="text-align: right;">Total: {{number_format($tot,2,'.',',')}}&nbsp;{{$currency}}</td>
                    </tr>
                </tfoot>
            </table>
            <div class="payment-method">
                <h3>Payment method:</h3>
                <p>Bank Account Transfer</p>
                <p>Bank Name: WIO Bank Ez Bizz Corporate Services LLC</p>
                <p>IBAN: AE930860000009707448772</p>
                <p>Account Number: 9707448772</p>
                <p>BIC/SWIFT: WIOBAEADXXX</p>
            </div>
            <div class="footer">
                <p>www.ezbizzsetup.com</p>
            </div>
        </div>
    </div>

    <div class="page terms">
        <h2>Generic Terms and Condition:</h2>
        <ol>
            <li>Gov't Cost will be payable as per gov't voucher</li>
            <li>External approval based on business activities (if required) as per actuals.</li>
            <li>Bank account consult charges start from AED 2500 to 10k depending on bank and activities.</li>
            <li>VAT was introduced in UAE since January 2018. If your company crosses yearly turnover of AED 375,000 or is going to cross in the next 30 days, it is mandatory to register for VAT. We also help with VAT registration.</li>
        </ol>

        <h2>Documents required</h2>
        <ol>
            <li>Colored passport copies of shareholder with 6 months validity</li>
            <li>Shareholder email, residence address & contact details</li>
            <li>Three trade names options</li>
            <li>Passport size photographs</li>
            <li>Visa copy (Visit or residence permit)</li>
            <li>Shareholder contact details (residence address, email address and contact number) Existing UAE visa with Emirates ID (if available)</li>
        </ol>

        <h2>Process & Timeline</h2>
        <ol>
            <li>Initial approval & name reservation for the company</li>
            <li>Submission of documents to the mainland after they are filled and signed</li>
            <li>License 3-5 working days</li>
            <li>Establishment card issuance 3-5 working days</li>
            <li>Visa process 5-7 working days</li>
        </ol>

        <h2>Terms and Condition:</h2>
        <ol>
            <li>Prices for government services may or may not change, however, any new prices will come into force if there are any changes in prices as per UAE government.</li>
            <li>Any visa is subject to security approval, as well as immigration approval.</li>
            <li>Any additional documents required by the immigration authority have to be furnished.</li>
            <li>Visa issuance is subject to immigration approval.</li>
            <li>Inside country changes of status will be applicable AED 2000 each.</li>
            <li>Service charges will be payable in advance and are non-refundable.</li>
            <li>In case of visa been rejected, the amount spent on the service will be non-refundable.</li>
        </ol>

		<div class="footer">
            <p>www.ezbizzsetup.com</p>
		</div>
		
    </div>
			
</body>

</html>
