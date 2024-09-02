<div>
    <span class="text-button-no-hover auto-hover fw-bold" data-bs-toggle="modal" data-bs-target="#show-vulnerable-group-modal-{{ $group['id'] }}" style="color: {{ $group->getMeanValueColor($project) }};">{{ $group['text'] }}</span>
    <x-modals.show-vulnerable-group :group='$group' :project='$project'></x-modals.show-vulnerable-group>
</div>
