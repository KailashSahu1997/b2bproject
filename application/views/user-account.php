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
                    <div class="card">
                        <div class="card-header">
                            <h5>Update Profile</h5>
                        </div>
                        <div class="card-divider"></div>
                        <?php if($this->session->flashdata('msg')){ ?>
                            <?=$this->session->flashdata('msg');?>
                        <?php }?>
                        <div class="card-body card-body--padding--2">
                            <form action="<?=base_url('update_personal_detail')?>" method="POST" role="form" onsubmit="return onSubmit()">
                                <?php foreach($buyer as $user_list)
                                { 
                                    if($user_list->buyer_id==$_SESSION['id'])
                                    {
                                        $companyname=$user_list->company_name;
                                        ?>
                                <div class="row">
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="full-name">Owner Name</label> 
                                            <input type="hidden" name="user_id" class="form-control" required value="<?=$user_list->user_id?$user_list->user_id:$_SESSION['id']?>">
                                            <input type="text" name="full_name" class="form-control" id="full-name" placeholder="e.g John Due" required value="<?=$user_list->full_name?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="email-address">Email Address</label> 
                                            <input type="text" name="email_id" class="form-control" id="email-address" placeholder="e.g example@gmail.com" required value="<?=$user_list->email_id?$user_list->email_id:$_SESSION['email_id']?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="mobile_no">Mobile Number</label> 
                                            <input type="text" name="mobile_no" class="form-control" id="mobile_no" placeholder="e.g 12345 67890" required value="<?=$user_list->mobile_no?$user_list->mobile_no:$_SESSION['mobile_no']?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="landline_no">Landline No (Optional)</label> 
                                            <input type="text" name="landline_no" class="form-control" id="landline_no" placeholder="e.g 020 -  222222" value="<?=$user_list->landline_no?$user_list->landline_no:$_SESSION['landline_no']?>">
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
<?php foreach($banks as $bank)
        { 
        if($bank->buyer_id==$_SESSION['id'])
        {
            // echo $bank->buyer_id;die;
            $acname=$bank->ac_name;

          } }?>
<!-- site__body / end -->
<div id="myModal1" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="padding: 24px 24px 10px;">
                <h5 class="modal-title">Show Reason</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="padding: 40px;">
                <p>Submit all required registration details (Bank Details, Company Details, GST verification, Personal Details). After submission, your account will get activated within 24 hours.</p>
            </div>
            <div class="modal-footer" style="padding:10px">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <?php if(empty($companyname)){?>
                <button type="button" class="btn btn-danger" onclick="window.location.href='<?=base_url()?>buyer/business-details'">OK</button>
                <?php }else{?>
                <button type="button" class="btn btn-danger" onclick="window.location.href='<?=base_url()?>buyer/bank-details'">OK</button>
                <?php }?>
            </div>
        </div>
    </div>
</div>

<!--  Start Footer Area -->
<?php include"footer.php"; ?>
<!-- End Footer Area -->	
<?php if(empty($companyname)){?> 
<script>
    $(window).on('load', function() {
        debugger;
        $('#myModal1').modal('show');
    });
</script> 
<?php }?>          