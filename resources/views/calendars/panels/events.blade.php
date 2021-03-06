<?php
/** @var \App\Models\Calendar $model */
/** @var \App\Models\EntityEvent $event */
?>
<div class="box box-flat">
    <div class="box-body">
        <h2 class="page-header with-border">
            {{ trans('calendars.show.tabs.events') }}
        </h2>

        <?php  $r = $model->calendarEvents()->with('entity')->entityAcl()->orderByRaw('date(`date`) DESC')->paginate(); ?>
        <table id="calendar-events" class="table table-hover {{ $r->count() === 0 ? 'export-hidden' : '' }}">
            <thead>
                <tr>
                    <th class="avatar"><br /></th>
                    <th>{{ __('crud.fields.entity') }}</th>
                    <th>{{ __('events.fields.date') }}</th>
                    <th>{{ __('calendars.fields.length') }}</th>
                    <th>
                        <i class="fa fa-comment" title="{{ __('calendars.fields.comment') }}" data-toggle="tooltip"></i>
                    </th>
                    <th>{{ __('calendars.fields.is_recurring') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($r as $event)
                <tr>
                    <td class="avatar">
                        <a class="entity-image" style="background-image: url('{{ $event->entity->child->getImageUrl(true) }}');" title="{{ $event->entity->name }}" href="{{ $event->entity->url() }}"></a>
                    </td>
                    <td>
                        <a href="{{ $event->entity->url() }}">{{ $event->entity->name }}</a>
                    </td>
                    <td>{{ $event->getDate() }}</td>
                    <td>{{ trans_choice('calendars.fields.length_days', $event->length, ['count' => $event->length]) }}</td>
                    <td>@if ($event->comment)
                        <i class="fa fa-comment" title="{{ $event->comment }}" data-toggle="tooltip"></i>
                    @endif</td>
                    <td>@if ($event->is_recurring)
                        <i class="fa fa-check"></i>
                    @endif</td>
                    <td>
                        @can('update', $model)
                            <a href="{{ route('entities.entity_events.edit', [$event->entity, $event->id]) }}" class="btn btn-xs btn-primary" data-toggle="ajax-modal" data-target="#entity-modal" data-url="{{ route('entities.entity_events.edit', [$event->entity->id, $event->id, 'next' => 'calendars.events']) }}">
                                <i class="fa fa-edit"></i> {{ trans('crud.edit') }}
                            </a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['entities.entity_events.destroy', $event->entity, $event->id], 'style'=>'display:inline']) !!}
                            <button class="btn btn-xs btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i> {{ trans('crud.remove') }}
                            </button>
                            {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $r->links() }}
    </div>
</div>