var crm_field_masks = new CRMFieldMasks();

$(document).ready(function(){
	//	alert('here');

   // a way to check to make sure selector is working
	crm_field_masks.selector_check();
	crm_field_masks.run();

	//	alert('there');
});

function CRMFieldMasks()
{
	that        = this;
	this.debug  = false;
	this.cache  = [];

	this.dependency = 'custom/Extension/application/crm_field_masks/jquery.inputmask.bundle.min.js';

	this.cache_and_log = function(name, value)
	{
		if(this.debug)
		{	this.cache[name] = value;
			console.log('CRMMASKS - ' + name + ' = ' + value );
		}
	}

	this.selector_check = function()
	{
		if(this.debug)
		{	this.cache_and_log('selector_check - begin', true );
			$('input[name*="phone"]').css('color','#00f !important');  
			this.cache_and_log('selector_check - end', true );
		}
	}

	this.run = function()
	{
		this.cache_and_log('run - begin', true );
		dependency = this.dependency;

		// load dependencies
		$.getScript(dependency)
			.done(function( script, textStatus )
			{
				that.apply_masks();
				that.cache_and_log( 'dependency loaded', dependency );
			})
			.fail(function( jqxhr, settings, exception )
			{
				that.cache_and_log( 'dependency failed to load', dependency );
			});

		this.cache_and_log('run - end', true );
	}

	this.apply_masks = function()
	{
		this.cache_and_log('apply_masks - begin', true );

		$('input[name*="phone"]').inputmask({"mask": "(999) 999-9999 x999999"}); //specifying options
		$('input[name*="fax"]').inputmask({"mask": "(999) 999-9999 x999999"}); //specifying options

		this.cache_and_log('apply_masks - end', true );
	}

};
