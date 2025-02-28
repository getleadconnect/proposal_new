<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposal EZBIZZ</title>
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
	
    <style>
        body {
            font-family:'Poppins','sans-serif';
            margin: 0;
            padding: 0;
        }

        .page {
            /*width: 21cm;*/
			width: 93%;
            min-height: 26cm;
            margin: 0 auto;
            padding: 1cm;
            border-radius: 5px;
            background: white;
            box-sizing: border-box;
            position: relative;
			
        }

        .logo {
            width: 100%;
            display: inline-block;
			min-height:100px;
        }

        .page-header {
            text-align: center;
            margin-top: 50px;
        }

        .page-header img {
            width: 200px;
            float: left;
        }

        
        .title {
			
			width:93%;
			height:400px;
            text-align: left;
            font-size: 120px;
            font-weight: bold;
			padding:50px 30px;
			color:#fff;
        }

        .proposal {
            /*padding: 50px 50px 80px 50px;*/
            /*position: absolute;*/
            bottom: 0;
            left: 0;
            right: 0;
            margin: 0;
            box-sizing: border-box;
			margin-right:10px;
			font-family:'Poppins','sans-serif';
			
        }

	   
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
		
	@page { margin:  15px 10px; }
	body { margin: 15px 10px; 
	font-family: 'Poppins';
	}
	
	table td {	padding-left:10px;	}
	.w-50	{	width:50%;	}
	.w-20	{	width:20%;	}
	.w-15 { width:15%;}
	.td-border	{	border:.05rem solid #000;	}
	.mt-2{margin-top:2rem;}
	.mt-3	{	margin-top:3rem;	}
	.mb-1	{	margin-bottom:1.5rem;	}
	.h-3	{	height:2rem;	}
	.h-5	{	height:5rem;	}
	.sub-title	{	font-size:20px;		color:#c7870f;	}
	.sub-title-2{	font-size:18px;		background:#c7870f;	}
	.col-w-60	{	width:60%;	}
	 h2	{		font-size:20px;	}
	.tb-border	{	border:.05rem solid #000;	}
	.br-right	{	border-right:.05rem solid #000;	}
	.br-left	{	border-left:.05rem solid #000;	}
	.br-top	{		border-top:.05rem solid #000;	}
	.br-bottom	{	border-bottom:.05rem solid #000;	}
	.f-weight{	font-weight:500;}
	.lh-35{	height:35px;}
	 ul li{	line-height:30px;}

    </style>
	
</head>

<body style="font-family: 'Poppins';">
    <div class="page">
        <div class="page-header">
		<table style="width:100%;" >
		<tr><td>
            <div class="logo"><img src="{{public_path('/assets/images/ezbizz-logo.png')}}" alt="Logo">	</div>
			</td>
			<td style="text-align:right;">
                <p style="margin:5px 0px 5px 0px;">+{{$user_dt->country_code." ".$user_dt->mobile_number}}</p>
                <p style="margin:5px 0px 5px 0px;">{{$user_dt->email}}</p>
                <p style="margin:5px 0px 5px 0px;">{{$user_dt->website}}</p>
				<p style="margin:5px 0px 5px 0px;">{{$user_dt->address}}, {{$user_dt->location}}, {{$user_dt->country}}.</p>
			</td>
			</tr>
			
			</table>

			<table class="mt-2" style="width:100%;" >
			<tr style="height:70px;"><td >&nbsp;</td><td style="width:60%;">
					<img src="{{public_path('/uploads/line.png')}}" style="width:100%;">
			</td></tr>	
			</table>


        </div>
		
		<div class=" mt-2">
		    <div style="position:absolute;z-index:999999;font-size:100px;color:#fff;margin:50px 0px 0px 20px;"> BUSINESS <br>PROPOSAL </div>
			<img src="{{public_path('/uploads/').$banner->banner}}" style="width:100%;height:400px;"> 

        </div>
		
		<table style="width:100%;margin-left:-15px;" class="mt-2" >
			<tr><td style="width:60%;"><img src="{{public_path('/uploads/line.png')}}" style="width:100%;"> </td><td style="text-align:right;">&nbsp;</td></tr>
		</table>
		
		
        <div class="proposal" style="margin-top:50px;">
		
            <table  style="width:100%;" cellspacing=0>
				<tr><td colspan=2 class="w-50 sub-title" height="50px">Quotation Prepared BY</td><tr>
				<tr ><td class="w-50 td-border" >Business Consultant Name</td><td class="w-50 td-border">{{ucwords($user_name)}} </td></tr>
			</table>
		</div>
	</div>
		
		<div class="page proposal" >
			<table style="width:100%;" cellspacing=0>
				<tr><td colspan=2 class="sub-title mb-1" style="height:60px;" >To :</td><tr>
				<tr ><td class="w-50 tb-border">Customer Name</td><td class="w-50 tb-border">{{$prop->customer_name}}</td></tr>
			</table>
			
			<table class="mt-3 " style="width:100%;height:50px;" cellspacing=0>
				<tr><td colspan=4 class="sub-title">Customer Details :</td></tr>
			</table>
						
			<table style="width:100%;" cellspacing=0 class="tb-border">
				<tr class="br-bottom">
				<td class="w-20 h-3 br-right br-bottom">Phone Number</td><td class="br-right br-bottom" >{{$prop->country_code.$prop->phone_number}}</td>
				<td class="w-20 h-3 br-right br-bottom">Email</td><td class="br-bottom">{{$prop->email}}</td>
				</tr>
				
				<tr>
				<td class="h-5  br-right br-bottom">Business Activity</td><td colspan=3 class="br-bottom">{{$prop->activity}}</td>
				</tr>
				
				<tr>
				<td class="h-3 br-right br-bottom">Activity Code</td><td class="br-right br-bottom">{{$prop->activity_code}}</td>
				<td class="h-3 br-right br-bottom">Juridiction</td><td class="br-bottom">{{$prop->juridiction}}</td>
				</tr>
				
				<tr>
				<td class="br-right ">No of Visa</td><td class="br-right">{{$prop->no_of_visa}}</td>
				<td class="br-right ">No of Shareholders</td><td >{{$prop->shareholders}}</td>
				</tr>
				
			</table>

	<div class="mt-3">

		@foreach($data['value_headings'] as $row)
		
			@php
			$tot=0;
				$values=\App\Models\ProposalValue::where('proposal_id',$prop->id)->where('proposal_value_heading_id',$row->id)->get();
			@endphp
		@if(!$values->isEmpty())
			<table class="tb-border mt-3" style="width:100%;" cellspacing=0>
			<tr><td colspan=3 class="sub-title-2 br-bottom" >{{$row->value_heading}}</td></tr>

				@foreach($values as $r)
				
					<tr><td class="col-w-60 br-right br-bottom" >{{$r->proposal_heading_item}}</td><td class="br-right br-bottom">{{$r->include_option}}</td>
					<td style="width:150px;text-align:right;" class="br-bottom"><span style="margin-right:30px">{{$r->currency}}</span><span>{{number_format($r->amount,2,'.',',')}}</span></td></tr>
				@php
				$tot+=$r->amount;
				@endphp
				
				@endforeach
			<tr class="sub-title-2"><td class="col-w-60 br-right" >Total</td><td class="br-right">&nbsp;</td><td style="width:130px;text-align:right;font-weight:500;" >{{$r->currency}}&nbsp;&nbsp;&nbsp;{{number_format($tot,2,'.',',')}}</td></tr>
			</table>
		@endif
		
		@endforeach
		
		@php
		$net_total=$prop->total_amount-$prop->discount;
		@endphp
		
		<table class="tb-border mt-3" style="width:100%;" cellspacing=0>
		<tr class="sub-title-2"><td class="col-w-60 br-right" >Sub Total</td><td colspan=2 style="width:130px;text-align:right;font-weight:500;" >{{$r->currency}}&nbsp;&nbsp;&nbsp;{{number_format($prop->total_amount,2,'.',',')}}</td></tr>
		</table>
		
		<table class="tb-border mt-2" style="width:100%;" cellspacing=0>
		<tr class="sub-title-2"><td class="col-w-60 br-right" >Discount</td><td colspan=2 style="width:130px;text-align:right;font-weight:500;" >{{$r->currency}}&nbsp;&nbsp;&nbsp;{{number_format($prop->discount,2,'.',',')}}</td></tr>
		</table>
		
		<table class="tb-border mt-2" style="width:100%;" cellspacing=0>
		<tr class="sub-title-2"><td class="col-w-60 br-right" ><b>Net Total<b></td><td colspan=2 style="width:130px;text-align:right;font-weight:500;" ><b>{{$r->currency}}&nbsp;&nbsp;&nbsp;{{number_format($net_total,2,'.',',')}}</b></td></tr>
		</table>
				
    
        <h2 class="sub-title f-weight mt-3">Special Services:</h2>
		
		<ul style="width:100%;">
		@foreach($data['special_service'] as $row)
            <li>{{$row->service_data}}</li>
		@endforeach
		</ul>

        <h2 class="sub-title f-weight mt-3">Other Services</h2>
        <ul style="width:100%;">
		@foreach($data['other_service'] as $row)
            <li> {{$row->other_service}}</li>
		@endforeach
		</ul>

		<div style="height:40px;">&nbsp;</div>
		
		
        <h2 class="sub-title f-weight mt-3" >Bank Details</h2>
		<table style="width:100%;" class="tb-border" cellspacing=0 >
		<tr><td class="w-50 sub-title-2 br-right">Bank Account Details - Currency AED</td><td class="w-50 sub-title-2">Bank Account Details - Currency USD</td></tr>
		<tr>
		@foreach($data['bank_details'] as $key=>$row)
		@if($key==0)
			<td class="br-right" style="padding-left:0px;">
				<table style="width:100%;">	
					<tr class="lh-35" ><td class="br-bottom">Bank Name : {{$row->bank_name}}</td></tr>
					<tr class="lh-35"><td class="br-bottom">Account Name : {{$row->account_name}}</td></tr>
					<tr class="lh-35"><td class="br-bottom">IBAN Number : {{$row->iban_number}}</td></tr>
					<tr class="lh-35"><td class="br-bottom">Swift Code : {{$row->swift_code}}</td></tr>
					<tr class="lh-35"><td class="br-bottom">Account Number : {{$row->account_number}}</td></tr>
					<tr class="lh-35"><td class="br-bottom">Currency : {{$row->currency}}</td></tr>
					<tr class="lh-35"><td >Branch : {{$row->branch_name}}</td></tr>
				</table>
			</td>
		@else
			<td style="padding-left:0px;">
				<table style="width:100%;" >	
					<tr class="lh-35"><td class="br-bottom">Bank Name : {{$row->bank_name}}</td></tr>
					<tr class="lh-35"><td class="br-bottom">Account Name : {{$row->account_name}}</td></tr>
					<tr class="lh-35"><td class="br-bottom">IBAN Number : {{$row->iban_number}}</td></tr>
					<tr class="lh-35"><td class="br-bottom">Swift Code : {{$row->swift_code}}</td></tr>
					<tr class="lh-35"><td class="br-bottom">Account Number : {{$row->account_number}}</td></tr>
					<tr class="lh-35"><td class="br-bottom">Currency : {{$row->currency}}</td></tr>
					<tr class="lh-35"><td >Branch : {{$row->branch_name}}</td></tr>
				</table>
			</td>
		@endif

		@endforeach
		</tr>
		</table>
		
		<h2 class="sub-title f-weight mt-3">Documents Required</h2>	
		
        <ul>
		@foreach($data['documents'] as $row)
		    <li>{{$row->document_value}}</li>
		@endforeach
        </ul>

        <h2 class="sub-title f-weight mt-3">Process & Timeline:</h2>

        <ul>
		@foreach($data['timeline'] as $row)
		    <li>{{$row->process_timeline}}</li>
		@endforeach
        </ul>
				
		<h2 class="sub-title f-weight mt-3">Notes:</h2>
		
        <ul>
		@foreach($data['notes'] as $row)
		    <li>{{$row->note}}</li>
		@endforeach
        </ul>
		
		
		<h2 class="sub-title f-weight mt-3">Conditions:</h2>
		
        <ul>
		
		@foreach($data['conditions'] as $row)
		    <li>{{$row->condition}}</li>
		@endforeach
        </ul>

		<h2 class="sub-title f-weight mt-3">I acknowledge that I have read and understood.</h2>

		<table style="width:100%;" cellspacing=15>
		<tr><td class="w-20">Maker</td><td class="w-20">Checker</td><td class="w-20">Approval</td><td>Customer Signature</td><td>Final Approval</td></tr>
		<tr><td style="height:70px;" class="br-bottom">&nbsp; </td>
		<td class="br-bottom">&nbsp;</td>
		<td class="br-bottom">&nbsp;</td>
		<td class="br-bottom">&nbsp;</td>
		<td class="br-bottom">&nbsp;</td>
		</tr>
		
		<tr style="font-size:14px;"><td >Date:&nbsp;</td>
		<td >Date:&nbsp;</td>
		<td >Date:&nbsp;</td>
		<td >Date:&nbsp;</td>
		<td >Date:&nbsp;</td>
		</tr>
		</table>


    </div>
	</div>
			
</body>

</html>
