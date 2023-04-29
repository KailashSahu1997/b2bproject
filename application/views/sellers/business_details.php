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
                    <div class="card">
                        <div class="card-header">
                            <h5>Update Business Details</h5>
                        </div>
                        <div class="card-divider"></div>
                        <?php if($this->session->flashdata('msg')){ ?>
                            <?=$this->session->flashdata('msg');?>
                        <?php }?>
                        <div class="card-body card-body--padding--2">
                            <form action="<?=base_url('SellerController/updated_business_detail')?>" method="POST" role="form" onsubmit="return onSubmit()">
                                <?php foreach($buyer as $user_list)
                                { 
                                    if($user_list->seller_id==$_SESSION['id'])
                                        {?>
                                <div class="row">
                                   
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="email-address">Company Type</label> 
                                            <select class="form-control-select2" name="company_type">
                                                <option value="Manufacturer" <?php if($user_list->company_type=='Manufacturer'){ echo "selected"; }?>>Manufacturer</option>
                                                <option value="Trader" <?php if($user_list->company_type=='Trader'){ echo "selected"; }?>>Trader</option>
                                                <option value="Agent" <?php if($user_list->company_type=='Agent'){ echo "selected"; }?>>Agent</option>
                                                <option value="End user" <?php if($user_list->company_type=='End user'){ echo "selected"; }?>>End user</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="gst_no">GST Number</label> 
                                            <input type="text" name="gst_no" class="form-control"  placeholder="e.g gst no"  value="<?=$user_list->gst_no?>" id="buyer-reg-gst" onkeyup="verify_gst()">
                                        </div>
                                    </div>
                                     <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="full-name">Company Name</label> 
                                            <input type="hidden" name="user_id" class="form-control" value="<?=$user_list->seller_id?$user_list->seller_id:$_SESSION['id']?>">
                                            <input type="text" name="company_name" class="form-control" placeholder="e.g John Due" required value="<?=$user_list->company_name?$user_list->company_name:$_SESSION['company_name']?>" readonly id="buyer-reg-company-name">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="pan_no">PAN Number</label> 
                                            <input type="text" name="pan_no" class="form-control"  placeholder="e.g pan no"  value="<?=$user_list->pan_no?>" readonly id="buyer-reg-pan">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="mobile_no">Office Address</label> 
                                           <textarea class="form-control" name="office_address" rows="4"><?=$user_list->office_address?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="mobile_no">Factory / Warehouse Address</label> 
                                           <textarea class="form-control" name="factory_address" rows="4"><?=$user_list->factory_address?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="city">City</label> 
                                            <input type="text" name="city" class="form-control"  placeholder="e.g Mumbai, Maharashtra" value="<?=$user_list->city?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="state">State</label> 
                                            <select class="form-control-select2" name="state">
                                                <?php foreach($state as $st){?>
                                                <option value="<?=$st?>" <?php if($user_list->state==$st){ echo 'selected'; }?>><?=$st?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="area_pincode">Pincode</label> 
                                            <input type="number" name="area_pincode" class="form-control"  placeholder="e.g Pin code" value="<?=$user_list->area_pincode?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="website">Website (Optional)</label> 
                                            <input type="text" name="website" class="form-control"  placeholder="e.g website " value="<?=$user_list->website?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12 col-xl-12">
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-primary mt-3" id="subbutton">Save Details</button>
                                        </div>
                                    </div>
                                </div>
                            <?php } }?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>
<script>
    function onSubmit() {
      debugger;
    document.getElementById("subbutton").disabled = true; 
      $('#subbutton').html('Processing....');
}
  </script>
<!-- site__body / end -->	 
<script>
    function verify_gst() 
    {
        let gst_no=$('#buyer-reg-gst').val();
        if(gst_no.length>=15)
        {
            $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/verify_gst',
            dataType: "json",
            data: {gst_no:gst_no},
            success: function (data) 
            {
                debugger;
                if(data.error==true)
                {
                   var text=data.message;
                   text.replace("\n", "<br>");
                    $('#buyer-reg-gst').html(text);
                }
                else
                {
                    let newobj=data.taxpayerInfo;
                    let pan_no=newobj.panNo;
                    let company_name=newobj.tradeNam;
                    
                    $('#buyer-reg-company-name').val(company_name);
                    $('#buyer-reg-pan').val(pan_no);
                }
            }
            });
        }
    }
</script>            