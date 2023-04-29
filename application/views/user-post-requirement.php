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
                            <h5>Post Requirement</h5>
                        </div>
                        <div class="card-divider"></div>
                        <div class="card-body card-body--padding--2">
                            <!-- multistep form -->
                            <?php if($this->session->flashdata('msg')){ ?>
                            <?=$this->session->flashdata('msg');?>
                            <?php }?>
                            <form id="msform" action="<?=base_url('BuyerController/PostRequiremner')?>" method="POST" role="form" enctype="multipart/form-data" onsubmit="return onSubmit()">
                                <!-- progressbar -->
                               <!--  <ul id="progressbar">
                                    <li class="active">Product Details</li>
                                    <li>Additional Info</li>
                                </ul> -->
                                <!-- fieldsets -->
                                <!-- <fieldset> -->
                                    <div class="row">
                                        <div class="col-6 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="product-name">Product Name</label> 
                                               <select class="form-control-select2 form-control" name="product_name" id="product-name" onchange="checkcoil()" required>
                                                <option value="">Select Product Name</option>
                                                    <?php foreach($products as $pro){?>
                                                    <option value="<?=$pro->product_name?>" <?php if($pro->product_name==set_value('product_name') || $pro->product_name==$_GET['product_name']){ echo 'selected';}?>><?=$pro->product_name?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-4 col-xl-4" id="alloy">
                                            <div class="form-group">
                                                <label for="dimension">Alloy</label> 
                                                <input type="hidden" name="buyer_id" value="<?=$_SESSION['id']?>">
                                                <select class="form-control-select2 form-control table mb-0" name="dimension" id="select_alloy">
                                                    <option value="0">Select Alloy</option>
                                                    <?php foreach($alloy as $list){?>
                                                    <option value="<?=$list->dimension_name?>"><?=$list->dimension_name?></option>
                                                   <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-4 col-xl-4" id="temper">
                                            <div class="form-group">
                                                <label for="temper">Temper</label> 
                                                <select class="form-control-select2 form-control table mb-0" name="temper" id="temper" id="select_temper">
                                                    <option value="0">Select Temper</option>
                                                    <?php foreach($temers as $tem){?>
                                                    <option value="<?=$tem->temper_name?>"><?=$tem->temper_name?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-4 col-xl-4" id="hidethikness">
                                            <div class="form-group">
                                                <label for="thickness">Thickness / Diameter</label> 
                                                <select class="form-control-select2 form-control table mb-0" name="thickness" id="thikness" onchange="changethikness()">
                                                    <option value="0">Select Thickness</option>
                                                    <?php foreach($thickness as $thik){?>
                                                    <option value="<?=$thik->thickness_name?>"><?=$thik->thickness_name?></option>
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
                                                    <option value="0">Select Width</option>
                                                    <?php foreach($widths as $list){?>
                                                    <option value="<?=$list->width?>"><?=$list->width?></option>
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
                                                <select class="form-control-select2 form-control table mb-0" name="lengths" id="lengths" onchange="changelenght()">
                                                    <option value="0">Select Length</option>
                                                    <?php foreach($lengths as $len){?>
                                                    <option value="<?=$len->lengths?>"><?=$len->lengths?></option>
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
                                    <!-- </div> -->
                                    <!--  <div class="row"> -->
                                        <div class="col-6 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="qnt">Product Quantity (Kg) </label> 
                                                <input type="number" class="form-control" id="qnt" placeholder="e.g 1200.00" required="" name="qnt" value="">
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="packing">Packing</label> 
                                                <input type="text" class="form-control" id="packing" placeholder="e.g Packing" required="" name="packing" value="">
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="delivery_place">Delivery Place</label> 
                                                <input type="text" class="form-control" id="delivery_place" placeholder="e.g delivery place" name="delivery_place" value="<?=$_SESSION['city']?$_SESSION['city']:set_value('delivery_place')?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="description">Product Description (Optional)</label> 
                                                <textarea class="form-control" id="description" placeholder="e.g write about product" rows="5" name="description"><?=set_value('description')?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6 col-xl-4">
                                            <div class="form-group">
                                                <label for="photo">Product Photo (Optional)</label> 
                                                <input type="file" class="form-control" placeholder=""  name="image">
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6 col-xl-4">
                                            <div class="form-group">
                                                <label for="door_delivery">Delivery Option</label><br>
                                                <input type="checkbox" id="door_delivery" placeholder="e.g Excellent Quality" checked  name="delivery_options" readonly disabled>
                                                <label for="door_delivery">Ex-Warehouse</label> 
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-xl-6 text-center">
                                            <div class="form-group">
                                                <input type="checkbox" id="term_condition" placeholder="e.g Excellent Quality" required="" name="term_condition">
                                                 <label for="term_condition">I accept all terms and conditions.</label> 
                                                 <!-- <br> -->
                                                 <a href="<?=base_url('buyer-terms-conditions')?>" target="_blank">Information</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <input type="button" name="previous" class="previous action-button" value="Previous" /> -->
                                    <input type="submit" name="submit" class="action-button" id="subbutton" value="Submit" />
                               <!--  </fieldset> -->
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
<script>
    function onSubmit() {
      debugger;
    //document.getElementById("subbutton").disabled = true; 
   $("#subbutton").prop('disabled', true);
      $('#subbutton').val('Processing....');
}
  </script>
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