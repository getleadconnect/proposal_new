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
			font-size:12px;
        }

        .page {
            /*width: 21cm;*/
			width: 92%;
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

       
        .title {
			background-image:url('/uploads/{{$banner->banner}}');
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
				width:100%;
                page-break-after: always;
                position: relative;
            }

            .proposal {
				width:100%;
                bottom: 0;
                left: 1cm;
                right: 1cm;
                margin: 0;
            }
        }
		
	@page { margin: 15px 20px 5px 20px;}
	body { margin: 15px; 
	font-family: 'Poppins';
	font-size:12px;
	}
	
		header {
                position: fixed;
				top: -10px; 
                left: 0px;
                right: 0px;
                height: 30px;
                font-size: 11px !important;
                text-align: center;
                line-height: 25px;
            }

            footer {
                position: fixed; 
				 bottom: 20px; 
                left: 0px; 
                right: 0px;
                height: 30px; 
				margin-bottom:-10px;
                font-size: 11px !important;
                text-align: center;
                line-height: 25px;
            }

			footer .page-number:after { content: counter(page); }
			
        .header img {
            width: 200px;
            float: left;
        }

	
	table td {	padding-left:10px;	}
	.pr-1{padding-right:.7rem;}
	.w-50	{	width:50%;	}
	.w-20	{	width:20%;	}
	.w-15 { width:15%;}
	.td-border	{	border:.05rem solid #000;	}
	.mt-1{margin-top:1rem;}
	.mt-2{margin-top:2rem;}
	.mt-3	{	margin-top:3rem;	}
	.mb-1	{	margin-bottom:1.5rem;	}
	.h-3	{	height:2rem;	}
	.h-5	{	height:5rem;	}
	.sub-title	{	font-size:15px;		color:#c7870f;	}
	.sub-title-2{	font-size:15px;		background:#c7870f;	}
	.col-w-60	{	width:60%;	}
	 h2	{		font-size:15px;	}
	.tb-border	{	border:.05rem solid #000;	}
	.br-right	{	border-right:.05rem solid #000;	}
	.br-left	{	border-left:.05rem solid #000;	}
	.br-top	{		border-top:.05rem solid #000;	}
	.br-bottom	{	border-bottom:.05rem solid #000;	}
	.f-weight{	font-weight:500;}
	.lh-35{	height:35px;}
	 ul li{	line-height:28px;}

    </style>
	
</head>

<body style="font-family: 'Poppins'; font-size:12px;">

	<header>
		<table width="100%" >
		<tr><td style="font-size:11px;width:33.3%;">Ez Bizz Corporate Services LLC</td><td style="font-size:11px;text-align:center;width:33.3%;">Business Proposal</td><td style="font-size:11px;text-align:right;width:33.3%;">{{date('m-d-Y h:i A')}}</td></tr>
		</table>
	</header>
	
	<footer>
	<table width="100%" >
		<tr><td style="font-size:11px;width:33.3%;">+{{$user_dt->country_code." ".$user_dt->mobile_number}}</td><td style="font-size:11px;text-align:center;width:33.3%;">www.ezbizzsetup.com</td><td style="font-size:11px;text-align:right;width:33.3%;"><span class="page-number"> </span></td></tr>
	</table>
	</footer>
	

    <div class="page">

		<table style="width:100%;" >
		<tr><td >
            <div class="logo"><img src="{{public_path('/assets/images/ezbizz-logo.png')}}" style="width:150px" alt="Logo"></div>
			</td>
			<td style="text-align:right;">
                <p style="margin:5px 0px 5px 0px;">+{{$user_dt->country_code." ".$user_dt->mobile_number}}</p>
                <p style="margin:5px 0px 5px 0px;">{{$user_dt->email}}</p>
                <p style="margin:5px 0px 5px 0px;">{{$user_dt->website}}</p>
				<p style="margin:5px 0px 5px 0px;">{{$user_dt->address}}, {{$user_dt->location}}, {{$user_dt->country}}.</p>
			</td>
			</tr>
			
			</table>

			<table class="mt-1" style="width:100%;" >
			<tr style="height:40px;"><td >&nbsp;</td><td style="width:60%;">
					<img src="{{public_path('/uploads/line.png')}}" style="width:100%;">
			</td></tr>	
			</table>

		<div class="mt-1">
		    <div style="position:absolute;z-index:999999;font-size:80px;color:#fff;margin:50px 0px 0px 20px;"> BUSINESS <br>PROPOSAL </div>
			<img src="{{public_path('/uploads/').$banner->banner}}" style="width:100%;height:350px;"> 

        </div>
		
		<table style="width:100%;margin-left:-15px; margin-top:20px;" >
			<tr><td style="width:60%;"><img src="{{public_path('/uploads/line.png')}}" style="width:100%;"> </td><td style="text-align:right;">&nbsp;</td></tr>
		</table>
		
		
        <div  style="margin-top:20px;">
            <table  style="width:100%;" cellspacing=0>
				<tr><td colspan=2 class="w-50 sub-title" height="30px">Quotation Prepared BY</td><tr>
				<tr ><td class="w-50 td-border" >Business Consultant Name</td><td class="w-50 td-border">{{ucwords($user_name)}} </td></tr>
			</table>
		</div>

			<table style="width:100%;" cellspacing=0 class="mt-1">
				<tr><td colspan=2 class="sub-title" style="height:35px;" >To :</td><tr>
				<tr ><td class="w-50 tb-border">Customer Name</td><td class="w-50 tb-border">{{$prop->customer_name}}</td></tr>
			</table>
			
			<table class="mt-2 " style="width:100%;height:30px;" cellspacing=0>
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
			
		
	</div>
		
	<div class="page " >

	<div class="mt-1">

		@foreach($data['value_headings'] as $row)
		
			@php
			$tot=0;
				$values=\App\Models\ProposalValue::where('proposal_id',$prop->id)->where('proposal_value_heading_id',$row->id)->get();
			@endphp
		@if(!$values->isEmpty())
			<table class="tb-border mt-1" style="width:100%;" cellspacing=0>
			<tr><td colspan=4 class="sub-title-2 br-bottom" >{{$row->value_heading}}</td></tr>

				@foreach($values as $r)
				
					<tr><td class="col-w-60 br-right br-bottom" >{{$r->proposal_heading_item}}</td>
					<td class="br-right br-bottom">
					@if($row->id!=4)
						{{$r->include_option}}
					@else
						<span style="padding-right:20px;">-</span>
					@endif
					</td>
					<td width="30px;" class="br-bottom">
					{{$r->currency}}
					</td>
					<td class="pr-1 br-bottom" style="width:120px;text-align:right;" >
					@if($row->id!=4)
						<span>{{number_format($r->amount,2,'.',',')}}</span>
					@else
						<span style="padding-right:20px;">-</span>
					@endif
					</td></tr>
					
				@php
					$tot+=$r->amount;
				@endphp	
					
				@endforeach
			<tr class="sub-title-2"><td class="col-w-60 br-right" >Total</td><td class="br-right">&nbsp;</td>
			<td width="30px;">{{$r->currency}}</td>
			<td class="pr-1" style="text-align:right;font-weight:500;" >
			
			@if($row->id!=4)
					{{number_format($tot,2,'.',',')}}
			@else
				<span style="padding-right:20px;">-</span>
			@endif
		</td></tr>
			</table>
		@endif
		
		@endforeach
		
		@php
		$net_total=$prop->total_amount-$prop->discount;
		@endphp
		
		<table class="tb-border mt-1"  style="width:100%;" cellspacing=0>
		<tr class="sub-title-2"><td >Sub Total</td><td class="pr-1" style="width:195px;text-align:right;font-weight:500;" >{{$r->currency}}&nbsp;&nbsp;&nbsp;{{number_format($prop->total_amount,2,'.',',')}}</td></tr>
		</table>
		
		<table class="tb-border mt-1" style="width:100%;" cellspacing=0>
		<tr class="sub-title-2"><td >Discount</td><td  class="pr-1" style="width:195px;text-align:right;font-weight:500;" >{{$r->currency}}&nbsp;&nbsp;&nbsp;{{number_format($prop->discount,2,'.',',')}}</td></tr>
		</table>
		
		<table class="tb-border mt-1" style="width:100%;" cellspacing=0>
		<tr class="sub-title-2"><td ><b>Net Total<b></td><td  class="pr-1" style="width:195px;text-align:right;font-weight:500;" ><b>{{$r->currency}}&nbsp;&nbsp;&nbsp;{{number_format($net_total,2,'.',',')}}</b></td></tr>
		</table>
				
    
        <h2 class="sub-title f-weight mt-1">Special Services:</h2>
		
		<ul style="width:100%;">
		@foreach($data['special_service'] as $row)
            <li>{{$row->service_data}}</li>
		@endforeach
		</ul>

        <h2 class="sub-title f-weight mt-1">Other Services</h2>
        <table width="100%" style="border:.1rem solid #c4c4c4;">
        <tr><td>
		<ul style="margin-top:0px;">
		@foreach($data['other_service'] as $row)
            <li style="height:30px;">{{$row->other_service}}</li>
		@endforeach
		</td></tr></table>
	
	</div>

	</div>
	
	<div class="page" >
	
		
        <h2 class="sub-title f-weight mt-2" >Bank Details</h2>
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
		
		<h2 class="sub-title f-weight mt-1">Documents Required</h2>	
		
		<table width="100%" style="border:.1rem solid #c4c4c4;">
        <tr><td>
        <ul style="margin-top:0px;">
		@foreach($data['documents'] as $row)
		    <li>{{$row->document_value}}</li>
		@endforeach
        </ul>
		</td></tr></table>

        <h2 class="sub-title f-weight mt-1">Process & Timeline:</h2>
		<table width="100%" style="border:.1rem solid #c4c4c4;">
        <tr><td>
        <ul style="margin-top:0px;">
		@foreach($data['timeline'] as $row)
		    <li>{{$row->process_timeline}}</li>
		@endforeach
        </ul>
		</td></tr></table>
		
		<h2 class="sub-title f-weight mt-1">Notes:</h2>
		<table width="100%" style="border:.1rem solid #c4c4c4;">
        <tr><td>
        <ul style="margin-top:0px;">
		@foreach($data['notes'] as $row)
		    <li>{{$row->note}}</li>
		@endforeach
        </ul>
		</td><tr></table>

		</div>
				
	<div class="page" >

		<h2 class="sub-title f-weight ">Conditions:</h2>
		<div width="100%" style="font-size:12px !important;border:.1rem solid #c4c4c4;">
        <ul style="margin-top:0px;margin-bottom:0px;">
		@foreach($data['conditions'] as $row)
		    <li style="font-size:11px !important;margin:0px;padding:0px;line-height:18px !important;"><span style="color:{{$row->text_color}}">{{$row->condition}}</span></li>
		@endforeach
		</ul>
        </div>
		
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
