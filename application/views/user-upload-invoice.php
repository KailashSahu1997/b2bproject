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
                            <h5>Order Details</h5>
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
                                            <th>Order Id</th>
                                            <th>Product Name</th>
                                            <th>Product Photo</th>
                                            <th>Order Date</th>
                                            <th>Quantity</th>
                                            <th>Bidding Quantity</th>
                                            <th>Bidding Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($order as $list){?>
                                        <tr>
                                            <td><?=$list->order_id?></td>
                                            <td><?=$list->product_name?></td>
                                            <td><img src="<?=main_url?><?=$list->product_image?>" width="50px" height="50px" 
                                            <?php if($list->product_image){?>data-modal-trigger="imageshow-modal<?=$list->id?>" <?php }else{?> alt="Product photo not available" <?php }?>>
                                            </td>
                                            <td><?=$list->order_date?></td>
                                            <td><?=$list->qnt?></td>
                                            <td><?=$list->bid_qnt?></td>
                                            <td><?=$list->bidding_price?></td>
                                            <td><?php if($list->order_status=="1"){?>
                                                <span class="badge bg-warning">In Progress</span>
                                                <?php }?>
                                            </td>
                                            <td>

                                                <button onclick="window.location.href='<?=base_url()?>buyer/order-details/<?=$list->bidding_id?>'" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="View"><i class="far fa-eye"></i></button>
                                                <?php if($list->parse_status=="true"){?>
                                                    <a href="<?=$list->proforma_invoice?>" target="_blank" download="<?=$list->proforma_invoice?>" class="btn btn-sm btn-success" style="font-size: 11px;line-height: 9px;padding: 6.5px 3px;">Order Confirmation Invoice</a>
                                                        <!-- <a href="<?=$list->gst_reciept?>" target="_blank" download="<?=$list->gst_reciept?>" class="btn btn-sm btn-success" style="font-size: 11px;line-height: 9px;padding: 6.5px 3px;">Service Charge Receipt</a> -->
                                                    <button data-modal-trigger="upload-purchase-modal<?=$list->bidding_id?>" type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Upload Purchase Order">Upload Purchase Order</button>
                                                    <button data-modal-trigger="upload-first-modal<?=$list->bidding_id?>" type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Upload 20 % Payment Confirmation">Upload 20 % Payment Confirmation</button>
                                                <?php }elseif($list->fully_status=="true" && $list->grn_status=='false'){?>
                                                    <a href="<?=$list->seller_performa_invoice?>" target="_blank" class="btn btn-sm btn-success" style="font-size: 11px;line-height: 9px;padding: 6.5px 3px;">Download Seller Proforma Invoice</a>
                                                    <button data-modal-trigger="upload-full-modal<?=$list->bidding_id?>" type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Upload 80 % Payment Confirmation">Upload 80 % Payment Confirmation</button>
                                                <?php }elseif($list->grn_status=='true')
                                                {?>
                                                    <a href="<?=main_url?>/<?=$list->challan?>" download class="btn btn-sm btn-success" style="font-size: 11px;line-height: 9px;padding: 6.5px 3px;">Delivery Challan</a>
                                                    <a href="<?=main_url?>/<?=$list->laurry?>" download class="btn btn-sm btn-success" style="font-size: 11px;line-height: 9px;padding: 6.5px 3px;">Lorry Receipt</a>
                                                    <a href="<?=main_url?>/<?=$list->main_invoice?>" download class="btn btn-sm btn-success" style="font-size: 11px;line-height: 9px;padding: 6.5px 3px;">Final Tax Invoice </a>
                                                    <button data-modal-trigger="grn-received<?=$list->bidding_id?>" type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Confirm GRN Received">Confirm GRN Received</button>
                                                <?php }else{?>
                                                    <!-- <a href="<?=$list->proforma_invoice?>" target="_blank" download="<?=$list->proforma_invoice?>" class="btn btn-sm btn-success">Order Confirmation Invoice</a>
                                                    <a href="<?=$list->gst_reciept?>" target="_blank" download="<?=$list->gst_reciept?>" class="btn btn-sm btn-success">Service Charge GST Receipt</a> -->
                                                    <!-- <button data-modal-trigger="delete-modal" type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Upload Invoice">Upload Invoice</button> -->
                                                <?php  }?>
                                            </td>
                                        </tr>
                                        <!-- upload purchase order -->
                                        <div class="modal default" data-modal-name="upload-purchase-modal<?=$list->bidding_id?>">
                                            <div class="modal__dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header mb-3">
                                                        <h5 class="modal-title">Upload Purchase Order</h5>
                                                        <button data-modal-dismiss class="modal__close">
                                                            <i data-modal-dismiss class="fal fa-times"></i>
                                                        </button>  
                                                    </div>
                                                    <form action="<?=base_url('BuyerController/uploadpurchase')?>" method="POST" role="form" enctype="multipart/form-data" onsubmit="return onSubmit()">
                                                        <div class="modal-body">
                                                            <label for="title">Title</label>
                                                            <input type="hidden" name="order_id" value="<?=$list->bidding_id?>">
                                                            <input type="text" name="title" class="form-control" required=""/>
                                                            <br>
                                                            <input class="form-control" type="file" name="image" required=""/>
                                                            <!-- <div class="upload-area">
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
                                                            </div> -->
                                                        </div>
                                                        <div class="modal-footer mt-4">
                                                            <button data-modal-dismiss class="btn btn-secondary">Cancel</button>
                                                            <button type="submit" class="btn btn-primary subbutton">Upload File</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end purchase order -->
                                        <!-- 20% invoice model -->
                                        <div class="modal default" data-modal-name="upload-first-modal<?=$list->bidding_id?>">
                                            <div class="modal__dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header mb-3">
                                                        <h5 class="modal-title">Upload 20% Payment Receipt</h5>
                                                        <button data-modal-dismiss class="modal__close">
                                                            <i data-modal-dismiss class="fal fa-times"></i>
                                                        </button>  
                                                    </div>
                                                    <form action="<?=base_url('BuyerController/uploadfirst')?>" method="POST" role="form" enctype="multipart/form-data" onsubmit="return onSubmit()">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="title">Title</label>
                                                                    <input type="hidden" name="order_id" value="<?=$list->bidding_id?>">
                                                                    <input type="text" name="title" class="form-control" required=""/>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="title">UTR</label>
                                                                    <input type="text" name="utr" class="form-control" required=""/>
                                                                </div>
                                                            <br>
                                                            <br>
                                                            <div class="col-md-12 mt-3">
                                                                <input class="form-control" type="file" name="image" required=""/>
                                                                <!-- <div class="upload-area">
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
                                                                </div> -->
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer mt-4">
                                                            <button data-modal-dismiss class="btn btn-secondary">Cancel</button>
                                                            <button type="submit" class="btn btn-primary subbutton">Upload File</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end 20% invoice model -->
                                        <!-- 80% invoice model -->
                                        <div class="modal default" data-modal-name="upload-full-modal<?=$list->bidding_id?>">
                                            <div class="modal__dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header mb-3">
                                                        <h5 class="modal-title">Upload 80% Payment Receipt</h5>
                                                        <button data-modal-dismiss class="modal__close">
                                                            <i data-modal-dismiss class="fal fa-times"></i>
                                                        </button>  
                                                    </div>
                                                    <form action="<?=base_url('BuyerController/uploadfullinvoice')?>" method="POST" role="form" enctype="multipart/form-data" onsubmit="return onSubmit()">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="title">Title</label>
                                                                    <input type="hidden" name="order_id" value="<?=$list->bidding_id?>">
                                                                    <input type="text" name="title" class="form-control" required=""/>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="title">UTR</label>
                                                                    <input type="text" name="utr" class="form-control" required=""/>
                                                                </div>
                                                            <br>
                                                            <br>
                                                            <div class="col-md-12 mt-3">
                                                                <input class="form-control" type="file" name="image" required=""/>
                                                                <!-- <div class="upload-area">
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
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="modal-footer mt-4">
                                                            <button data-modal-dismiss class="btn btn-secondary">Cancel</button>
                                                            <button type="submit" class="btn btn-primary subbutton">Upload File</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end 80% invoice model -->
                                        <!-- show resopn -->
                                        <div class="modal default" data-modal-name="grn-received<?=$list->bidding_id?>">
                                            <div class="modal__dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header mb-3">
                                                        <h5 class="modal-title">GRN Received</h5>
                                                        <button data-modal-dismiss class="modal__close">
                                                            <i data-modal-dismiss class="fal fa-times"></i>
                                                        </button>  
                                                    </div>
                                                    <form method="post" action="<?=base_url('BuyerController/submit_grn')?>" onsubmit="return onSubmit()">
                                                        <input type="hidden" name="order_id" value="<?=$list->bidding_id?>">
                                                         <input type="hidden" name="status" value="2">
                                                    <div class="modal-body">
                                                        <div class="delete_icon">
                                                            <img class="d-block mx-auto" src="<?=base_url()?>assets/website/images/wait.gif" height="120px" alt="icon">
                                                        </div>
                                                        <div class="delete_content text-center mt-3">
                                                            <h4>Good Received Note !</h4>
                                                            <p class="mb-0">If you click on Yes, your order gets completed. This process cannot be undone.</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-modal-dismiss>No</button>
                                                        <button type="submit" class="btn btn-danger subbutton">Yes</button>
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
                                        <?php }?>
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
<!-- Download Invoice Modal Start -->

