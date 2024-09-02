// dispose of tooltips and re-initialize them
function reinitializeTooltips() {
    $('[data-toggle="tooltip"]').tooltip('dispose');
    $('body').tooltip({ selector: '[data-toggle="tooltip"]' })
}
