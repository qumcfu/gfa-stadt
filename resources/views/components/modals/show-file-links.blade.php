<div class="modal fade" id="show-file-links-modal-{{ $file['id'] }}" tabindex="-1" aria-labelledby="show-file-links-modal-label-{{ $file['id'] }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="show-file-links-modal-label-{{ $file['id'] }}">{{ __('File Links') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="show-file-links-modal-body-and-footer-holder-{{ $file['id'] }}">
                <div id="show-file-links-modal-body-and-footer-{{ $file['id'] }}">
                    <div class="modal-body">

                        <p class="">
                            {{ __('This file belongs to the following projects:') }}
                        </p>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered w-100 mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">{{ __('Project') }}</th>
                                    <th scope="col">{{ __('Info') }}</th>
                                    <th scope="col">{{ __('Actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($file['links'] as $link)
                                        <tr>
                                            <td>
                                                <x-icons.tooltip-icon :actAsButton='true' :icon='"check-circle-fill"' :htmlColor='$link["project"]["color"]["hex"] ?? "#606060"' :tooltip='($link["project"]["name"] ?? __("Unknown Project"))'></x-icons.tooltip-icon>
                                                {{ $link['project']['name'] ?? __('Unknown Project') }}
                                            </td>
                                            <td class="text-nowrap">
                                                <x-icons.tooltip-icon :actAsButton='true' :icon='"info-circle"' :htmlColor='"dimgray"' :tooltip='__("Internal ID") . ": " . $link["id"]'></x-icons.tooltip-icon>
                                                <x-icons.tooltip-icon :actAsButton='true' :icon='"clock"' :htmlColor='"dimgray"' :tooltip='$link->getCreatedAtTimestamp()'></x-icons.tooltip-icon>
                                            </td>
                                            <td>
                                                <x-buttons.icon-on-click :function='"removeFileLink(" . $file["id"] . ", " . $link["project"]["id"] . ")"' :icon='"trash-fill"' :color='"danger"' :class='"px-1"' :tooltip='__("Remove file from project")'></x-buttons.icon-on-click>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">{{ __('This file does not currently belong to any project.') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="modal-footer bg-body-secondary p-2">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <x-buttons.toggle-modal :target='"#add-file-link-modal-" . $file["id"]' :color='"primary"' :class='"btn-sm"' :origin='"show-file-links-modal-" . $file["id"]' :disabled='$file->hasLinkToAllProjects()'>{{ __('Add file to project') }}</x-buttons.toggle-modal>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
