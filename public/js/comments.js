// custom functions for handling comments

// open and close edit textarea
function toggleEdit (commentId) {
    let comment = $('#comment-' + commentId)
    let editCommentInput = $('#comment-edit-' + commentId)
    comment.prop('hidden', !comment.prop('hidden'))
    editCommentInput.prop('hidden', !editCommentInput.prop('hidden'))
    if(!editCommentInput.prop('hidden')) {
        let editTextarea = $('#comment-edit-textarea-' + commentId)
        let content = editTextarea.val()
        editTextarea.focus()
        editTextarea.val('')
        editTextarea.val(content)
    }
}

// send ajax request to update comment after editing
function updateComment (commentId) {
    let commentText = $('#comment-edit-textarea-' + commentId).val()
    $('#edit-spinner-' + commentId).prop('hidden', false)

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/comments/ajax/update/" + commentId,
        data : {
            'commentText' : commentText
        },
        type : 'GET',
        dataType : 'text',
        success : function(){
            $("#comment-text-holder-" + commentId).load(location.href + " #comment-text-" + commentId)
            $("#comment-info-holder-" + commentId).load(location.href + " #comment-info-" + commentId)
            $('#edit-spinner-' + commentId).prop('hidden', true)
            toggleEdit(commentId);
        }
    })
}

// open and close textarea to reply to comment
function toggleReply (commentId) {
    let commentReply = $('#comment-reply-' + commentId)
    let replyTextarea = $('#reply-textarea-' + commentId)
    commentReply.prop('hidden', !commentReply.prop('hidden'))
    enableTooltips(commentId, commentReply.prop('hidden'))
    if(!commentReply.prop('hidden')) {
        replyTextarea.focus()
    } else {
        replyTextarea.css({ backgroundColor: ''})
    }
}

// send ajax request to store the reply
function sendReply (commentId) {
    let replyTextarea = $('#reply-textarea-' + commentId)
    let replyTextValue = replyTextarea.val()

    // if text area is empty, handle that by highlighting and refocusing it
    if(replyTextValue === '') {
        replyTextarea.focus()
        replyTextarea.css({ backgroundColor: 'lightyellow'})
        replyTextarea.bind('input', function() {
            replyTextarea.css({ backgroundColor: ''})
        })
        return
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/comments/ajax/reply/" + commentId,
        data : {
            'commentText' : replyTextValue
        },
        type : 'POST',
        dataType : 'text',
        success : function(){
            $("#replies-holder-" + commentId).load(location.href + " #replies-" + commentId)
            // reload parent's collapse button (it might not have been active before)
            $('#collapse-buttons-holder-' + commentId).load(location.href + " #collapse-buttons-" + commentId)
            // show warning when trying to delete this reply's parent
            $('#remove-warning-holder-' + commentId).load(location.href + " #remove-warning-" + commentId)
            reinitializeTooltips()
            toggleReply(commentId)
            // clear textarea contents
            replyTextarea.val('')
        }
    })
}

// show and hide button to delete comment
function toggleRemove (commentId) {
    let commentRemove = $('#comment-remove-' + commentId)
    commentRemove.prop('hidden', !commentRemove.prop('hidden'))
    enableTooltips(commentId, commentRemove.prop('hidden'))
}

// send ajax request to delete comment (or disable it, if it has active replies)
function deleteComment (id, parentId, contentId) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/comments/ajax/delete/" + id,
        data : { },
        type : 'DELETE',
        dataType : 'text',
        success : function(){
            if(parentId !== 0) {
                $("#replies-holder-" + parentId).load(location.href + " #replies-" + parentId)
                // reload parent's collapse button (it might not be needed anymore)
                $('#collapse-buttons-holder-' + parentId).load(location.href + " #collapse-buttons-" + parentId)
                // reload warning when trying to delete this reply's parent (it too might not be needed anymore)
                $('#remove-warning-holder-' + parentId).load(location.href + " #remove-warning-" + parentId)
            }
            if(contentId !== 0) {
                $("#comments-body-" + contentId).load(location.href + " #comments-" + contentId)
                $("#comments-footer-" + contentId).load(location.href + " #comments-footer-buttons-" + contentId)
                // refresh comments icon in case this was the only comment on this subject
                let commentsIcon = $('#comments-icon-holder-' + contentId)
                if(commentsIcon != null) commentsIcon.load(location.href + " #comments-icon-" + contentId)
            }
        }
    })
}

