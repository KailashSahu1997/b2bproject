    function checkblank(id,typeoferror) 
    {
        let pw1 = $('#'+id).val();    
      if(pw1=='')  
      {   
        $('#error_'+id).html('The '+typeoferror+' field is Required');
        return false;
      } 
      else 
      {  
       $('#error_'+id).html('');
       return true;
      }  
    }


    function bank_detailsd()
    {
        let ac_name=$('#ac_name').val();
        let ac_number=$('#ac_number').val();
        let ac_bank_name=$('#ac_bank_name').val();
        let ac_ifcs=$('#ac_ifcs').val();
        let upi_id=$('#upi_id').val();
        let branch_name=$('#branch_name').val();
        let user_id=$('#buyer-reg-userid').val();
        if(checkblank('ac_name','Account name') || checkblank('ac_number','Account Number') || checkblank('ac_bank_name','Bank name') || checkblank('ac_ifcs','Ifcs Code') || checkblank('branch_name','Branch name'))
        {
            $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/post_array',
            dataType: "json",
            data: {ac_name:ac_name,ac_number:ac_number,ac_bank_name:ac_bank_name,ac_ifcs:ac_ifcs,upi_id:upi_id,branch_name:branch_name,user_id:user_id,posturl:'bank_details'},
            beforeSend: function() 
            {
                $("#loginbtn").css("visibility:none");
            },
            success: function (data) 
            {
                if(data.status==false)
                {
                   var text=data.message;
                   text.replace("\n", "<br>");
                    $('#error_bank_details').html(text);
                }
                else
                {
                    window.location.href = "buyer_login";
                }
            }
            });

        }
                  
    }


    
    function business_detailsd()
    {
        debugger;
        let company_name=$('#buyer-reg-company-name').val();
        let company_type=$('#buyer-reg-company-type').val();
        let office_address=$('#buyer-reg-office-address').val();
        let factory_address=$('#buyer-reg-factory-address').val();
        let city=$('#buyer-reg-city').val();
        let state=$('#buyer-reg-state').val();
        let area_pincode=$('#buyer-reg-pincode').val();
        let gst_no=$('#buyer-reg-gst').val();
        let pan_no=$('#buyer-reg-pan').val();
        let website=$('#buyer-reg-website').val();
        let check_term=$('#buyer-reg-check-term').val();
        let user_id=$('#buyer-reg-userid').val();
        checkblank('buyer-reg-company-name','Company Name');
        checkblank('buyer-reg-company-type','Type of Company');
        checkblank('buyer-reg-office-address','Office address');
        checkblank('buyer-reg-factory-address','Factory address');
        checkblank('buyer-reg-city','City');
        checkblank('buyer-reg-pincode','pincode');
        checkblank('buyer-reg-state','State');
        checkblank('buyer-reg-gst','GST Number');
        checkblank('buyer-reg-pan','PAN Number');
        debugger;
            $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/post_array',
            dataType: "json",
            data: {company_name:company_name,company_type:company_type,office_address:office_address,factory_address:factory_address,city:city,state:state,area_pincode:area_pincode,pan_no:pan_no,check_term:check_term,website:website,user_id:user_id,gst_no:gst_no,posturl:'business_details'},
            beforeSend: function() 
            {
                $("#loginbtn").css("visibility:none");
            },
            success: function (data) 
            {
                debugger;
                if(data.status==false)
                {
                   var text=data.message;
                   text.replace("\n", "<br>");
                    $('#error_business_details').html(text);
                }
                else
                {
                    $('#personal').hide();
                    $('#business_details').hide();
                    $('#bank_details').show();
                    $(".liforth").addClass("active");
                }
            }
            });      
    }

    function verify_email()
    {
        let otp=$('#buyer-email-otp').val();
        checkblank('buyer-email-otp','OTP');
            $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/post_array',
            dataType: "json",
            data: {otp:otp,posturl:'email_verify'},
            beforeSend: function() 
            {
                $("#loginbtn").css("visibility:none");
            },
            success: function (data) 
            {
                if(data.Success==false)
                {
                   var text=data.Message;
                   text.replace("\n", "<br>");
                    $('#error_buyer-email-otp').html(text);
                }
                else
                {
                    var regg=data.UserDetails;
                    $('#personal').hide();
                    $('#regiter_otp').hide();
                    $('#regiter_email').hide();
                    $('#buyer-reg-userid').val(regg.buyer_id);
                    $('#business_details').show();
                    $(".lithird").addClass("active");
                }
            }
            });       
    }
    function verify_mobile()
    {
        let otp=$('#buyer-reg-otp').val();
        checkblank('buyer-reg-otp','OTP');
            $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/post_array',
            dataType: "json",
            data: {otp:otp,posturl:'verify_otp'},
            beforeSend: function() 
            {
                $("#loginbtn").css("visibility:none");
            },
            success: function (data) 
            {
                if(data.Success==false)
                {
                   var text=data.Message;
                   text.replace("\n", "<br>");
                    $('#error_buyer-reg-otp').html(text);
                }
                else
                {
                    $('#personal').hide();
                    $('#regiter_otp').hide();
                    $('#regiter_email').show();
                    $(".liemail").addClass("active");
                }
            }
            });       
    }
    function personal_details()
    {
        let full_name=$('#buyer-reg-name').val();
        let email_id=$('#buyer-reg-email').val();
        let mobile_no=$('#buyer-reg-phone').val();
        let landline=$('#buyer-reg-landline').val();
        let password=$('#buyer-reg-password').val();
        checkblank('buyer-reg-name','Name');
        checkblank('buyer-reg-phone','Mobile');
        checkblank('buyer-reg-password','Password');
        checkblank('buyer-reg-email','Email');
        if(ValidateEmail(email_id))
        {
            $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/post_array',
            dataType: "json",
            data: {full_name:full_name,email_id:email_id,mobile_no:mobile_no,password:password,posturl:'personal_details'},
            beforeSend: function() 
            {
                $("#loginbtn").css("visibility:none");
            },
            success: function (data) 
            {
                if(data.status==false)
                {
                   var text=data.message;
                   text.replace("\n", "<br>");
                    $('#error_personal').html(text);
                }
                else
                {
                    $('#personal').hide();
                    $('#regiter_otp').show();
                    $(".lisecond").addClass("active");
                }
            }
            });
        }
        else
        {
            $('#error_buyer-reg-email').html('Please Enter Valide Email Address');
            return false;
        }       
    }
    function logins()
    {
        var email=$('#buyer-login-email').val();
        var password=$('#buyer-login-password').val();
        if(ValidateEmail(email))
        {
            
            $.ajax({
                type: 'post',
                url: '<?=base_url()?>/Welcome/logins',
                dataType: "json",
                data: {email_id:email,password:password},
                beforeSend: function() 
                {
                    $("#loginbtn").css("visibility:none");
                },
                success: function (data) 
                {
                     //console.log(data.Success);
                    if(data.Success==false)
                    {
                        //debugger;
                        // console.log(data.Message);
                        $('#error_msg').html(data.Message);
                    }
                    else
                    {
                        window.location.href = "buyer/dashboard";
                    }
                    //debugger;

                   
                }
              });
        }
        else
        {
            $('#error_email').html('Please Enter Valide Email Address');
        }   
    }
    function forgote()
    {
        let email=$('#buyer-forgot-email').val();
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/post_array',
            dataType: "json",
            data: {email:email,posturl:'forgot_password'},
            beforeSend: function() 
            {
                $("#loginbtn").css("visibility:none");
            },
            success: function (data) 
            {
                 //console.log(data.Success);
                if(data.Success==false)
                {
                    //debugger;
                    console.log(data.Message);
                    $('#error_forgote').html(data.Message);
                }
                else
                {
                    $('#buyer-forgot').hide();
                    $('#buyer-otp-forgot-mobile').val(email);
                    $('#buyer-otp-forgot').show();
                }
                //debugger;

               
            }
          });
    }   
    function resend_otp()
    {
        let email=$('#buyer-forgot-email').val();
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/post_array',
            dataType: "json",
            data: {email:email,posturl:'resend_otp'},
            beforeSend: function() 
            {
                $("#loginbtn").css("visibility:none");
            },
            success: function (data) 
            {
                if(data.Success==false)
                {
                    $('#error_forgote').html(data.Message);
                }
                else
                {
                     $('#success_otp').html(data.Message);
                }

               
            }
          });
    } 

    function otp_verify()
    {
        let otp=$('#otp-forgot').val();
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/post_array',
            dataType: "json",
            data: {otp:otp,posturl:'verify_otp'},
            beforeSend: function() 
            {
                $("#loginbtn").css("visibility:none");
            },
            success: function (data) 
            {
                //console.log()
                if(data.Success==false)
                {
                    $('#error_otp').html(data.Message);
                }
                else
                {
                    var main=data.UserDetails;
                    //console.log(main.buyer_id);
                    $('#buyer-otp-forgot').hide();
                    $('#user_id').val(main.buyer_id)
                    $('#buyer-new-password').show();
                     //$('#success_otp').html(data.Message);
                }

               
            }
          });
    } 


    function match_password() 
    {  
      var pw1 = $('#buyer-new-forgot').val();  
      var pw2 = $('#buyer-confirm-forgot').val();  
      if(pw1 != pw2)  
      {   
        return false;
      } 
      else 
      {  
       return true;  
      }  
    }

    function notblankpassword() 
    {  
      let pw1 = $('#buyer-new-forgot').val();    
      if(pw1=='')  
      {   
        $('#error_new_pass').html('Password is Required');
        return false;
      } 
      else 
      {  
       $('#error_new_pass').html('');
       return true;
      }  
    }  

    function confirnotblankpassword() 
    {  
      let pw1 = $('#buyer-confirm-forgot').val();    
      if(pw1=='')  
      {   
        $('#error_confirm_forgot').html('Confirm Password is Required');
        return false;
      } 
      else 
      {  
        $('#error_confirm_forgot').html('');
       return true;  
      }  
    }  

    function update_password()
    {
        let password=$('#buyer-new-forgot').val();
        let confirm_password=$('#buyer-confirm-forgot').val();
        let user_id=$('#user_id').val();
        confirnotblankpassword();
        notblankpassword();
        if(match_password())
        {
            $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/post_array',
            dataType: "json",
            data: {user_id:user_id,password:password,confirm_password:confirm_password,posturl:'new_password'},
            beforeSend: function() 
            {
                $("#loginbtn").css("visibility:none");
            },
            success: function (data) 
            {
                if(data.Success==false)
                {
                    $('#error_otp').html(data.Message);
                }
                else
                {
                    window.location.href = "buyer_login";
                }

               
            }
          });
        }
        else
        {
            $('#error_confirm_forgot').html('Password And Confirm Password is Not match');
        }  
    }   
function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(inputText.match(mailformat))
    {
        return true;
    }
    else
    {
        return false;
    }
}
