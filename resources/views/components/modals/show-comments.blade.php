<div class="modal fade" id="show-comments-modal-{{ $content['id'] }}" tabindex="-1" aria-labelledby="show-comments-modal-label-{{ $content['id'] }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="show-comments-modal-label-{{ $content['id'] }}">{{ __('Comments on :topic', ['topic' => $content['short']]) }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="comments-body-{{ $content['id'] }}">
                <div class="pe-4" id="comments-{{ $content['id'] }}">

                    @php($stage = $membership->getScreeningStage())
                    @php($entry = $content->getEntry($stage))

                    @if(strlen($entry['comment']['text'] ?? '') === 0)
                        <div id="comment-add-{{ $content['id'] }}" hidden>
                            <div class="form-floating input-group has-validation">
                                <textarea name="comment[0][text]" id="comment-add-textarea-{{ $content['id'] }}" type="text" class="form-control w-100"
                                          placeholder="{{ __('New Comment') }}" style="height: 110px;" required></textarea>
                                <label for="comment-add-textarea-{{ $content['id'] }}">{{ __('New Comment') }}</label>
                            </div>
                            <div class="my-2">
                                <button type="button" class="btn btn-sm btn-success" onclick="addComment({{ $content['id'] }}, {{ $stage['id'] }})">{{ __('Add Comment') }}</button>
                                <button type="button" class="btn btn-sm btn-secondary" onclick="toggleAdd({{ $content['id'] }})">{{ __('Discard Comment') }}</button>
                            </div>
                        </div>
                    @endif

                    @forelse($content->getSortedComments($project) as $comment)
                        @if($comment['active'] || $comment->hasReplies())
                            <x-views.show-comment :comment='$comment'></x-views.show-comment>
                        @endif
                    @empty
                        <p class="text-body-secondary mb-0" id="no-comments-{{ $content['id'] }}">
                            {{ __('No comments have yet been made on this subject.') }}
                        </p>
                    @endforelse

                </div>
            </div>

            <div class="modal-footer bg-body-secondary" id="comments-footer-{{ $content['id'] }}">
                <div id="comments-footer-buttons-{{ $content['id'] }}">
                    @if(strlen($entry['comment']['text'] ?? '') === 0)
                        <button type="button" class="btn btn-sm btn-primary" id="comment-add-button-{{ $content['id'] }}" onclick="toggleAdd({{ $content['id'] }})">{{ __('Add Comment') }}</button>
                    @endif
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>

        </div>
    </div>
</div>
