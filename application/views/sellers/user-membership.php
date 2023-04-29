    <!-- site__body -->
    <div class="site__body bg-gray bg-1" style="background-image: url(<?=base_url()?>assets/website/images/bg-1.png);">
    <div class="block-space block-space--layout--after-header"></div>
    <div class="block">
    <div class="container container--max--xl">
        <div class="row">
            <div class="col-12 col-lg-3">
                <?php $this->load->view('navigation') ?>
            </div>
            <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                <div class="card">
                    <div class="card-header">
                        <h5>Membership List</h5>
                    </div>
                    <div class="card-divider"></div>
                    <div class="card-body card-body--padding--2">
                        <div class="table-responsive">
                            <table id="myDataTable2" class="myDataTable table align-middle table-bordered mb-0 card-table">
                            <thead>
                                <tr>
                                    <th>SR.NO</th>
                                    <th>Package Name</th>
                                    <th>Validity</th>
                                    <th>Amount</th>
                                    <!-- <th>Action</th> -->
                                    <th>Purchase Date</th>
                                    <th>Expiry Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($membership as $list){?>
                                <tr>
                                    <td><?=$i;?></td>
                                    <td><?=$list->package_name?></</td>
                                    <td><?=$list->validity?></td>
                                    <td><?=$list->amount?></td>
                                    <!-- <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Renewal"><i class="far fa-sync"></i></button>
                                    </td> -->
                                    <td><?=date('d-M-Y',strtotime($list->purchase_date))?></td>
                                    <td><?=date('d-M-Y',strtotime($list->expire_date))?></td>
                                </tr>
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