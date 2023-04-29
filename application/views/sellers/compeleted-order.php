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
                    <div class="card">
                        <div class="card-header">
                            <h5>Completed Orders</h5>
                        </div>
                        <div class="card-divider"></div>
                        <div class="card-body card-body--padding--2">
                            <div class="table-responsive">
                                <table id="myDataTable2" class="myDataTable table align-middle table-bordered mb-0 card-table">
                                    <thead>
                                        <tr>
                                            <th>SR.NO</th>
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
                                        <?php $i=1; foreach($order as $list){?>
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?=$list->order_id?></td>
                                                <td><?=$list->product_name?></td>
                                                <td><img src="<?=main_url?><?=$list->product_image?>" width="50px" height="50px" <?php if($list->product_image){?>data-modal-trigger="imageshow-modal<?=$list->id?>" <?php }else{?> alt="Product photo not available" <?php }?>>
                                                </td>
                                                <td><?=$list->order_date?></td>
                                                <td><?=$list->qnt?></td>
                                                <td><?=$list->bid_qnt?></td>
                                                <td><?=$list->bidding_price?></td>
                                                <td><span class="badge bg-success">GRN Confirmed</span></td>
                                                <th><button onclick="window.location.href='<?=base_url()?>seller/compeleted-order-details/<?=$list->bidding_id?>'" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="View"><i class="far fa-eye"></i></button></th>
                                            </tr>
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