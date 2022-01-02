@include('admin.header')

@isset ($header)
    @include('admin.sub_header.home')
@endisset

@isset ($view)
	@include('admin.content.'.$view)
@endisset

@include('admin.footer')
