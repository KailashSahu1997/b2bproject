<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Invoice</title>
	<style>
		body
		{
			margin-top:20px;
			color: #2e323c;
			position: relative;
			height: 100%;
		}
.hd {
	padding-top:10px;
	font-size: 40px;
	background: -webkit-linear-gradient( #7094db, #333);
	/*-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;*/
}
.invoice-container {
	padding: 1rem;
}
.invoice-container .invoice-header .invoice-logo {
	margin: 0.8rem 0 0 0;
	display: inline-block;
	font-size: 1.6rem;
	font-weight: 700;
	color: #2e323c;
}
.invoice-container .invoice-header .invoice-logo img {
	max-width: 130px;
}
.invoice-container .invoice-header address {
	font-size: 0.8rem;
	color: #000000;
	margin: 10;
}
.invoice-container .invoice-details {
	margin: 1rem 0 0 0;
/*padding: 1rem;*/
line-height: 180%;
/*background: #f5f6fa;*/
}
.invoice-container .invoice-details .invoice-num {
	text-align: right;
	font-size: 0.8rem;
}
.invoice-container .invoice-body {
	padding: 1rem 0 0 0;
}
.invoice-container .invoice-footer {
	text-align: center;
	font-size: 0.7rem;
	margin: 5px 0 0 0;
}
.text-right{
	text-align: right; 
}
.invoice-status {
	text-align: center;
/*padding: 1rem;*/
background: #ffffff;
/*-webkit-border-radius: 4px;
-moz-border-radius: 4px;*/
border-radius: 4px;
margin-bottom: 1rem;
}
.invoice-status h2.status {
	margin: 0 0 0.8rem 0;
}
.invoice-status h5.status-title {
	margin: 0 0 0.8rem 0;
	color: #9fa8b9;
}
.invoice-status p.status-type {
	margin: 0.5rem 0 0 0;
	padding: 0;
	line-height: 150%;
}
.invoice-status i {
	font-size: 1.5rem;
	margin: 0 0 1rem 0;
	display: inline-block;
	padding: 1rem;
	background: #f5f6fa;
/*-webkit-border-radius: 50px;
-moz-border-radius: 50px;*/
/*border-radius: 50px;*/
}
.invoice-status .badge {
	text-transform: uppercase;
}

@media (max-width: 767px) {
	.invoice-container {
		padding: 1rem;
	}
}


.custom-table {
	border: 1px solid black;
	border-collapse: collapse;
}
.custom-table .th1,.th2 {
	background: #b3ccff;
/*color: #7094db;*/
}
.custom-table thead .th2 {
	border: 0;
	font-style: italic;
}
/*.custom-table > tbody tr:hover {
/*background: #fafafa;*/
/* } */
.custom-table > tbody tr:nth-of-type(even) {
	background-color: #ffffff;

}
.custom-table > tbody tr {
	border-collapse: collapse;
	border-spacing: 0;
	width: 100%;
	border: 1px solid #ddd;
}
.custom-table > tfoot tr {
	border-collapse: collapse;
	border-spacing: 0;
	width: 100%;
	border: 1px solid #ddd;
}

th, td {
	text-align: left;
	padding: 5px;
}

tbody tr:nth-child(even) {
	background-color: #f2f2f2;
}



.text-success {
	color: #00bb42 !important;
}

.text-muted {
	color: #9fa8b9 !important;
}

.custom-actions-btns {
	margin: auto;
	display: flex;
	justify-content: flex-end;
}

.custom-actions-btns .btn {
	margin: .3rem 0 .3rem .3rem;
}
.add{
	margin-left: 20%;
}
.image{
	flex-basis: 70%;
	order: 2;
}
</style>
</head>
<body>
	<div class="container" id="cnvt">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="card">
					<div class="card-body p-0">
						<div class="invoice-container">
							<div class="invoice-header">
								<div class="invoice-body">
									<div class="row gutters">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="invoice-details">
												<table style="width: 100%">
														<thead>
															<th><h2 style="color: #800000"><?=$buyers->company_name?></h2></th>
															<th><h2 style="color: #0099cc">PRO FORMA INVOICE</h2></th>
														</thead>
														<tbody>
														<tr>
															<td>
																State addres: <?=$buyers->office_address?>,<?=$buyers->state?><br>
																City ,Sp ZIp <?=$buyers->city?>,<?=$buyers->area_pincode?><br>
																Phone No: <?=$buyers->mobile_no?><br>
																Email: <?=$buyers->email_id?><br>
																<br>
															</td>
															<td>
																Date:<?=date('d-M-Y')?><br>
																INVOICE:<?=$invoice?><br>
																Date of Expiry:<?=$expiry_date?><br>
																CUSTOMER:<?=$seller->full_name?><br>
																SALES REP. NAME:<?=$seller->company_name?><br>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<div class="invoice-body">
									<div class="row gutters">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="table-responsive">
												<table class="table  custom-table m-0" width="100%" style="margin-bottom: 10px">
													<thead>
														<tr class="th1">
															<td>BILL FROM</td>
															<td>SHIP TO</td>
														</tr>
													</thead>
													<tbody>
														<td>Name :<?=$buyers->full_name?>
															Addres: <?=$buyers->office_address?><br>
															City ,State ZIp: <?=$buyers->city?>,<?=$buyers->area_pincode?><br>
															Phone No:<?=$buyers->mobile_no?><br></td>
														<td>
															Name :<?=$seller->full_name?>
															Addres: <?=$seller->office_address?><br>
															City ,State ZIp: <?=$seller->city?>,<?=$seller->area_pincode?><br>
															Phone No:<?=$seller->mobile_no?><br>
														</td>
													</tbody>
												</table>
												<table class="table  custom-table m-0" width="100%" style="margin-bottom: 10px">
													<thead>
														<tr class="th1">
															<td>SHIPPING DETAILS</td>
															<td><?=$seller->office_address?>,<?=$seller->city?>,<?=$seller->area_pincode?></td>
														</tr>
													</thead>
													<tbody>
														<td></td>
														<td></td>
													</tbody>
												</table>
												<table class="table  custom-table m-0" width="100%">
											        <thead>
											        	<tr class="th1">
											        		<td>Item#</td>
											        		<td>Description</td>
											        		<td>Qty</td>
											        		<td>Unit Price</td>
											        		<td>Line Total</td>
											        	</tr>
											        </thead>
											        <tbody>
											        	<tr style="border-collapse: collapse;border-spacing: 0;width: 100%;border: 1px solid #ddd;">
											        		<td><?=$service_details->product_name?></td>
											        		<td><?=$service_details->description?></td>
											        		<td><?=$service_details->qnt?></td>
											        		<td><?=$service_details->price?></td>
											        		<td><?=$service_details->price?></td>
											        	</tr>
											        </tbody>
										        	<tfoot>
										        		<tr>
										        			<td colspan="4" style="text-align: right">
										        				Subtotal
										        			</td>
										        			<td><?=$service_details->price?></td>
										        		</tr>
										        	</tfoot>
										        </table>
										        <h3>Service Charge Pay Details</h3>
										        <table class="table  custom-table m-0" width="100%">
										        	<thead>
										        		<tr class="th1">
										        			<td>service_charges</td>
										        			<?php if($buyers->state=="Maharashtra"){?>
										        			<td>CGST</td>
										        			<td>SGST</td>
										        		    <?php }else{?>
										        			<td>ISGST</td>
										        		    <?php }?>
										        		    <?php if($buyers->state=="Maharashtra"){?>
										        			<td>CGST Price</td>
										        			<td>SGST Price</td>
										        			<?php }else{?>
										        			<td>IGST Price</td>
										        			<?php }?>
										        			<td>Total Service Charge</td>
										        		</tr>
										        	</thead>
										        	<tbody>
										        		<tr>
										        			<td><?=$service_charge->service_charges?></td>
										        			<?php if($buyers->state=="Maharashtra"){?>
										        			<td><?=$service_charge->cgst?></td>
										        			<td><?=$service_charge->sgst?></td>
										        		    <?php }else{?>
										        			<td><?=$service_charge->gst?></td>
										        		    <?php }?>
										        		    <?php if($buyers->state=="Maharashtra"){?>
										        			<td><?=$service_charge->cgst_price?></td>
										        			<td><?=$service_charge->sgst_price?></td>
										        			<?php }else{?>
										        			<td><?=$service_charge->gst_price?></td>
										        			<?php }?>
										        			<td><?=$service_charge->total_price?></td>
										        		</tr>
										        	</tbody>
										        </table>

    										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>