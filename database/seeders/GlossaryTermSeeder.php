<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class GlossaryTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();
        Schema::disableForeignKeyConstraints();
        DB::table('glossary_terms')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('glossary_terms')->insert([
            /*
             *
             * Allgemeines
             *
             */
            array(
                'glossary_id' => 1,
                'term' => 'Formelle Planung & Instrumente',
                'description' => 'Formelle Planungen sind rechtsverbindlich vorgeschrieben und obliegen einem festgelegten Ablauf hinsichtlich der Inhalte, der beteiligten Akteur:innen und des (zeitlichen) Umfangs. Neben Flächennutzungsplänen und Bebauungsplänen sind auch z.B. Planfeststellungsverfahren und Plangenehmigungen formelle Instrumente [1].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 1,
                'term' => 'Bauleitplanung/B-Plan',
                'description' => 'Die Bauleitplanung ist dafür verantwortlich, frühzeitig die Nutzung von kommunalen Grundstücken festzulegen. Als Instrumente stehen einerseits der Flächennutzungsplan (FNP) als vorbereitender Bauleitplan und andererseits der Bebauungsplan (B-Plan) als verbindlicher Bauleitplan zur Verfügung. Im Baugesetzbuch (BauGB) werden in §1 die Aufgaben und Grundsätze näher beschrieben, zu denen auch das Abwägungsgebot zählt. Die Bauleitplanung hat sich an den Grundsätzen der Raumordnung zu orientieren [1].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 1,
                'term' => 'Informelle Planung & Instrumente',
                'description' => 'Im Gegensatz zu formellen Planungen weist die informelle Planung keine Regulierung im Planungsrecht auf. Die Verpflichtung zur Umsetzung der Ziele können jedoch durch eine Selbstbindung erreicht werden, z.B. durch einen Beschluss im Stadtrat. Zudem besitzen informelle planerische Instrumente keine genauen Vorgaben zu einzelnen Verfahrungsschritten und dem Ziel der Planung, trotzdem ist das Verfahren bei einer Selbstbindung gemeinsam mit allen beteiligten Akteur:innen zu organisieren. Durch diese Struktur sind informelle Instrumente zeitlich flexibler einsetzbar. Ein Nachteil besteht allerdings darin, dass keine Sicherheit darin besteht, dass die Planungen tatsächlich umgesetzt werden [1].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 1,
                'term' => 'Rahmenplanung/Rahmenplan',
                'description' => 'Die Rahmenplanung ist ein Instrument, welches als Vorbereitung für die Bauleitplanung gilt. Ein Rahmenplan hat allerdings keinen verbindlichen Rechtsrahmen, in dem bestimmte Inhalte vorgegeben sind, und ist dadurch als informell einzuordnen. Durch einen Gemeindebeschluss kann jedoch eine Selbstbindung entstehen. Der Rahmenplan kann einen unterschiedlichen Umfang des Stadt- bzw. Gemeindegebiets in verschiedenen Maßstäben darstellen. Durch den vorbereitenden Charakter des Rahmenplans eignet sich das Instrument für eine frühzeitige Beteiligung der Bürger:innen und der weiteren involvierten Akteur:innen [2].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 1,
                'term' => 'Baurecht',
                'description' => 'Das Baurecht umfasst die rechtliche Vorschriften und Regelungen, die sich mit der Errichtung, Nutzung, Änderung und dem Rückbau von Bauwerken beschäftigen. Es umfasst sowohl öffentliche als auch private Aspekte. Zum privaten Baurecht zählen bspw. genauere Vorgaben zur Gestaltung und Bebauung eines Grundstückes, aber auch Nachbarrechtsgesetze sowie das Bauvertragsrecht. Das öffentliche Baurecht hingegen beinhaltet das Bauplanungsrecht, zu denen die Flächennutzungsplanung (FNP) sowie die Bebauungsplanung (B-Plan) zählen, und das Bauordnungsrecht. Das Bauordnungsrecht der Länder ist objektbezogen, während das Bauplanungsrecht flächenbezogen ist [2].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 1,
                'term' => 'Planungsebenen',
                'description' => 'Die Planung in der Bundesrepublik Deutschland ist auf mehrere Ebenen aufgeteilt. Es gibt die Bundesebene, die Landesebene und die Kommunalebene. Je nach Darstellung wird auch die EU-Ebene als eine weitere Ebene ergänzt. Als Oberbegriff dieses mehrgliedrigen Systems dient der Begriff Raumplanung. Das Subsidiaritätsprinzip gibt dabei vor, dass die Kompetenzen auf der möglichst niedrigsten Planungsebene bearbeitet werden sollen. Die Kommunen besitzen aufgrund der kommunalen Selbstverwaltung eine besondere Rolle. Aufgrund der Zweckmäßigkeit sind auf der Bundesebene daher insbesondere rechtliche Vorgaben zu treffen, die die Länder und Kommunen zu befolgen haben. Durch das Gegenstromprinzip sind die einzelnen abgegrenzten Ebenen miteinander vernetzt [2].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 2,
                'term' => 'Funktionsgemischte Stadt',
                'description' => 'Im Leitbild der kompakten Stadt ist die Nutzungsmischung ein zentraler Bestandteil. In kleinräumigen Strukturen sollen die verschiedenen Funktionen, z.B. das Wohnen und Arbeiten sowie die Erholung, miteinander kombiniert werden, womit die Erreichbarkeiten verbessert werden sollen.',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 2,
                'term' => '15-Minuten-Stadt',
                'description' => 'Das Konzept der 15-Minuten-Stadt besteht darin, dass Stadtbewohner:innen ihre alltäglichen Bedürfnisse innerhalb eines Radius von 15 Minuten zu Fuß oder mit dem Fahrrad erledigen können sollten. Gleichzeitig ermöglicht ihnen das Konzept, schnell andere Stadtteile zu erreichen und größere Entfernungen mittels nachhaltiger Verkehrsmittel, etwa dem ÖPNV, zurückzulegen [3]. Voraussetzung für eine gelungene Umsetzung ist die Realisierung einer funktionsgemischten Stadt (siehe oben).',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 2,
                'term' => 'Stadt der kurzen Wege',
                'description' => 'Das Konzept verbindet die drei wesentlichen Elemente der Nutzungsmischung, der Dichte und einer hohen Qualität Öffentlicher (Frei-)Räume. Die Stadt der kurzen Wege hält Distanzen zwischen Wohnort, Arbeitsplatz, Nahversorgung und Dienstleistungen gering und wirkt dadurch einem großen Verkehrsaufkommen entgegen. Durch die kurzen Wege erreicht man alles bequem zu Fuß, mit dem Fahrrad oder Öffentlichen Verkehrsmitteln. Gleichzeitig nehmen Abgas- und Lärmbelästigung ab. Etwaige Strukturprinzipien einer solche Stadt sind unter anderem eine bahnorientierte städtebauliche Entwicklung, kompakte Stadtkörper sowie die Erhaltung großer zusammenhängender freier Naturlandschaften [4].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 2,
                'term' => 'Essbare Stadt',
                'description' => 'Idee und Ziel des Konzepts ist die Entwicklung von multifunktionalen, öffentlich zugänglichen Grünflächen, die zum Anbau von Lebensmitteln genutzt werden. Hierdurch werden sowohl die Transportwege und -ketten von Lebensmittel reduziert sowie eine ortsnahe Produktion und Verfügbarkeit dieser ermöglicht als auch soziale Interaktion und Bildungsfunktionen verknüpft. Die so produzierten Lebensmittel sollen zudem kostenlos für die Bewohner:innen des Quartiers zur Verfügung gestellt werden [5].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 2,
                'term' => 'Walkability',
                'description' => 'Der Begriff Walkability beschreibt die bewegungsfördernde Gestaltung von Wohnumgebungen, welche die persönliche Mobilität sowie die freizeitlichen Bewegungsaktivitäten begünstigen [6].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 2,
                'term' => 'Barrierefrei und barrierearm',
                'description' => '<p>Die Begriffe „barrierefrei“ und „barrierearm“ werden oft synonym verwendet, obwohl sie unterschiedliche bauliche Merkmale beschreiben.</p><ul><li><b>Barrierefreiheit</b> ist in Deutschland im Bundesgleichstellungsgesetz (BGG) von 2002, bzw. der Neufassung von 2016, im Paragraf 4 rechtlich definiert. „Barrierefrei“ bedeutet, dass eine Wohnung alle baulichen Voraussetzungen erfüllt, um Menschen mit verschiedenen Behinderungen uneingeschränkten Zugang und Nutzung zu ermöglichen. Barrierefreie Wohnungen müssen strenge Kriterien erfüllen, wie stufenlose Zugänge, ausreichend Bewegungsfläche und angepasste Sanitäranlagen.</li><li>Der Begriff „<b>barrierearm</b>“ spiegelt die Herausforderung wider, dass es schwierig ist, alle Barrieren für die unterschiedlichen Bedürfnisse verschiedener Zielgruppen zu beseitigen. Im Gegensatz zur Barrierefreiheit, für die es klare Regeln und Richtlinien gibt, existieren für Barrierearmut keine festen Maßstäbe. Eine barrierearme Wohnung weist einige bauliche Anpassungen auf, die den Zugang und die Nutzung erleichtern, ist jedoch nicht vollständig barrierefrei. Eine barrierearme Wohnung kann zum Beispiel über einige Hilfsmittel wie Rampen oder breitere Türen verfügen, aber dennoch Stufen oder schmale Durchgänge haben, die für manche Menschen mit Behinderungen ein Hindernis darstellen [57].</li></ul>',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 3,
                'term' => 'Infrastruktur',
                'description' => 'Der Begriff Infrastruktur ist ein Oberbegriff für die einzelnen infrastrukturellen Teilbereiche, zu denen die unten erklärten Begriffe technische Infrastruktur, soziale Infrastruktur sowie grüne und blaue Infrastruktur zählen. Die technische und die soziale Infrastrukturen stellen dabei die Basis für Daseinsvorsorge dar und werden von staatlicher Seite bereitgestellt, die für ein funktionierenden Zusammenleben unabdingbar sind [2].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 3,
                'term' => 'Technische Infrastruktur',
                'description' => '<p>Technische Infrastrukturen sind technisch und organisatorisch komplexe, kostenintensive und raumwirksame materielle und/oder institutionelle Einrichtungen. Sie sichern über die Bereitstellung von kritischen Infrastrukturen die Funktionsfähigkeit moderner Gesellschaften. Als Bereiche lassen sich die Folgenden unterteilen [2, S. 2650]:</p><ul class="mb-0"><li>Ver- und Entsorgung (z.B. Abwasserentsorgung)</li><li>Verkehr (z.B. Straßenverkehr)</li><li>Information & Telekommunikation (z.B. Internet)</li></ul>',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 3,
                'term' => 'Soziale Infrastruktur',
                'description' => '<p>Soziale Infrastruktur ermöglicht grundsätzlich Begegnungen und stellt Treffpunkte für die Bewohner:innen dar. Die Nutzung erfolgt durch Menschen verschiedenen</p><ul><li>Alters,</li><li>Geschlechts,</li><li>Milieus und</li><li>ethnischer Herkunft.</li></ul><p>Einige soziale Infrastrukturen, wie beispielsweise Spielplätze, haben eine zweckgebundene Funktion, sodass hier bestimmte Gruppen für einen bestimmten Zweck zusammenkommen. Dennoch folgt dadurch i.d.R. keine milieuspezifische Selektion und der Ort kann auch für andere Ziel- und Altersgruppen für Begegnung und/oder Interaktion zur Verfügung stehen. Ein breites Angebot sozialer Infrastrukturen ermöglicht es, auf die Vielfalt der Gesellschaft einzugehen und nicht nur Begegnungen ausgewählter Gruppen hervorzurufen. Mögliche Orte für diverse Begegnungen bilden u.a.</p><ul class="mb-0"><li>Gastronomien und Einzelhandel,<li>Feste, Aktionen und organisierte Treffen,</li><li>Kneipen und Bars sowie</li><li>Bildungs- und Kulturstätten [7].</li></ul>',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 3,
                'term' => 'Grüne und blaue Infrastruktur',
                'description' => 'Im städtischen Kontext wird zwischen grünen (Hausgärten, Parks, Grünverbindungen, Gründächer) und blauen (Gewässer, Überflutungsbereiche, Entwässerungssysteme) Infrastrukturen unterschieden. Bei blauer und grüner Infrastruktur handelt es sich sowohl um natürlich gewachsene als auch um naturnah angelegte Grün- und Wasserflächen [8].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 4,
                'term' => 'Wohnraum',
                'description' => 'Unter Wohnraum werden alle Wohn-, Schlaf- und Esszimmer sowie andere separate Räume verstanden. Bäder, Toiletten, Abstellräume, Flure, Balkone sowie gewerblich genutzte Räume zählen nicht dazu [9]. ',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 4,
                'term' => 'Bezahlbarer Wohnraum',
                'description' => 'Unter der Anforderung an „bezahlbareren Wohnraum“ ist zu verstehen, dass für eine Mietwohnung, inklusiver aller Betriebskosten, dauerhaft nicht mehr als ein Drittel des Haushaltseinkommens aufgebracht werden sollte und ein Restbetrag für die Lebensführung vorhanden bleibt. Diese Herangehensweise ist unabhängig von der individuellen Einkommenssituation und universell anwendbar. Voraussetzung für „bezahlbares Wohnen“ ist dabei, dass die Anforderungen der Mieter:innen (Familien, Wohngemeinschaften, Singles, usw.) an die Wohnung, z.B. in Form, Lage und Größe, erfüllt werden [10].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 4,
                'term' => 'Gesunder Wohnraum',
                'description' => '<p>Zu den Mindestanforderungen für gesunden Wohnraum zählen [11]:</p><ul><li>Gewährleistung der menschlichen Unversehrtheit</li><li>Sicherheit</li><li>Beständigkeit</li><li>private Nutzbarkeit</li><li>Komfort (Ausstattung, Temperatur, Belüftung)</li></ul><p class="mb-0">Diese Mindestanforderungen können mit den Themen Barrierefreiheit und der Ermöglichung von Selbstständigkeit verschränkt werden, um einen verstärkten Beitrag zur Gesundheitsförderung zu leisten.</p>',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 4,
                'term' => 'Wohnumfeld',
                'description' => '<p>Unter dem Wohnumfeld wird der unmittelbar an ein Wohngebäude angrenzende Raum verstanden [12].</p><ul class="mb-0"><li>Hausvorbereich</li><li>Wohn- und Vorgärten</li><li>Hinter- und Innenhöfe</li><li>Wege, Straßen, Plätze</li><li>öffentliches/halböffentliches nutzbares Grün</li></ul>',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 5,
                'term' => 'Städtebauliche Typologien',
                'description' => '<p>Bei städtebaulichen Typologien bzw. Gebäudetypologien handelt es sich um ein räumliches Gefüge von Einzelbauten und/oder Baugruppen. Sie ergibt sich u.a. aus [13]:</p><ul class="mb-0"><li>Eigentümer:innen</li><li>Benutzer:innen</li><li>Funktion</li><li>Erschließung</li><li>Bezug zu Freiraum und Öffentlichkeit</li></ul>',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 5,
                'term' => 'Block(rand)bebauung',
                'description' => 'Bei der Blockrandbebauung handelt es sich um eine allseitig von Straßen umgebene Bebauung. Es gibt eine klare Orientierung zu einem öffentlichen vorderen (Straße) und einem privaten hinteren Bereich (Hof) [13].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 5,
                'term' => 'Hofbebauung',
                'description' => 'Die Hofbebauung ist die Umkehrung der Blockbebauung. Die Gebäude werden von der Hofseite erschlossen, d. h. die Vorderseite der Gebäude geht zum Hof, die Rückseite weist nach außen [13].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 5,
                'term' => 'Reihenbebauung',
                'description' => 'Bei der Reihenbebauung sind die Gebäudezugänge zur Straße hin orientiert. Die Bebauung erfolgt straßenbegleitend (parallel) [13].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 5,
                'term' => 'Zeilenbebauung',
                'description' => 'Bei der Zeilenbebauung sind die Gebäude stirnseitig zur Erschließungsstraße ausgerichtet. Die Erschließung erfolgt über sekundäre Zugänge bzw. Zugangswege [13].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 5,
                'term' => 'Solitär',
                'description' => 'Solitäre sind isoliert stehende Gebäude. Sie haben einen Abstand zu allen ihrer Nachbargebäude, daher sind alle Gebäudeseiten sichtbar. In ihrer Größe, Grundrissgeometrie, Architektur sowie ihrem Material sind sie autonom [13].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 5,
                'term' => 'Cluster- & Gruppenbauweise',
                'description' => 'In die Cluster- und Gruppenbauweise fallen all jene Anordnungen von Gebäuden, die zu keiner der oben beschriebenen Gebäudetypologien passen. Es handelt sich um eine kompositorische Gruppierung der Gebäude nach einer inneren Logik. Cluster sind dabei eine sehr konzentrierte Gruppierung, bei einer Gruppe bestehen zwischen den Gebäuden größere Abstände [13].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 6,
                'term' => 'Personenverkehr',
                'description' => 'Unter Personenverkehr wird die Beförderung von Menschen zwischen diversen Orten verstanden. Er unterteilt sich in den Individualverkehr (z.B. Auto) und den öffentlichen Verkehr (z.B. Bus) [14].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 6,
                'term' => 'Verkehrsströme',
                'description' => 'Als Verkehrsströme lassen sich unterscheiden: Fußverkehr, Radverkehr, Öffentlicher Personennahverkehr, Motorisierter Individualverkehr. Sie gehen dabei mit unterschiedlichen Nutzungsansprüchen einher. Während Fußgänger:innen im Vergleich zu anderen Verkehrsteilnehmenden deutlich langsamer unterwegs sind und einige Flächen im Straßenraum als Aufenthaltsorte nutzen, streben der MIV und Radverkehr meist eine schnelle Fortbewegung ohne Unterbrechungen an.',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 6,
                'term' => 'Hierarchisierung der Verkehrsteilnehmer:innen',
                'description' => 'Derzeit kommt dem motorisierten Individualverkehr im Verkehrsraum die größte Priorität zu. Fußgänger:innen, Radfahrer:innen sowie Nutzer:innen des Öffentlichen Personennahverkehrs (ÖPNV) kommt eine untergeordnete Rolle zu. Dies entspricht dem Leitbild der autogerechten Stadt, also der Orientierung der Stadtentwicklung an den Bedürfnissen des motorisierten Individualverkehrs (MIV).',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 6,
                'term' => 'Motorisierter Individualverkehr (MIV)',
                'description' => 'Unter dem motorisierten Individualverkehr wird die Nutzung von Personenkraftwagen (Pkw) sowie Krafträdern im Personenverkehr verstanden. Nutzer:innen sind frei in der Bestimmung von Fahrweg sowie –ziel und Zeit [15].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 6,
                'term' => 'Öffentlicher Personennahverkehr (ÖPNV)',
                'description' => 'Unter den Öffentlichen Personennahverkehr (ÖPNV) fällt der gesamte Öffentliche Verkehr mit einer mittleren Reiseweite unter 50km, alles darüber hinaus ist dem Öffentlichen Personenfernverkehr zuzuschreiben [14].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 6,
                'term' => 'Bauliche Maßnahmen zur Verkehrsberuhigung',
                'description' => '<p>Es kann zwischen straßenverkehrsrechtlichen und baulichen Maßnahmen zur Verkehrsberuhigung unterschieden werden. Bauliche Maßnahmen zielen v.a. auf eine Geschwindigkeitsreduzierung des Kraftfahrzeugverkehrs ab. Geeignete Maßnahmen können u.a. sein [16]:</p><ul class="mb-0"><li>Versätze (Verschwenkungen in der Straßenführung)</li><li>Aufpflasterungen</li><li>Anordnung von Mittelinseln</li><li>Anordnung von Schwellen</li></ul>',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 7,
                'term' => 'Klimaschutz',
                'description' => 'Klimaschutz beinhaltet alle Maßnahmen die dazu dienen, den Ausstoß von klimarelevanten Treibhausgasen (z.B. Kohlendioxid) zu reduzieren, um das Voranschreiten des Klimawandels auszubremsen [17].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 7,
                'term' => 'Klimaanpassung',
                'description' => 'Klimaanpassung beinhaltet alle Maßnahmen die dem vorsorgenden Umgang mit den nicht mehr abwendbaren Folgen des Klimawandels und Extremwetterereignissen dienen. Es geht dabei um die Anpassung an die zu erwartenden Veränderungen, die Minimierung von Risiken sowie die Vermeidung von (weiteren) Schäden [17].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 7,
                'term' => 'Klimaanpassungsmaßnahmen',
                'description' => '<p>Zu Klimaanpassungsmaßnahmen zählen u.a. [18]:</p><ul><li>Dach- und Fassadenbegrünung</li><li>Planung und Bau von technischen Hochwasserrückhaltemaßnahmen</li><li>Dezentrale Regenwasserbewirtschaftung</li><li>Förderung von natürlichem Wasserrückhalt</li><li>Entwicklung klimaangepasster Wasserversorgungskonzepte</li><li>Verbesserung der Luftqualität</li><li>Sicherung des Biotopverbunds</li></ul>',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 7,
                'term' => 'Extremwetterereignis',
                'description' => '<p>Bei Extremwetterereignissen handelt es sich um das Auftreten eines Ereignisses, das örtlich und jahreszeitlich selten bzw. ungewöhnlich ist [19].</p><p>Mit dem Klimawandel steigen sowohl die Durchschnitts-, als auch die Extremtemperaturen. Dabei werden Hitzewellen, sowie heiße Tage und Nächte häufiger und extremer.</p>',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 7,
                'term' => 'Hitzewelle',
                'description' => 'Dabei handelt es sich um eine längere Periode ungewöhnlich hoher atmosphärischer Hitzebelastung, welche temporär die Lebensweise der Bevölkerung verändert und negative gesundheitliche Folgen für diese haben kann [20].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 7,
                'term' => 'Urban Heat Island Effekt',
                'description' => '<p>Urban Heat Islands sind städtische Gebiete, in denen erhöhte Temperaturen im Vergleich zu außenliegenden Gebieten festgestellt werden. Städtische, dicht bebaute Infrastrukturen, unter anderem Gebäude und Straßen, nehmen die Sonnenwärme stärker auf und strahlen sie wieder ab – im Gegensatz zu natürlichen Umgebungen wie Wiesen, Wälder und Gewässer. Städtische Gebiete, in denen diese Strukturen stark konzentriert sind und es nur wenig Grün gibt, werden zu "Inseln" mit höheren Temperaturen im Vergleich zu außenliegenden Gebieten. Wärmeinseln können unter verschiedenen Bedingungen zu jeder Jahreszeit entstehen, sowohl tagsüber als auch nachts, in kleinen oder großen Städten, in Vorstädten und in nördlichen oder südlichen Klimazonen.</p><p>Die Forschung prognostiziert, dass sich der Wärmeinseleffekt in Zukunft noch verstärken wird, da sich die Struktur, die räumliche Ausdehnung und die Bevölkerungsdichte der städtischen Gebiete verändern und wachsen wird [21].</p>',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 7,
                'term' => 'Starkregenereignis',
                'description' => '<p>Starkregen bezeichnet eine große Niederschlagsmenge in einer bestimmten Zeitspanne. Der Deutsche Wetterdienst unterscheidet dabei drei Stufen von Starkregen [22]:</p><ul><li>Regenmengen 15 bis 25 l/m² in 1 Stunde oder 20 bis 35 l/m² in 6 Stunden (Markante Wetterwarnung)</li><li>Regenmengen > 25 bis 40 l/m² in 1 Stunde oder > 35 l/m² bis 60 l/m² in 6 Stunden (Unwetterwarnung)</li><li>Regenmengen > 40 l/m² in 1 Stunde oder > 60 l/m² in 6 Stunden (Warnung vor extremem Unwetter)</li></ul>',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 7,
                'term' => 'Tropennacht',
                'description' => 'Bei diesen handelt es sich um Nächte mit Nachtmindesttemperaturen über 20°C.',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 7,
                'term' => 'Kaltluftentstehungsgebiet',
                'description' => 'Kaltluftentstehungsgebiete sind Flächen, die nachts die auf ihnen ruhende Luft abkühlen, wobei dieser Effekt von den Bodeneigenschaften und Vegetation abhängt. Solche Gebiete sind Teil von Kaltluftbahnen, durch die bodennahe Luftschichten mit Kaltluft aufgrund eines Gefälles ungehindert in Siedlungsgebiete strömen können [8,23].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 7,
                'term' => 'Frischluftentstehungsgebiet',
                'description' => 'Frischluftentstehungsgebiete sind zusammenhängende ausgedehnte, siedlungsnahe Waldflächen, die sich positiv auf die Luftqualität und -austausch sowie auf das Klima umliegender Siedlungsgebiete auswirken. Die produzierte Frischluft gelangt mithilfe von Frischluftbahnen, wie beispielsweise linearen Gewässerstrukturen, oder durch Kaltluftbahnen, die durch Gefälle entstehen, in die Siedlungsgebiete [8,23].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 7,
                'term' => 'Frischluftschneise/-bahn',
                'description' => 'Als Frischluftbahnen bzw. -schneisen werden freigehaltene Flächen in Städten bezeichnet, welche die inneren Stadtbezirke mit zirkulierender Luft aus dem Umland versorgen. Sie stellen ein wichtiges Instrument in der Klimaregulierung dar. Dabei kann es sich beispielsweise um lineare Gewässerstrukturen handeln [23,24]',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 7,
                'term' => 'Emissionen',
                'description' => 'Emittenten verursachen Immissionen (siehe unten). Beispiele hierfür sind Industrieanlagen oder der Verkehr. Sie können bspw. Geräusche und Luftverunreinigungen produzieren, die auf die Umwelt einwirken [2].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 7,
                'term' => 'Immissionen',
                'description' => 'Immissionen sind Schadstoffe oder Energie, die von einer Emissionsquelle (siehe oben) auf Menschen, Tiere, Pflanzen oder Materialien einwirken. Es handelt sich also um die tatsächliche Belastung oder Beeinträchtigung, die durch die Emissionen entstehen. Beispiele für Immissionen sind Luftverunreinigungen, Geräusche, Erschütterungen, Licht, Wärme und Strahlen [2].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 7,
                'term' => 'Verschattungselemente',
                'description' => 'Durch den anthropogenen Klimawandel werden sich Urban Heat Island Effekte (siehe oben) in den verdichteten und stark versiegelten städtischen Räumen in Zukunft stark bemerkbar machen. Um den Folgen etwas entgegenzuwirken, werden in diesen Räumen künftig mehr Verschattungselemente benötigt, damit die Menschen vor starker Hitze und Sonneneinstrahlung geschützt werden können. Dafür eignet sich z.B. Großvegetation in Form von Bäumen, aber auch Markisen oder Schirme [25].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 7,
                'term' => 'Resilienz',
                'description' => 'Resilienz beschreibt die Widerstandsfähigkeit eines Systems oder eines Individuums, sich trotz großer Herausforderungen an Veränderungen anzupassen. Der Begriff der Robustheit dabei wird häufig als Synonym verwendet. Im sozio-ökonomischen Verständnis wird die Anpassungskapazität einer Gesellschaft an sich verändernden Lebensbedingungen betrachtet. Die Anpassungsstrategien der einzelnen Individuen können dabei sehr unterschiedlich ausfallen, da die Herausforderungen ebenso unterschiedlich wahrgenommen und empfunden werden [2].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 8,
                'term' => 'Raum',
                'description' => 'Raum ist ein Begriff, der in der Raumplanung auf verschiedene Weisen benutzt wird. Er reicht von Stadtplanung, die sich auf die verschiedene Nutzung von Flächen konzentriert, bis hin zur Bundesraumordnung, welche die gesamte Entwicklung Deutschlands und die Struktur von verschiedenen Regionen betrachtet. Dabei kann Raum sowohl konkrete Teile der Erdoberfläche als auch gesellschaftliche Konzepte bedeuten. Daher gibt es keine umfassende, geschlossene planungsbezogene Raumtheorie. Raumordnung und Landesplanung stehen vor der Herausforderung die vielen Aspekte des Raums in Theorie und Praxis zu berücksichtigen [2].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 8,
                'term' => 'Öffentlicher (Frei-)Raum',
                'description' => 'Öffentliche (Frei-)Räume stellen das Gegenstück zu privaten (Frei-)Räumen dar. Diese können grundsätzlich von jeder Person ohne Einschränkungen genutzt werden. Öffentliche Räume bilden sich aus der gebauten städtischen Umwelt heraus und umfassen dabei Park- und Platzanlagen, Gärten, Sportanlagen, Straßenräume sowie Wegeverbindungen [12,26].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 8,
                'term' => 'Grüne & blaue Naturräume',
                'description' => 'Grüne und blaue Naturräume sind Netzwerke aus natürlichen und naturnahen Gebieten. Diese Flächen umfassen sowohl Land- als auch Wasserflächen und sind so gestaltet, dass sie wichtige Dienstleistungen wie sauberes Wasser, gute Luft, Erholungsräume und Schutz vor Klimawandel bieten. Sie verbessern die Umwelt, die Gesundheit und die Lebensqualität der Menschen und fördern die Artenvielfalt. Ein Beispiel für ein weitreichenden, internationalen Bestandteil dieser grünen Infrastruktur ist das Natura 2000-Netzwerk. Lokale Grünflächen wiederum umfassen u.a. Teiche, Hecken und auch weniger natürliche Elemente wie Gründächer oder begrünte Fassaden [55].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 8,
                'term' => 'Angsträume',
                'description' => 'Ein Angstraum ist ein Bereich in der Stadt, der besonders bei Nacht als unsicher empfunden wird, insbesondere von vulnerablen Gruppen, wie Frauen und Kindern. Oftmals sind es Orte mit schlechter Beleuchtung und wenigen Menschen, wie leere, abgelegene oder unübersichtliche Plätze. Wer sich dort aufhält und wie der Ort gestaltet ist, spielt eine Rolle für das (subjektive) Sicherheitsgefühl. Um Angsträume zu vermeiden, gibt es in der Stadtplanung verschiedene Ansätze. Dazu gehören gute Beleuchtung, übersichtliche Straßen und Gehwege oder niedrige Hecken, die helfen, die Stadt sicherer und freundlicher zu gestalten [56].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 8,
                'term' => 'Aneignung von Räumen',
                'description' => 'Die Aneignung oder das „Sich-nutzbar-machen“ ist als Prozess zu verstehen, der beschreibt, wie Menschen sich die gegebenen räumlichen Strukturen und Ausstattungen aneignen [27]. Diese Nutzung kann dem geplanten Zweck folgen oder die Ausstattung/Gestaltung „zweckentfremden“, beispielsweise indem eine Sitzbank sowohl für den Aufenthalt oder als Sportgerät Verwendung findet [28].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 9,
                'term' => 'Siedlungsstruktur',
                'description' => 'Der Begriff Siedlungsstruktur ist ein Oberbegriff für verschiedenste Ausprägungen einer Siedlung, zu denen u.a. die nachfolgenden Begriffe kompakte Siedlungsstruktur, disperse Siedlungsstruktur und resiliente Siedlungsstruktur zählen.',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 9,
                'term' => 'Kompakte Siedlungsstruktur',
                'description' => 'Eine kompakte Siedlungsstruktur orientiert sich am Leitbild der funktionsgemischten Stadt und weist somit kleinräumige Strukturen und einen hohen Grad an Nutzungsmischung auf. Im Vergleich zu der dispersen Siedlungsstruktur sind die (Nach)Verdichtung und eine reduzierte Flächenneuinanspruchnahme wichtige Elemente [2].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 9,
                'term' => 'Disperse Siedlungsstruktur',
                'description' => 'Eine disperse Siedlungsstruktur stellt einen Gegenentwurf zu einer kompakten Siedlungsstruktur dar. Sie weist u.a. eine geringe Verdichtung und eine Zersiedelung mit einem hohen Flächenverbrauch auf [2].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 9,
                'term' => 'Resiliente Siedlungsstruktur',
                'description' => 'Ähnlich wie auch die kompakte Siedlungsstrukur ist auch die resiliente Siedlungsstruktur mit einer Funktionsmischung verbunden und orientiert sich am Leitbild der 15-Minuten-Stadt mit kleinräumigen Strukturen. Durch diese Strukturen verkürzen sich die alltäglichen Wege, wodurch die Attraktivität des Fuß- und Radverkehrs gesteigert und die Abhängigkeit zum motorisierten Individualverkehr reduziert wird. Dies trägt zu einer Verbesserung der Aufenthaltsqualität und einer Reduzierung des CO²-Ausstoßes bei. Gleichzeitig werden in resilienten Siedlungsstrukturen die Grün- und Freiräume mitbedacht, die u.a. Versickerungsmöglichkeiten bei Starkregenereignissen in Folge des anthropogenen Klimawandels bieten [29].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 9,
                'term' => 'Quartier',
                'description' => 'Ein Quartier ist ein Gebiet innerhalb einer Stadt, das von der lokalen Bevölkerung sozial konstruiert ist und sowohl innerhalb des Gebietes durch vorhandene Beziehungen als auch von diversen externen Akteur:innen geprägt ist. Innerhalb des Quartiers befindet sich der Lebensmittelpunkt der dort wohnhaften Menschen. Durch die individuell unterschiedlich wahrgenommenen Wohnumfelder kann jedoch keine klare Abgrenzung bestimmt werden [2, S. 1837].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 9,
                'term' => 'Quartierszentrum',
                'description' => 'Das Quartierszentrum stellt den sozialen und funktionalen Mittelpunkt eines Quartiers dar. An diesem Ort gibt es gebündelt verschiedene Begegnungsorte und Angebote der Daseinsvorsorge, bspw. Lebensmittelgeschäfte, Bäckereien oder ärztliche Versorgung, die die dort wohnhaften Menschen in ihrem Wohnumfeld alltäglich nutzen können.',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 9,
                'term' => 'Quartiersplatz',
                'description' => 'Ein Quartiersplatz ist ein gemeinschaftlich genutzter öffentlicher Raum innerhalb eines städtischen Wohngebiets und stellt das urbane Äquivalent zu einem traditionellen Dorfplatz dar. Er dient als zentraler Treffpunkt für soziale Interaktionen und Aktivitäten. Gestalterische Elemente wie Grün- oder Freiflächen, Sitzgelegenheiten oder Wasseranlagen sind typische Bestandteile von Quartiersplätzen. Letztendlich steht die Schaffung eines lebendigen und ansprechenden öffentlichen Raums im Mittelpunkt, der zur Stärkung des sozialen Zusammenhalts und der Lebensqualität in der Nachbarschaft beiträgt [30].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 10,
                'term' => 'Sozialmanagement',
                'description' => 'Ein Sozialmanagement wird vor allem von wohnungswirtschaftlichen Akteur:innen, wie Wohngesellschaften, Wohneigentümer:innen oder Eigentümergemeinschaften, betrieben. Zur Erhöhung der lokalen Sicherheit werden häufig Hausmeister:innen und Concierge als Ansprechpersonen eingesetzt [31].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 10,
                'term' => 'Sozialplan',
                'description' => 'Die Sozialplanung wird durch verschiedene Gesetze auf Bundesebene umgesetzt, z.B. durch das Raumordnungsgesetz (ROG), die Bauleitplanung oder durch Steuerungsmöglichkeiten nach dem Sozialgesetzbuch. Die dort verankerten Regelungen beeinflussen die Stadt- und Raumplanung maßgeblich mit. Mit der Behindertenrechtskonvention der Vereinten Nationen hat sich die Bundesrepublik Deutschland verpflichtet, die Gesellschaft inklusiv zu gestalten. Dies betrifft nicht nur die lokalen Umgestaltungsmöglichkeiten, sondern auch die Planungskommunikation der einzelnen Prozesse [2].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 10,
                'term' => 'Bedarfsanalyse',
                'description' => 'Eine Bedarfsanalyse ist ein wichtiges Instrument für eine fundierte Einschätzung, welche planerischen Ansprüche die Zukunft in einzelnen Teilbereichen erfordert. Oft sind Bedarfsanalysen verbunden mit Prognosen, z.B. Bevölkerungsprognosen. Sie dienen als Basis für die Abschätzung des Bedarfes, z.B. für soziale Infrastruktur oder die Anzahl an notwendigen Wohneinheiten [32].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 10,
                'term' => 'Gewässermanagement',
                'description' => 'Nachhaltiges Gewässermanagement bringt verschiedene Vorteile mit sich, unter anderem kann dieses durch die Vermeidung von Gewässerverunreinigungen eine bessere Wasserqualität und eine höhere Verfügbarkeit von hochwertigem Trinkwasser bewirken. Daneben können durch nachhaltiges Gewässermanagement die Auswirkungen von Naturkatastrophen wie Dürren oder Überschwemmungen minimiert werden [11].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 11,
                'term' => 'Sozialer Zusammenhalt',
                'description' => 'Der Begriff sozialer Zusammenhalt beschreibt das Ausmaß an Verbundenheit und Solidarität zwischen Gruppen in der Gesellschaft. Als Hauptdimensionen werden dabei das Zugehörigkeitsgefühl und die Beziehungen zwischen den Gesellschaftsmitgliedern beschrieben [33].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 11,
                'term' => 'Soziale Unterstützung',
                'description' => 'Soziale Unterstützung ist eine qualitative Eigenschaft sozialer Beziehungen und kann durch Eingliederung in soziale Netzwerke und soziale Teilhabe stattfinden. Die Unterstützung von Individuen aus sozialen Beziehungen lässt sich quantitativ durch die Anzahl und Frequenz sozialer Kontakte sowie qualitativ durch die soziale Unterstützung bewerten [34].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 11,
                'term' => 'Gemeinschaftsgefühl',
                'description' => 'Das Gemeinschaftsgefühl oder der Gemeinschaftssinn wird häufig als Zugehörigkeitsgefühl, Gefühl der gegenseitigen Anerkennung und einem gemeinsamen Glauben, dass Bedürfnisse durch das Zusammensein erfüllt werden, innerhalb einer Gruppe definiert [35].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 11,
                'term' => 'Benachteiligte Gruppen',
                'description' => 'Zu benachteiligten Gruppen zählen z.B. Haushalte mit geringem Einkommen, Alleinerziehende, Arbeitslose, Migrant:innen, Geflüchtete, Menschen mit Behinderung, ältere Menschen.',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 11,
                'term' => 'Vulnerable Gruppen',
                'description' => '<p>Der Begriff Vulnerabilität bedeutet so viel wie Verwundbarkeit bzw. Empfindlichkeit. In der Bevölkerung gibt es verschiedene Gruppen, die vulnerabel sind und dadurch besondere Berücksichtigung benötigen. Die Vulnerabilität prägt sich dabei unterschiedlich aus. Kleinkinder im Alter von bis zu fünf Jahren sind beispielsweise besonders anfällig für Atemwegserkrankungen. Auch Schwangere und ältere Personen weisen spezielle Bedürfnisse auf, die jedoch nicht zu pauschalisieren sind.</p><p class="mb-0">Auch Personen mit einem geringeren Einkommen und einem geringeren Bildungsabschluss gelten als vulnerabel, da diese überwiegend an Orten mit umweltbedingten Belastungen leben und zusätzlich mit individuellen Belastungen konfrontiert sein können [36].</p>',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 11,
                'term' => 'Soziale Chancengleichheit',
                'description' => 'Chancengleichheit meint, dass alle Bürger:innen die gleichen Chancen besitzen, ihr individuelles Leben nach ihren Wünschen und Vorstellungen zu gestalten. Aufgrund von Konkurrenzsituationen, z.B. im Bereich der Bildung und des Berufs, werden jedoch viele Menschen aufgrund von persönlichen Indikatoren wie die soziale Herkunft oder das Geschlecht gegenüber anderen strukturell benachteiligt, womit eine Chancenungerechtigkeit entsteht [37].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 11,
                'term' => 'Sozio-Kultur',
                'description' => 'Sozio-Kultur meint die Verbindung zwischen Kultur und Gesellschaft. Sie umfasst jene Kultur, die von allen Bevölkerungsgruppen lokal gestaltet und umgesetzt wird. Sozio-kultuelle Angebote können dabei u.a. aus dem Bereich der Sozial-, Bildungs- und Jugendarbeit stammen und sich an eine breite Zielgruppe richten. Ziel ist dabei auch die Demokratisierung des kulturellen Angebotes [38].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 12,
                'term' => 'Zumutbare Entfernung',
                'description' => '400-500 Meter sind als zumutbare Entfernung bis zu den nächsten Einrichtungen des täglichen Bedarfs zu betrachten [39] zit. n. [11]. Als zumutbare Entfernung zu Bushaltestellen sind 600m, zu Bahnhöfen 1200m ausreichend [40]. Um den Anforderungen an Barrierefreiheit für mobilitätseingeschränkte Personen an zumutbare Entfernungen gerecht zu werden, ist es empfehlenswert, diese folgendermaßen zu senken: 300-350m für Innenstadtbereiche, 350-400m für Vorortbereiche und 450-500m für Außengebiete [41,42].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 12,
                'term' => 'Lichtverschmutzung',
                'description' => '<p>Der Sammelbegriff Lichtverschmutzung bezeichnet die nicht intendierten Auswirkungen künstlicher Beleuchtung [43].</p><p class="mb-0">Wenngleich öffentliche Beleuchtung einen wichtigen Beitrag zum Schutz, Sicherheit und visuellen Attraktivität der Umgebung leistet, können bei schlechter Platzierung Beeinträchtigungen wie Schlafstörungen, störendes Licht auf Anwohnergrundstücken, Verschwendung von Licht in den Nachthimmel und starke Blendung auftreten [11].</p>',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 12,
                'term' => 'Städtebauförderung',
                'description' => 'Die Städtebauförderung ist eine gesamtstaatliche Förderung von Bundes-, Landes- und Kommunalebene, die seit 1971 im Städtebauförderungsgesetz festgelegt ist und bei der grundsätzlich eine Drittelfinanzierung vorgesehen ist. Sie dient dazu, städtebauliche und soziale Missstände zu beheben. Die Förderung gliedert sich dabei in verschiedene Programme mit unterschiedlichen Schwerpunkten, die in der Vergangenheit mehrfach umgestaltet wurden [2, S. 2395f.]. Derzeitig bietet die Städtebauförderung die folgenden drei Programme an: Lebendige Zentren, Sozialer Zusammenhalt sowie Wachstum und nachhaltige Erneuerung [44].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 13,
                'term' => 'Gesundheitsförderung',
                'description' => 'Gesundheitsförderung bezeichnet Maßnahmen mit der Zielsetzung, die Gesundheit und das Wohlbefinden zu stärken. Dies beinhaltet die Förderung eines gesunden Lebensstils, die Schaffung gesundheitsfördernder Umgebungen, die Stärkung individueller Ressourcen und die Vermittlung von Gesundheitskompetenz [45].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 13,
                'term' => 'Gesundheitsmonitoring',
                'description' => 'Unter Gesundheitsmonitoring wird im Allgemeinen ein kontinuierlicher Prozess der systematischen Sammlung, Analyse und Bewertung von Daten im Gesundheitsbereich verstanden. Ziel des Gesundheitsmonitorings ist es, relevante Informationen über den Gesundheitszustand von Bevölkerungsgruppen oder spezifischen Zielgruppen zu sammeln, um Trends zu erkennen, Probleme frühzeitig zu erkennen, Risikogruppen zu identifizieren und Maßnahmen zur Gesundheitsförderung und Krankheitsprävention zu entwickeln. Hierzu können verschiedene Methoden wie Befragungen oder epidemiologische Studien eingesetzt werden [46].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 13,
                'term' => 'Herz-Kreislauf-Erkrankungen',
                'description' => '<p>Zu den häufigsten Herz-Kreislauf-Erkrankungen zählen [47,48]:</p><ul class="mb-0"><li>Arteriosklerose</li><li>Hypertonie (Bluthochdruck)</li><li>Herzinfarkt</li><li>Schlaganfall</li><li>Koronare Herz-Krankheit</li><li>Periphere arterielle Verschlusskrankheit</li></ul>',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 13,
                'term' => 'Lungenerkrankungen',
                'description' => '<p>Zu den häufigsten Lungenerkrankungen zählen [49]:</p><ul class="mb-0"><li>Chronisch obstruktive Lungenerkrankung (COPD)</li><li>Asthma</li><li>Lungenentzündung</li><li>Lungenkrebs</li><li>Lungenfibrose</li></ul>',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 13,
                'term' => 'Morbidität',
                'description' => 'Unter Morbidität wird die Häufigkeit einer Erkrankung innerhalb einer Bevölkerung(-sgruppe) verstanden [50].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 13,
                'term' => 'Mortalität',
                'description' => 'Mortalität beschreibt die Sterblichkeitsrate in Bezug auf eine bestimmte Krankheit. Sie gibt an, wie viele Patient:innen bezogen auf die Gesamtbevölkerung bzw. bestimmte Bevölkerungsgruppen innerhalb eines bestimmten Zeitraumes an einer Krankheit verstorben sind [51].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 13,
                'term' => 'Prävalenz',
                'description' => 'Der Begriff Prävalenz beschreibt die Anzahl an Krankheitsfällen in einer Bevölkerung (bzw. einem Teil dieser) in einem definierten Zeitraum oder zu einem bestimmten Zeitpunkt [52].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 13,
                'term' => 'Prävention',
                'description' => 'Unter Prävention werden Maßnahmen verstanden, die darauf abzielen, Gesundheitsprobleme wie Krankheiten oder Verletzungen vor dem Auftreten zu verhindern. Inhalte von Präventionsmaßnahmen können somit Aktivitäten wie Impfungen, Vermeidung von gesundheitlichen Risikofaktoren, Screening-Programme oder Aufklärungskampagnen sein [53].',
                'created_at' => now()
            ),
            array(
                'glossary_id' => 14,
                'term' => 'Körperliche Aktivität',
                'description' => 'Der Begriff körperliche Aktivität umfasst jede durch die Skelettmuskulatur hervorgebrachte Bewegung, die zu einem Anstieg des Energieverbrauchs führt. Die Bandbreite körperlicher Aktivität reicht von alltäglichen Tätigkeiten bis hin zu sportlichen Betätigungen [54].',
                'created_at' => now()
            )
        ]);

        Model::reguard();
    }
}
