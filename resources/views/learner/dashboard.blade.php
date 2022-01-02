@include('learner.header')
<style type="text/css">
    .btn.btn-light-primary {
        color: {{Auth::guard('learner')->user()->organization->setting->color}}!important;
    }
    .svg-icon.svg-icon-primary svg g [fill] , .svg-icon.svg-icon-success svg g [fill] {
        fill: {{Auth::guard('learner')->user()->organization->setting->color}}!important;
    }
    .bg-success {
        background-color:{{Auth::guard('learner')->user()->organization->setting->color}}!important;
    }

	.header .header-top,
	.header-mobile
	 {
		background: {{Auth::guard('learner')->user()->organization->setting->color}}!important;
	}
	.header-menu .menu-nav > .menu-item.menu-item-active > .menu-link .menu-text
	 {
		color: {{Auth::guard('learner')->user()->organization->setting->color}}!important;
	}
	.btn.btn-primary,
	.btn.btn-success,
	.datatable.datatable-default > .datatable-pager > .datatable-pager-nav > li > .datatable-pager-link.datatable-pager-link-active
	 {
	    background-color: {{Auth::guard('learner')->user()->organization->setting->color}}!important;
	    border-color: {{Auth::guard('learner')->user()->organization->setting->color}}!important;
	}
	.text-primary, .text-success, .datatable.datatable-default > .datatable-table > .datatable-body .datatable-toggle-detail i {
	    color: {{Auth::guard('learner')->user()->organization->setting->color}}!important;
	}
	.wizard.wizard-1 .wizard-nav .wizard-steps .wizard-step[data-wizard-state="current"] .wizard-label .wizard-title {
	    color: {{Auth::guard('learner')->user()->organization->setting->color}}!important;
	}
	.wizard.wizard-1 .wizard-nav .wizard-steps .wizard-step[data-wizard-state="current"] .wizard-label .wizard-icon {
	    color: {{Auth::guard('learner')->user()->organization->setting->color}}!important;
	}
	.wizard.wizard-1 .wizard-nav .wizard-steps .wizard-step[data-wizard-state="current"] .wizard-arrow svg g [fill] {
	    fill: {{Auth::guard('learner')->user()->organization->setting->color}}!important;
	}
	.bg-primary {
		background-color: {{Auth::guard('learner')->user()->organization->setting->color}}!important;
	}
	.btn.btn-hover-text-primary:hover:not(.btn-text):not(:disabled):not(.disabled), .btn.btn-hover-text-primary:focus:not(.btn-text), .btn.btn-hover-text-primary.focus:not(.btn-text) ,.btn.btn-hover-icon-primary:hover:not(.btn-text):not(:disabled):not(.disabled) i, .btn.btn-hover-icon-primary:focus:not(.btn-text) i, .btn.btn-hover-icon-primary.focus:not(.btn-text) i , .btn.btn-clean:not(:disabled):not(.disabled):active:not(.btn-text), .btn.btn-clean:not(:disabled):not(.disabled).active, .show > .btn.btn-clean.dropdown-toggle, .show .btn.btn-clean.btn-dropdown, .btn.btn-clean:hover:not(.btn-text):not(:disabled):not(.disabled), .btn.btn-clean:focus:not(.btn-text), .btn.btn-clean.focus:not(.btn-text){
	    color: {{Auth::guard('learner')->user()->organization->setting->color}} !important;
	}
	@media (max-width: 991.98px){
		.header-menu-mobile .menu-nav > .menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover > .menu-heading .menu-text, .header-menu-mobile .menu-nav > .menu-item:not(.menu-item-parent):not(.menu-item-open):not(.menu-item-here):not(.menu-item-active):hover > .menu-link .menu-text {
		    color: {{Auth::guard('learner')->user()->organization->setting->color}} !important;
		}
	}

	@media (min-width: 992px){
		.header-menu .menu-nav > .menu-item:hover:not(.menu-item-here):not(.menu-item-active) > .menu-link .menu-text, .header-menu .menu-nav > .menu-item.menu-item-hover:not(.menu-item-here):not(.menu-item-active) > .menu-link .menu-text {
		    color: {{Auth::guard('learner')->user()->organization->setting->color}} !important;
		}
	}
	{{Auth::guard('learner')->user()->organization->setting->css}}
</style>
@isset ($header)
    @include('learner.sub_header.'.$header)
@endisset

@isset ($view)
	@include('learner.content.'.$view)
@endisset

@include('learner.footer')
