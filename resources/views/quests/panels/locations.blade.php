<div class="box box-flat">
    <div class="box-body">
        <h2 class="page-header with-border">
            {{ trans('quests.show.tabs.locations') }}
        </h2>
        @can('update', $model)
        <p class="text-right">
            <a href="{{ route('quests.quest_locations.create', ['quest' => $model->id]) }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> {{ trans('quests.show.actions.add_location') }}
            </a>
        </p>
        @endcan

        <div class="row">
            @foreach ($model->locations()->acl()->with('location')->get() as $location)
                @if ($location->location)
                <div class="col-md-6">
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-success">
                            @if ($location->location->image)
                                <img class="direct-chat-img" src="{{ $location->location->getImageUrl(true) }}" alt="{{ $location->location->name }}">
                            @endif
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">
                                <a href="{{ route('locations.show', $location->location) }}" data-toggle="tooltip" title="{{ $location->location->tooltip() }}">
                                    {{ $location->location->name }}
                                </a>
                                @if ($location->is_private)
                                    <i class="fas fa-lock" title="{{ trans('crud.is_private') }}"></i>
                                @endif
                            </h3>
                        </div>
                        <div class="box-body">
                            <p>{!! $location->description !!}</p>
                        </div>
                        <div class="box-footer text-right">
                            @can('update', $model)
                                <a href="{{ route('quests.quest_locations.edit', ['quest' => $model, 'questLocation' => $location]) }}" class="btn btn-xs btn-primary">
                                    <i class="fa fa-edit"></i> {{ trans('crud.edit') }}
                                </a>
                                {!! Form::open(['method' => 'DELETE','route' => ['quests.quest_locations.destroy', 'quest' => $model, 'questLocation' => $location],'style'=>'display:inline']) !!}                <button class="btn btn-xs btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i> {{ trans('crud.remove') }}
                                </button>
                                {!! Form::close() !!}
                            @endcan
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>