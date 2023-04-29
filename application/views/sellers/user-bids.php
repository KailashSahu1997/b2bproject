<!-- site__body -->
<div class="site__body bg-gray bg-1" style="background-image: url(<?=base_url()?>assets/website/images/bg-1.png);">
    <div class="block-space block-space--layout--after-header"></div>
    <div class="block">
        <div class="container container--max--xl">
            <div class="row">
                <div class="col-12 col-lg-3 d-flex">
                    <?php $this->load->view('navigation'); ?>
                </div>
                <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5>My Quotations</h5>
                        </div>
                    </div>

                    <div class="addresses-list">
                        <div class="row">
                            <?php if($this->session->flashdata('msg')){ ?>
                            <?=$this->session->flashdata('msg');?>
                            <?php }?>
                            <?php $i=1; foreach($mybid as $list){?>
                            <div class="col-lg-6  col-md-6 col-xs-12">
                                <div class="addresses-list__item card address-card">
                                    <div class="address-card__badge tag-badge tag-badge--theme"><?=$i?></div>
                                    <div class="address-card__body">
                                         <div class="address-card__name"><img src="<?=main_url?><?=$list->product_image?>" width="150px" height="100px" 
                                            <?php if($list->product_image){?>data-modal-trigger="imageshow-modal<?=$list->id?>" <?php }else{?> alt="Product photo not available" <?php }?>>
                                        </div>
                                        <div class="address-card__name">Requirement id:<?=$list->requirement_uid?></div>
                                        <div class="address-card__name"><?=$list->product_name?></div>
                                        <div class="address-card__name">Reason:<?=$list->resion?></div>
                                        <div class="address-card__row">
                                            <div class="address-card__row-title"><b>Description :</b> <?=$list->description?></div>
                                            <div class="address-card__row-title"><b>Additional Info :</b> <?=$list->additional?></div>
                                            <div class="address-card__row-title"><b>Packing :</b> <?=$list->packing?></div>
                                            <div class="address-card__row-title"><b>Delivery Option :</b> Ex-warehouse</div>
                                            <div class="address-card__row-title"><b>Delivery Place :</b> <?=$list->delivery_place?></div>
                                        </div>
                                        <div class="d-flex bg-dark-gray br-4 py-2 px-3 mt-3">
                                            <div class="address-card__row w-50">
                                                <div class="address-card__row-title">Requirement Quantity (Kg)</div>
                                                <div class="address-card__row-content font-weight-bold"><?=$list->qnt;?></div>
                                            </div>
                                           <!--  <div class="address-card__row w-50">
                                                <div class="address-card__row-title">Quantity</div>
                                                <div class="address-card__row-content font-weight-bold"><?=$list->qnt?></div>
                                            </div> -->
                                        </div>
                                        <?php if($list->dimension!=0 || $list->temper!=0){?>
                                        <div class="d-flex bg-dark-gray br-4 py-2 px-3 mt-3">
                                            <div class="address-card__row w-50">
                                                <div class="address-card__row-title">Alloy</div>
                                                <div class="address-card__row-content font-weight-bold"><?=$list->dimension?></div>
                                            </div>
                                            <div class="address-card__row w-50">
                                                <div class="address-card__row-title">Temper</div>
                                                <div class="address-card__row-content font-weight-bold"><?=$list->temper?></div>
                                            </div>
                                        </div>
                                        <?php } if($list->thickness!=0 || $list->widths!=0 || $list->lengths!=0){?>
                                        <div class="d-flex bg-dark-gray br-4 py-2 px-3 mt-1">
                                            <div class="address-card__row w-50">
                                                <div class="address-card__row-title">Thickness</div>
                                                <div class="address-card__row-content font-weight-bold"><?=$list->thickness?></div>
                                            </div>
                                    
                                            <div class="address-card__row w-50">
                                                <div class="address-card__row-title">Width</div>
                                                <div class="address-card__row-contente font-weight-bold"><?=$list->widths?></div>
                                            </div>
                                        
                                            <div class="address-card__row w-50">
                                                <div class="address-card__row-title">Length</div>
                                                <div class="address-card__row-contente font-weight-bold"><?=$list->lengths?></div>
                                            </div>
                                        </div>
                                        <?php }?>
                                         <div class="address-card__row">
                                            <div class="address-card__name mt-3">Bidding Details:</div>
                                            <div class="address-card__row-title">My Remark : <?=$list->description?></div>
                                            <div class="address-card__row-title">Delivery Option : Ex-warehouse</div>
                                            <div class="address-card__row-title">Factory/Warehouse : <?=$list->factory_address?></div>
                                            <div class="address-card__row-title">City : <?=$list->city?></div>
                                            <div class="address-card__name mt-3"> </div>
                                        </div>
                                         <div class="d-flex bg-dark-gray br-4 py-2 px-3 mt-3">
                                            <div class="address-card__row w-50">
                                                <div class="address-card__row-title">Bid Quantity (Kg)</div>
                                                <div class="address-card__row-content font-weight-bold"><?=$list->bid_qnt?></div>
                                            </div>
                                        </div>
                                        <div class="d-flex bg-dark-gray br-4 py-2 px-3 mt-3">
                                            <div class="address-card__row w-50">
                                                <div class="address-card__row-title">Bidding Amount</div>
                                                <div class="address-card__row-content font-weight-bold"><?=$list->bidding_price?></div>
                                            </div>
                                            <div class="address-card__row w-50">
                                                <div class="address-card__row-title">Delivery In</div>
                                                <div class="address-card__row-content font-weight-bold"><?=$list->delivery_time?></div>
                                            </div>
                                        </div>
                                        <div class="address-card__footer">
                                            <?php if($list->status==0)
                                            {?>
                                                <button data-modal-trigger="delete-modal<?=$i;?>" class="btn btn-sm btn-primary">Delete<i class="far fa-long-arrow-right ml-2"></i></button>
                                            <?php }elseif($list->status==1){?>
                                            <button class="btn btn-sm btn-primary">Bid Confirmed<i class="far fa-long-arrow-right ml-2"></i></button>
                                           <?php }?>
                                           <?php if($list->check_resion==1){?>
                                           <button data-modal-trigger="edit-modal<?=$i;?>" class="btn btn-sm btn-primary">Edit<i class="far fa-long-arrow-right ml-2"></i></button>
                                       <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- delete modal start -->
                            <div class="modal default" data-modal-name="delete-modal<?=$i;?>">
                                <div class="modal__dialog">
                                    <div class="modal-content">
                                        <div class="modal-header mb-3">
                                            <h5 class="modal-title">Are You Sure</h5>
                                            <button data-modal-dismiss class="modal__close">
                                                <i data-modal-dismiss class="fal fa-times"></i>
                                            </button>  
                                        </div>
                                        <div class="modal-body">
                                            <div class="delete_icon">
                                                <img class="d-block mx-auto" src="<?=base_url()?>assets/website/images/trash.gif" height="120px" alt="icon">
                                            </div>
                                            <div class="delete_content text-center mt-3">
                                                <h4>You're about to delete!</h4>
                                                <p class="mb-0">This will delete, Do you really want to delete these record? This process cannot be undo.</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-modal-dismiss>Nope! Cancel</button>
                                            <button type="button" onclick="window.location.href='<?=base_url()?>SellerController/deletemybid/<?=$list->requirement_id?>/<?=$_SESSION['id']?>'" class="btn btn-danger">Yes, Delete<i class="far fa-trash ml-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- delete modal end --> 
                            <!-- end subscribe model -->
                            <!-- Bidding Modal Start -->
                            <div class="modal default" data-modal-name="bids-modal<?=$i;?>">
                                <div class="modal__dialog">
                                    <div class="modal-content">
                                        <div class="modal-header mb-3">
                                            <h5 class="modal-title">Bidding Form</h5>
                                            <button data-modal-dismiss class="modal__close">
                                                <i data-modal-dismiss class="fal fa-times"></i>
                                            </button>  
                                        </div>
                                        <form action="<?=base_url('SellerController/apply_requirement')?>" method="POST" role="form">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12 col-lg-12 col-xl-12">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" id="delivery-time" name="buyer_id" placeholder="e.g 20 Hrs" value="<?=$list->buyer_id?>">
                                                            <input type="hidden" class="form-control" id="delivery-time" name="seller_id" placeholder="e.g 20 Hrs" value="<?=$_SESSION['id']?>">
                                                            <input type="hidden" class="form-control" id="delivery-time" name="requirement_id" placeholder="e.g 20 Hrs" value="<?=$list->id?>">
                                                            <label for="full-name">Bidding Price</label> 
                                                            <input type="number" class="form-control" id="full-name" name="bidding_price" placeholder="" required="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email-address">Quantity</label> 
                                                            <input type="number" class="form-control" id="email-address" name="qnt" placeholder="" required="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="mobile-number">City</label> 
                                                            <input type="text" class="form-control" id="mobile-number" name="city" placeholder="" required="" value="<?=$_SESSION['city']?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="state">State</label> 
                                                             <select class="form-control select2" name="state" required="" id="state">
                                                           <?php foreach($state as $st){?>
                                                                <option value="<?=$st?>" <?php if($_SESSION['state']==$st){ echo 'selected'; }?>><?=$st?>
                                                                </option>
                                                            <?php }?>
                                                        </select>
                                                        </div>
                                                         <div class="form-group mb-0">
                                                            <label for="delivery-time">Delivery Time</label>
                                                            <select class="form-control select2" name="delivery_time" required="" id="state">
                                                                <option value="Immediate">Immediate</option>
                                                                <option value="Within 3 days">Within 3 days</option>
                                                                <option value="Within 7 days">Within 7 days</option>
                                                            </select> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">Remark</label> 
                                                            <textarea class="form-control" id="description" placeholder="remark" name="description" rows="3" required=""></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">Delivery Option:</label>
                                                            <br> 
                                                            <input type="checkbox" name="delivery_option" value="true" checked disabled>
                                                            <label for="description">Ex-warehouse</label>
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
                            <!-- Bidding Modal End --> 
                            <!-- edit bidding  -->
                            <div class="modal default" data-modal-name="edit-modal<?=$i;?>">
                                <div class="modal__dialog">
                                    <div class="modal-content">
                                        <div class="modal-header mb-3">
                                            <h5 class="modal-title">Edit Bidding Form</h5>
                                            <button data-modal-dismiss class="modal__close">
                                                <i data-modal-dismiss class="fal fa-times"></i>
                                            </button>  
                                        </div>
                                        <form action="<?=base_url('SellerController/edit_requirement')?>" method="POST" role="form">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12 col-lg-12 col-xl-12">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" id="delivery-time" name="buyer_id" placeholder="e.g 20 Hrs" value="<?=$list->buyer_id?>">
                                                            <input type="hidden" class="form-control" id="delivery-time" name="bidding_id" placeholder="e.g 20 Hrs" value="<?=$list->bidding_id?>">
                                                            
                                                            <input type="hidden" class="form-control" id="delivery-time" name="seller_id" placeholder="e.g 20 Hrs" value="<?=$_SESSION['id']?>">
                                                            <input type="hidden" class="form-control" id="delivery-time" name="requirement_id" placeholder="e.g 20 Hrs" value="<?=$list->requirement_id?>">
                                                            <label for="full-name">Bidding Price</label> 
                                                            <input type="number" class="form-control" id="full-name" name="bidding_price" placeholder="122" required="" value="<?=$list->bidding_price?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email-address">Quantity</label> 
                                                            <input type="number" class="form-control" id="email-address" name="qnt" placeholder="12" required="" value="<?=$list->bid_qnt?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="mobile-number">City</label> 
                                                            <input type="text" class="form-control" id="mobile-number" name="city" placeholder="" required="" value="<?=$list->city?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="state">State</label> 
                                                            <input type="text" name="state" value="<?=$list->state?>" readonly>
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <label for="delivery-time">Delivery Time</label>
                                                            <input type="text" name="delivery_time" value="<?=$list->delivery_time?>" readonly>
                                                           <!--  <select class="form-control" name="delivery_time" required="" id="state" readonly>
                                                                <option <?php if($list->delivery_time=="Immediate"){ echo 'selected'; }?> value="Immediate">Immediate</option>
                                                                <option <?php if($list->delivery_time=="After 3 days"){ echo 'selected'; }?> value="After 3 days">After 3 days</option>
                                                                <option <?php if($list->delivery_time=="After 7 days"){ echo 'selected'; }?> value="After 7 days">After 7 days</option>
                                                            </select> --> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">Remark</label> 
                                                            <textarea class="form-control" id="description" placeholder="remark" name="description" rows="3" required="" readonly><?=$list->description?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">Delivery Option:</label>
                                                            <br> 
                                                            <input type="checkbox" name="delivery_option" value="true" checked disabled>
                                                            <label for="description">Ex-warehouse</label>
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
                            <?php $i++; }?>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>
<!-- site__body / end -->    
         