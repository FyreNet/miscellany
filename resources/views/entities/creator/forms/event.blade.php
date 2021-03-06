@include('cruds.fields.type', ['base' => \App\Models\Event::class, 'trans' => 'events'])
<div class="form-group">
    <label>{{ trans('events.fields.date') }}</label>
    {!! Form::text('date', $formService->prefill('date', $source), ['placeholder' => trans('events.placeholders.date'), 'class' => 'form-control', 'maxlength' => 191]) !!}
</div>
@include('cruds.fields.location')