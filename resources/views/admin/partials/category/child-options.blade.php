@foreach ($children as $child)
	<option value="{{ $child->id }}"
		{{ isset($currentCategory) && $currentCategory->parent_id == $child->id ? 'selected' : '' }}>
		{!! str_repeat('&nbsp;', 4 * $level) !!}→ {{ $child->name }}
	</option>
	@if ($child->children)
		@include('admin.partials.category.child-options', ['children' => $child->children,'level' => $level + 1,])
	@endif
@endforeach
