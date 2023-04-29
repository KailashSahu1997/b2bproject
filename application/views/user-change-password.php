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
                            <h5>Update Password</h5>
                        </div>
                        <div class="card-divider"></div>
                        <div class="card-body card-body--padding--2">
                            <form action="<?=base_url('BuyerController/password_change')?>" method="POST" role="form" onsubmit="return onSubmit()">
                                <div class="row align-item-center">
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="current-password">Current Password</label> 
                                            <input type="hidden" name="user_id" class="form-control" value="<?=$_SESSION['id']?>">
                                            <input type="password" class="form-control" id="current-password" placeholder="e.g *************" required="" name="old_password">
                                            <span toggle="#current-password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="new-password">New Password</label> 
                                            <input type="password" class="form-control" id="new-password" placeholder="e.g *************" required="" name="new_password">
                                            <span toggle="#new-password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm-password">Confirm Password</label> 
                                            <input type="password" class="form-control" id="confirm-password" placeholder="e.g *************" required="" name="confirm-password">
                                            <span toggle="#confirm-password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div>
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-primary mt-3" id="subbutton">Change Password</button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 col-xl-6">
                                        
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