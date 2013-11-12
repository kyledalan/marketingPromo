var promos = promos|| {};

(function ($, namespace) {
	
	namespace.init = function() {
		var pageVars = getUrlVars(); 
		var userName = $.cookie('username');
		var userHasRedemed = $.cookie('userpromo');
		
		namespace.setupModals(); 

		if(pageVars['promocode']) { 
			if(userName && !userHasRedemed) {
				// show promo or window.location = '';
				$('.dialog.promo').find('[data-promo-id="' + pageVars['promocode'] + '"]').dialog('open');
			}
			else { 
				// show already received
				$('.dialog.promo.promo-thanks').dialog('open');
			}
		}
		else {
			if(!userName) {
				// show login 
				$('.dialog').dialog('close'); 
				$('.dialog.user-login').dialog('open');
			}
		}
	}
	
	namespace.getUser = function(username) {
		$.getJSON('./', {'user': username, 'action': 'get-user'}).done(function(json) {
			namespace.user = json; 
		}).fail(function(jqxhr, textStatus, error) {
			namespace.user = {}; 
		}); 
	}
	
	namespace.setupModals = function() {
		$('input[type="submit"], input[type="reset"]').button(); // style inputs

		// rules for dialogs
		var $dialogs = $('.dialog'); 
		$dialogs.dialog({modal: true, autoOpen: false, buttons: {}}); 
		
		$dialogs.find('.register').click(function() {
			$('.dialog.user-signin').dialog('close');
			$('.dialog.user-register').dialog('open');
		});
		$dialogs.find('.signin').click(function() {
			$('.dialog.user-register').dialog('close');
			$('.dialog.user-signin').dialog('open');
		});
		
		// action for submit buttons
		$('.dialog').find('input[type="submit"]').click(function() {
			var $this = $(this), button = $this.attr('name'), formVals = $this.parents('form').serialize(); 
			if(button == 'register') {
				var isValid = true;
//				allFields.removeClass('ui-state-error');
//				isValid = isValid && checkLength(name, 'username', 3, 16);
//				isValid = isValid && checkLength(email, 'email', 6, 80);
//				isValid = isValid && checkLength(password, 'password', 5, 16);
//				isValid = isValid && checkRegexp(name, /^[a-z]([0-9a-z_])+$/i, 'Username may consist of a-z, 0-9, underscores, begin with a letter.');
//				// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
//				isValid = isValid && checkRegexp(email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, 'eg. ui@jquery.com');
//				isValid = isValid && checkRegexp(password, /^([0-9a-zA-Z])+$/, 'Password field only allow : a-z 0-9');
				if(isValid) {
					$.post('./', formVals).done(function( data ) {
						console.log('result', data);
					}).fail(function(jqxhr, textStatus, error) {
						console.log(textStatus, error);
					})
				}
			}
			if(button == 'close') {
				$this.find('input').val('').removeClass('ui-state-error');
				$this.dialog('close');
			}
			return false; 
		});
	}
	
	function getUrlVars() {
		var vars = [], hash;
		var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
		for(var i = 0; i < hashes.length; i++)
		{
			hash = hashes[i].split('=');
			vars.push(hash[0]);
			vars[hash[0]] = hash[1];
		}
		return vars;
	}
	
	function checkLength(o, n, min, max) {
		if (o.val().length > max || o.val().length < min) {
			o.addClass('ui-state-error');
			updateTips('Length of ' + n + ' must be between ' +
				min + ' and ' + max + '.');
			return false;
		} else {
			return true;
		}
	}
 
	function checkRegexp(o, regexp, n) {
		if (!(regexp.test(o.val()))) {
			o.addClass('ui-state-error');
			updateTips(n);
			return false;
		} else {
			return true;
		}
	}
	
	
	namespace.init(); 

})(jQuery, promos);