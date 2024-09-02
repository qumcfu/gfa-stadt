<div>
    <div wire:loading>
        Processing Payment...
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered w-100 mb-0">
            <thead>
            <tr>
                <th scope="col">{{ __('Project Stage') }}</th>
                <th scope="col">{{ __('Info') }}</th>
                <th scope="col">{{ __('Actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @forelse($membership['stages'] as $stage)
                <tr>
                    <td>
                        <x-icons.tooltip-icon :actAsButton='true' :icon='"info-circle"' :htmlColor='"dimgray"' :tooltip='__("Internal ID") . ": " . $stage["id"]'></x-icons.tooltip-icon>

                        @if($stage['active'])
                            <x-icons.tooltip-icon :actAsButton='true' :icon='"patch-check-fill"' :htmlColor='$stage["type"]["color"]["hex"]' :tooltip='__("Active")'></x-icons.tooltip-icon>
                        @else
                            <x-icons.tooltip-icon :actAsButton='true' :icon='"shield-fill-check"' :htmlColor='$stage["type"]["color"]["hex"] . "80"' :tooltip='__("Inactive")'></x-icons.tooltip-icon>
                        @endif

                        @php($totalEntryCount = count($stage['entries'] ?? []))
                        @php($focusedEntryCount = $stage->getFocusedEntryCount() ?? 0)
                        {{ __($stage['type']['name'] ?? 'Unknown Stage') . ' (' }}<b>{{ $focusedEntryCount }}</b>@if($totalEntryCount !== $focusedEntryCount){{ '/' . $totalEntryCount }}@endif{{ ' ' . __('Entries') . ')' }}
                        @if($stage['author_id'] !== $stage['membership']['user']['id'])<x-icons.tooltip-icon :actAsButton='true' :icon='"person"' :color='"danger"' :tooltip='__("Created by :author.", ["author" => $stage["author"]["username"] ?? __("Unknown User")])'></x-icons.tooltip-icon>@endif
                    </td>
                    <td>
                        <x-icons.tooltip-icon :actAsButton='true' :icon='"clock"' :htmlColor='"dimgray"' :tooltip='$stage->getCreatedAtTimestamp(false)'></x-icons.tooltip-icon>
                        @if(count($stage['entries']) > 0)
                            <x-icons.tooltip-icon :actAsButton='true' :icon='"clock-history"' :htmlColor='"dimgray"' :tooltip='$stage->getTimestampOfLatestEntry()'></x-icons.tooltip-icon>
                        @endif
                    </td>
                    <td>
                        <x-buttons.icon-toggle-modal :actAsButton='true' :icon='"search"' :color='"primary"' :tooltip='__("Show :things", ["things" => __("Entries")])' :target='"#show-stage-modal-" . $stage["id"]' :modalId='$membership["id"]'></x-buttons.icon-toggle-modal>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">
                        {{ __('No :things Available.', ['things' => __('Project Stages')]) }}
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div x-data="showMembershipData()" x-init="initializeTooltips()"></div>
</div>

@script
<script>
    window.showMembershipData = () => {
        return {
            initializeTooltips () {
                reinitializeTooltips()
            }
        }
    }
</script>
@endscript
