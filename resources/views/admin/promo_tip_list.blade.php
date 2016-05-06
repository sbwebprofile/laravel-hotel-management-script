
@include('admin.header.header')
@include('admin.common.nav')

  <section id="content">
    <section class="main padder">
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
             <h3>Promotional Tips</h3>
			
            </header>
            <div class="panel-body">
              <div class="row text-small">
                <div class="col-sm-4 m-b-mini">
                  <select class="input-sm inline form-control" id="filter-form-client" style="width:130px">
                    <option value="0" onClick="$('#form-client').attr('action','');">Select Action</option>
                    <option value="1" onClick="$('#form-client').attr('action','client/delete_clients');">Delete Selected</option>
                    <option value="2" onClick="$('#form-client').attr('action','client/view_details_multiple_client_page');">View Details</option>
                  </select>
                  <button class="btn btn-sm btn-white" onClick="checkClientFormBeforeSubmit(this)">Apply</button>                
                </div>
                <div class="col-sm-4 m-b-mini">
                </div>
				 <form action="client/search_client" method="post" id="form-search-client" >
					<div class="col-sm-4">
					  <div class="input-group"> 
							<input type="text" name="keyword-search-client" class="input-sm form-control" placeholder="Search by name or location or contact number">
							<span class="input-group-btn">
							  <input class="btn btn-sm btn-white" type="submit" value="Go!">
							</span>
					  </div>
					</div>
				</form> 
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped b-t text-small">
                <thead>
                  <tr>
                    <th width="20"><input type="checkbox"></th>
                    <th width="60">ID</th>
                    <th>Title</th>
                    <th>Created At</th>
                    <th>Attachment</th>
                    <th width="200">Action</th>
                  </tr>
                </thead>
                <tbody>
				<form action="" id="form-client" method="post">
				<?php 
				if($promo_tips){
					foreach($promo_tips as $promo){?>
				 <tr>
					<td><input type="checkbox" name="clients[]" value=""></td>
							<td><?php echo $promo->id; ?></td>
							<td><?php echo $promo->title?></td>
							<td><?php echo $promo->created_at; ?></td>
							<td><img src="{{URL::to('/')}}/promo-tips-images/<?php echo $promo->image_url; ?>" width="100" height="100" alt="" /></td>
							<td>
							  <a href="" class="btn btn-success btn-xs">View</a>
							  <a href="" class="btn btn-info btn-xs">Edit</a>
							  <a href="" class="btn btn-danger btn-xs" onClick="if(confirm('Are you sure to delete?')) {return true;} else{return false;}">Delete</a>
							</td>
						  </tr>
					<?php 
					}
				}else{?>  
					<tr>
						<td colspan="5" style="text-align: center;"><h5> No promotional tip created yet</h5></td>
					</tr>
				<?php } ?>
					
				</form>
                </tbody>
              </table>
            </div>
            <footer class="panel-footer">
              <div class="row">
                 <div class="col-sm-4 hidden-xs">
                  <select class="input-sm inline form-control" id="filter-form-client-down" style="width:130px">
                    <option value="0" onClick="$('#form-client').attr('action','');">Select Action</option>
                    <option value="1" onClick="$('#form-client').attr('action','client/delete_clients');">Delete Selected</option>
                    <option value="2" onClick="$('#form-client').attr('action','client/view_details_multiple_client_page');">View Details</option>
                  </select>
                  <button class="btn btn-sm btn-white" onClick="checkClientFormBeforeSubmit(this)">Apply</button>                 
                </div> 
                <div class="col-sm-3 text-center">
                 <!--  <small class="text-muted inline m-t-small m-b-small">showing 20-30 of 50 items</small> -->
                </div>
                <div class="col-sm-5 text-right text-center-sm">                
                  <ul class="pagination pagination-small m-t-none m-b-none">
                    <!-- <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i></a></li> -->
					<!-- Show pagination links -->
					
					{!! $promo_tips->render() !!}
					
                  </ul>
                </div>
              </div>
            </footer>
          </section>
        </div>
      </div>
    </section>
  </section>
 
  @include('admin.footer.footer')