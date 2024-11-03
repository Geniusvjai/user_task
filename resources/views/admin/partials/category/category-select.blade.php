<label for="productname-field" class="form-label">Parent Category</label>
<select class="select2" id="parentCategory" name="parent_id">
	<option value="0">-- Select Parent --</option>
	@foreach ($categories as $category)
		<option value="{{ $category->id }}" {{ isset($currentCategory) && $currentCategory->parent_id == $category->id ? 'selected' : '' }}>
			{{ $category->name }}
		</option>
		@if ($category->children)
			@foreach ($category->children as $child)
				<option value="{{ $child->id }}" {{ isset($currentCategory) && $currentCategory->parent_id == $child->id ? 'selected' : '' }}>
					{!! str_repeat('&nbsp;', 4) !!}→ {{ $child->name }}
				</option>
				@if ($child->children)
					@include('admin.partials.category.child-options', ['children' => $child->children, 'level' => 2])
				@endif
			@endforeach
		@endif
	@endforeach
</select>
