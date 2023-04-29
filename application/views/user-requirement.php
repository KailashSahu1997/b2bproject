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
                                        <h5>My Requirement</h5>
                                    </div>
                                    <?php if($this->session->flashdata('msg')){ ?>
                            <?=$this->session->flashdata('msg');?>
                            <?php }?>
                                    <div class="card-divider"></div>
                                    <div class="card-body card-body--padding--2">
                                        <div class="table-responsive">
                                            <table id="myDataTable2" class="myDataTable table align-middle table-bordered mb-0 card-table" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sno.</th>
                                                    <th>Requirement Id</th>
                                                    <th>Product Name</th>
                                                    <th>Alloy</th>
                                                    <th>Thickness</th>
                                                    <th>Quantity</th>
                                                    <th>Temper</th>
                                                    <th>Width</th>
                                                    <th>Photo</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php  $i=1; foreach($requirment as $list){?>
                                                <tr>
                                                    <td><?=$i;?></td>
                                                    <td><?=$list->requirement_uid?></td>
                                                    <td><?=$list->product_name?></td>
                                                    <td><?=$list->dimension?></td>
                                                    <td><?=$list->thickness?></td>
                                                    <td><?=$list->qnt?></td>
                                                    <td><?=$list->temper?></td>
                                                    <td><?=$list->widths?></td>
                                                    <td><img src="<?=main_url?><?=$list->product_image?>" width="150px" height="100px" data-modal-trigger="imageshow-modal<?=$list->id?>"></td>
                                                    <td><?=$list->created_at?></td>
                                                    <td>
                                                         <!-- <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="Edit" onclick="window.location.href='<?=base_url('buyer/edit-requirement')?>/<?=$list->id?>'"><i class="far fa-pencil"></i></button> -->
                                                        <?php if($list->status=='1' || $list->status=='4'){?>
                                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">Requirement Closed</button>
                                                        <?php }elseif($list->status=='0'){?>
                                                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="Edit" onclick="window.location.href='<?=base_url('buyer/edit-requirement')?>/<?=$list->id?>'"><i class="far fa-pencil"></i></button>
                                                        <button data-modal-trigger="delete-modal<?=$list->id?>" type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="far fa-trash"></i></button>
                                                        <?php }?>
                                                    </td>
                                                </tr>

                                                <!-- delete model -->
                                                <div class="modal default" data-modal-name="delete-modal<?=$list->id?>">
                                                    <div class="modal__dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header mb-3">
                                                                <h5 class="modal-title">Are You Sure</h5>
                                                                <button data-modal-dismiss class="modal__close">
                                                                <i data-modal-dismiss class="fal fa-times"></i>
                                                                </button>  
                                                            </div>
                                                            <form method="post" action="<?=base_url('BuyerController/deleterequirement')?>">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id" value="<?=$list->id?>">
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
                                                                <button type="submit" class="btn btn-danger">Yes, Delete<i class="far fa-trash ml-2"></i></button>
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


<!--  Start Footer Area -->
<?php include"footer.php"; ?>
<!-- End Footer Area -->	            