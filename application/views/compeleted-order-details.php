<!--  Start Header Area -->
<?php include"header.php"; ?>
<!-- End Header Area -->

<style type="text/css">
    .account-nav__title {
    padding: 0.4rem 1.5rem !important;
}
</style>
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
                <?php foreach($order as $list){
                    if($biddin_id==$list->bidding_id){?>
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                          <div class="row">
                            <div class="col-sm-6">
                                 <h5>Compeleted Order Details</h5>
                            </div>
                            <div class="col-sm-6 text-right">
                                 <a href="<?=base_url()?>buyer/compeleted-order" class="btn btn-sm btn-primary">Back</a>
                            </div>
                          </div>
                        </div>
                        <div class="card-body card-body--padding--2">
                    <div class="account-nav flex-grow-1" >
                        <h4 class="account-nav__title text-center">Order Id : <span class="dynamic-text"><?=$list->order_id?></span></h4>
                        <h4 class="account-nav__title text-center">Order Status : <span class="dynamic-text">Completed</span></h4>
                        <h4 class="account-nav__title text-center">Delivery Date : <span class="dynamic-text"><?=$list->expiry_date?></span></h4>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                           <h6 class="mb-3">Requirement id : 
                                <span class="dynamic-text"><?=$list->requirement_uid?></span>
                            </h6> 
                            <h6 class="mb-3">Product Name : 
                                <span class="dynamic-text"><?=$list->product_name?></span>
                            </h6> 
                            <h6 class="mb-3">Quantity : 
                                <span class="dynamic-text"><?=$list->qnt?></span>
                            </h6> 
                            <h6 class="mb-3">Alloy : 
                                <span class="dynamic-text"><?=$list->dimension?></span>
                            </h6>
                        </div>
                         <div class="col-md-4 text-center">
                           <h6 class="mb-3">Packing : 
                                <span class="dynamic-text"><?=$list->packing?></span>
                            </h6> 
                            <h6 class="mb-3">Delivery Option : 
                                <span class="dynamic-text">Ex-warehouse</span>
                            </h6>
                            <h6 class="mb-3">Temper : 
                                <span class="dynamic-text"><?=$list->temper?></span>
                            </h6> 
                            <h6 class="mb-3">Thickness : 
                                <span class="dynamic-text"><?=$list->thickness?></span>
                            </h6> 
                        </div>
                        <div class="col-md-4">
                            <h6 class="mb-3">Delivery Place : 
                                <span class="dynamic-text"><?=$list->delivery_place?></span>
                            </h6> 
                            <h6 class="mb-3">Order Date : 
                                <span class="dynamic-text"><?=$list->order_date?></span>
                            </h6> 
                             
                            <h6 class="mb-3">Packing : 
                                <span class="dynamic-text"><?=$list->packing?></span>
                            </h6> 
                            <h6 class="mb-3">Width : 
                                <span class="dynamic-text"><?=$list->widths?></span>
                            </h6> 
                            <h6 class="mb-3">Description : 
                                <span class="dynamic-text"><?=$list->product_des?></span>
                            </h6> 
                        </div>
                    </div>
                </div>
            </div>
                </div>
                <div class="col-lg-12 mt-4 mt-lg-0">
                    <div class="card">
                        <div class="card-header">
                            <h5>Seller Details</h5>
                        </div>
                        <div class="card-divider"></div>
                        <div class="card-body card-body--padding--2">
                            <div class="row">
                                <?php foreach($list->seller_list as $row){?>
                                <div class="col-md-4">
                                    <h6>User Name: <?=$row->user_name?></h6>
                                </div>
                                <div class="col-md-4">
                                    <h6>Delivered in: <?=$list->delivery_time?></h6>
                                </div>
                                <div class="col-md-4">
                                    <h6>Bidding Quantity: <?=$list->bid_qnt?></h6>
                                </div>
                                <div class="col-md-4">
                                    <h6>Bidding Amount: <?=$list->bidding_price?></h6>
                                </div>
                                <div class="col-md-4">
                                    <h6>Delivery option: Ex-warehouse</h6>
                                </div>
                                <div class="col-md-4">
                                    <h6>Factory/Warehouse: <?=$row->biding_city?></h6>
                                </div>
                                <div class="col-md-4">
                                    <h6>City: <?=$row->city?></h6>
                                </div>
                               <?php }?>
                            </div>
                        </div>
                        <div class="card-header">
                            <h5>Seller Personal Details</h5>
                        </div>
                        <div class="card-divider"></div>
                        <div class="card-body card-body--padding--2">
                            <div class="row">
                                <?php foreach($list->seller_list as $row){?>
                                <div class="col-md-4">
                                   <h6>Full Name: <?=$row->full_name?></h6> 
                                </div>
                                 <div class="col-md-4">
                                   <h6>Email: <?=$row->email_id?></h6> 
                                </div>
                                 <div class="col-md-4">
                                   <h6>Mobile: <?=$row->mobile_no?></h6> 
                                </div>
                                 <div class="col-md-4">
                                   <h6>Landline: <?=$row->landline_no?></h6> 
                                </div>
                                 <div class="col-md-4">
                                   <h6>Company Name: <?=$row->company_name?></h6> 
                                </div>
                                 <div class="col-md-4">
                                   <h6>Company Type: <?=$row->company_type?></h6> 
                                </div>
                               <?php }?>
                            </div>
                        </div>
                        <!-- bank details -->
                        <div class="card-header">
                            <h5>Seller Bank Details</h5>
                        </div>
                        <div class="card-divider"></div>
                        <div class="card-body card-body--padding--2">
                            <div class="row">
                                <?php foreach($list->seller_list as $rows)
                                {
                                    //print_r($rows);
                                    $bank=$rows->bank_detail;?>
                                <div class="col-md-4">
                                   <h6>Account Name: <?=$bank->ac_name?></h6> 
                                </div>
                                 <div class="col-md-4">
                                   <h6>Account No.: <?=$bank->ac_number?></h6> 
                                </div>
                                 <div class="col-md-4">
                                   <h6>Bank Name: <?=$bank->ac_bank_name?></h6> 
                                </div>
                                 <div class="col-md-4">
                                   <h6>Branch Name: <?=$bank->branch_name?></h6> 
                                </div>
                                 <div class="col-md-4">
                                   <h6>IFSC Code: <?=$bank->ac_ifcs?></h6> 
                                </div>
                                 <div class="col-md-4">
                                   <h6>UPI Id: <?=$bank->upi_id?></h6> 
                                </div>
                               <?php   }?>
                            </div>
                        </div>
                        <!-- my uploads -->
                        <!-- bank details -->
                        <div class="card-header">
                            <h5>My Uploads</h5>
                        </div>
                        <div class="card-divider"></div>
                        <div class="card-body card-body--padding--2">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <p>20 % UTR Number: <?=$list->first_utr?></p>
                                    <p>80 % UTR Number: <?=$list->fully_utr?></p>
                                   <p>20 % Payment Confirmation: <a href="<?=main_url?>/<?=$list->first_invoice?>" target="_blank" download><?php echo str_replace('/uploads/first_invoice/', '',$list->first_invoice);?></a></p> 
                                   <p>80 % Payment Confirmation: <a href="<?=main_url?>/<?=$list->fully_invoice?>" target="_blank" download><?php echo str_replace('/uploads/final_invoice/', '', $list->fully_invoice)?></a></p> 
                                   <p>Purchase Order: <a href="<?=main_url?>/<?=$list->buyer_purchase_order?>" target="_blank" download><?php echo str_replace('/uploads/purchase_order_buyer/', '', $list->buyer_purchase_order)?></a></p> 
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <h5>Downloads</h5>
                                   <h6>Order Confirmation Invoice: <a href="<?=$list->proforma_invoice?>" target="_blank" download><?=str_replace(main_url, '',$list->proforma_invoice)?></a></h6> 
                                   <!-- <h6>Service Charge Receipt: <a href="<?=$list->gst_reciept?>" target="_blank" download><?=str_replace(main_url, '',$list->gst_reciept)?></a></h6>  -->
                                   <h6>Proforma Invoice: <a href="<?=main_url?>/<?=$list->seller_performa_invoice?>" target="_blank" download><?=str_replace('/uploads/performa_invoice_seller/', '',$list->seller_performa_invoice)?></a></h6>
                                   <h6>MTC: <?=$list->mtc?></h6>
                                   <h6>Packaging List: <?=$list->packing_list?></h6>
                                   <h6>Delivery Challan: <a href="<?=main_url?>/<?=$list->challan?>" target="_blank" download><?=str_replace('/uploads/challans/', '',$list->challan)?></a></h6>
                                   <h6>Lorry Receipt: <a href="<?=main_url?>/<?=$list->laurry?>" target="_blank" download><?=str_replace('/uploads/laurry/', '',$list->laurry)?></a></h6> 
                                   <h6>Final Tax Invoice By Seller: <a href="<?=main_url?>/<?=$list->main_invoice?>" target="_blank" download><?=str_replace('/uploads/invoice_seller/', '',$list->main_invoice)?></a></h6> 
                                    <h5>Photos By Seller:</h5> 

                                    <?php foreach($list->biddimage_list as $ims){?>
                                        <h6><a href="<?=main_url?>/<?=$ims->order_images?>" target="_blank" download><?=str_replace('/uploads/order_images/', '',$ims->order_images)?></a></h6> 
                                    <?php } ?>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 20% invoice update model -->
                <div class="modal default" data-modal-name="first-invoice<?=$list->bidding_id?>">
                    <div class="modal__dialog">
                        <div class="modal-content">
                            <div class="modal-header mb-3">
                                <h5 class="modal-title">Update Your 20% Invoice Receipt</h5>
                                <button data-modal-dismiss class="modal__close">
                                    <i data-modal-dismiss class="fal fa-times"></i>
                                </button>  
                            </div>
                            <form action="<?=base_url('BuyerController/updatefirstinvoice')?>" method="POST" role="form" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="title">Title</label>
                                            <input type="hidden" name="order_id" value="<?=$list->bidding_id?>">
                                            <input type="text" name="title" class="form-control" value="<?=$list->first_invoice_title?>" required=""/>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="title">UTR</label>
                                            <input type="text" name="utr" class="form-control" value="<?=$list->first_utr?>" required=""/>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="col-md-12 mt-3">
                                            <input class="file-input" id="js-file-input" type="file" name="image"/>
                                            <div class="upload-area">
                                                <span class="upload-area-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="340.531" height="419.116" viewBox="0 0 340.531 419.116">
                                                        <g id="files-new" clip-path="url(#clip-files-new)">
                                                            <path id="Union_2" data-name="Union 2" d="M-2904.708-8.885A39.292,39.292,0,0,1-2944-48.177V-388.708A39.292,39.292,0,0,1-2904.708-428h209.558a13.1,13.1,0,0,1,9.3,3.8l78.584,78.584a13.1,13.1,0,0,1,3.8,9.3V-48.177a39.292,39.292,0,0,1-39.292,39.292Zm-13.1-379.823V-48.177a13.1,13.1,0,0,0,13.1,13.1h261.947a13.1,13.1,0,0,0,13.1-13.1V-323.221h-52.39a26.2,26.2,0,0,1-26.194-26.195v-52.39h-196.46A13.1,13.1,0,0,0-2917.805-388.708Zm146.5,241.621a14.269,14.269,0,0,1-7.883-12.758v-19.113h-68.841c-7.869,0-7.87-47.619,0-47.619h68.842v-18.8a14.271,14.271,0,0,1,7.882-12.758,14.239,14.239,0,0,1,14.925,1.354l57.019,42.764c.242.185.328.485.555.671a13.9,13.9,0,0,1,2.751,3.292,14.57,14.57,0,0,1,.984,1.454,14.114,14.114,0,0,1,1.411,5.987,14.006,14.006,0,0,1-1.411,5.973,14.653,14.653,0,0,1-.984,1.468,13.9,13.9,0,0,1-2.751,3.293c-.228.2-.313.485-.555.671l-57.019,42.764a14.26,14.26,0,0,1-8.558,2.847A14.326,14.326,0,0,1-2771.3-147.087Z" transform="translate(2944 428)" fill="#2e44ff" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <span class="upload-area-title">Drag file(s) here to upload.</span>
                                                <span class="upload-area-description">
                                                    Alternatively, you can select a file by <br /><strong id="js-file-name">clicking here</strong>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer mt-4">
                                    <button data-modal-dismiss class="btn btn-secondary">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Upload File</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- 80% invoice update model -->
                <div class="modal default" data-modal-name="fully-invoice<?=$list->bidding_id?>">
                    <div class="modal__dialog">
                        <div class="modal-content">
                            <div class="modal-header mb-3">
                                <h5 class="modal-title">Update Your 80% Invoice Receipt</h5>
                                <button data-modal-dismiss class="modal__close">
                                    <i data-modal-dismiss class="fal fa-times"></i>
                                </button>  
                            </div>
                            <form action="<?=base_url('BuyerController/updatefullyinvoice')?>" method="POST" role="form" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="title">Title</label>
                                            <input type="hidden" name="order_id" value="<?=$list->bidding_id?>">
                                            <input type="text" name="title" class="form-control" value="<?=$list->fully_invoice_title?>" required=""/>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="title">UTR</label>
                                            <input type="text" name="utr" class="form-control" value="<?=$list->fully_utr?>" required=""/>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="col-md-12 mt-3">
                                            <input class="file-input" id="js-file-input" type="file" name="image"/>
                                            <div class="upload-area">
                                                <span class="upload-area-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="340.531" height="419.116" viewBox="0 0 340.531 419.116">
                                                        <g id="files-new" clip-path="url(#clip-files-new)">
                                                            <path id="Union_2" data-name="Union 2" d="M-2904.708-8.885A39.292,39.292,0,0,1-2944-48.177V-388.708A39.292,39.292,0,0,1-2904.708-428h209.558a13.1,13.1,0,0,1,9.3,3.8l78.584,78.584a13.1,13.1,0,0,1,3.8,9.3V-48.177a39.292,39.292,0,0,1-39.292,39.292Zm-13.1-379.823V-48.177a13.1,13.1,0,0,0,13.1,13.1h261.947a13.1,13.1,0,0,0,13.1-13.1V-323.221h-52.39a26.2,26.2,0,0,1-26.194-26.195v-52.39h-196.46A13.1,13.1,0,0,0-2917.805-388.708Zm146.5,241.621a14.269,14.269,0,0,1-7.883-12.758v-19.113h-68.841c-7.869,0-7.87-47.619,0-47.619h68.842v-18.8a14.271,14.271,0,0,1,7.882-12.758,14.239,14.239,0,0,1,14.925,1.354l57.019,42.764c.242.185.328.485.555.671a13.9,13.9,0,0,1,2.751,3.292,14.57,14.57,0,0,1,.984,1.454,14.114,14.114,0,0,1,1.411,5.987,14.006,14.006,0,0,1-1.411,5.973,14.653,14.653,0,0,1-.984,1.468,13.9,13.9,0,0,1-2.751,3.293c-.228.2-.313.485-.555.671l-57.019,42.764a14.26,14.26,0,0,1-8.558,2.847A14.326,14.326,0,0,1-2771.3-147.087Z" transform="translate(2944 428)" fill="#2e44ff" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <span class="upload-area-title">Drag file(s) here to upload.</span>
                                                <span class="upload-area-description">
                                                    Alternatively, you can select a file by <br /><strong id="js-file-name">clicking here</strong>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer mt-4">
                                    <button data-modal-dismiss class="btn btn-secondary">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Upload File</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                 <!-- Purchase invoice update model -->
                <div class="modal default" data-modal-name="purchase-order<?=$list->bidding_id?>">
                    <div class="modal__dialog">
                        <div class="modal-content">
                            <div class="modal-header mb-3">
                                <h5 class="modal-title">Update Your Purchase Order Receipt</h5>
                                <button data-modal-dismiss class="modal__close">
                                    <i data-modal-dismiss class="fal fa-times"></i>
                                </button>  
                            </div>
                            <form action="<?=base_url('BuyerController/uploadpurchase')?>" method="POST" role="form" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="title">Title</label>
                                            <input type="hidden" name="order_id" value="<?=$list->bidding_id?>">
                                            <input type="text" name="title" class="form-control" value="<?=$list->fully_invoice_title?>" required=""/>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="title">UTR</label>
                                            <input type="text" name="utr" class="form-control" value="<?=$list->fully_utr?>" required=""/>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="col-md-12 mt-3">
                                            <input class="file-input" id="js-file-input" type="file" name="image"/>
                                            <div class="upload-area">
                                                <span class="upload-area-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="340.531" height="419.116" viewBox="0 0 340.531 419.116">
                                                        <g id="files-new" clip-path="url(#clip-files-new)">
                                                            <path id="Union_2" data-name="Union 2" d="M-2904.708-8.885A39.292,39.292,0,0,1-2944-48.177V-388.708A39.292,39.292,0,0,1-2904.708-428h209.558a13.1,13.1,0,0,1,9.3,3.8l78.584,78.584a13.1,13.1,0,0,1,3.8,9.3V-48.177a39.292,39.292,0,0,1-39.292,39.292Zm-13.1-379.823V-48.177a13.1,13.1,0,0,0,13.1,13.1h261.947a13.1,13.1,0,0,0,13.1-13.1V-323.221h-52.39a26.2,26.2,0,0,1-26.194-26.195v-52.39h-196.46A13.1,13.1,0,0,0-2917.805-388.708Zm146.5,241.621a14.269,14.269,0,0,1-7.883-12.758v-19.113h-68.841c-7.869,0-7.87-47.619,0-47.619h68.842v-18.8a14.271,14.271,0,0,1,7.882-12.758,14.239,14.239,0,0,1,14.925,1.354l57.019,42.764c.242.185.328.485.555.671a13.9,13.9,0,0,1,2.751,3.292,14.57,14.57,0,0,1,.984,1.454,14.114,14.114,0,0,1,1.411,5.987,14.006,14.006,0,0,1-1.411,5.973,14.653,14.653,0,0,1-.984,1.468,13.9,13.9,0,0,1-2.751,3.293c-.228.2-.313.485-.555.671l-57.019,42.764a14.26,14.26,0,0,1-8.558,2.847A14.326,14.326,0,0,1-2771.3-147.087Z" transform="translate(2944 428)" fill="#2e44ff" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <span class="upload-area-title">Drag file(s) here to upload.</span>
                                                <span class="upload-area-description">
                                                    Alternatively, you can select a file by <br /><strong id="js-file-name">clicking here</strong>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer mt-4">
                                    <button data-modal-dismiss class="btn btn-secondary">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Upload File</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- delete 20 % invoice model -->
                <div class="modal default" data-modal-name="delete-first<?=$list->bidding_id?>">
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
                                <button type="button" class="btn btn-danger" onclick="window.location.href='<?=base_url()?>BuyerController/deletefirst/<?=$list->bidding_id?>'" >Yes, Delete<i class="far fa-trash ml-2"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- delete 80 % invoice model -->
                <div class="modal default" data-modal-name="delete-final<?=$list->bidding_id?>">
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
                                <button type="button" class="btn btn-danger" onclick="window.location.href='<?=base_url()?>BuyerController/deletefinal/<?=$list->bidding_id?>'" >Yes, Delete<i class="far fa-trash ml-2"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- delete Purchase Order invoice model -->
                <div class="modal default" data-modal-name="delete-purchase<?=$list->bidding_id?>">
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
                                <button type="button" class="btn btn-danger" onclick="window.location.href='<?=base_url()?>BuyerController/deletepurchase/<?=$list->bidding_id?>'" >Yes, Delete<i class="far fa-trash ml-2"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } }?>
            </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>
<!-- site__body / end -->        


<!--  Start Footer Area -->
<?php include"footer.php"; ?>
<!-- End Footer Area -->	            