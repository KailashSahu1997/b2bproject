<div class="account-nav flex-grow-1">
    <!-- <h4 class="account-nav__title">Navigation</h4> -->
    <div class="user_info_block">
    <div class="d-flex align-items-center">
        <div class="icon-area">
            <img class="img-fluid" src="<?=base_url()?>assets/website/images/avtaar.png" alt="icon">
        </div>
        <div class="content-area">
            <h5>Hi, <?=$_SESSION['full_name']?></h5>
            <!-- <p class="mb-0">Manufacturer in Delhi</p> -->
        </div>
    </div>
    </div>
    <ul id="NavMenu" class="account-nav__list">
        <!-- Buyer Navigation -->
        <?php if($this->session->userdata('issaller'))
        {
            $type_url='seller';
        }
        else
        {
            $type_url='buyer';
        }?>
        <li class="account-nav__item"><a href="<?=base_url()?><?=$type_url?>/account"><i class="fad fa-th-large mr-2"></i>Personal Info</a></li>
        <li class="account-nav__item"><a href="<?=base_url()?><?=$type_url?>/business-details"><i class="fad fa-th-large mr-2"></i>Business Details</a></li>
        
        <li class="account-nav__item"><a href="<?=base_url()?><?=$type_url?>/bank-details"><i class="fad fa-th-large mr-2"></i>Bank Details</a></li>
        <li class="account-nav__item"><a href="<?=base_url()?><?=$type_url?>/change-password"><i class="fad fa-key mr-2"></i>Change Password</a></li>
    <?php if(!$this->session->userdata('issaller'))
    {

         $allbuyer=getbuyerparame('buyers_list');
         $buyerlist=$allbuyer->buyers;
         // check buyer approve or not approve by admin
         foreach($buyerlist as $rowss)
         {
            if($rowss->buyer_id==$_SESSION['id'])
            {
                if($rowss->status=='0')
                {
                     $checkactive="approved";
                }
                else
                {
                    $checkactive="notapproved";
                }

            }
         }
        // check order are complete or not from given date
        // $orderlists=getbuyeroneparame('buyer_order_history',$_SESSION['id']);
        // foreach($orderlists->buyer_order_history as $list)
        //  {
        //     //echo $list->expiry_date;
        //     if(strtotime($list->expiry_date)<strtotime(date('Y-m-d H:i:s')))
        //     {
               
                // $requirement_id=$list->requirement_uid;
                $checkcompleted="compeleted";

         //    }
         // }
?>
<?php 
$allbank=getbuyerparame('bank_list');
$banks=$allbank->buyers_bank_details;

foreach($banks as $bank)
    { 
        if($bank->buyer_id==$_SESSION['id'])
        {
            $acname=$bank->ac_name;

        } 
    }

    $allbuyer=getbuyerparame('buyers_list');
    $buyer=$allbuyer->buyers;
    foreach($buyer as $user_list)
    { 
        if($user_list->buyer_id==$_SESSION['id'])
        {
            $companyname=$user_list->company_name;
        }
    }

          ?>         
        <li class="account-nav__item">
            <?php if(empty($companyname)){?>
                 <a data-toggle="modal" data-target="#companyModal" data-placement="top"><i class="fad fa-comment-alt-edit mr-2"></i>Post Requirement</a>
            <?php //}elseif(empty($acname)){?>
                <!--  <a data-toggle="modal" data-target="#accountModal"><i class="fad fa-comment-alt-edit mr-2"></i>Post Requirement</a> -->
            <?php }elseif($checkactive=="notapproved"){?>
                <a data-modal-trigger="myModal" data-toggle="tooltip" data-placement="top"><i class="fad fa-comment-alt-edit mr-2"></i>Post Requirement</a>
            <?php }elseif($checkcompleted=='not compeleted'){?>
                 <a data-modal-trigger="notcompeleted" data-toggle="tooltip" data-placement="top"><i class="fad fa-comment-alt-edit mr-2"></i>Post Requirement</a>
                 <script src="<?=base_url()?>assets/website/vendor/jquery/jquery.min.js"></script>
                 <!-- <input type="hidden" id="requirement_id" value="<?=$requirement_id?>"> -->
            <?php }else{?>
                <a href="<?=base_url('buyer/post-requirement')?>"><i class="fad fa-comment-alt-edit mr-2"></i>Post Requirement</a>
            <?php }?>
        </li>
        <li class="account-nav__item"><a href="<?=base_url()?><?=$type_url?>/requirement"><i class="fad fa-comment-alt-lines mr-2"></i>My Requirement</a></li>
        <li class="account-nav__item"><a href="<?=base_url()?><?=$type_url?>/bids"><i class="fad fa-layer-group mr-2"></i>My Quotation</a></li>
        <li class="account-nav__item"><a href="<?=base_url('buyer/order-history')?>"><i class="fad fa-receipt mr-2"></i>Order Details</a></li>
        <li class="account-nav__item"><a href="<?=base_url('buyer/compeleted-order')?>"><i class="fad fa-box-open mr-2"></i>Completed Orders</a></li>
        <!-- <li class="account-nav__item"><a href="<?=base_url('buyer/delete-account')?>"><i class="fad fa-box-open mr-2"></i>Account Delete</a></li> -->
    <?php }else{
        $allseller=getsallerparame('saller_list');
         $sellerlist=$allseller->sellers;

         // check seller approve or not approve by admin
         foreach($sellerlist as $selle)
         {
            if($selle->seller_id==$_SESSION['id'])
            {
                if($selle->status=='0')
                {
                     $checkactive="approved";
                }
                else
                {
                    $checkactive="notapproved";
                }
                $sellercompanyname=$selle->company_name;
            }
            
         }


          // check bank details blank or not
         $allbanks=getsallerparame('bank_list');
         $bankss=$allbanks->seller_bank_details;
         foreach($bankss as $banks)
         { 
            if($banks->seller_id==$_SESSION['id'])
            {
                $acnames=$banks->ac_name;

            } 
        }

          // check order are complete or not from given date
        // $orderseller=getsallerparame2('seller_order_history',$_SESSION['id']);
        // foreach($orderseller->seller_order_history as $lists)
        //  {
        //     //echo $list->expiry_date;
        //     if(strtotime($lists->expiry_date)<strtotime(date('Y-m-d H:i:s')))
        //     {
               
        //         $requirement_ids=$lists->requirement_uid;
        //         $checkcompleteds="not  compeleted";

                $checkcompleteds="compeleted";

        //     }
        //  }

                // check membership
                // echo $_SESSION['id'];die;
                $requirment=getsallerparame3('requirment_list',$_SESSION['id'],$page='1');
                 //print_r($requirment);die();
                $membership_status=$requirment->membership_status;
         ?>


        <!-- Seller Navigation -->
        <li class="account-nav__item"><a href="<?=base_url('seller/user-membership-package')?>"><i class="fad fa-shopping-cart mr-2"></i>Subscription</a></li>
        <li class="account-nav__item"><a href="<?=base_url('seller/membership-history')?>"><i class="fad fa-paper-plane mr-2"></i>Subscription History</a></li>
        <li class="account-nav__item">
            <?php if(empty($sellercompanyname)){?>
               <a data-toggle="modal" data-target="#companyModal" data-placement="top"><i class="fad fa-comment-alt-edit mr-2"></i>Requirement List</a>
           <?php }elseif(empty($acnames)){?>
               <a data-toggle="modal" data-target="#accountModal"><i class="fad fa-comment-alt-edit mr-2"></i>Requirement List</a>
           <?php } elseif($checkactive=="notapproved"){?>
            <a data-modal-trigger="myModal" data-toggle="tooltip" data-placement="top"><i class="fad fa-comment-alt-edit mr-2"></i>Requirement List</a>
        <?php }elseif(empty($membership_status)){?>
            <a data-modal-trigger="Subscribe" data-toggle="tooltip" data-placement="top"><i class="fad fa-comment-alt-edit mr-2"></i>Requirement List</a>
        <?php }elseif($checkcompleteds=='not compeleted'){?>
            <a data-modal-trigger="notcompeleted" data-toggle="tooltip" data-placement="top"><i class="fad fa-comment-alt-edit mr-2"></i>Requirement List</a>
            <script src="<?=base_url()?>assets/website/vendor/jquery/jquery.min.js"></script>
            <input type="hidden" id="requirement_ids" value="<?=$requirement_ids?>">
        <?php }else{?>
            <a href="<?=base_url('seller/requirement-list')?>"><i class="fad fa-list-ul mr-2"></i>Requirement List</a>
        <?php }?>
        </li>
        <li class="account-nav__item"><a href="<?=base_url()?><?=$type_url?>/bids"><i class="fad fa-layer-group mr-2"></i>My Quotation</a></li>
         <li class="account-nav__item"><a href="<?=base_url('seller/order-history')?>"><i class="fad fa-receipt mr-2"></i>Order Details</a></li>
        <li class="account-nav__item"><a href="<?=base_url('seller/compeleted-order')?>"><i class="fad fa-box-open mr-2"></i>Completed Orders</a></li>
        <!-- <li class="account-nav__item"><a href="<?=base_url('seller/delete-account')?>"><i class="fad fa-box-open mr-2"></i>Account Delete</a></li> -->
        
    <?php }?>
        <li class="account-nav__divider" role="presentation"></li>
        <li class="account-nav__item"><a href="<?=base_url('logout')?>"><i class="fad fa-sign-out-alt mr-2"></i>Logout</a></li>
    </ul>
</div>
