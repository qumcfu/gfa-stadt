<div class="row">
	<div class="col-12">
		<p class="px-3">{{ __('Click on a term to view more information about it.') }}</p>
		@foreach($glossaries as $key => $glossary)
			<div class="{{ $key > 0 ? 'pt-3': '' }}"></div>
			<h5 class="fw-bold px-3">{{ $glossary['name'] }}</h5>
			<div class="accordion" id="accordion-{{ $glossary['id'] }}">
				@foreach($glossary['terms'] as $term)

					<div class="accordion-item">
						<h2 class="accordion-header">
							<button type="button" class="accordion-button collapsed px-3 py-2" data-bs-toggle="collapse" data-bs-target="#glossary-{{ $glossary['id'] }}-{{ $term['id'] }}" aria-expanded="false" aria-controls="glossary-{{ $glossary['id'] }}-{{ $term['id'] }}">
								<div>{{ $term['term'] }}</div>
							</button>
						</h2>
						<div class="accordion-collapse collapse" id="glossary-{{ $glossary['id'] }}-{{ $term['id'] }}" data-bs-parent="#accordion-{{ $glossary['id'] }}">
							<div class="accordion-body mt-2 mb-1">
								<div>{!! $term->getHyperlinkedDescription() !!}</div>
							</div>
						</div>

					</div>

				@endforeach
			</div>
		@endforeach
		<hr class="mt-5 mb-2">
		<h5 class="fw-bold pt-4 px-3" id="glossary-references">{{ __('Additional information and references') }}</h5>
		@foreach($references as $reference)
			<p class="text-break px-3">{!! $reference->getApaStyle() !!}</p>
		@endforeach
	</div>
</div>
