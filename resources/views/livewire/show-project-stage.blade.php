<div class="table-responsive">
    <table class="table table-striped table-bordered w-100 mb-0">
        <thead>
        <tr>
            <th scope="col">{{ __('Content') }}</th>
            <th scope="col" class="col-1">{{ __('Positive') }}</th>
            <th scope="col" class="col-1">{{ __('Negative') }}</th>
            <th scope="col" class="col-1">{{ __('Potential') }}</th>
            <th scope="col" class="col-1">{{ __('Comment') }}</th>
            <th scope="col" class="col-1">{{ __('Info') }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($stage->getSortedEntries() as $entry)
            <tr>
                <td>
                    <x-icons.tooltip-icon :actAsButton='true' :icon='"info-circle"' :htmlColor='"dimgray"' :tooltip='__("Internal ID") . ": " . $entry["id"]'></x-icons.tooltip-icon>
                    @php($stageType = $entry['content']['questionnaire']['type'] ?? null)
                    @php($screeningItem = $entry['content']['screeningItem'] ?? null)
                    @php($isFocused = isset($screeningItem) ? $screeningItem->isFocused($stage['membership']['project']) : true)
                    @if(isset($stageType))<x-icons.tooltip-icon :actAsButton='true' :icon='$stageType["icon"]["name"]' :htmlColor='$stageType["color"]["hex"] . ($stage["active"] && $isFocused ? "ff" : "80")' :opacity='($stage["active"] && $isFocused) ? 100 : 50' :tooltip='__($stageType["name"]) . " " . $entry["content"]["questionnaire"]["stage_order_id"] . ": " . $entry["content"]["questionnaire"]["name"]'></x-icons.tooltip-icon>@endif
                    @if(!isset($stageType))<x-icons.tooltip-icon :actAsButton='true' :icon='"question-circle-fill"' :color='"danger"' :opacity='50' :tooltip='__("Outdated data")'></x-icons.tooltip-icon>@endif
                    {{ $entry['content']['short'] ?? __('Unknown content') }}
                </td>
                <td>
                    <x-icons.tooltip-icon :actAsButton='true' :icon='$isFocused ? $entry->getPositiveIconName() : "dash-circle-dotted"' :color='$isFocused ? "" : "secondary"' :htmlColor='$isFocused ? $entry->getPositiveIconColor() : ""' :tooltip='isset($entry["positive"]) ? $entry->getPositiveImportance() : __("No Answer")'></x-icons.tooltip-icon><span>{{ $entry['positive'] ?? '–' }}</span>
                </td>
                <td>
                    @if(isset($entry['content']))
                        @if($entry['content']['type']['shortname'] === 'screening-item')<x-icons.tooltip-icon :actAsButton='true' :icon='$entry->getNegativeIconName()' :htmlColor='$entry->getNegativeIconColor()' :tooltip='isset($entry["negative"]) ? $entry->getNegativeImportance() : __("No Answer")'></x-icons.tooltip-icon>{{ $entry['negative'] ?? '–' }}
                        @elseif($entry['content']['type']['shortname'] === 'appraisal-item')
                            @if(isset($entry['negative']) && $entry['negative'] > 0)<x-icons.tooltip-icon :actAsButton='true' :icon='$entry->getNegativeIconName()' :htmlColor='$entry->getNegativeIconColor()' :tooltip='isset($entry["negative"]) ? $entry->getNegativeImportance() : __("No Answer")'></x-icons.tooltip-icon>{{ $entry['negative'] ?? '–' }}
                            @else<x-icons.tooltip-icon :actAsButton='true' :icon='"dash-circle-dotted"' :color='"secondary"' :tooltip='__("Not Available")'></x-icons.tooltip-icon>@endif
                        @endif
                    @endif
                </td>
                <td>
                    @if(isset($entry['content']))
                        @if($entry['content']['type']['shortname'] === 'screening-item')<x-icons.tooltip-icon :actAsButton='true' :icon='$entry->getPotentialIconName()' :htmlColor='$entry->getPotentialIconColor()' :tooltip='isset($entry["potential"]) ? ($entry["potential"] >= 0 ? (($entry["potential"] > 0 ? __("Yes") : __("No"))) : __("Unknown")) : __("No Answer")'></x-icons.tooltip-icon>{{ $entry['potential'] ?? '–' }}@else<x-icons.tooltip-icon :actAsButton='true' :icon='"dash-circle-dotted"' :color='"secondary"' :tooltip='__("Not Available")'></x-icons.tooltip-icon>@endif
                    @endif
                </td>
                <td>
                    <x-icons.tooltip-icon :actAsButton='true' :icon='$entry["comment"] != null ? "chat-dots-fill" : "chat"' :htmlColor='$entry["comment"] != null ? "dimgray" : "silver"' :tooltip='$entry["comment"]["text"] ?? ""'></x-icons.tooltip-icon>
                </td>
                <td>
                    @if($entry['updated_at'] != null)
                        <x-icons.tooltip-icon :actAsButton='true' :icon='"clock-history"' :htmlColor='"dimgray"' :tooltip='__("Last updated on :date at :time.", ["date" => $entry["updated_at"]->format("d.m.Y") ?? __("unknown date"), "time" => $entry["updated_at"]->format("H:i") ?? __("unknown time")])'></x-icons.tooltip-icon>
                    @endif
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="6">
                    {{ __('No :things Available.', ['things' => __('Entries')]) }}
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
