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
                            <h5>Edit Post Requirement</h5>
                        </div>
                        <div class="card-divider"></div>
                        <div class="card-body card-body--padding--2">
                            <!-- multistep form -->
                            <?php if($this->session->flashdata('msg')){ ?>
                            <?=$this->session->flashdata('msg');?>
                            <?php }?>

                            <form id="msform" action="<?=base_url()?>buyer/edit-requirement/<?=$req_id?>" method="POST" role="form" enctype="multipart/form-data" onsubmit="return onSubmit()">
                                <!-- progressbar -->
                                <!-- <ul id="progressbar">
                                    <li class="active">Product Details</li>
                                    <li>Additional Info</li>
                                </ul> -->
                                <!-- fieldsets -->
                                <!-- <fieldset> -->
                                    <?php foreach($requirment as $req){
                                        if($req->id==$req_id){?>
                                    <div class="row">
                                        <div class="col-6 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="product-name">Product Name</label> 
                                                <input type="hidden" name="buyer_id" value="<?=$_SESSION['id']?>">
                                                 <input type="hidden" name="id" value="<?=$req_id?>">
                                               <select class="form-control-select2 form-control" name="product_name" id="product-name" onchange="checkcoil()">
                                                <option value="">Select Product Name</option>
                                                    <?php foreach($products as $pro){?>
                                                    <option value="<?=$pro->product_name?>" <?php if($pro->product_name==set_value('product_name',$req->product_name)){ echo 'selected';}?>><?=$pro->product_name?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-4 col-xl-4" id="alloy">
                                            <div class="form-group">
                                                <label for="dimension">Alloy</label> 
                                                <select class="form-control-select2 form-control table mb-0" name="dimension" id="select_alloy">
                                                    <?php foreach($alloy as $list){?>
                                                    <option value="<?=$list->dimension_name?>" <?php if($list->dimension_name==set_value('dimension',$req->dimension)){ echo 'selected';}?>><?=$list->dimension_name?></option>
                                                   <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-4 col-xl-4" id="temper">
                                            <div class="form-group">
                                                <label for="temper">Temper</label> 
                                                <select class="form-control-select2 form-control table mb-0" name="temper" id="temper" id="select_temper">
                                                    <option value="">Select Temper</option>
                                                    <?php foreach($temers as $tem){?>
                                                    <option value="<?=$tem->temper_name?>" <?php if($tem->temper_name==set_value('temper',$req->temper)){ echo 'selected';}?>><?=$tem->temper_name?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-4 col-xl-4" id="hidethikness">
                                            <div class="form-group">
                                                <label for="thickness">Thickness</label> 
                                                <select class="form-control-select2 form-control table mb-0" name="thickness" id="thikness" onchange="changethikness()">
                                                    <option value="">Select Thickness</option>
                                                    <?php foreach($thickness as $thik){?>
                                                    <option value="<?=$thik->thickness_name?>" <?php if($thik->thickness_name==set_value('thickness',$req->thickness)){ echo 'selected';}?>><?=$thik->thickness_name?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-4 col-xl-4" id="newthikness">
                                            <div class="form-group">
                                                <label for="Thickness">Thickness / Diameter</label>
                                                <input type="text" name="newthikness" class="form-control" placeholder="Enter Thickness">
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-4 col-xl-4" id="widthdiv">
                                            <div class="form-group">
                                                <label for="width">Width</label> 
                                                <select class="form-control-select2 form-control table mb-0" name="widths" id="width" onchange="changewidth()">
                                                    <option value="">Select Width</option>
                                                    <?php foreach($widths as $list){?>
                                                    <option value="<?=$list->width?>" <?php if($list->width==set_value('widths',$req->widths)){ echo 'selected';}?>><?=$list->width?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-4 col-xl-4" id="newwidth">
                                            <div class="form-group">
                                                <label for="width">Width</label>
                                                <input type="text" name="newwidths" class="form-control" placeholder="Enter widths">
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-4 col-xl-4" id="hidelength">
                                            <div class="form-group">
                                                <label for="lenght">Length</label> 
                                                <select class="form-control-select2 form-control table mb-0" name="lengths" id="lengths">
                                                    <option value="">Select Lenght</option>
                                                    <?php foreach($lengths as $len){?>
                                                    <option value="<?=$len->lengths?>" <?php if($len->lengths==set_value('lengths',$req->lengths)){ echo 'selected';}?>><?=$len->lengths?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-4 col-xl-4" id="newlengths">
                                            <div class="form-group">
                                                <label for="lenght">Length</label>
                                                <input type="text" name="newlengths" id="newlengthss" class="form-control" placeholder="Enter Length">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- <input type="button" name="next" class="next action-button" value="Next" /> -->
                                    <!--  </fieldset> -->
                                    <!-- <fieldset> -->
                                    <div class="row">
                                        <div class="col-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="qnt">Product Qauntity(kgs)</label> 
                                                <input type="number" class="form-control" id="qnt" placeholder="e.g 1200.00" required="" name="qnt" value="<?=set_value('qnt',$req->qnt)?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="packing">Packing</label> 
                                                <input type="text" class="form-control" id="packing" placeholder="e.g Packing" required="" name="packing" value="<?=set_value('packing',$req->packing)?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="delivery_place">Delivery Place</label> 
                                                <input type="text" class="form-control" id="delivery_place" placeholder="e.g delivery_place" required="" name="delivery_place" value="<?=set_value('delivery_place',$req->delivery_place)?>">
                                            </div>
                                        </div>
                                        <!-- <div class="col-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="ship-to">Ship To</label> 
                                                <input type="text" class="form-control" id="ship-to" placeholder="e.g ship to" required="" name="ship_to" value="<?=set_value('ship_to',$req->ship_to)?>">
                                            </div>
                                        </div> -->
                                        <div class="col-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="description">Product Description</label> 
                                                <textarea class="form-control" id="description" placeholder="e.g write about product...." rows="5"  name="description"><?=set_value('description',$req->description)?></textarea>
                                            </div>
                                        </div>
                                       <!--  <div class="col-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="addtional-info">Additional Information</label> 
                                                <textarea class="form-control" id="addtional-info" placeholder="e.g write additional info...." rows="5"  name="additional"><?=set_value('additional',$req->additional)?></textarea>
                                            </div>
                                        </div> -->
                                        <div class="col-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="photo">Product Photo(Optional)</label> 
                                                <input type="file" class="form-control" placeholder="e.g 1200.00"  name="image">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="door_delivery">Delivery Option</label><br> 
                                                <input type="checkbox" id="door_delivery" placeholder="e.g Excellent Quality" checked required="" name="delivery_options">
                                                <label for="door_delivery">Ex-Wourehose</label> 
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-xl-6 text-center">
                                            <div class="form-group">
                                                <input type="checkbox" id="term_condition" placeholder="e.g Excellent Quality" required="" name="term_condition">
                                                 <label for="term_condition">I accept all term and conditions</label> 
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <input type="button" name="previous" class="previous action-button" value="Previous" /> -->
                                    <input type="submit" name="submit" class="action-button" id="subbutton" value="Submit" />
                                    <!--  </fieldset> -->
                                    <?php } }?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>
<!-- site__body / end -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;

    // or instead:
    // var maxDate = dtToday.toISOString().substr(0, 10);
    $('#txtDate').attr('min', maxDate);
});
</script>
<script>
    function onSubmit() {
      debugger;
    $("#subbutton").prop('disabled', true);
      $('#subbutton').val('Processing....');
}
  </script>
<script>
    checkcoil();
    function checkcoil() 
    {
        var product=$('#product-name').val();
        //hidelength
        //console.log(product);
        if(product.includes("Coil") || product.includes("coil") || product.includes("Coils") || product.includes("coils") || product.includes("Foil") || product.includes("foil") || product.includes("Foils") || product.includes("foils") )
        {
            $('#hidelength').hide();
            $('#alloy').show(); 
           $('#temper').show(); 
           $('#hidethikness').show(); 
           $('#widthdiv').show(); 

        }
        else if(product=="Aluminium Ingots EC" || product=="Aluminium Ingots CG")
        {
           $('#alloy').hide(); 
           $('#temper').hide(); 
           $('#hidethikness').hide(); 
           $('#widthdiv').hide(); 
           $('#hidelength').hide(); 
        }
        else if(product=="Aluminium Wire Rod EC" || product=="Aluminium Alloy Wire Rod")
        {
           $('#widthdiv').hide(); 
           $('#hidelength').hide();
            $('#alloy').show(); 
           $('#temper').show(); 
           $('#hidethikness').show(); 
        }
        else if(product=="Aluminium Alloy Ingots")
        {
           $('#alloy').show();
           $('#temper').hide(); 
           $('#hidethikness').hide(); 
           $('#widthdiv').hide(); 
           $('#hidelength').hide(); 
        }
        else
        {
            $('#hidelength').show();
            $('#alloy').show(); 
            $('#temper').show(); 
            $('#hidethikness').show(); 
            $('#widthdiv').show(); 
            $('#hidelength').show(); 
        }
    }
    $('#newwidth').hide();
    $('#newlengths').hide();
    $('#newthikness').hide();
    function changewidth() 
    {
       let width=$('#width').val();
       if(width=='others')
       {
        $('#newwidth').show();
       }
       else
       {
        $('#newwidth').hide();
       }
    }

    function changelenght() 
    {
       let width=$('#lengths').val();
       //alert(width);
       if(width=='others')
       {
        $('#newlengths').show();
       }
       else
       {
        $('#newlengths').hide();
       }
    }
    function changethikness() 
    {
        debugger;
       let width=$('#thikness').val();
       //alert(width);
       if(width=='others' || width=='Others')
       {
        $('#newthikness').show();
        //$('#hidethikness').hide();
       }
       else
       {
        $('#newthikness').hide();
       }
    }

    
</script>
<!--  Start Footer Area -->
<?php include"footer.php"; ?>
<!-- End Footer Area -->	            