<div class="js-cookie-consent cookie-consent fixed-bottom bg-secondary p-2 text-light text-center fixed bottom-0 inset-x-0">
    <div class="max-w-7xl mx-auto px-6">
        <div class="align-content-center">
            <div class="d-inline-block w-0 flex-1 items-center m-auto">
                <p class="cookie-consent__message mb-0">
                    {!! trans('cookie-consent::texts.message') !!}
                </p>
            </div>
            <div class="d-inline-block ms-2 flex-shrink-0 w-full m-auto">
                <button class="btn btn-sm btn-success js-cookie-consent-agree cookie-consent__agree cursor-pointer flex px-4 py-2 rounded-md text-sm font-medium">
                    {{ trans('cookie-consent::texts.agree') }}
                </button>
            </div>
        </div>
    </div>
</div>
