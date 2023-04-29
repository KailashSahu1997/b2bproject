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
                            <h5>My Quotation</h5>
                        </div>
                        <div class="card-divider"></div>
                         <?php if($this->session->flashdata('msg')){ ?>
                            <?=$this->session->flashdata('msg');?>
                        <?php }?>
                        <div class="card-body card-body--padding--2">
                            <div class="table-responsive">
                            <table id="myDataTable2" class="myDataTable table align-middle table-bordered mb-0 card-table">
                                <thead>
                                    <tr>
                                        <th>Sno.</th>
                                        <th>Requirement Id</th>
                                        <th>Product Name</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <!-- <th>Delivey Day's</th> -->
                                       <!--  <th>Average Bid Amount</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($mybid as $list){?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$list->requirement_uid?></td>
                                        <td><?=$list->product_name?></td>
                                        <td><?=$list->created_at?></td>
                                        <td>
                                            <!-- <button data-modal-trigger="edit-bids-modal" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-pencil"></i></button> -->
                                            <button onclick="window.location.href='<?=base_url()?>buyer/bidding_details/<?=$list->bidding_id?>'" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="View"><i class="far fa-eye"></i></button>
                                            <?php if($list->status=="1"){?>
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Bid Confirmed">Bid Confirmed</button>
                                            <?php }?>
                                            <?php if($list->check_resion=='1'){?>
                                            <!-- <button data-modal-trigger="reason-modal<?=$list->bidding_id?>" type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Add Reason">Add Reason</button> -->
                                            <?php }?>
                                        </td>
                                        <!-- <td>10 days</td> -->
                                        <!-- <td>9000</td> -->
                                    </tr>

                                    <!-- reason model -->
                                    <div class="modal default" data-modal-name="reason-modal<?=$list->bidding_id?>">
                                        <div class="modal__dialog">
                                            <div class="modal-content">
                                                <div class="modal-header mb-3">
                                                    <h5 class="modal-title">Add Reason</h5>
                                                    <button data-modal-dismiss class="modal__close">
                                                        <i data-modal-dismiss class="fal fa-times"></i>
                                                    </button>  
                                                </div>
                                                <form action="<?=base_url('BuyerController/submit_reason')?>" method="POST" role="form">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-12 col-xl-12">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="requirement_id" value="<?=$list->requirement_id?>">
                                                                    <input type="hidden" name="buyer_id" value="<?=$list->buyer_id?>">
                                                                    <label for="resion_id">Select reason</label> 
                                                                    <select class="form-control-select2" name="resion_id" id="resion_id" onchange="changewidth()">
                                                                        <?php foreach($reasons as $row){?>
                                                                            <option value="<?=$row->resion?>"><?=$row->resion?></option>
                                                                        <?php }?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 col-lg-4 col-xl-4" id="newwidth">
                                                                <div class="form-group">
                                                                    <label for="width">Reason</label>
                                                                    <input type="text" name="newwidths" class="form-control" placeholder="Enter Reason">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-modal-dismiss class="btn btn-secondary">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Save Now</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end reason model -->
                                    <?php $i++; }?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>
<!-- site__body / end -->


<!-- Edit Bidding Modal Start -->
<div class="modal default" data-modal-name="edit-bids-modal">
    <div class="modal__dialog">
        <div class="modal-content">
            <div class="modal-header mb-3">
                <h5 class="modal-title">Edit Bidding Form</h5>
                <button data-modal-dismiss class="modal__close">
                <i data-modal-dismiss class="fal fa-times"></i>
                </button>  
            </div>
            <form action="" method="POST" role="form">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label for="full-name">Full Name</label> 
                            <input type="text" class="form-control" id="full-name" placeholder="e.g John Duw" required="">
                        </div>
                        <div class="form-group">
                            <label for="email-address">Email Address</label> 
                            <input type="text" class="form-control" id="email-address" placeholder="e.g example@gmail.com" required="">
                        </div>
                        <div class="form-group">
                            <label for="mobile-number">Mobile Number</label> 
                            <input type="text" class="form-control" id="mobile-number" placeholder="e.g 12345 67890" required="">
                        </div>
                        <div class="form-group">
                            <label for="bidding-price">Bidding Price</label> 
                            <input type="number" class="form-control" id="bidding-price" placeholder="e.g 1200.00" required="">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label> 
                            <textarea class="form-control" id="description" placeholder="e.g write a description...." rows="3" required=""></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <label for="delivery-time">Delivery Time</label> 
                            <input type="text" class="form-control" id="delivery-time" placeholder="e.g 20 Hrs" required="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button data-modal-dismiss class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Now</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Bidding Modal End -->          


<!--  Start Footer Area -->
<?php include"footer.php"; ?>
<!-- End Footer Area -->                
<script>
    $('#newwidth').hide();
     function changewidth() 
    {
       let width=$('#resion_id').val();
       //alert(width);
       if(width=='others')
       {
        $('#newwidth').show();
       }
       else
       {
        $('#newwidth').hide();
       }
    }
</script>