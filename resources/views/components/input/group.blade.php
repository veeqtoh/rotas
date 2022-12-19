@props([
    'label',
    'for',
    'error' => false,
    'tip',
])

<!-- Form -->
<div class="mb-4 row">
    <label for="{{$for}}" class="col-sm-3 col-form-label form-label">{{$label}}
        <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$tip}}"></i>
    </label>

    <div class="col-sm-9">
        {{$slot}}
        @if ('error')
            <span class="help-block text-danger">{{$error}}</span>
        @endif
    </div>
</div>
<!-- End Form -->
