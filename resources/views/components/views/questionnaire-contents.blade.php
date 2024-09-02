@php($index = 0)
@php($stageContents = $questionnaire->getStageContents($project, $stage['type']))
@foreach($stageContents as $content)
    @php($index = $index + 1)
    @php($isLast = $index === count($stageContents))
    @switch($content['type']['shortname'])

        @case('screening-item')
        <x-views.screening-item :content='$content' :project='$project' :stage='$stage' :isLast='$isLast'></x-views.screening-item>
        @break

        @case('vulnerable-group-item')
        <x-views.vulnerable-group :content='$content' :project='$project' :stage='$stage' :isLast='$isLast'></x-views.vulnerable-group>
        @break

        @case('appraisal-item')
        <x-views.appraisal-item :content='$content' :project='$project' :stage='$stage' :isLast='$isLast'></x-views.appraisal-item>
        @break

    @endswitch
@endforeach
