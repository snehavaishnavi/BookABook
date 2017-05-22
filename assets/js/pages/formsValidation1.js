/*
 *  Document   : formsValidation.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Forms Validation page
 */

var FormsValidation1 = function() {

    return {
        init: function() {
            /*
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */
             

            /* Initialize Form Validation */
            $('#progress-wizard').validate({
                errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'span',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                   // $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    //e.closest('.help-block').remove();
                },
                rules: {
                    fname: {
                        required: true,
                        minlength: 3
                    },
					lname: {
                        required: true,
                        minlength: 3
                    },					
                    l_email: {
                        required: true,
                        email: true
                    },
                    mobile: {
                        required: true,
						minlength: 12
                    },
					dob:{
						required: true
						//date:true						
					},
					gender:{
						required: true
						
					},
					college:{
						required: true
						
					},
					qualification:{
						required: true
						
					},
					stream:{
						required: true
						
					},
					ssc:{
						required: true,
						number:true
						
					},
					inter:{
						required: true,
						number:true
					},
					degree:{
						required: true,
						number:true
					},
					yearPassed:{
						required: true,
						digits:true,
						minlength:4,
						maxlength:4
					},
					source:{
						required: true
						
					},
                    val_confirm_password: {
                        required: true,
                        equalTo: '#val_password'
                    },
                    val_bio: {
                        required: true,
                        minlength: 5
                    },
                    val_skill: {
                        required: true
                    },
                    val_website: {
                        required: true,
                        url: true
                    },
                    val_credit_card: {
                        required: true,
                        creditcard: true
                    },
                    val_digits: {
                        required: true,
                        digits: true
                    },
                    val_number: {
                        required: true,
                        number: true
                    },
                    val_range: {
                        required: true,
                        range: [1, 1000]
                    },
                    val_terms: {
                        required: true
                    }
                },
                messages: {
                    fname: {
                        required: 'Please enter your first name',
                        minlength: 'Your first name must consist of at least 3 characters'
                    },
                    l_email: 'Please enter a valid email address',
					mobile: 'Please enter a valid number!',
					dob:'Please enter a valid date of birth',
                    val_password: {
                        required: 'Please provide a password',
                        minlength: 'Your password must be at least 5 characters long'
                    },
                    val_confirm_password: {
                        required: 'Please provide a password',
                        minlength: 'Your password must be at least 5 characters long',
                        equalTo: 'Please enter the same password as above'
                    },
                    val_bio: 'Don\'t be shy, share something with us :-)',
                    val_skill: 'Please select a skill!',
                    val_website: 'Please enter your website!',
                    val_credit_card: 'Please enter a valid credit card! Try 446-667-651!',
                    val_digits: 'Please enter only digits!',
                    val_number: 'Please enter a number!',
                    val_range: 'Please enter a number between 1 and 1000!',
                    val_terms: 'You must agree to the service terms!'
                }
            });
			$('#eventform-validation').validate({
                errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'span',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                   // $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    //e.closest('.help-block').remove();
                },
                rules: {
                    val_name: {
                        required: true,
                        minlength: 3
                    },
					val_location: {
                        required: true,
                        minlength: 3
                    },					
                    val_cutoff: {
                        required: true,
                        range: [50, 100]
                    },
					val_pass: {
                        required: true,
                        range: [2000, 2050]
                    },
					val_idpref: {
                        required: true,
                        minlength: 4,
						maxlength: 10
                    }
                },
                messages: {
                    val_name: {
                        required: 'Please enter your event name',
                        minlength: 'At least 3 characters'
                    },
                    val_location: 'Please enter a valid location',
					val_pass: 'Passouts in between 2000 and 2050!',
					val_cutoff: 'Cut-off in between 50 and 100!',
					val_idpref: {
                        required: 'Please enter ID Prefix',
                        minlength: 'ID Prefix must consist of at least 4 characters',
						maxlength: 'Your ID Prefix must not exceed 10 characters'
                    }
                }
            });
			$('#statusform-validation').validate({
                errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'span',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                   // $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    //e.closest('.help-block').remove();
                },
                rules: {
                    val_name: {
                        required: true,
                        minlength: 3
                    },
					val_displayname: {
                        required: true,
                        minlength: 3
                    },					
                    val_emailTemp: {
                        required: true
                    },
					val_state: {
                        required: true
                    },
					val_emaillabel: {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    val_name: {
                        required: 'Please enter the status name',
                        minlength: 'At least 3 characters'
                    },
                    val_displayname:{ 
						required: 'Please enter a display name',
						minlength: 'At least 3 characters'
					},
					val_emailTemp: 'Please select an email template',
					val_state:  'Please select a state',
					val_emaillabel	:{ 
						required: 'Please enter a email label',
						minlength: 'At least 3 characters'
					}			
                }
            });
			$('#emailform-validation').validate({
                errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'span',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                   // $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    //e.closest('.help-block').remove();
                },
                rules: {
                    val_name: {
                        required: true,
                        minlength: 3
                    },
					val_subject: {
                        required: true,
                        minlength: 3
                    },					
                    val_body: {
                        required: true,
                        minlength: 10
                    }
                },
                messages: {
                    val_name: {
                        required: 'Please enter the name',
                        minlength: 'At least 3 characters'
                    },
                    val_subject:{ 
						required: 'Please enter the subject',
						minlength: 'At least 3 characters'
					},
					val_body: { 
						required: 'Please enter the body',
						minlength: 'At least 10 characters'
					}				
                }
            });
			$('#personform-validation').validate({
                errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'span',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                   // $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    //e.closest('.help-block').remove();
                },
                rules: {
                    val_name: {
                        required: true,
                        minlength: 3
                    },
					val_username: {
                        required: true,
                        email:true
                    },					
                    val_role: {
                        required: true                        
                    },					
					val_password: {                        
                        required:true,
						minlength:5
                    }
                },
                messages: {
                    val_name: {
                        required: 'Please enter the name',
                        minlength: 'At least 3 characters'
                    },
                    val_username:{ 
						required: 'Please enter the username',
						minlength: 'At least 5 characters'
					},
					val_role: { 
						required: 'Please select a role'
						
					},	
					val_password: {                        
                        required: 'Please enter the password',
						minlength: 'At least 5 characters'
                    }				
                }
            });
			$('#commentsForm').validate({
                errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'span',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                   // $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    //e.closest('.help-block').remove();
                },
                rules: {
                    ptweet: {
                        required: true                        
                    },					                 
                    status: {
                        required: true
                    }
                },
                messages: {
                    
                    status: 'Please select the round',
					val_terms: 'You must agree to the service terms!'
                }
            });
			
			
			
			$('#progress-wizard1').validate({
                errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'span',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                   // $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    //e.closest('.help-block').remove();
                },
                rules: {
                    rID: {
                        required: true                        
                    }
                },
                messages: {
                    
                    rID: 'Registration ID cannot be null',
					val_terms: 'You must agree to the service terms!'
                }
            });
			
            // Initialize Masked Inputs
            // a - Represents an alpha character (A-Z,a-z)
            // 9 - Represents a numeric character (0-9)
            // * - Represents an alphanumeric character (A-Z,a-z,0-9)
			$('#mobile').mask('999-999-9999');
			//$('#dob').mask('dd/mm/yyyy');
            $('#masked_date').mask('99/99/9999');
            $('#masked_date2').mask('99-99-9999');
            $('#masked_phone').mask('(999) 999-9999');
            $('#masked_phone_ext').mask('(999) 999-9999? x99999');
            $('#masked_taxid').mask('99-9999999');
            $('#masked_ssn').mask('999-99-9999');
            $('#masked_pkey').mask('a*-999-a999');
        }
    };
}();