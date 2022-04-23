<section class="content  text-dark">
          <div class="container-fluid">
            <div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">List of Service Requests</h3>
		<div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered table-stripped dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
				<colgroup>
					<col width="5%">
					<col width="35%">
					<col width="25%">
					<col width="25%">
					<col width="10%">
				</colgroup>
				<thead>
					<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 35.9062px;">#</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date Created: activate to sort column ascending" style="width: 309.094px;">Date Created</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Client Name: activate to sort column ascending" style="width: 220.109px;">Client Name</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Service: activate to sort column ascending" style="width: 224.359px;">Service</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 89.3438px;">Status</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 69.1875px;">Action</th></tr>
				</thead>
				<tbody>
											
									<tr class="odd">
							<td class="text-center sorting_1">1</td>
							<td>2021-09-30 14:48</td>
							<td>Mike Williams</td>
							<td>
								<p class="m-0 truncate-3">
								Change Oil, Engine Tune up, Tire Replacement	
								</p>
							</td>
							<td class="text-center">
																	<span class="badge badge-warning">On-progress</span>
															</td>
							<td align="center" class="">
								 <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu" style="">
				                    <a class="dropdown-item view_data" href="javascript:void(0)" data-id="1"><span class="fa fa-eye text-primary"></span> View</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item edit_data" href="javascript:void(0)" data-id="1"><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="1"><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</td>
						</tr></tbody>
			</table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
		</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this service request permanently?","delete_service_request",[$(this).attr('data-id')])
		})
		$('.view_data').click(function(){
			uni_modal("Service Request Details","service_requests/view_request.php?id="+$(this).attr('data-id'),'large')
		})
		$('#create_new').click(function(){
			uni_modal("Service Request Details","service_requests/manage_request.php",'large')
		})
		$('.edit_data').click(function(){
			uni_modal("Service Request Details","service_requests/manage_request.php?id="+$(this).attr('data-id'),'large')
		})
		$('.table').dataTable();
	})
	function delete_service_request($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_request",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>          </div>
        </section>