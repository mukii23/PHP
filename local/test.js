/**
 * AJAX SHORTHAND
 * 
 * **/
var ajaxurl = 'https://DomainName.com/wp-admin/admin-ajax.php';

/* 
 ***Validate Phone number input field.
 ***Prevent user to enter the characters.
 */

jQuery('#listing_phone').focus(function(){
       
            jQuery(this).keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
//                jQuery("#errmsg").html("Digits Only").show().fadeOut("slow");
                return false;
            }
        });
       
        
        jQuery(this).attr('minlength','10');
        jQuery(this).attr('maxlength','10');
});

/* 
 ***Validate EMAIL input field.
 ***Prevent user to enter the wrong emails.
 */

jQuery('#listing_mail').focus(function(){

}).blur(function(){
    var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var is_email=re.test(jQuery(this).val());
    if(!is_email){
        confirm('Wrong email entered.');
    }
});


/**** Validation SOCIAL URL'S ****/

jQuery('#listing_twitter_url').focus(function(){
    jQuery(this).attr('pattern','^(http:\/\/|https:\/\/)(www\.twitter\.com|twitter\.com)\/([\w\/]+)([.,\?].*)?$');
});

/**** Validation Password URL'S
 * Atleast One Special Character
 * Atleast One Small Character
 * Atleast One Capital Character
 * Atleast One Numeric Digit
 * Minimum 4 Maximum 15 Characters
 *****/

jQuery('#listing_password_url').focus(function(){
    jQuery(this).attr('pattern','(?=^.{4,15}$)((?!.*\s)(?=.*[A-Z])(?=.*[a-z])(?=(.*\d){1,}))(?=.*[~!@#$%^&*()_+[}{;"?/])^.*$');
});


/***
 * ON SCROLL JQUERY
 ***/

jQuery(document).scroll(function(){
        if(jQuery(document).scrollTop() > 50){
            // CODE
            
        }else{
            // CODE
        }
  });
