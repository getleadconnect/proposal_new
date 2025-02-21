@php
$mnu=request()->segment(3);
@endphp

<div class="align-items-start">

  <div class="nav flex-column nav-pills me-3 pro-head " id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a href="{{route('users.proposal-banners')}}"  class="form-control nav-link text-left @if($mnu=='banners') active @endif"  type="button" ><i class="fa fa-caret-right"></i>&nbsp;&nbsp;Proposal Banner</a>
	<a href="{{route('users.proposal-value-headings')}}"  class="form-control nav-link text-left @if($mnu=='value-headings') active @endif"  type="button" ><i class="fa fa-caret-right"></i>&nbsp;&nbsp;Heading-Phases</a>
	<a href="{{route('users.proposal-headings')}}"  class="form-control nav-link text-left @if($mnu=='headings') active @endif"  type="button" ><i class="fa fa-caret-right"></i>&nbsp;&nbsp;Other Headings</a>
	<a href="{{route('users.proposal-heading-items')}}" class="form-control nav-link text-left @if($mnu=='heading-items') active @endif" type="button" ><i class="fa fa-caret-right"></i>&nbsp;&nbsp;Heading Items</a>
	<a href="{{route('users.proposal-special-services')}}"><button class=" form-control nav-link text-left @if($mnu=='special-services') active @endif"  type="button" ><i class="fa fa-caret-right"></i>&nbsp;&nbsp;Special Services</button></a>
	<a href="{{route('users.proposal-other-services')}}"><button class="form-control nav-link text-left @if($mnu=='other-services') active @endif"  type="button" ><i class="fa fa-caret-right"></i>&nbsp;&nbsp;Other Services</button></a>
	<a href="{{route('users.proposal-bank-details')}}"><button class="form-control nav-link text-left @if($mnu=='bank-details') active @endif"  type="button" ><i class="fa fa-caret-right"></i>&nbsp;&nbsp;Bank Details</button><a/>
	<a href="{{route('users.proposal-documents')}}"><button class="form-control nav-link text-left @if($mnu=='documents') active @endif"  type="button" ><i class="fa fa-caret-right"></i>&nbsp;&nbsp;Documents Required</button></a>
	<a href="{{route('users.proposal-process-timelines')}}"><button class="form-control nav-link text-left @if($mnu=='timelines') active @endif"  type="button" ><i class="fa fa-caret-right"></i>&nbsp;&nbsp;Process & Timeline</button></a>
	<a href="{{route('users.proposal-notes')}}"><button class="form-control nav-link text-left @if($mnu=='notes') active @endif"  type="button" ><i class="fa fa-caret-right"></i>&nbsp;&nbsp;Notes</button></a>
	<a href="{{route('users.proposal-conditions')}}"><button class="form-control nav-link text-left @if($mnu=='conditions') active @endif"  type="button" ><i class="fa fa-caret-right"></i>&nbsp;&nbsp;Terms & Conditions</button></a>
  </div>
    
</div>