$('.file-input').each(function(){
    $(this).change(function(){
        let fileId = $(this).data('id')
        let files = this.files
        if (files.length === 0) return
        let file = files[0]
        let fileType = file['type']
        let validImageTypes = ['image/gif', 'image/jpeg', 'image/png', 'image/svg+xml']
        let isImage = $.inArray(fileType, validImageTypes) >= 0
        $(`#image-preview-${fileId}`).attr('hidden', !isImage)
        if (isImage) {
            let reader = new FileReader()
            reader.onload = (e) => {
                if(isImage) $(`#preview-image-${fileId}`).attr('src', e.target.result)
                $(`#image-preview-${fileId}`).attr('hidden', false)
            }
            reader.readAsDataURL(this.files[0])
        }
    })
})

function updatePreview(id, type, path) {
    $('#media-preview').prop('hidden', false)
    let image = $('#media-preview img')
    let pdf = $('#media-preview embed')
    let video = $('#media-preview iframe')
    let audio = $('#media-preview audio')
    let unknown = $('#unknown-file-type')
    image.prop('hidden', type !== 'image')
    pdf.prop('hidden', type !== 'pdf')
    video.prop('hidden', type !== 'video').removeClass('d-flex')
    audio.prop('hidden', type !== 'audio')
    unknown.prop('hidden', jQuery.inArray(type, ['image', 'pdf', 'video', 'audio']) >= 0)
    if(type === 'image') {
        image.fadeOut('fast', function() {
            image.attr('src', path)
            pdf.attr('src', '')
            video.attr('src', '').removeClass('d-flex')
            audio.attr('src', '')
            image.fadeIn('fast')
        })
    }
    if(type === 'pdf') {
        pdf.fadeOut('fast', function() {
            pdf.attr('src', path)
            image.attr('src', '')
            video.attr('src', '').removeClass('d-flex')
            audio.attr('src', '')
            pdf.fadeIn('fast')
        })
    }
    if(type === 'video') {
        video.fadeOut('fast', function() {
            video.attr('src', path).addClass('d-flex')
            image.attr('src', '')
            pdf.attr('src', '')
            audio.attr('src', '')
            video.fadeIn('fast')
        })
    }
    if(type === 'audio') {
        audio.fadeOut('fast', function() {
            audio.attr('src', path)
            image.attr('src', '')
            video.attr('src', '').removeClass('d-flex')
            pdf.attr('src', '')
            audio.fadeIn('fast')
        })
    }

    $('.project-info-file').each(function(){
        $(this).removeClass('fw-bold')
        $(this).find('.preview-icon i').removeClass('bi-eye-fill').addClass('bi-eye')
    })
    $(`#file-${id}`).addClass('fw-bold')
    $(`#file-${id} .preview-icon i`).removeClass('bi-eye').addClass('bi-eye-fill')
}

// send ajax request to delete file link (files.index page only)
function removeFileLink(fileId, projectId) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : '/files/ajax/unlink/' + fileId + '/' + projectId,
        data : { },
        type : 'PUT',
        dataType : 'text',
        success : function(){
            $("#show-file-links-modal-body-and-footer-holder-" + fileId).load(location.href + " #show-file-links-modal-body-and-footer-" + fileId)
            $("#add-file-link-modal-body-holder-" + fileId).load(location.href + " #add-file-link-modal-body-" + fileId)
            $("#associated-projects-holder-" + fileId).load(location.href + " #associated-projects-" + fileId)
            reinitializeTooltips()
        }
    })
}
