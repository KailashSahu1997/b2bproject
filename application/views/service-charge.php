<!--  Start Header Area -->
<?php include"header.php"; ?>
<!-- End Header Area -->

            
<!-- site__body -->
<div class="site__body bg-gray bg-1" style="background-image: url(<?=base_url()?>assets/website/images/bg-1.png);">
    <div class="block-space block-space--layout--after-header"></div>
    <div class="block">
        <div class="container container--max--xl">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <?php include"navigation.php"; ?>
                </div>
                <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                    <div class="pricing-tables content-area">
                        <h5 class="text-center mb-4">Service Charges</h5>
                        <div class="row">
                            <div class="col-sm-12 col-lg-4 col-md-4 text-center"></div>
                            <?php $i=0; foreach($servicecharge as $list){?>
                            <div class="col-sm-12 col-lg-5 col-md-5 text-center">
                                <div class="pricing featured outline">
                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                    </div>
                                    <div class="price-header price-header-2">
                                        <div class="title">Service Charges</div>
                                        <div class="price">₹ <?=$list->service_charges?></div>
                                    </div>
                                    <div class="content">
                                        <input type="hidden" id="buyer_id<?=$i?>" value="<?=$buyer_id?>">
                                        <input type="hidden" id="seller_id<?=$i?>" value="<?=$seller_id?>">
                                        <input type="hidden" id="total_pay<?=$i?>" value="<?=ceil($list->total_price)?>">
                                        <input type="hidden" id="service_charge<?=$i?>" value="<?=$list->service_charges?>">
                                        <input type="hidden" id="bidding_id<?=$i?>" value="<?=$biddin_id?>">
                                        <ul>
                                            <li>CGST: <?=$list->cgst?> %</li>
                                            <li>SGST: <?=$list->sgst?> %</li>
                                            <li>Total GST:<?=$list->gst?> %</li>
                                            <li>CGST Amount: Rs <?=$list->cgst_price?></li>
                                            <li>SGST Amount: Rs <?=$list->sgst_price?></li>
                                            <li>GST Total Amount: Rs <?=$list->gst_price?></li>
                                            <li style="color:#000"><b>Total Payable Amount: Rs <?=ceil($list->total_price)?></b></li>
                                        </ul>
                                        <div class="button">
                                            <a onclick="payments('<?=$i?>')" class="btn btn-sm btn-outline-danger" id="subbutton<?=$i?>">Pay Now</a>
                                        </div>
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
        var buyer_id=$('#buyer_id'+id).val();
        var seller_id=$('#seller_id'+id).val();
        var bidding_id=$('#bidding_id'+id).val();
        var service_charge=$('#service_charge'+id).val();
        var service_id=id;
        debugger;
         document.getElementById("subbutton"+id).disabled = true; 
      $('#subbutton'+id).html('Processing....');
        $.ajax({
            url:"<?=base_url()?>BuyerController/generateRazorpayOrder",
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
                    makePayment(total_pay, result.rpay_order_id,buyer_id,seller_id,bidding_id,service_charge);
                }
                else
                {
                    
                }
            }
        });
    }
    function makePayment(total_amount, rpay_order_id,buyer_id,seller_id,bidding_id,service_charge){
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
                completeOrder(rpay_order_id, response.razorpay_payment_id,buyer_id,seller_id,bidding_id,service_charge,total_amount);
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

    
function completeOrder(rpay_order_id, razorpay_payment_id,buyer_id,seller_id,bidding_id,service_charge,total_amount){
    $.ajax({
            url:"<?=base_url()?>BuyerController/completeOrder",
            data:{amount:total_amount, transection_id:razorpay_payment_id,buyer_id:buyer_id,seller_id:seller_id,bidding_id:bidding_id,service_charge:service_charge},
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


<!--  Start Footer Area -->
<?php include"footer.php"; ?>
<!-- End Footer Area -->	            