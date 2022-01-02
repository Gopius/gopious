<div class=" pb-7 pb-xxl-1">
	@if (!$paginator->onFirstPage())
		<a href="{{$paginator->previousPageUrl()}}">
			<button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-9 float-left" id="kt_app_education_more_feeds_btn">Previous
			</button>
		</a>
		
	@endif
	@if ($paginator->hasMorePages()	)
		<a href="{{$paginator->nextPageUrl()}}">
			<button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-9 float-right" id="kt_app_education_more_feeds_btn">Next
			</button>
		</a>
	@endif
	
</div>