<!-- Download Invoice Modal End -->
<script>
    function onSubmit() {
      debugger;
    $(".subbutton").disabled = true; 
      $('.subbutton').val('Processing....');
}
  </script>
<script>
(function () {
   window.supportDrag = (function () {
      let div = document.createElement("div");
      return (
         ("draggable" in div || ("ondragstart" in div && "ondrop" in div)) &&
         "FormData" in window &&
         "FileReader" in window
      );
   })();
   let input = document.getElementById("js-file-input");
   if (!supportDrag) {
      document.querySelectorAll(".has-drag")[0].classList.remove("has-drag");
   }
   input.addEventListener(
      "change",
      function (e) {
         document.getElementById("js-file-name").innerHTML = this.files[0].name;
         document
            .querySelectorAll(".file-input")[0]
            .classList.remove("file-input--active");
      },
      false
   );
   if (supportDrag) {
      input.addEventListener("dragenter", function (e) {
         document
            .querySelectorAll(".file-input")[0]
            .classList.add("file-input--active");
      });
      input.addEventListener("dragleave", function (e) {
         document
            .querySelectorAll(".file-input")[0]
            .classList.remove("file-input--active");
      });
   }
})();
</script>


<!--  Start Footer Area -->
<?php include"footer.php"; ?>
<!-- End Footer Area -->	            