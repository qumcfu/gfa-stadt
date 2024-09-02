<div class="mb-2" style="margin-left: {{ min($level, 20) }}em;">

    <div class="text-nowrap" id="comment-{{ $comment['id'] }}">
        <div class="d-inline-block" style="vertical-align: top;">
            <span id="collapse-buttons-holder-{{ $comment['id'] }}">
                <span id="collapse-buttons-{{ $comment['id'] }}">
                    @if($allowInteraction && $comment->hasReplies())
                        <span id="collapse-replies-button-{{ $comment['id'] }}">
                            <x-buttons.icon-on-click :function='"collapseReplies(" . $comment["id"] . ")"' :icon='"caret-down"' :color='"dark"' :class='"px-1"' :tooltip='__("Collapse")'></x-buttons.icon-on-click>
                        </span>
                        <span id="unfold-replies-button-{{ $comment['id'] }}" hidden>
                            <x-buttons.icon-on-click :function='"unfoldReplies(" . $comment["id"] . ")"' :icon='"caret-right-fill"' :color='"dark"' :class='"px-1"' :tooltip='__("Unfold")'></x-buttons.icon-on-click>
                        </span>
                    @else
                        <div style="width: 20px;"></div>
                    @endif
                </span>
            </span>
        </div>
        <div class="d-inline-block">
            <span class="me-1" id="comment-text-holder-{{ $comment['id'] }}">
                <span class="me-1" id="comment-text-{{ $comment['id'] }}">
                    @if($comment['active'])
                        <span class="text-wrap">{{ substr($comment['text'], 0, strrpos($comment['text'], ' ', -1 * min(7, strlen($comment['text'])))) }}</span>
                        <span class="text-nowrap">{{ substr($comment['text'], strrpos($comment['text'], ' ', -1 * min(7, strlen($comment['text'])))) }}</span>
                    @else
                        <span class="text-body-secondary"><i>{{ __('This comment has been deleted.') }}</i></span>
                    @endif
                </span>
            </span>
            <span class="hide-when-printing" id="comment-icons-holder-{{ $comment['id'] }}">
                <span class="text-nowrap" id="comment-icons-{{ $comment['id'] }}">
                    @if($comment['active'])
                        @if($allowInteraction)
                            <x-buttons.icon-on-click :function='"toggleReply(" . $comment["id"] . ")"' :icon='"reply-fill"' :color='"dark"' :class='"px-1"' :tooltip='__("Reply[verb]")'></x-buttons.icon-on-click>
                        @endif
                        @if($allowInteraction && ($comment['author']['id'] ?? 0) === Auth::id())
                            <x-buttons.icon-on-click :function='"toggleEdit(" . $comment["id"] . ")"' :icon='"pencil"' :color='"primary"' :class='"px-1"' :tooltip='__("Edit")'></x-buttons.icon-on-click>
                            <div id="edit-spinner-{{ $comment['id'] }}" class="spinner-border text-primary" role="status" style="width: 0.9em; height: 0.9em;" hidden>
                                <span class="visually-hidden">{{ __('Saving Changes') }}...</span>
                            </div>
                            <x-buttons.icon-on-click :function='"toggleRemove(" . $comment["id"] . ")"' :icon='"x-lg"' :color='"danger"' :class='"px-1"' :tooltip='__("Remove")'></x-buttons.icon-on-click>
                        @endif
                        @if($allowInteraction && $comment['author']['id'] !== Auth::id())
                            @php($hasUpvote = $comment->getUpvoteForUserId(Auth::id())['active'] ?? false)
                            <x-buttons.icon-on-click :function='"toggleUpvote(" . $comment["id"] . ")"' :icon='"hand-thumbs-up" . ($hasUpvote ? "-fill" : "")' :color='"success"' :class='"px-1"' :id='"upvote-" . $comment["id"]' :tooltip='$hasUpvote ? __("Agree no longer") : __("Agree")'></x-buttons.icon-on-click>
                        @endif
                        @php($upvoteCount = $comment->getUpvoteCount())
                        @if($upvoteCount > 0)
                            <span data-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-delay='{"show":"100", "hide":"0"}' title="{{ $comment->getUpvoteTooltip() }}">
                                <span class="badge rounded-pill text-bg-success" style="font-size: 0.6em; cursor: default;">{{ $upvoteCount }}</span>
                            </span>
                        @endif
                    @endif
                </span>
            </span>
            <p class="text-body-secondary text-small mb-0" id="comment-info-holder-{{ $comment['id'] }}">
                <span class="text-wrap" id="comment-info-{{ $comment['id'] }}">
                    {{ $comment->getFormattedInfo() }}
                </span>
            </p>
        </div>
    </div>

    <div class="hide-when-printing" id="comment-edit-{{ $comment['id'] }}" hidden style="margin-left: 1.625em;">
        <div class="form-floating input-group has-validation">
            <textarea name="comment[{{ $comment['id'] }}][text]" id="comment-edit-textarea-{{ $comment['id'] }}" type="text" class="form-control w-100"
                      placeholder="{{ __('Comment') }}" style="height: 110px;" required>{{ old('comment.' . $comment['id'] . '.text') ?? $comment['text'] ?? '' }}</textarea>
            <label for="comment-edit-textarea-{{ $comment['id'] }}">{{ __('Comment') }}</label>
        </div>
        <div class="my-2">
            <button type="button" class="btn btn-sm btn-success" onclick="updateComment({{ $comment['id'] }})">{{ __('Save Changes') }}</button>
            <button type="button" class="btn btn-sm btn-secondary" onclick="toggleEdit({{ $comment['id'] }})">{{ __('Discard Changes') }}</button>
        </div>
    </div>

    <div class="hide-when-printing" id="comment-remove-{{ $comment['id'] }}" hidden>
        <div class=mb-1" id="remove-warning-holder-{{ $comment['id'] }}">
            <span id="remove-warning-{{ $comment['id'] }}">
                @if($comment->hasReplies())
                    <span class="text-danger text-small" style="margin-left: 2.125em;">
                        {{ __('Your comments have already been replied to. Do you really wish to remove it?') }}
                    </span>
                @endif

                <div class="mt-1 mb-2" style="margin-left: 1.625em;">
                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteComment({{ $comment['id'] }}, {{ $comment['comment_id'] ?? 0 }}, {{ $comment['entry']['content_id'] ?? 0 }})">{{ __('Remove Comment') }}</button>
                    <button type="button" class="btn btn-sm btn-secondary" onclick="toggleRemove({{ $comment['id'] }})">{{ __('Keep Comment') }}</button>
                </div>
            </span>
        </div>
    </div>

    <div class="hide-when-printing" id="comment-reply-{{ $comment['id'] }}" style="margin-left: 1.625em;" hidden>
        <div class="form-floating input-group has-validation mt-2">
            <textarea name="comment[{{ $comment['id'] }}][text]" id="reply-textarea-{{ $comment['id'] }}" type="text" class="form-control w-100"
                      placeholder="{{ __('Reply') }}" style="height: 110px;" required></textarea>
            <label for="reply-textarea-{{ $comment['id'] }}">{{ __('Reply[noun]') }}</label>
        </div>
        <div class="my-2">
            <button type="button" class="btn btn-sm btn-success" onclick="sendReply({{ $comment['id'] }})">{{ __('Submit Entry') }}</button>
            <button type="button" class="btn btn-sm btn-secondary" onclick="toggleReply({{ $comment['id'] }})">{{ __('Discard Entry') }}</button>
        </div>
    </div>

    <div id="replies-holder-{{ $comment['id'] }}">
        <div id="replies-{{ $comment['id'] }}">
            @if($comment->hasReplies() && $level < 255)
                @foreach($comment['replies'] as $reply)
                    <div class="mt-2">
                        <x-views.show-comment :comment='$reply' :level='$level + 1' :allowInteraction='$allowInteraction'></x-views.show-comment>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</div>
