<!-- resources/views/components/data-table.blade.php -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header  border-0">
				<div class="d-flex align-items-center">
					<h5 class="card-title mb-0 flex-grow-1">{{ $title ?? 'Basic Datatables' }}</h5>
					<div class="flex-shrink-0">
						<button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#formModel"><i class="ri-add-line align-bottom me-1"></i> Create</button>
						<button class="btn btn-soft-danger" id="deleteSelected"><i class="ri-delete-bin-2-line"></i></button>
					</div>
				</div>
			</div>
			<div class="card-body">
				<table id="{{ $id ?? 'example' }}"
					class="table table-bordered dt-responsive nowrap table-striped align-middle"
					style="width:100%">
					<thead>
						<tr>
							<th scope="col" style="width: 10px;">
								<div class="form-check">
									<input class="form-check-input fs-15" type="checkbox"
										id="checkAll" value="option">
								</div>
							</th>
							@foreach ($columns as $column)
								<th>{{ $column }}</th> 
							@endforeach
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
