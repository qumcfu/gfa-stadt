let selectColorModal = document.getElementById('select-color-modal')

if(!Object.is(selectColorModal, null)) {
    selectColorModal.addEventListener('show.bs.modal', function (event) {

        let button = event.relatedTarget

        // other modal that triggered this modal
        let origin = button.getAttribute('data-origin')
        let orderId = button.getAttribute('data-order-id')
        let currentId = button.getAttribute('data-current-id')
        let type = button.getAttribute('data-type')

        // send type back to add/edit content modal
        $('.color-parent button').each(function() {
            $(this).attr('data-bs-target', origin)
            $(this).attr('data-order-id', orderId)
            $(this).attr('data-type', type)
            if($(this).attr('data-id') === currentId) {
                let icon = $(this).find('i')
                let iconClass = icon.attr('class')
                iconClass = iconClass.substring(0, 3) + 'check-' + iconClass.substring(3)
                icon.attr('class', iconClass)
            }
        })
        $('#select-color-modal-back').attr('data-bs-target', origin)
        $('#select-color-modal-back').attr('data-order-id', orderId)

        $('.color-parent button').on({
            mouseenter: function() {
                $('#color-name').html($(this).attr('data-name'))
            },
            mouseleave: function() {
                $('#color-name').text('')
            }
        })
    })

    selectColorModal.addEventListener('hide.bs.modal', function (event) {
        $('.color-parent button').each(function() {
            let icon = $(this).find('i')
            let iconClass = icon.attr('class')
            if(iconClass.includes('check-')) {
                iconClass = iconClass.substring(0, 3) + iconClass.substring(9)
                icon.attr('class', iconClass)
            }
        })
    })

    let darkMode = false
    let body = $('#select-color-modal-body')
    let bgButton = $('#toggle-bg-button')

    function toggleBackground() {
        darkMode = !darkMode
        body.animate({'color': (darkMode ? 'white' : 'black'), 'background-color': (darkMode ? '#282828' : '#c8c8c8')}, 400)
        bgButton.removeClass(darkMode ? 'bi-lightbulb-fill' : 'bi-lightbulb-off-fill').removeClass(darkMode ? 'btn-dark' : 'btn-secondary').addClass(darkMode ? 'bi-lightbulb-off-fill' : 'bi-lightbulb-fill').addClass(darkMode ? 'btn-secondary' : 'btn-dark')
    }
}

let regex = /[0-9A-Fa-f]{3}/g;

$('.color-hex-input').each(function(){
    $(this).on('input paste', function(){
        let colorId = $(this).data('id')
        let value = $(this).val()
        let icon = $(`#new-color-${colorId} i`)
        if(value.substring(0, 1) !== '#' || !value.substring(1).match(regex) || value.length < 4 || value.length === 6 || value.length === 8 || value.length > 9) {
            icon.removeClass('bi-circle-fill').addClass('bi-question-circle')
        } else {
            icon.removeClass('bi-question-circle').addClass('bi-circle-fill')
        }
        icon.attr('style', `font-size: 1.5rem; color: ${value} !important;`);
    })
})
