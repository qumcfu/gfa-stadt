<div class="modal fade" id="show-info-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">

            <div class="modal-header bg-body-secondary">
                <h5 class="modal-title" id="show-info-modal-label">{{ __('About this tool') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <nav>
                    <div class="nav nav-underline" id="nav-tab" role="tablist">
                        <button class="nav-link @if($activeSection === 'general') active @endif" id="nav-general-tab" data-bs-toggle="tab" data-bs-target="#nav-general" type="button" role="tab" aria-controls="nav-general" aria-selected="{{ $activeSection === 'general' ? 'true' : 'false' }}">{{ __('HIA') }}</button>
                        <button class="nav-link @if($activeSection === 'screening') active @endif" id="nav-screening-tab" data-bs-toggle="tab" data-bs-target="#nav-screening" type="button" role="tab" aria-controls="nav-screening" aria-selected="{{ $activeSection === 'screening' ? 'true' : 'false' }}">{{ __('Screening') }}</button>
                        <button class="nav-link @if($activeSection === 'scoping') active @endif" id="nav-scoping-tab" data-bs-toggle="tab" data-bs-target="#nav-scoping" type="button" role="tab" aria-controls="nav-scoping" aria-selected="{{ $activeSection === 'scoping' ? 'true' : 'false' }}">{{ __('Scoping') }}</button>
                        <button class="nav-link @if($activeSection === 'appraisal') active @endif" id="nav-appraisal-tab" data-bs-toggle="tab" data-bs-target="#nav-appraisal" type="button" role="tab" aria-controls="nav-appraisal" aria-selected="{{ $activeSection === 'appraisal' ? 'true' : 'false' }}">{{ __('Appraisal') }}</button>
                        <button class="nav-link" id="nav-glossaries-tab" data-bs-toggle="tab" data-bs-target="#nav-glossaries" type="button" role="tab" aria-controls="nav-appraisal" aria-selected="false">{{ __('Glossary') }}</button>
                    </div>
                </nav>
                <div class="tab-content pt-3" id="nav-tabContent">
                    <div class="tab-pane fade @if($activeSection === 'general') show active @endif" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab" tabindex="0">
                        <h5 class="fw-bold">
                            Gesundheitsfolgenabschätzung Allgemein
                        </h5>

                        <p>
                            „Die Gesundheitsfolgenabschätzung (GFA) umfasst eine Kombination von Prozeduren, Methoden und Werkzeugen, mit denen sich die Auswirkungen von Strategien, Programmen oder Projekten auf die Gesundheit einer Bevölkerung abschätzen lassen“ (WHO, Göteborg Konsensus Papier, 1999).
                            Das Instrument der GFA dient der verstärkten Berücksichtigung von Gesundheitsaspekten in verschiedenen Politik- und Handlungsfeldern. Sie kann zur Gestaltung gesunder Lebensumwelten im Sinne der Gesundheitsförderung sowie der Verringerung gesundheitlicher Ungleichheiten der Stadtbevölkerung beitragen. In zahlreichen Ländern der Welt, etwa in Australien, Ostasien oder Nordamerika, ist die GFA als Health Impact Assessment (HIA) in verschiedenen Planungsprozessen und -vorhaben bereits ein fester Bestandteil. In Deutschland ist die GFA bislang weder verbreitet noch wurde sie in einem nennenswerten Umfang realisiert.
                        </p>

                        <h5 class="fw-bold">
                            Gesundheitsfolgenabschätzung in der Stadtentwicklung
                        </h5>

                        <p>
                            Die GFA in der Stadtentwicklung ist als Verfahren zu verstehen, mit dem Maßnahmen außerhalb des eigentlichen Gesundheitssektors systematisch auf ihre Vereinbarkeit mit dem Anliegen der Gesundheit überprüft werden können. Hiermit können die Chancen der Bevölkerung auf soziale Teilhabe sowie ein gesundes und erfülltes Leben erhöht und soziale Ungleichheiten reduziert werden. Um diesen Anforderungen gerecht werden zu können, erfordert es Veränderungen auf mindestens zwei Ebenen: Es ist ein Umdenken in der Stadtentwicklung und -planung hinsichtlich des Gesundheitsverständnisses erforderlich und die öffentlichen Gesundheitsdienste (ÖGD) müssen in die Lage versetzt werden, in Stadtentwicklungsprozessen fundiert Stellung zu beziehen und Gesundheitsthemen einzubringen.
                        </p>

                        <p>
                            Ein wichtiger Baustein für die Integration der GFA in Stadtentwicklungsprozesse stellt hierbei die <em>Walkability</em> (Bewegungsförderung) dar. Indem städtische Quartiere und Stadtteile nach den Ansätzen der Walkability und der damit einhergehenden Abkehr von der bislang vorherrschenden Planungspraxis der autogerechten Stadt entwickelt werden, können gesundheitsfördernde Stadtstrukturen und Lebensumwelten geschaffen werden. Auf Grundlage der formulierten Zielstellungen und für die erfolgreiche, zeitsparende sowie ressourcenschonende Integration der GFA in bestehende Stadtentwicklungsprozesse, wurde im Forschungsprojekt <em>Gesundheitsfolgenabschätzung in der Stadtentwicklung (GFA_Stadt)</em> ein Prototyp entwickelt, welcher aus einem integrierten Phasen-Modell sowie einem Online-Tool besteht. Das Phasen-Modell beinhaltet die typischen GFA-Phasen <em>Vorprüfung</em> (Screening), <em>Analysevorbereitung</em> (Scoping), <em>Analyse & Bewertung</em> (Appraisal), <em>Berichtslegung & Empfehlungen</em> (Reporting & Recommendation) sowie <em>Monitoring & Evaluation</em> und verknüpft diese mit typischen Prozessphasen der Stadtplanung (vgl. Abb. 1). Es stellt die jeweiligen Rollen und Aufgaben des ÖGD und der Stadtplanung in den jeweiligen, typischen Prozessphasen einer informellen Planung dar und soll die erfolgreiche Anwendung einer GFA in Entwicklungsvorhaben begünstigen. Das entwickelte Online-Tool unterstützt Sie als Anwender:innen bei den ersten drei Phasen einer GFA (vgl. ebd.).
                        </p>

                        <div class="my-3">
                            <img src="{{ Storage::url('default/gfa_phasen.png') }}" class="img-fluid rounded" alt="{{ __('HIA stages') }}">
                            <div class="figure-caption mt-2">Abbildung 1: Phasen-Modell einer in die Stadtplanung integrierten Gesundheitsfolgenfolgenabschätzung (hervorgehobene Phasen werden vom Online-Tool abgedeckt).</div>
                        </div>
                    </div>
                    <div class="tab-pane fade @if($activeSection === 'screening') show active @endif" id="nav-screening" role="tabpanel" aria-labelledby="nav-screening-tab" tabindex="0">
                        <h5 class="fw-bold">
                            Phase I: Die Vorprüfung (Screening)
                        </h5>

                        <p>
                            Bei der Vorprüfung vorhandener gesundheitsrelevanter Unterlagen handelt es sich um die erste Phase der GFA in einem Entwicklungsvorhaben zur Stadt- oder Quartiersentwicklung. Das <b>zentrale Ziel</b> dieser Vorprüfung ist die Entscheidung über die Notwendigkeit / Zweckmäßigkeit einer weiterführenden GFA. Für die durchzuführende Vorprüfung ist kein fundiertes Detailwissen zu den einzelnen Themenbereichen wie z.B. Öffentliche Freiräume, Mobilität und Erschließungsqualität oder Bewegung als Anwender:in erforderlich. Vielmehr ist es wichtig, dass Sie als Anwender:in und an der Planung beteiligte Akteur:innen auf der Grundlage bereits vorhandener gesundheitsrelevanter Unterlagen sowie aus Ihrer eigenen Perspektive eine erste grobe Einschätzung abgeben, welche Gesundheitsaspekte durch die Planung (potentiell) berührt werden. Diese Beurteilung gilt es im weiteren Verlauf mit den Perspektiven weiterer Akteur:innen Ihrer Kommunalverwaltung zu erörtern. Ein Ziel des vorliegenden GFA-Tools ist die Einbindung möglichst unterschiedlicher Perspektiven und Expertisen und den Bezug dieser zum angestrebten Planungs- und Entwicklungsvorhaben aufzuzeigen. Bei Verständnisfragen, Unklarheiten oder weiterführenden Gedanken können Sie zu einzelnen Fragestellungen sowie Themenbereichen Kommentare einfügen, welche im späteren Verlauf der GFA sowie des Planungsvorhabens zu berücksichtigen sind.
                        </p>

                        <p>
                            Den Abschluss der Vorprüfung bildet ein Ergebnisbericht, der die gegebenen Antworten aller Anwender:innen zusammenfasst und eine Entscheidungshilfe bietet, ob eine weiterführende GFA im Planungsvorhaben sinnvoll erscheint. Das vorliegende Vorprüfungs-Tool ermöglicht hierzu die Ausgabe einer zusammenfassenden Einschätzung zur Notwendigkeit der Durchführung einer GFA. Des Weiteren ist die Ausgabe eines ausführlichen Ergebnisberichts, gegliedert nach den Themenbereichen, möglich. Dieser gibt Auskunft über erwartete positive sowie negative gesundheitliche Auswirkungen des geplanten Vorhabens in den verschiedenen Bereichen.
                        </p>

                        <h6 class="fw-bold">
                            Post-Screening-Besprechungsrunde
                        </h6>

                        <p>
                            In Abstimmung mit den beteiligten, kommunalen Praxispartner:innen des Forschungsprojektes „GFA_Stadt“ hat sich herausgestellt, dass in direktem Anschluss an die Vorprüfung (Screening) eine erste gemeinsame Besprechung empfehlenswert ist. In dieser „Post-Screening-Besprechungsrunde“, an der alle bisherigen Anwender:innen des Vorprüfungs-Tools teilnehmen, werden sowohl aufkommende Fragestellungen sowie die Ergebnisse der Vorprüfung hinsichtlich der relevanten Themenbereiche diskutiert. Weiterführend soll entschieden werden, ob die Durchführung einer GFA sinnvoll ist.
                        </p>

                        <p>
                            Wird sich für eine GFA entschieden, dann kann diese Beratung dazu genutzt werden, die Ausrichtung sowie die Rahmenbedingungen für die weiteren Schritte zu bestimmen. Relevante Aspekte sind hierbei:
                        </p>

                        <ul>
                            <li>der sozialräumliche Fokus,</li>
                            <li>der thematische Umfang sowie zu setzende Schwerpunkte,</li>
                            <li>die angedachte Zeitschiene und die Integration in den Prozessablauf des Entwicklungsvorhabens sowie</li>
                            <li>die geplante Beteiligung und Einbindung weiterer Akteur:innen der Verwaltung.</li>
                        </ul>
                    </div>
                    <div class="tab-pane fade @if($activeSection === 'scoping') show active @endif" id="nav-scoping" role="tabpanel" aria-labelledby="nav-scoping-tab" tabindex="0">
                        <h5 class="fw-bold">
                            Phase II: Die Analysevorbereitung (Scoping)
                        </h5>

                        <p>
                            In der zweiten Phase, der Analysevorbereitung (Scoping) werden die wesentlichen Rahmenbedingungen der GFA festgelegt und das Konzept für die weitere Durchführung ausgearbeitet. Das <b>zentrale Ziel</b> ist hierbei, dass die in der Vorprüfung (Screening) identifizierten Schwerpunktthemenfelder hinsichtlich ihrer Einfluss- oder Schlüsselfaktoren auf eine gesundheitsfördernde Stadtentwicklung untersucht werden. Die Auswahl der für die Analysevorbereitung relevanten Schwerpunktthemen erfolgt durch die Projektleitung auf der Grundlage der Vorprüfungsergebnisse (siehe Abb. 2).
                        </p>

                        <div class="my-3">
                            <img src="{{ Storage::url('default/scoping_example.png') }}" class="img-fluid rounded" alt="{{ __('Scoping Example') }}">
                            <div class="figure-caption">Abbildung 2: Auswahl der relevanten Schwerpunktthemen im Tool (beispielhaft).</div>
                        </div>
                    </div>
                    <div class="tab-pane fade @if($activeSection === 'appraisal') show active @endif" id="nav-appraisal" role="tabpanel" aria-labelledby="nav-appraisal-tab" tabindex="0">
                        <h5 class="fw-bold">
                            Phase III: Analyse und Bewertung (Appraisal)
                        </h5>

                        <p>
                            Die Phase der Analyse und Bewertung (Appraisal) nimmt die in der Vorprüfung identifizierten und ausgewählten Schwerpunktthemen für eine gesundheitsfördernde Stadtentwicklung auf und stellt zu diesen weiterführenden Fragen. Zudem werden ergänzende Informationen in einer Grafik mit Wirkungszusammenhängen dargestellt, um eine Orientierung für das Thema und die Beantwortung der Fragen zu geben (siehe Abb. 3). Das <b>zentrale Ziel</b> der Analyse ist eine Beurteilung sowie Einschätzung der Auswirkungen des geplanten Vorhabens in den einzelnen Themenbereichen. Als Anwender:in werden Sie gebeten, hier auf Basis der zur Verfügung gestellten Unterlagen eine Einschätzung aus Ihrer eigenen Perspektive zu geben.
                        </p>

                        <div class="text-center my-4">
                            <img src="{{ Storage::url('default/appraisal_chart.png') }}" class="img-fluid rounded text-center w-50 mx-auto" alt="{{ __('Appraisal') }}">
                            <div class="figure-caption mt-2">Abbildung 3: Schematischer Aufbau: Grafik der Wirkungszusammenhänge eines Schwerpunktthemenfeldes (Quelle: Eigene Darstellung).</div>
                        </div>

                        <p>
                            Neben der Benennung und Kurzbeschreibung zur gesundheitsfördernden Bedeutung des jeweiligen identifizierten Schwerpunktthemenfeldes enthält die grafische Übersicht relevante, gesundheitsfördernde Schlüsselfaktoren. Diese sollen aufzeigen, wie das Querschnittthema der Gesundheit in Planungs- und Entwicklungsvorhaben besser sichtbar gemacht und mit stadtplanungstypischen Themen wie Wohnen, Verkehr, Freiraumgestaltung, Sozialem und Kultur verbunden werden kann. Abschließend werden für die einzelnen Schwerpunktthemenfelder, etwa <em>Mobilität und Erschließungsqualität</em> oder <em>Öffentliche Freiräume</em>, die aus der Förderung der Schlüsselfaktoren resultierenden, direkte Effekte für eine gesundheitsfördernde Stadtentwicklung aufgezeigt. Daraus folgt eine Darstellung, welche gesundheitlichen Auswirkungen durch diese direkten Effekte zu erwarten sind.
                        </p>

                        <p>
                            Wie auch in der Vorprüfung (Screening) können die Ergebnisse der Kurzanalyse (Appraisal) in Form eines ausführlichen Ergebnisberichtes, welcher neben textlichen Zusammenfassungen weitere grafische Auswertungselemente (Diagramme) mit den zu erwartenden Effekten enthält, oder als Kurzanalyse ausgegeben werden. Der Ergebnisbericht ermöglicht auf Basis der gegebenen Antworten in der Kurzanalyse eine Einschätzung über positive und negative Effekte des Vorhabens auf verschiedene gesundheitsrelevante Bereiche wie „Bewegung“, „Luftqualität“ oder „soziale Teilhabe“.
                        </p>

                        <h6 class="fw-bold">
                            Gemeinsame Post-Analyse-Besprechungsrunde
                        </h6>

                        <p>
                            Vergleichbar mit der Besprechungsrunde im Anschluss an die Vorprüfung wird auch im Anschluss an die Kurzanalyse eine gemeinsame Besprechung empfohlen. Inhalt dieser Besprechung sind die ermittelten Ergebnisse der Kurzanalyse und daraus gewonnenen Erkenntnisse, welche für die anschließende Erarbeitung von Maßnahmen- und Projektpaketen genutzt werden können. Des Weiteren kann diese Besprechungsrunde dafür genutzt werden, um zu ermitteln, welche weitere gesundheitsrelevanten Unterlagen und Gesundheitsdaten noch eingeholt / erhoben werden müssen. Dieser Termin kann zudem genutzt werden, um auf informeller Basis das weitere Vorgehen abzustimmen und den weiteren Verlauf der Planung sowie Ziele und strategische Handlungsfelder des Entwicklungsvorhabens anzupassen.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="nav-glossaries" role="tabpanel" aria-labelledby="nav-glossaries-tab" tabindex="0">
                        <livewire:general.glossaries />
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-body-secondary">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>

        </div>
    </div>
</div>
