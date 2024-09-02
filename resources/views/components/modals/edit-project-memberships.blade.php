<div class="modal fade" id="edit-project-memberships-modal-{{ $project['id'] }}" tabindex="-1" aria-labelledby="edit-project-memberships-modal-label-{{ $project['id'] }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <div class="modal-header bg-body-secondary text-wrap">
                <h5 class="modal-title" id="edit-project-settings-modal-label-{{ $project['id'] }}">{{ __('Members of :project', ['project' => $project['name']]) }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <nav>
                    <div class="nav nav-underline" id="nav-tab-memberships" role="tablist">
                        <button class="nav-link active" id="nav-memberships-tab" data-bs-toggle="tab" data-bs-target="#nav-memberships" type="button" role="tab" aria-controls="nav-memberships" aria-selected="true">{{ __('Members') }}</button>
                        <button class="nav-link" id="nav-about-roles-tab" data-bs-toggle="tab" data-bs-target="#nav-about-roles" type="button" role="tab" aria-controls="nav-about-roles" aria-selected="false">{{ __('About roles') }}</button>
                    </div>
                </nav>
                <div class="tab-content pt-3" id="nav-tab-memberships-content">
                    <div class="tab-pane fade show active" id="nav-memberships" role="tabpanel" aria-labelledby="nav-general-tab" tabindex="0">
                        @foreach($project->getSortedMemberships('last_login', 'desc') as $membership)
                            @php($user = $membership['user'])
                            @php($screeningStage = $membership->getScreeningStage())
                            @php($screeningEntries = $screeningStage['entry_count'] ?? 0)
                            @php($screeningTotal = $project['scr_count'])
                            @php($screeningProgress = $screeningEntries/max($screeningTotal, 1.0))
                            @php($appraisalStage = $membership->getAppraisalStage())
                            @php($appraisalEntries = $appraisalStage['entry_count'] ?? 0)
                            @php($appraisalTotal = $project['app_count'])
                            @php($appraisalProgress = $appraisalEntries/max($appraisalTotal, 1.0))
                            @php($hours = $user->getHoursSinceLastLogin())
                            @php($days = round($hours / 24))

                            <div id="project-memberships-user-holder-{{ $membership['id'] }}">
                                <div class="row" id="project-memberships-user-{{ $membership['id'] }}">
                                    <div class="col-10 pb-2 @if(!$membership['active']) text-secondary @endif">
                                        <div>
                                            {{ $user['username'] }}
                                            <a href="mailto:{{ $user['email'] }}" class="bi-envelope text-dark ms-1"></a>
                                        </div>
                                        <div class="text-small" id="current-role-holder-{{ $membership['id'] }}"><span id="current-role-{{ $membership['id'] }}">{{ __('is') }} <b>{{ __($membership['role']['name']) }}</b>, @if($hours > 8766){{ __('was logged in more than a year ago') }}@elseif($hours > 36){{ __('was logged in :days days ago', ['days' => $days]) }}@elseif($hours >= 24){{ __('was logged in about a day ago') }}@else{{ __('was logged in within the last 24 hours') }}@endif{{ !$membership['active'] ? ',' : '' }}@if(!$membership['active'])<span>{!! ' ' . __('is marked :mark', ['mark' => '<span class="fw-bold">' . __('inactive[a]') . '</span>']) . ' ' !!}</span>@endif {{ __('and') }}</span></div>
                                        <div class="text-small">{!! __('answered :s1 out of :s2 questions in the screening and :a1 out of :a2 questions in the appraisal.', ['s1' => "<span class='fw-bold'><span class='text-" . ($membership['active'] ? ($screeningProgress < 0.5 ? 'danger' : ($screeningProgress < 0.9 ? 'warning' : ($screeningProgress < 0.997 ? 'success' : 'dark'))) : 'secondary') . "'>" . $screeningEntries . "</span>", 's2' => $screeningTotal . "</span>", 'a1' => "<span class='fw-bold'><span class='text-" . ($membership['active'] ? ($appraisalTotal === 0 ? 'dark' : ($appraisalProgress < 0.5 ? 'danger' : ($appraisalProgress < 0.9 ? 'warning' : ($appraisalProgress < 0.997 ? 'success' : 'dark')))) : 'secondary') . "'>" . $appraisalEntries. "</span>", 'a2' => $appraisalTotal . "</span>"]) !!}</div>
                                    </div>
                                    <div class="col-2" id="project-memberships-roles-holder-{{ $membership['id'] }}">
                                        <div id="project-memberships-roles-{{ $membership['id'] }}">
                                            <div class="text-end">
                                                <div class="text-nowrap">
                                                    @foreach($roles as $role)
                                                        @php($isOwnMembership = $membership["id"] === $ownMembership["id"])
                                                        @php($isAllowed = $ownMembership["role"]["access_level"] >= $role["access_level"] && $ownMembership["role"]["access_level"] >= $membership["role"]["access_level"])
                                                        @php($tooltip = $isAllowed && !$isOwnMembership ? ($role["id"] === $membership["role"]["id"] ? ($user["username"] . " " . __("is") . " " . __($role["name"]) . ".") : (__("Assign :user the role of “:role”", ["user" => $user["username"], "role" => __($role["name"])]))) : ($isOwnMembership ? __("You cannot change your own role.") : ($ownMembership["role"]["access_level"] < $membership["role"]["access_level"] ? __("You cannot change the role of this person as they have more extensive rights.") : __("You cannot assign roles with more extensive rights than your own."))))
                                                        <x-buttons.icon-on-click :function='"updateRole(" . $membership["id"] . ", " . $role["id"] . ")"' :icon='$role["icon"]' :color='$isAllowed && !$isOwnMembership ? ($role["id"] === $membership["role"]["id"] ? "dark" : "secondary") : "danger"' :size='$role["id"] === $membership["role"]["id"] ? 1.25 : 0.875' :class='"me-1"' :tooltip='$tooltip' :disabled='$isOwnMembership || !$isAllowed'></x-buttons.icon-on-click>
                                                    @endforeach
                                                    <x-buttons.icon-on-click :function='"toggleActive(" . $membership["id"] . ")"' :icon='"eye" . ($membership["active"] ? "" : "-slash")' :color='$membership["active"] ? "dark" : "secondary"' :size='1' :class='"ms-2"' :tooltip='__("Mark as :mark", ["mark" => $membership["active"] ? __("inactive[a]") : __("active[a]")])'></x-buttons.icon-on-click>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="nav-about-roles" role="tabpanel" aria-labelledby="nav-screening-tab" tabindex="0">
                        <h6 class="fw-bold">
                            Relevante Rollen
                        </h6>

                        <p>
                            Über die Registerkarte „Mitglieder“ können Sie den Beteiligten des Vorhabens Rollen zuweisen, die sich auf die Verfügbarkeit von Funktionen innerhalb dieses Tools auswirken. Folgende Rollen stehen mit den angegebenen Berechtigungen und Aufgabenfeldern zur Verfügung:
                        </p>

                        <ul class="mb-1">
                            <li>
                                Teilnehmer:innen
                                <ul>
                                    <li>Anwendung des Tools</li>
                                    <li>Nutzung der Kommentarfunktion für Verständnis- und/oder Rückfragen</li>
                                    <li>Teilnahme an Besprechungs- und Abstimmungsrunden</li>
                                </ul>
                            </li>
                            <li>
                                Koordinator:innen
                                <ul>
                                    <li>Einsicht in den Bearbeitungsstand von Mitgliedern und Vergabe von Rollen</li>
                                    <li>Alle Berechtigungen von Teilnehmer:innen</li>
                                </ul>
                            </li>
                            <li>
                                Projektleitung
                                <ul>
                                    <li>Einladung und Koordination der Nutzer:innen des Tools (Tool, Besprechungsrunden, allg. Ansprechpartner:in, Technischer Support)</li>
                                    <li>Durchführung der Analysevorbereitung (Scoping)</li>
                                    <li>Informationsübermittlung (aktueller Stand, Übergang zwischen den Phasen, …)</li>
                                    <li>Zugang zu projektbezogenen Einstellungen</li>
                                    <li>Alle Berechtigungen von Koordinator:innen</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="modal-footer bg-body-secondary">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>

        </div>
    </div>
</div>
