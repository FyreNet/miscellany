@if(Auth::check() && !isset($exporting))
    <div class="btn-group entity-actions-update">
    @can('update', $model)
        <a href="{{ route($name . '.edit', ['id' => $model->id]) }}" class="btn btn-primary">
            <i class="fa fa-edit" aria-hidden="true"></i> {{ trans('crud.update') }}
        </a>
    @endcan
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <span></span>
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
            @can('create', $model)
            <li>
                <a href="{{ route($name . '.create') }}">
                    <i class="fa fa-plus" aria-hidden="true"></i> {{ trans('crud.actions.new') }}
                </a>
            </li>
            <li>
                <a href="{{ route($name . '.create', ['copy' => $model->id]) }}">
                    <i class="fa fa-copy" aria-hidden="true"></i> {{ trans('crud.actions.copy') }}
                </a>
            </li>
            @endcan

            @if ((empty($disableMove) || !$disableMove) && Auth::user()->can('move', $model))
            <li>
                <a href="{{ route('entities.move', $model->entity->id) }}">
                    <i class="fa fa-exchange-alt" aria-hidden="true"></i> {{ trans('crud.actions.move') }}
                </a>
            </li>
            @endif

            @if ($model->entity)
            <li>
                <a href="{{ route('entities.export', $model->entity) }}">
                    <i class="fa fa-download" aria-hidden="true"></i> {{ trans('crud.actions.export') }}
                </a>
            </li>
            @endif
            @can('delete', $model)
            <li>
                <br />
                <button class="btn btn-danger btn-flat delete-confirm btn-block" data-name="{{ $model->name }}" data-toggle="modal" data-target="#delete-confirm">
                    <i class="fa fa-trash" aria-hidden="true"></i> {{ trans('crud.remove') }}
                </button>
                {!! Form::open(['method' => 'DELETE','route' => [$name . '.destroy', $model->id], 'style'=>'display:inline', 'id' => 'delete-confirm-form']) !!}
                {!! Form::close() !!}
            </li>
            @endcan
        </ul>
    </div>
@endif