// open and hide textarea to add a new comment
function toggleAdd (contentId) {
    let addCommentButton = $('#comment-add-button-' + contentId)
    let addCommentInput = $('#comment-add-' + contentId)
    let addTextarea = $('#comment-add-textarea-' + contentId)
    let noComments = $('#no-comments-' + contentId)
    addCommentInput.prop('hidden', !addCommentInput.prop('hidden'))
    addCommentButton.prop('hidden', !addCommentInput.prop('hidden'))
    if(noComments != null) noComments.prop('hidden', !addCommentInput.prop('hidden'))
    if(!addCommentInput.prop('hidden')) {
        $('#show-comments-modal-' + contentId + ' .modal-body').scrollTop(0);
        addTextarea.focus()
    } else {
        addTextarea.css({ backgroundColor: ''})
    }
}

// send ajax request to store new comment
function addComment (contentId, stageId) {
    let addTextarea = $('#comment-add-textarea-' + contentId)
    let addTextValue = addTextarea.val()

    // if text area is empty, handle that by highlighting and refocusing it
    if(addTextValue === '') {
        addTextarea.focus()
        addTextarea.css({ backgroundColor: 'lightyellow'})
        addTextarea.bind('input', function() {
            addTextarea.css({ backgroundColor: ''})
        })
        return
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/comments/ajax/store/" + contentId + "/" + stageId,
        data : {
            'commentText' : addTextValue
        },
        type : 'POST',
        dataType : 'text',
        success : function(){
            $("#comments-body-" + contentId).load(location.href + " #comments-" + contentId)
            $("#comments-footer-" + contentId).load(location.href + " #comments-footer-buttons-" + contentId)
            toggleAdd(contentId)
            // dispose of tooltips and re-initialize them (otherwise they won't work on the new comment's icons)
            reinitializeTooltips()
            // refresh comments icon in case this is the first comment made on this subject
            let commentsIcon = $('#comments-icon-holder-' + contentId)
            if(commentsIcon != null) commentsIcon.load(location.href + " #comments-icon-" + contentId)
            // clear textarea contents
            addTextarea.val('')
        }
    })
}

// send ajax request to store or remove an upvote and toggle the upvote icon afterwards
function toggleUpvote (id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/comments/ajax/upvote/" + id,
        data : { },
        type : 'PUT',
        dataType : 'text',
        success : function(){
            $("#comment-icons-holder-" + id).load(location.href + " #comment-icons-" + id)
            reinitializeTooltips()
        }
    })
}

// enable or disable tooltips for a comment's icon buttons
function enableTooltips(commentId, active) {
    $('#comment-icons-' + commentId + ' button').each(function() {
        $(this).prop('disabled', !active)
    })
    $('#comment-icons-' + commentId + ' span').each(function() {
        // remove tooltip if button is disabled and, when being enabled again, retrieve it from aria-label
        $(this).attr('data-bs-original-title', active ? $(this).attr('aria-label') : '')
    })
}

// collapse replies
function collapseReplies(commentId) {
    $('#replies-' + commentId).prop('hidden', true)
    $('#collapse-replies-button-' + commentId).prop('hidden', true)
    $('#unfold-replies-button-' + commentId).prop('hidden', false)
}

// unfold replies
function unfoldReplies(commentId) {
    $('#replies-' + commentId).prop('hidden', false)
    $('#collapse-replies-button-' + commentId).prop('hidden', false)
    $('#unfold-replies-button-' + commentId).prop('hidden', true)
}
