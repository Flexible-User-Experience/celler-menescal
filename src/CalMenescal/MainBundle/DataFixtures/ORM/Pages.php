<?php

namespace CalMenescal\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Flux\PageBundle\Entity\Page;
use Flux\PageBundle\Entity\Translation\PageTranslation;

/**
 * Class Pages.
 */
class Pages implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        /// EL CELLER
        $page = new Page();
        $page->setCode('00A-001');
        $page->setTitle('El celler');
        $page->setSummary('Descobreix el secret del nostre celler.');
        $page->setText1('Celler cal Menescal, S.L., és una empresa familiar, ubicada a Bot, comarca de la Terra Alta, i que ens dediquem al món del vi des  de finals del segle XIX.<br/><br/>De construcció recent (s’inauguraren les noves sales del celler a l’any 2000), es va plantejar el nou celler com un element necessari per aconseguir extreure el màxim potencial dels nostres raïms i amb sales diferenciades per cada part del procès d’elaboració.<br/><br/>La suma de l’experiència de anys de funcionament, amb les noves tècniques, coneixements, idees i il·lusions que aporten les noves generacions, donen com a resultat, l’obtenció de nous productes de gran qualitat, que combinen la tradició amb les últimes tendències del mercat.');
        $page->setImage1('elceller.png');
        $page->setImage2('elceller1.jpg');
        $page->setImage3('elceller2.jpg');
        $page->setImage4('elceller3.jpg');
        $page->setPosition(1);
        $page->setIsActive(true);

        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('La bodega');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('summary');
        $translation->setContent('Descubre el secreto de nuestra bodega.');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('text1');
        $translation->setContent('Celler Cal Menescal, SL, es una empresa familiar, ubicada en Bot, comarca de la Terra Alta, donde  nos dedicamos al mundo del vino desde finales del siglo XIX.<br/><br/>De reciente construcción (inauguraron las nuevas salas de la bodega en el año 2000), se planteó la nueva bodega como un elemento necesario para conseguir extraer el máximo potencial de nuestras uvas y con salas diferenciadas para cada parte del proceso de elaboración.<br/><br/>La suma de la experiencia de años de funcionamiento, con las nuevas técnicas, conocimientos, ideas e ilusiones que aportan las nuevas generaciones, dan como resultado, la obtención de nuevos productos de gran calidad, que combinan la tradición con las últimas tendencias del mercado.');
        $page->addTranslation($translation);

        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('The winery');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('summary');
        $translation->setContent("Discover the secret's winery.");
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('text1');
        $translation->setContent('The winery');
        $page->addTranslation($translation);

        $manager->persist($page);

        ////////////////

        /// LES VINYES
        $page = new Page();
        $page->setCode('00A-002');
        $page->setTitle('Les vinyes');
        $page->setSummary('Coneix les varietats que cultivem.');
        $page->setText1('El celler està situat a la comarca de la Terra Alta, al sud-oest de Catalunya, a més de 400 m d’altitud respecte el nivell de mar.  De clima mediterrani amb influències continentals, les nostres vinyes tenen una antiguitat mitja de 40 anys. Aquest últim punt, dóna als nostres vins una forta personalitat i la combinació amb els nostres sòls, de textura mitjana, amb forta presència del panal i tapaç imprimeixen un marcat sabor de la nostra terra,  en tots els nostres vins.<br/><br/>En l’actualitat el nostre celler consta de 17 Ha de vinyes pròpies en producció, ubicades totes en l’àmbit geogràfic de Bot.<br/><br/>Situades en diferents partides, la distribució per varietats és la següent:
<ul><li>Varietats blanques: garnatxa, macabeu, xardonnay, esquitxagòs</li><li>Varietats negres: garnatxa fina, garnatxa tintorera, merlot, syrah, ull de llebre, carinyena i morenillo.</li></ul>
El nostre respecte per la tradició i l’entorn ens va portar a certificar  les nostres vinyes pel CCPAE des de l’any 2011, com a cultiu ecològic.');
        $page->setImage1('lesvinyes.png');
        $page->setPosition(2);
        $page->setIsActive(true);

        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('Las viñas');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('summary');
        $translation->setContent('Conoce las variedades que cultivamos.');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('text1');
        $translation->setContent('La bodega está situada en la comarca de la Terra Alta, en el suroeste de Cataluña, además de 400 m de altitud respecto al nivel del mar. De clima mediterráneo con influencias continentales, nuestros viñedos tienen una antigüedad media de 40 años.<br/><br/>Este último punto, da a nuestros vinos una fuerte personalidad y la combinación con nuestros suelos, de textura media, con fuerte presencia del panal y Tapaç imprimen un marcado sabor de nuestra tierra en todos nuestros vinos.<br/><br/>En la actualidad nuestra bodega consta de 17 Ha de viñedos propios en producción, ubicadas todas en el ámbito geográfico de Bot.<br/><br/>Situadas en diferentes partidas, la distribución por variedades es la siguiente:
<ul><li>Variedades blancas: garnacha, macabeo, xardonnay, esquitxagòs</li><li>Variedades tintas: Garnacha fina, garnacha tintorera, merlot, syrah, tempranillo, cariñena y Morenillo.</li></ul>
Nuestro respeto por la tradición y el entorno nos llevó a certificar nuestros viñedos por el CCPAE desde el año 2011, como cultivo ecológico.');
        $page->addTranslation($translation);

        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('The vineyards');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('summary');
        $translation->setContent('Discover the varieties that we grow.');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('text1');
        $translation->setContent('The vineyards');
        $page->addTranslation($translation);

        $manager->persist($page);

        ////////////////

        /// LA TERRA ALTA
        $page = new Page();
        $page->setCode('00A-003');
        $page->setTitle('La Terra Alta');
        $page->setSummary('La nostra terra, la nostra denominació.');
        $page->setText1("La \"Terra Alta\" és la regió vitivinícola més meridional de Catalunya, de tradició mediterrània i amb una història mil·lenària. Està situada al sud oest de Catalunya, entre el riu Ebre i la frontera amb terres aragoneses. Del seu paisatge en destaquen les serres calcaries del Port d'Horta, la Serra de Pàndols i la Serra de Cavalls. Aquestes formacions expliquen gran part de les particularitats del terrer i són l'origen de les dues unitats de paisatge amb vocació vitivinícola: La Plana i l'Altiplà. L'altitud sobre el nivell del mar es troba d'aquestes terres de conreu està compresa entre els 350 i els 500 metres, pel que el nom \"Terra Alta\" únicament bé donat per la perspectiva que s'obté de la regió des de la depressió del riu Ebre.<br/><br/>La Terra Alta aconseguí el reconeixement públic mitjançant el distintiu de Denominació d'Origen (DO) oficialment al maig de 1982, després de deu anys de provisionalitat. El conjunt de particularitats i valors associats a la DO \"Terra Alta\" donen com a resultat una regió vitivinícola autèntica, on la terra, la vinya, el vi i la seva gent es converteixen en un gran atractiu turístic.");
        $page->setImage1('laterra.png');
        $page->setPosition(3);
        $page->setIsActive(true);

        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('La Terra Alta');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('summary');
        $translation->setContent('Nuestra tierra, nuestra denominación.');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('text1');
        $translation->setContent('La "Terra Alta" es la región vitivinícola más meridional de Cataluña, de tradición mediterránea y con una historia milenaria. Está situada al sur oeste de Cataluña, entre el río Ebro y la frontera con tierras aragonesas. De su paisaje destacan las sierras calizas del Puerto de Horta, la Sierra de Pàndols y la Sierra de Cavalls. Estas formaciones explican gran parte de las particularidades del terruño y son el origen de las dos unidades de paisaje con vocación vitivinícola: La Plana y el Altiplano. La altitud sobre el nivel del mar de estas tierras de cultivo está comprendida entre los 350 y los 500 metros, por lo que el nombre "Terra Alta" únicamente bien dado por la perspectiva que se obtiene de la región desde la depresión del río Ebro.<br/><br/>La Terra Alta consiguió el reconocimiento público mediante el distintivo de Denominación de Origen (DO) oficialmente en mayo de 1982, después de diez años de provisionalidad.<br/><br/>El conjunto de particularidades y valores asociados a la DO "Terra Alta" dan como resultado una región vitivinícola auténtica, donde la tierra, la viña, el vino y su gente se convierten en un gran atractivo turístico.');
        $page->addTranslation($translation);

        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('The Terra Alta');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('summary');
        $translation->setContent('Our land, our denomination.');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('text1');
        $translation->setContent('The Terra Alta');
        $page->addTranslation($translation);

        $manager->persist($page);

        ////////////////

        /// LA HISTORIA
        $page = new Page();
        $page->setCode('00A-004');
        $page->setTitle('La història');
        $page->setSummary("T'expliquem més sobre el nostre passat.");
        $page->setText1('La finca ubicada a la localitat de Bot i propietat de la família Bosch-Llovet, es conèix com a Cal Menescal. Segons les dades existents fou edificada a principis del segle XIX per l’avantpassat Fuster, de professió veterinari (“menescal” en català antic), tot i que bé podria datar-se de finals del segle XVIII.<br/><br/>La transformació del raïm en vi, es remonta a abans del 1860. L’existència d’una bota de 1600 litres de capacitat d’aquesta antiguitat i que encara conservem al celler, dóna fe de la tradició vitivinícola de la nostra família.<br/><br/>A finals del segle passat, petits cellers de la zona decideixen abandonar la pràctica de l’elaboració de vins de taula o de suport de vins poc estructurats, per endinsar-se en la vinificació del fruit de les vinyes velles i seleccionades, aconseguint vins de gran qualitat.<br/><br/>Celler cal Menescal, S.L., és també en aquest moment, finals del segle XX, quan comença a canviar i a mirar al futur.<br/><br/>L’any 2000, vam treure al mercat les primeres línies de vins de qualitat, que varen ser: VALL DEL RACÓ Blanc i negre i AVUS Blanc. En aquests anys, hem afegit noves referències comercials (Avus negre, Avus Dolç, Vall del Pou blanc i negre), hem canviat la marca Vall del Racó per MAS DEL MENESCAL, modernitzant així mateix la seva imatge i s’ha començat a comercialitzar tota la línia MERCÈ DEL MENESCAL. Sota aquest nom comercialitzem: mistela, vermut, vi ranci i un espectacular Bàlsam de Vinagre. Aquest darrer, ha estat l’últim producte en veure la llum i és ja un dels nostres principals exponents.');
        $page->setImage1('lahistoria.png');
        $page->setPosition(4);
        $page->setIsActive(true);

        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('La história');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('summary');
        $translation->setContent('Te explicamos más sobre nuestro pasado.');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('text1');
        $translation->setContent('La finca ubicada en la localidad de Bot y propiedad de la familia Bosch-Llovet, se conoce como Cal Menescal. Según los datos existentes fue edificada a principios del siglo XIX por el antepasado Fuster, de profesión veterinario ("menescal" en catalán antiguo), aunque bien podría datarse de finales del siglo XVIII.<br/><br/>La transformación de la uva en vino, se remonta a antes de 1860. La existencia de una bota de 1600 litros de capacidad de esta antigüedad y que aún conservamos en la bodega, da fe de la tradición vitivinícola de nuestra familia.<br/><br/>A finales del siglo pasado, pequeñas bodegas de la zona deciden abandonar la práctica de la elaboración de vinos de mesa o de apoyo a vinos poco estructurados, para adentrarse en la vinificación del fruto de las viñas viejas y seleccionadas, consiguiendo vinos de gran calidad.<br/><br/>Celler Cal Menescal, SL, es también en este momento, finales del siglo XX, cuando comienza a cambiar y a mirar al futuro.<br/><br/>En 2000, sacamos al mercado las primeras líneas de vinos de calidad, que fueron: Vall del Racó Blanco y Tinto y AVUS Blanco. A lo largo de estos años, hemos añadido nuevas referencias comerciales (Avus Tinto, Avus Dulce, Vall del Pou blanco y negro), hemos cambiado la marca Vall del Racó por MAS DEL MENESCAL, modernizando asimismo su imagen y empezamos a comercializar toda la línea MERCÈ DEL Menescal. Bajo este último nombre comercializamos: mistela, vermut, vino rancio y un espectacular Bálsamo de Vinagre. Este último, ha sido el último producto en ver la luz y es ya uno de nuestros proncipales exponentes.');
        $page->addTranslation($translation);

        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('The history');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('summary');
        $translation->setContent('We tell you more about our past.');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('text1');
        $translation->setContent('The history');
        $page->addTranslation($translation);

        $manager->persist($page);

        ////////////////

        /// LA CASA MUSEU
        $page = new Page();
        $page->setCode('00A-005');
        $page->setTitle('La casa-museu');
        $page->setSummary("Una exposició d'eines i curiositats.");
        $page->setText1('Aquesta sala-museu, és una petita dedicatòria a tots aquells homes i dones que visqueren i lluitaren per tirar endavant a la Terra Alta durant segles i fins fa poques dècades.<br/><br/>El recordatori està format per estris i utensilis habituals en la vida rural i imprescindibles per a qualsevol família, ja fos aquesta més rica o més pobra.<br/><br/>Així doncs, trobem desde estris de cuina, per fer embotits, o el pa, fins estris de treball agrícola o l’antic molí de l’oli, passant per llits, taules o objectes de decoració de la casa.<br/><br/>
Tots aquests utensilis són records familiars i d’amics que han volgut compartir-los amb nosaltres i comprenen una antiguitat mínima de 50 anys fins prop d’uns 300 el més antic.');
        $page->setImage1('lacasamuseu.png');
        $page->setPosition(5);
        $page->setIsActive(true);

        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('La casa-museo');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('summary');
        $translation->setContent('Una exposición de herramientas y curiosidades.');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('es');
        $translation->setField('text1');
        $translation->setContent('Esta sala-museo, es una pequeña dedicatoria a todos aquellos hombres y mujeres que vivieron y lucharon para sacar adelante la Terra Alta durante siglos y hasta hace pocas décadas.<br/><br/>El recordatorio está formado por herramientas y utensilios habituales en la vida rural e imprescindibles para cualquier familia, ya fuera ésta, más rica o más pobre.<br/><br/>Así pues, encontramos desde utensilios de cocina, para hacer embutidos, o el pan, hasta utensilios de trabajo agrícola o el antiguo molino de aceite, pasando por camas, mesas u objetos de decoración de la casa.<br/><br/>Todos estos utensilios son recuerdos familiares y de amigos que han querido compartirlos con nosotros y comprenden una antigüedad mínima de 50 años hasta cerca de 300 años el más antiguo.');
        $page->addTranslation($translation);

        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('The house-museum');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('summary');
        $translation->setContent('An exhibition of tools and curiosities.');
        $page->addTranslation($translation);
        $translation = new PageTranslation();
        $translation->setLocale('en');
        $translation->setField('text1');
        $translation->setContent('The house-museum');
        $page->addTranslation($translation);

        $manager->persist($page);

        $manager->flush();
    }
}
