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
                            <h5>Update Bank Details</h5>
                        </div>
                        <div class="card-divider"></div>
                        <?php if($this->session->flashdata('msg')){ ?>
                            <?=$this->session->flashdata('msg');?>
                        <?php }?>
                        <div class="card-body card-body--padding--2">
                            <form action="<?=base_url('BuyerController/bank_details')?>" method="POST" role="form" onsubmit="return onSubmit()">
                                <?php foreach($banks as $user_list)
                                { 
                                    //echo $_SESSION['id'];
                                    //echo $user_list->buyer_id;die();

                                    if($user_list->buyer_id==$_SESSION['id'])
                                    {
                                        // echo $user_list->buyer_id;die;
                                        $acname=$user_list->ac_name;
                                        $ac_number=$user_list->ac_number;
                                        $ac_bank_name=$user_list->ac_bank_name;
                                        $branch_name=$user_list->branch_name;
                                        $ac_ifcs=$user_list->ac_ifcs;
                                        $upi_id=$user_list->upi_id;
                                        $buyer_id=$user_list->buyer_id;

                                      } }?>
                                <div class="row">
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="ac_name">Account Holder Name</label> 
                                            <input type="hidden" name="user_id" class="form-control" value="<?=$buyer_id?$buyer_id:$_SESSION['id']?>">
                                            <input type="text" name="ac_name" class="form-control" id="ac_name" placeholder="Account Holder Name" value="<?=$acname?>" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="ac_number">Account Number</label> 
                                            <input type="text" name="ac_number" class="form-control"  placeholder="e.g Account Number" value="<?=$ac_number?>" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="ac_bank_name">Bank Name</label> 
                                            <input type="text" name="ac_bank_name" class="form-control"  placeholder="e.g Bank Name" value="<?=$ac_bank_name?>" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="branch_name">Branch Name</label> 
                                            <input type="text" name="branch_name" class="form-control"  placeholder="e.g Branch Name" value="<?=$branch_name?>" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="ac_ifcs">IFSC Code</label> 
                                            <input type="text" name="ac_ifcs" class="form-control"  placeholder="e.g IFSC Code" value="<?=$ac_ifcs?>" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="upi_id">UPI Id (Optional)</label> 
                                            <input type="text" name="upi_id" class="form-control"  placeholder="e.g UPI ID (Optional)" value="<?=$upi_id?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12 col-xl-12">
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-primary mt-3" id="subbutton">Save Details</button>
                                        </div>
                                    </div>
                                </div>
                             
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>
<!-- site__body / end -->
<script>
    function onSubmit() {
      debugger;
    document.getElementById("subbutton").disabled = true; 
      $('#subbutton').html('Processing....');
}
  </script>

<!--  Start Footer Area -->
<?php include"footer.php"; ?>
<!-- End Footer Area -->	            