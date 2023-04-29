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
                            <h5> Buyer Requirements</h5>
                        </div>
                    </div>

                    <div class="addresses-list">
                        <div class="row">
                            <?php if($this->session->flashdata('msg')){ ?>
                            <?=$this->session->flashdata('msg');?>
                            <?php }?>

                            <?php $i=1; foreach($requirment as $list){?>
                            <div class="col-lg-6  col-md-6 col-xs-12">
                                <div class="addresses-list__item card address-card">
                                    <div class="address-card__badge tag-badge tag-badge--theme"><?=$i?></div>
                                    <div class="address-card__body">
                                        <div class="address-card__name"><img src="<?=main_url?><?=$list->product_image?>" width="150px" height="100px" 
                                            <?php if($list->product_image){?>data-modal-trigger="imageshow-modal<?=$list->id?>" <?php }else{?> alt="Product photo not available" <?php }?>>
                                        </div>
                                        <div class="address-card__name">Requirement id:<?=$list->requirement_uid?></div>
                                        <div class="address-card__name"><?=$list->product_name?></div>
                                        <div class="address-card__row">
                                            <div class="address-card__row-title"><b>Description :</b> <?=$list->description?></div>
                                            <div class="address-card__row-title"><b>Additional Info :</b> <?=$list->additional?></div>
                                            <div class="address-card__row-title"><b>Packing :</b> <?=$list->packing?></div>
                                            <div class="address-card__row-title"><b>Delivery Option :</b> Ex-warehouse</div>
                                            <div class="address-card__row-title"><b>Delivery Place :</b> <?=$list->delivery_place?></div>
                                        </div>
                                        <div class="d-flex bg-dark-gray br-4 py-2 px-3 mt-3">
                                            <div class="address-card__row w-50">
                                                <div class="address-card__row-title">Date</div>
                                                <div class="address-card__row-content font-weight-bold"><?=date('d-M-Y',strtotime($list->created_at));?></div>
                                            </div>
                                            <div class="address-card__row w-50">
                                                <div class="address-card__row-title">Quantity (Kg)</div>
                                                <div class="address-card__row-content font-weight-bold"><?=$list->qnt?></div>
                                            </div>
                                        </div>
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
                                        <div class="address-card__footer">
                                            <?php if($list->status==2)
                                            {?>
                                                <button class="btn btn-sm btn-primary">Bid Applied</button>
                                            <?php }else{ 
                                                if($membership_status==1){?>
                                            <button data-modal-trigger="bids-modal<?=$i;?>" class="btn btn-sm btn-primary">Apply Bid<i class="far fa-long-arrow-right ml-2"></i></button>
                                        <?php }else{?>
                                            <button data-modal-trigger="Subscribe" class="btn btn-sm btn-primary">Apply Bid<i class="far fa-long-arrow-right ml-2"></i></button>
                                        <?php }?>
                                        <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- subscribe model -->
                            <div class="modal default" data-modal-name="Subscribe">
                                <div class="modal__dialog">
                                    <div class="modal-content">
                                        <div class="modal-header mb-3">
                                            <h5 class="modal-title">Subscribe Now!...</h5>
                                            <button data-modal-dismiss class="modal__close">
                                                <i data-modal-dismiss class="fal fa-times"></i>
                                            </button>  
                                        </div>
                                            <div class="modal-body">
                                                <p>For best service you need to subscribe first</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button data-modal-dismiss class="btn btn-secondary">Cancel</button>
                                                <button type="button" onclick="window.location.href='<?=base_url()?>seller/user-membership-package'" class="btn btn-primary">Subscribe</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end subscribe model -->
                            <!-- Bidding Modal Start -->
                            <div class="modal default" data-modal-name="bids-modal<?=$i;?>" id="bids-modal">
                                <div class="modal__dialog">
                                    <div class="modal-content">
                                        <div class="modal-header mb-3">
                                            <h5 class="modal-title">Bidding Form</h5>
                                            <button data-modal-dismiss class="modal__close">
                                                <i data-modal-dismiss class="fal fa-times"></i>
                                            </button>  
                                        </div>
                                        <span id="response<?=$i?>"></span>
                                        <form id="biding<?=$i?>" method="POST" role="form">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12 col-lg-12 col-xl-12">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" name="buyer_id" placeholder="e.g 20 Hrs" value="<?=$list->buyer_id?>" id="buyer_id<?=$i?>">
                                                            <input type="hidden" class="form-control"  name="seller_id" placeholder="e.g 20 Hrs" value="<?=$_SESSION['id']?>" id="seller_id<?=$i?>">
                                                            <input type="hidden" class="form-control" id="requirement_id<?=$i?>" name="requirement_id" placeholder="e.g 20 Hrs" value="<?=$list->id?>">
                                                            <label for="full-name">Bidding Amount</label> 
                                                            <input type="number" class="form-control" id="bidding_price<?=$i?>" name="bidding_price" placeholder="">
                                                            <span id="error_bidding_price<?=$i?>" class="text-danger"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email-address">Quantity (Kg)</label> 
                                                            <input type="number" class="form-control" id="qnts<?=$i?>" name="qnt" placeholder="">
                                                            <span id="error_qnts<?=$i?>" class="text-danger"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="mobile-number">City</label> 
                                                            <input type="text" class="form-control" id="city<?=$i?>" name="city" placeholder="" required="" value="<?=$_SESSION['city']?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="state">State</label>
                                                             <input type="text" class="form-control" id="state<?=$i?>" name="state" placeholder="" required="" value="<?=$_SESSION['state']?>" readonly> 
                                                            <!--  <select class="form-control select2" name="state" required="" id="state<?=$i?>">
                                                           <?php foreach($state as $st){?>
                                                                <option value="<?=$st?>" <?php if($_SESSION['state']==$st){ echo 'selected'; }?>><?=$st?>
                                                                </option>
                                                            <?php }?>
                                                        </select> -->
                                                        </div>
                                                         <div class="form-group">
                                                            <label for="delivery-time">Delivery Days</label>
                                                            <select class="form-control select2" name="delivery_time" required="" id="delivery_time<?=$i?>">
                                                                <option value="Immediate">Immediate</option>
                                                                <option value="Within 3 days">Within 3 days</option>
                                                                <option value="Within 7 days">Within 7 days</option>
                                                            </select> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">Remark (Optional)</label> 
                                                            <textarea class="form-control" id="descriptions<?=$i?>" placeholder="Remark (Optional)" name="description" rows="3" maxlength="100"></textarea>
                                                            <span id="error_descriptions?=$i?>" class="text-danger"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">Delivery Option</label>
                                                            <br> 
                                                            <input type="checkbox" name="delivery_option" value="true" checked disabled>
                                                            <label for="description">Ex-warehouse</label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button data-modal-dismiss class="btn btn-secondary">Cancel</button>
                                                <button type="button"  onclick="validateForm('<?=$i?>')" id="loginbtn<?=$i?>" class="btn btn-primary">Save Now</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Bidding Modal End -->  
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
                                        <!-- <form method="post" action="<?=base_url('BuyerController/deleterequirement')?>"> -->
                                        <div class="modal-body">
                                            <img src="<?=main_url?><?=$list->product_image?>" class="img-fluid">
                                        </div>
                                        <div class="modal-footer">
                                           <!--  <button type="button" class="btn btn-secondary" data-modal-dismiss>Nope! Cancel</button>
                                            <button type="submit" class="btn btn-danger">Yes, Delete<i class="far fa-trash ml-2"></i></button> -->
                                        </div>
                                        <!-- </form> -->
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
         <script type="text/javascript">
             function validateForm(id) 
             {
                //debugger;
                checkblank('bidding_price','Bidding Amount',id);
                checkblank('qnts','Qauntity',id);
                //checkblank('descriptions','Remark',id);
                
                if(checkblank('bidding_price','Bidding Amount',id) && checkblank('qnts','Qauntity',id))
                {
                    
                     //let formid='biding'.id;
                    let bidding_price = $('#bidding_price'+id).val();
                    let qnts = $('#qnts'+id).val();
                    let descriptions = $('#descriptions'+id).val();
                    let delivery_time = $('#delivery_time'+id).val();
                    let state = $('#state'+id).val();
                    let city = $('#city'+id).val();
                    let requirement_id = $('#requirement_id'+id).val();
                    let seller_id = $('#seller_id'+id).val();
                    let buyer_id = $('#buyer_id'+id).val();
                    //debugger;
                     $.ajax({
                    url:'<?=base_url('SellerController/apply_requirement')?>',
                    type:'POST',
                    data:{bidding_price:bidding_price,qnt:qnts,description:descriptions,delivery_time:delivery_time,state:state,city:city,requirement_id:requirement_id,seller_id:seller_id,buyer_id:buyer_id},
                     beforeSend: function() 
                {
                    $("#loginbtn"+id).css("visibility:none");
                    $("#loginbtn"+id).disabled = true; 
                    $("#loginbtn"+id).prop('disabled', true);
                    $('#loginbtn'+id).html('Processing....');
                },
                       success:function(result)
                    {
                        //$("#response"+id).text(result);
                        window.location.reload();

                    }

                    });
                }
                else
                {
                    return false;

                }
             }

             function checkblank(id,typeoferror,no) 
             {
                let pw1 = $('#'+id+no).val();    
                if(pw1=='')  
                {   
                    $('#error_'+id+no).html('The '+typeoferror+' field is Required');
                    return false;
                } 
                else 
                {  
                 $('#error_'+id+no).html('');
                 return true;
             }  
         }
         </script>