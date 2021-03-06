<div class="box box-flat">
    <div class="box-body">
        <h2 class="page-header with-border">
            {{ trans('characters.show.tabs.dice_rolls') }}
        </h2>

        <?php  $r = $model->diceRolls()->acl()->orderBy('name', 'ASC')->with([])->paginate(); ?>
        <table id="character-dice_rolls" class="table table-hover {{ $r->count() === 0 ? 'export-hidden' : '' }}">
            <tbody><tr>
                <th class="avatar"><br /></th>
                <th>{{ trans('dice_rolls.fields.name') }}</th>
                <th class="visible-sm">{{ trans('dice_rolls.fields.parameters') }}</th>
                <th>{{ trans('dice_rolls.fields.rolls') }}</th>
                <th>&nbsp;</th>
            </tr>
            @foreach ($r as $dice_roll)
                <tr>
                    <td>
                        <a class="entity-image" style="background-image: url('{{ $dice_roll->getImageUrl(true) }}');" title="{{ $dice_roll->name }}" href="{{ route('dice_rolls.show', $dice_roll->id) }}"></a>
                    </td>
                    <td>
                        <a href="{{ route('dice_rolls.show', $dice_roll->id) }}" data-toggle="tooltip" title="{{ $dice_roll->tooltip() }}">{{ $dice_roll->name }}</a>
                    </td>
                    <td class="visible-sm">{{ $dice_roll->parameters }}</td>
                    <td>{{ $dice_roll->diceRollResults()->count() }}</td>
                    <td class="text-right">
                        <a href="{{ route('dice_rolls.show', ['id' => $dice_roll->id]) }}" class="btn btn-xs btn-primary">
                            <i class="fa fa-eye" aria-hidden="true"></i> <span class="visible-sm">{{ trans('crud.view') }}</span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $r->links() }}
    </div>
</div>