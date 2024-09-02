<span>
    <h5 class="text-body-secondary my-0 py-2">{{ __(':percent completed', ['percent' => number_format($stage->getProgress() * 100, 0, ',', '') .  ' %']) }}</h5>
</span>
