<x-layouts.admin>
    <x-slot name="title">
        {{ trans_choice('general.module', 2) }}
    </x-slot>

    <x-slot name="favorite"
        title="{{ trans_choice('general.module', 2) }}"
        icon="extension"
        route="module.index"
    ></x-slot>

    <x-slot name="buttons">
        @can('create-settings-module')
            <x-link href="{{ route('module.create') }}" kind="primary" id="index-more-actions-new-module">
                {{ trans('general.title.new', ['type' => trans_choice('general.module', 1)]) }}
            </x-link>
        @endcan
    </x-slot>

    <x-slot name="moreButtons">
        <x-dropdown id="dropdown-more-actions">
            <x-slot name="trigger">
                <span class="material-icons pointer-events-none">more_horiz</span>
            </x-slot>

            @can('create-settings-module')
                <x-dropdown.link href="{{ route('import.create', ['settings', 'module']) }}" id="index-more-actions-import-module">
                    {{ trans('import.import') }}
                </x-dropdown.link>
            @endcan

            <x-dropdown.link href="{{ route('module.export', request()->input()) }}" id="index-more-actions-export-module">
                {{ trans('general.export') }}
            </x-dropdown.link>
        </x-dropdown>
    </x-slot>

    <x-slot name="content">
        <x-index.container>
            <x-index.search
                search-string="App\Models\Setting\Module"
                bulk-action="App\BulkActions\Settings\Module"
            />

            <x-table>
                <x-table.thead>
                    <x-table.tr>
                        <x-table.th kind="bulkaction">
                            <x-index.bulkaction.all />
                        </x-table.th>

                        <x-table.th class="w-5/12">
                            <x-sortablelink column="alias" title="{{ trans('general.alias') }}" />
                        </x-table.th>

                        <x-table.th class="w-5/12">
                            <x-sortablelink column="enabled" title="{{ trans('general.status') }}" />
                        </x-table.th>

                        <x-table.th class="w-2/12">
                            {{ trans('general.created_at') }}
                        </x-table.th>
                    </x-table.tr>
                </x-table.thead>

                <x-table.tbody>
                    @foreach($module as $module)
                        <x-table.tr href="{{ route('module.edit', $module->id) }}">
                            <x-table.td kind="bulkaction">
                                <x-index.bulkaction.single 
                                    id="{{ $module->id }}"
                                    name="{{ $module->alias }}"
                                />
                            </x-table.td>

                            <x-table.td class="w-5/12">
                                {{ $module->alias }}
                            </x-table.td>

                            <x-table.td class="w-5/12">
                                @if ($module->enabled)
                                    <x-index.enable text="{{ trans_choice('general.module', 1) }}" />
                                @else
                                    <x-index.disable text="{{ trans_choice('general.module', 1) }}" />
                                @endif
                            </x-table.td>

                            <x-table.td class="w-2/12">
                                {{ $module->created_at->format('Y-m-d') }}
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </x-table.tbody>
            </x-table>

            <x-pagination :items="$module" />
        </x-index.container>
    </x-slot>

    <x-script folder="settings" file="module" />
</x-layouts.admin>
