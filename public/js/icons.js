let selectIconModal = document.getElementById('select-icon-modal')
selectIconModal.addEventListener('show.bs.modal', function (event) {

    let button = event.relatedTarget

    // other modal that triggered this modal
    let origin = button.getAttribute('data-origin')
    let orderId = button.getAttribute('data-order-id')
    let currentId = button.getAttribute('data-current-id')
    let type = button.getAttribute('data-type')

    // send type back to add/edit content modal
    $('.icon-parent button').each(function() {
        $(this).attr('data-bs-target', origin)
        $(this).attr('data-order-id', orderId)
        $(this).attr('data-type', type)
        if($(this).attr('data-id') === currentId) {
            let icon = $(this).find('i')
            let iconClass = icon.attr('class')
            let startPosition = iconClass.indexOf('text-dark')
            iconClass = iconClass.substring(0, startPosition) + 'text-danger' + iconClass.substring(startPosition + 9)
            icon.attr('class', iconClass)
        }
    })
    $('#select-icon-modal-back').attr('data-bs-target', origin)
    $('#select-color-modal-back').attr('data-order-id', orderId)

    $('.icon-parent button').on({
        mouseenter: function() {
            $('#icon-name').html($(this).attr('data-value'))
        },
        mouseleave: function() {
            $('#icon-name').text('')
        }
    })
})

selectIconModal.addEventListener('hide.bs.modal', function (event) {
    $('.icon-parent button').each(function() {
        let icon = $(this).find('i')
        let iconClass = icon.attr('class')
        if(iconClass.includes('text-danger')) {
            let startPosition = iconClass.indexOf('text-danger')
            iconClass = iconClass.substring(0, startPosition) + 'text-dark' + iconClass.substring(startPosition + 11)
            icon.attr('class', iconClass)
        }
    })
})

let showEmpty = true
let showFill = true
let toggleEmptyButton = $('#toggle-empty-button')
let toggleFillButton = $('#toggle-fill-button')

function toggleEmpty() {
    showEmpty = !showEmpty
    toggleEmptyButton.removeClass(showEmpty ? 'btn-secondary' : 'btn-dark').removeClass(showEmpty ? 'bi-x-circle' : 'bi-circle').addClass(showEmpty ? 'btn-dark' : 'btn-secondary').addClass(showEmpty ? 'bi-circle' : 'bi-x-circle')
    $('#select-icon-modal-body .icon-empty button').each(function() {
        $(this).find('i').removeClass(showEmpty ? 'text-light' : 'text-dark').addClass(showEmpty ? 'text-dark' : 'text-light')
    })
}

function toggleFill() {
    showFill = !showFill
    toggleFillButton.removeClass(showFill ? 'btn-secondary' : 'btn-dark').removeClass(showFill ? 'bi-x-circle-fill' : 'bi-circle-fill').addClass(showFill ? 'btn-dark' : 'btn-secondary').addClass(showFill ? 'bi-circle-fill' : 'bi-x-circle-fill')
    $('#select-icon-modal-body .icon-fill button').each(function() {
        $(this).find('i').removeClass(showFill ? 'text-light' : 'text-dark').addClass(showFill ? 'text-dark' : 'text-light')
    })
}
