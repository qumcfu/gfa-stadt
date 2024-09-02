$(window).bind("pageshow", function(event) {
    if (isLoading) hideLoading()
})

let isLoading = false

function showLoading() {
    $('.page-load-wrapper').show().fadeIn('slow')
    isLoading = true
}

function hideLoading() {
    $('.page-load-wrapper').fadeOut('slow')
    isLoading = false
}
