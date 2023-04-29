<!-- site__body -->
<div class="site__body bg-gray bg-1" style="background-image: url(<?=base_url()?>assets/website/images/bg-1.png);">
    <div class="block-space block-space--layout--after-header"></div>
    <div class="block">
        <div class="container container--max--xl">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <?php $this->load->view("navigation"); ?>
                </div>
                <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                    <div class="pricing-tables content-area">
                        <h5 class="text-center mb-4" style="margin-left:9%">Membership Subscriptions</h5>
                        <div class="row">
                            <div class="col-sm-12 col-lg-4 col-md-4 text-center"></div>
                            <?php $i=0; foreach($servicecharge as $list){?>
                            <div class="col-sm-12 col-lg-5 col-md-5">
                                <div class="pricing featured outline">
                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                    </div>
                                    <div class="price-header price-header-2">
                                        <input type="hidden" id="package_id<?=$i?>" value="<?=$list->id?>">
                                        <input type="hidden" id="seller_id<?=$i?>" value="<?=$_SESSION['id']?>">
                                        <input type="hidden" id="total_pay<?=$i?>" value="<?=$list->total_price?>">
                                        <input type="hidden" id="validity<?=$i?>" value="<?=$list->validity?>">
                                        <input type="hidden" id="package_name<?=$i?>" value="<?=$list->package_name?>">
                                        <div class="title"><?=$list->package_name?></div>
                                        <div class="price">₹ <?=$list->price?></div>
                                        <div class="title"><?=$list->validity?></div>
                                    </div>
                                    <div class="content">
                                        <table class="table" style="border:none;">
                                            <tr style="border:none;">
                                                <td>GST : <?=$list->gst?> %</td>
                                                <td>GST Amount: ₹ <?=$list->gst_price?></td>
                                            </tr>
                                            <tr style="border:none;">
                                                <td>CGST : <?=$list->cgst?> %</td>
                                                <td>CGST Amount: ₹ <?=$list->cgst_price?></td>
                                            </tr>
                                            <tr style="border:none;">
                                                <td>SGST: <?=$list->sgst?> %</td>
                                                <td>SGST Amount: ₹ <?=$list->sgst_price?></td>
                                            </tr>
                                        </table>
                                        <ul>
                                            <li>GST Total Amount: ₹ <?=$list->gst_price?></li>
                                            <li style="color:#000"><h6>Total Payable Amount: ₹ <?=$list->total_price?></h6></li>
                                        </ul>
                                        <b>Package Details</b>
                                        <p><?=$list->description?></p>
                                        <div class="button"> 
                                            <?php if($membership[0]->expire_date)
                                            {
                                            if(strtotime($membership[0]->expire_date)<strtotime(date('Y-m-d H:i:s'))){?>
                                                <a onclick="payments('<?=$i?>')" class="btn btn-sm btn-outline-danger">Renew Subscription</a>
                                            <?php }else{?>
                                                <a class="btn btn-sm btn-outline-danger">Already Purchased MemberShip</a>
                                            <?php } }else{?>
                                           <a onclick="payments('<?=$i?>')" class="btn btn-sm btn-outline-danger">Subscribe Now</a>
                                            <?php }?>
                                        </div>
                                       <!--  <p class="validity">*This Plan Validity : 3 Months</p> -->
                                    </div>
                                </div>
                            </div>
                            <?php $i++; }?>
                            <div class="col-sm-12 col-lg-3 col-md-3 text-center"></div>
                            <!-- <div class="col-sm-12 col-lg-4 col-md-4">
                                <div class="pricing featured outline">
                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                    </div>
                                    <div class="price-header price-header-2">
                                        <div class="title">Deluxe Plan</div>
                                        <div class="price">₹.2500</div>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li>For the verification of user’s identity, eligibility etc. and for registration of the user and to provide customized services to the users.</li>
                                            <li>For facilitating the services offered/available on the Website.</li>
                                            <li>For advertising, marketing, displaying & publication.</li>
                                        </ul>
                                        <div class="button"><a href="#" class="btn btn-sm btn-danger">Subscribe Now</a></div>
                                        <p class="validity">*This Plan Validity : 6 Months</p>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-sm-12 col-lg-4 col-md-4">
                                <div class="pricing">
                                    <div class="price-header">
                                        <div class="title">Premium Plan</div>
                                        <div class="price">₹.3500</div>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li>For the verification of user’s identity, eligibility etc. and for registration of the user and to provide customized services to the users.</li>
                                            <li>For facilitating the services offered/available on the Website.</li>
                                            <li>For advertising, marketing, displaying & publication.</li>
                                        </ul>
                                        <div class="button"><a href="#" class="btn btn-sm btn-outline-danger">Subscribe Now</a></div>
                                        <p class="validity">*This Plan Validity : 12 Months</p>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>
<!-- site__body / end -->          

<!-- payment gateway integration -->
 <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    function payments(id)
    {
        var total_pay=$('#total_pay'+id).val();
        var package_id=$('#package_id'+id).val();
        var seller_id=$('#seller_id'+id).val();
        var validity=$('#validity'+id).val();
        var package_name=$('#package_name'+id).val();
        var service_id=id;
        debugger;
        $.ajax({
            url:"<?=base_url()?>SellerController/generateRazorpayOrder",
            data:{total_pay:total_pay},
            method: "post",
            success:function(data)
            {
                $('#place_order_btn').removeAttr('disabled');
                $('#place_order_btn').text("Place Order");

                console.log(data);
                var result = JSON.parse(data);
                if(result.status=='success')
                {
                    makePayment(total_pay, result.rpay_order_id,package_id,seller_id,validity,package_name);
                }
                else
                {
                    
                }
            }
        });
    }
    function makePayment(total_amount, rpay_order_id,package_id,seller_id,validity,package_name){
        var options = {
            "key": "<?=RAZORPAY_KEYID?>", // Enter the Key ID generated from the Dashboard
            "amount": (total_amount*100), // Amount is in currency subunits. 
            "currency": "INR",
            "name": "Allmetalika",
            "description": "Allmetalika",
            "image": "<?=base_url()?>assets/website/images/logo/main-logo.svg",
            "order_id": rpay_order_id,
            "handler": function (response)
            {         
                completeOrder(rpay_order_id, response.razorpay_payment_id,package_id,seller_id,validity,package_name,total_amount);
            },
            "prefill": {
                "name": "<?=$_SESSION['full_name']?>",
                "email": "<?=$_SESSION['email_id']?>",
                "contact": "<?=$_SESSION['mobile_no']?>"
            },
            "theme": {
                "color": "#c21205"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    }

    
function completeOrder(rpay_order_id, razorpay_payment_id,package_id,seller_id,validity,package_name,total_amount){
    $.ajax({
            url:"<?=base_url()?>SellerController/completeOrder",
            data:{price:total_amount, transection_id:razorpay_payment_id,package_id:package_id,seller_id:seller_id,validity:validity,package_name:package_name},
            method: "post",
            success:function(data){
                var result = JSON.parse(data);
                if(result.status=='success')
                {
                    window.location.href=result.redirect_url;
                }
                else
                {
                    
                }
            }
        });
}
</script>
<!-- end payment gateway integration -->            