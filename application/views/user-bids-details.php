<!--  Start Header Area -->
<?php include"header.php"; ?>
<!-- End Header Area -->


<!-- site__body -->
<div class="site__body bg-gray bg-1" style="background-image: url(<?=base_url()?>assets/website/images/bg-1.png);">
    <div class="block-space block-space--layout--after-header"></div>
    <div class="block">
        <div class="container container--max--xl">
            <div class="row">
                
                <?php foreach($mybid as $list){
                    if($biddin_id==$list->bidding_id){?>
                <div class="col-12 col-lg-4">
                    <div class="card">
                    <div class="account-nav flex-grow-1">
                        <h4 class="account-nav__title">Requirement Id : <span class="dynamic-text"><?=$list->requirement_uid?></span></h4>
                        <div class="bids-details">
                            <p><b>Product Photo: </b> <img src="<?=main_url?><?=$list->product_image?>" width="150px" height="100px" 
                                            <?php if($list->product_image){?>data-modal-trigger="imageshow-modal<?=$list->id?>" <?php }else{?> alt="Product photo not available" <?php }?>>
                            </p>
                            <p class="mb-3"><b>Product Name : </b><?=$list->product_name?></p>
                            <p><b>Description :</b> <?=$list->product_des?></p>
                            <p><b>Additional Info : </b><?=$list->product_des?></p>
                            <p><b>Packing Info : </b><?=$list->packing?></p>
                            <p><b>Delivery Options : </b>Ex- Warehouse </p>
                            <p><b>Delivery place : </b><?=$list->delivery_place?></p>
                            <p><b>Requirement Quantity : </b><?=$list->qnt?></p>
                             <p><b>Alloy : </b><?=$list->dimension?></p>
                             <p><b>Temper : </b><?=$list->temper?></p>
                             <p><b>Thickness: </b><?=$list->thickness?></p>
                             <p><b>Width : </b><?=$list->widths?></p>
                             <p><b>Length : </b><?=$list->lengths?></p>

                        </div>
                    </div>
                </div>
                </div>
                <div class="col-12 col-lg-8 mt-4 mt-lg-0">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                            <div class="col-sm-6">
                                 <h5>Bidding Details</h5>
                            </div>
                            <div class="col-sm-6 text-right">
                                 <a href="<?=base_url()?>buyer/bids" class="btn btn-sm btn-primary">Back</a>
                            </div>
                          </div>
                        </div>
                        <div class="card-divider"></div>
                        <div class="card-body card-body--padding--2">
                            <div class="table-responsive">
                                <table id="myDataTable2" class="myDataTable table align-middle table-bordered mb-0 card-table">
                                    <thead>
                                        <tr>
                                            <!-- <th>User Name</th> -->
                                            <th>Remark</th>
                                            <th>Delivery Option</th>
                                            <!-- <th>Dispatch</th> -->
                                            <th>City</th>
                                            <th>Bid Quantity</th>
                                            <th>Bid Amount</th>
                                            <th>Delivered In</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($list->seller_list as $row){?>
                                        <tr>
                                            <!-- <td><?=$row->user_name?></td> -->
                                            <td><?=substr($row->description, 0, 100);?></td>
                                            <td>Ex-Warehouse</td>
                                            <!-- <td><?=$row->dispatch?></td> -->
                                            <td><?=$row->city?></td>
                                            <td><?=$row->bid_qnt?></td>
                                            <td><?=$row->bidding_price?></td>
                                            <td><?=$row->delivery_time?></td>
                                            <td>
                                                <?php if($row->confirm_bid_status=="0"){?>
                                                     <form action="<?=base_url()?>BuyerController/completeOrder" method="post" onsubmit="return onSubmit()">
                                                <input type="hidden" name="amount" value="0">
                                                <input type="hidden" name="transection_id" value="0">
                                                <input type="hidden" name="buyer_id" value="<?=$list->buyer_id?>">
                                                <input type="hidden" name="seller_id" value="<?=$row->seller_id?>">
                                                <input type="hidden" name="bidding_id" value="<?=$list->bidding_id?>">
                                                <input type="hidden" name="service_charge" value="0">
                                                <button type="submit" class="btn btn-sm btn-warning" id="subbutton">Confirm Bid</button>
                                              </form>
                                                <!-- <a href="<?=base_url()?>/buyer/service/<?=$list->bidding_id?>/<?=$row->seller_id?>/<?=$list->buyer_id?>" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Pay">Confirm Bid</a> -->
                                               <?php }elseif($row->confirm_bid_status=="1"){?>
                                               <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Bid Confirmed">Bid Confirmed</button>
                                                <?php }else{?>
                                                <button type="button" class="btn btn-sm btn-defualt" data-toggle="tooltip" data-placement="top" title="Cancelled">Cancelled</button>
                                               <?php }?>
                                            </td>
                                        </tr>
                                       <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                 <!-- image show model -->
                <div class="modal default" data-modal-name="imageshow-modal<?=$list->id?>">
                    <div class="modal__dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header mb-3">
                                <h5 class="modal-title">Product Photo</h5>
                                <button data-modal-dismiss class="modal__close">
                                    <i data-modal-dismiss class="fal fa-times"></i>
                                </button>  
                            </div>
                            <div class="modal-body">
                                <img src="<?=main_url?><?=$list->product_image?>" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <?php } }?>
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