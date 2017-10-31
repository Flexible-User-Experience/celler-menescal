<?php

namespace CalMenescal\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Flux\ProductBundle\Entity\Category;
use Flux\ProductBundle\Entity\Product;
use Flux\ProductBundle\Entity\Translation\CategoryTranslation;
use Flux\ProductBundle\Entity\Translation\ProductTranslation;

/**
 * Class Products.
 */
class Products implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        ////////////
        // NEGRES //
        ////////////
        $category = new Category();
        $category->setCode('00C-001');
        $category->setTitle('Negres');
        $category->setImage1('negres.png');
        $category->setPosition(1);
        $category->setIsActive(true);

        $translation = new CategoryTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('Tintos');
        $category->addTranslation($translation);

        $translation = new CategoryTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('Reds');
        $category->addTranslation($translation);

        $manager->persist($category);

        ////// NEGRE VALL DEL POU
        $product = new Product();
        $product->setCategory($category);
        $product->setCode('00D-001');
        $product->setName('Vall del pou');
        $product->setDegrees(13.5);
        $product->setType('jove');
        $product->setVinification('');
        $product->setTasteNote('');
        $product->setMarriage('');
        $product->setImage1('negrevalldelpou.jpg');
        $product->setPosition(1);
        $product->setIsActive(true);

        $manager->persist($product);

        ////// NEGRE MAS DEL MENESCAL
        $product = new Product();
        $product->setCategory($category);
        $product->setCode('00D-002');
        $product->setName('Mas del Menescal');
        $product->setDegrees(13);
        $product->setType('jove');
        $product->setVinification('Elaborat a partir de vinyes velles de 25 anys. Producte de ceps amb producció mitja-baixa, està collit a mà i transportat en caixes de petites dimensions per a un millor tractament del producte principal, el raïm. Fermentació en acer inoxidable a temperatura controlada i maceraciò d’entre una setmana i deu dies.
Els remontatges es combinen manualment i mecànicament, per tal d’aconseguir una bona extracciò d’aromes i color, evitant les notes herbàcies i vegetals. Val a dir, que el coupatge es porta a terme amb raïm. Fet característic i diferenciador, fa d’aquest vi d’una complexitat i intensitat superior.');
        $product->setTasteNote('De color vermell cirera, amb tonalitats blavoses i violàcies. Molt intens, elegant i complexe aromàticament, predominen les notes de fuites vermelles i del bosc. En boca és un vi llarg, ben estructurat, fresc i saboròs.');
        $product->setMarriage('Arròs, peix i carn');
        $product->setImage1('negremasdelmenescal.jpg');
        $product->setBottles(5000);
        $product->setMix('60% Garnatxa negra. 40% Syrah.');
        $product->setPosition(2);
        $product->setIsActive(true);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('mix');
        $translation->setContent('60% Garnatxa negra. 40% Syrah.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('vinification');
        $translation->setContent('Elaborado a partir de viñas viejas de 25 años, producto de cepas con producción media-baja. Se recoge a mano y su transporte se realiza en cajas de pequeñas dimensiones para un mejor tratamiento del producto principal, la uva. Fermentación en acero inoxidable a temperatura controlada y maceración de entre una semana y diez días. Los remontajes se combinan manual y mecánicamente, para conseguir una buena extracción de aromas y color, evitando las notas herbáceas y vegetales. El coupage se lleva a cabo con uvas. Proceso que lo hace característico y diferenciador, convierte e identifica al vino con una complejidad e intensidad superior.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('taste_note');
        $translation->setContent('De color rojo cereza, con tonalidades azuladas y violáceas. Muy intenso, elegante y complejo aromáticamente, predominan las notas de frutas rojas y del bosque. En boca es un vino largo, bien estructurado, fresco y sabroso.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('marriage');
        $translation->setContent('Arroz, pescado y carnes.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('mix');
        $translation->setContent('75% Red Grenache. 10% Syrah. 5% Merlot. 5% Tempranillo. 5% Other.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('vinification');
        $translation->setContent('Limited production of 7.000 bottles. The grapes come from selected old vines growing in the farm after which the wine is named. The vines have medium-to-low yields. The grapes are hand- harvested using small boxes for its transportation to ensure perfect conditions for the fruit.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('taste_note');
        $translation->setContent('Red cherry hue with blue and purple tones. Very intense and complex aroma, with notes of ripen fruit and wild berries. The palate is long and well structured, with strong reminders of the characteristics of red Grenache.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('marriage');
        $translation->setContent('Rice, fish and meat.');
        $product->addTranslation($translation);

        $manager->persist($product);

        ////// NEGRE AVUS
        $product = new Product();
        $product->setCategory($category);
        $product->setCode('00D-003');
        $product->setName('Avus');
        $product->setDegrees(13.5);
        $product->setType('criança');
        $product->setVinification('Producció limitada de vi negre procedent de les nostres millors vinyes i envellit uns 10 mesos en roure. Veremat en petites caixes seleccionant les millors partides de raïm. Elaborat acuradament remontant el most manualment, de manera tradicional. Un cop finalitzada la fermentació es diposita en barriques noves i seminoves de roure francès i americà per començar el procès d’envelliment, on durant 4 mesos, almenys, el remourem barrica per barrica seguint el sistema “batonage”. El procès d’envelliment es mantindrà fins arribar al punt òptim d’aromes i sabor desitjat, passant després d’un suau filtrat a l’ampolla.');
        $product->setTasteNote('Vermell cirera molt brillant. En olfacte notem les fruites vermelles, madures, conjuntades amb fines vainilles i tocs balsàmics. Boca intensa, complexa i rica. Mostra tipicitat i gran personalitat.');
        $product->setMarriage('Carns vermelles.');
        $product->setImage1('negreavus.jpg');
        $product->setBottles(5000);
        $product->setMix('60% Garnatxa negra. 20% Syrah. 20% Ull de llebre.');
        $product->setPosition(3);
        $product->setIsActive(true);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('mix');
        $translation->setContent('60% Garnatxa negra. 20% Syrah. 20% Tempranillo.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('vinification');
        $translation->setContent('Producción limitada de vino tinto, procedente de nuestras mejores viñas y envejecido aproximadamente 10 meses en roble. La vendimia se efectúa en pequeñas cajas, seleccionando las mejores partidas de uva. Elaborado cuidadosamente, removiendo el mosto manualmente, de manera tradicional. Una vez finalizada la fermentación, se deposita en barricas nuevas y seminuevas de roble francés y americano, para comenzar el proceso de envejecimiento. Durante él, al menos durante 4 meses, es removido barrica por barrica, siguiendo el sistema batonnage. El proceso de envejecimiento se mantendrá hasta llegar a su punto óptimo de aromas y sabor deseado, pasando, después de un suave filtrado, a la botella.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('taste_note');
        $translation->setContent('Color rojo cereza muy brillante. En nariz notamos las frutas rojas maduras, en armonía con finas vainillas y toques balsámicos. En boca es intenso, complejo y rico. Muestra tenacidad y gran personalidad.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('marriage');
        $translation->setContent('Carnes rojas.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('mix');
        $translation->setContent('60% Red Grenache. 20% Syrah. 20% Ull de llebre.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('vinification');
        $translation->setContent('Limited production of 10000 bottles. Red wine fermented in stell tanks and aged in oak barrels. The grapes comes from 48 years old vines, with yields of less than 1.5kg/vine, hand-harvested at its optimal degree of maturity using boxes. Fermented using the batonnage method, like the white wines, in new barrels made of French and American oak. We keep in the barrels 10 months before to bottle the wine.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('taste_note');
        $translation->setContent('Red cherry hue with blue, purple tones and spicy tones, as well as oaky touches with subtle notes of coffee and calamel. Very intense and complex aroma, with notes of ripen fruit and wild berries. The palate is long and well structured, with strong reminders of the characteristics of red Grenache.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('marriage');
        $translation->setContent('Rice, poultry and red meat.');
        $product->addTranslation($translation);

        $manager->persist($product);

        ////////////////

        ////////////
        // BLANCS //
        ////////////
        $category = new Category();
        $category->setCode('00C-002');
        $category->setTitle('Blancs');
        $category->setImage1('blancs.png');
        $category->setPosition(2);
        $category->setIsActive(true);

        $translation = new CategoryTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('Blancos');
        $category->addTranslation($translation);

        $translation = new CategoryTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('Whites');
        $category->addTranslation($translation);

        $manager->persist($category);

        ////// BLANC VALL DEL POU
        $product = new Product();
        $product->setCategory($category);
        $product->setCode('00D-004');
        $product->setName('Vall del pou');
        $product->setDegrees(13.5);
        $product->setType('jove');
        $product->setVinification('');
        $product->setTasteNote('');
        $product->setMarriage('');
        $product->setImage1('blancvalldelpou.jpg');
        $product->setPosition(1);
        $product->setIsActive(true);

        $manager->persist($product);

        /// BLANC MAS DEL MENESCAL
        $product = new Product();
        $product->setCategory($category);
        $product->setCode('00D-005');
        $product->setName('Mas del Menescal');
        $product->setDegrees(13);
        $product->setType('jove');
        $product->setVinification('Raïm procedent de vinyes de 30 anys amb una producció baixa. Està veremat a mà i transportat amb petites caixes per assegurar les millors condicions en la seva manipulació. Fermentat en acer inoxidable a molt baixes temperatures per aconseguir un vi més aromàtic. En les nostres vinificacions ens servim dels llevats autòctons del propi raïm per donar major diferenciaciò i personalitat al vi.');
        $product->setTasteNote('Color blanc palla, amb tonalitats verdoses i reflexos daurats. La combinaciò de les diferents varietats, complementa l’estructura, força, personalitat i sabors de la garnatxa, amb l’elegància i la fruitositat de la resta de raïm.');
        $product->setMarriage('Aperitius, arròs, marisc i peix.');
        $product->setImage1('blancmasdelmenescal.jpg');
        $product->setBottles(5000);
        $product->setMix('60% Garnatxa blanca. 20% Macabeu. 20% Altres.');
        $product->setPosition(2);
        $product->setIsActive(true);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('mix');
        $translation->setContent('60% Garnatxa blanca. 20% Macabeo. 20% Otras variedades.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('vinification');
        $translation->setContent('Uva procedente de viñedos de 30 años con una producción baja. Cosechada a mano y transportada en pequeñas cajas para asegurar las mejores condiciones en su manipulación. Fermentado en acero inoxidable a muy bajas temperaturas, para conseguir un vino más aromático. En nuestras vinificaciones, nos servimos de las levaduras autóctonas de la propia uva para dar mayor diferenciación y personalidad al vino.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('taste_note');
        $translation->setContent('Color amarillo pajizo, con tonalidades verdosas y reflejos dorados. La combinación de las diferentes variedades, complementa la estructura, fuerza, personalidad y sabores de la garnacha, con la elegancia y la jugosidad del resto de uva.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('marriage');
        $translation->setContent('Aperitivos, arroz, marisco y pescado.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('mix');
        $translation->setContent('85% White Grenache. 12% Macabeo. 3% Moscatell.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('vinification');
        $translation->setContent('Limited production of 15.000 bottles. The grape is obtained from 20 years old vines with medium-to-low yields. The grapes are hand-harvested using small boxes for its transportation to ensure perfect conditions for the fruit. Fermentation takes place in stainless steel containers at temperatures of 14º to 16ºC (48ºF to 61ºF).');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('taste_note');
        $translation->setContent('Greenish hue with golden tones. The aroma reminds the flowery and fruity notes typical of Grenache. The palate is intense, fresh and rich, well structured and very tasty.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('marriage');
        $translation->setContent('Rice and fish.');
        $product->addTranslation($translation);

        $manager->persist($product);

        /// BLANC AVUS
        $product = new Product();
        $product->setCategory($category);
        $product->setCode('00D-006');
        $product->setName('Avus');
        $product->setDegrees(13.5);
        $product->setType('criança');
        $product->setVinification('Fermentat i envellit en barrica. Procedent de vinyes de 75 anys amb una producció per cep inferior a 1,5 kg. Veremat manualment i en caixes en el seu punt òptim de maduresa. S’elabora íntegrament en barriques noves de roure francès i americà, controlant en tot moment que la temperatura de fermentaciò no arribi als 19ºC. Mètode “batonage” durant mínim 4 mesos.');
        $product->setTasteNote('Color groc palla-daurat brillant. En nas és un vi ric i complex en aromes. Destaquen les flors, les fuites blanques i un cop el deixem obrir, les tropicals i espècies, així com aromes provinents del roure barrejats amb subtils notes de menta i mel. En boca destaca l’equilibri entre les fuites, els torrefactes i altres notes provinents del roure. Molt persistent.');
        $product->setMarriage('Arròs, peix i carns blanques.');
        $product->setImage1('blancavus.jpg');
        $product->setBottles(2500);
        $product->setMix('100% Garnatxa blanca.');
        $product->setPosition(3);
        $product->setIsActive(true);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('mix');
        $translation->setContent('100% Garnatxa blanca.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('vinification');
        $translation->setContent('Fermentado y envejecido en barrica. Procede de viñas de 75 años con una producción por cepa inferior a 1,5 kg. Se vendimia a mano, depositándolo en cajas, justo en su punto óptimo de madurez. Elaborado íntegramente en barricas nuevas de roble francés y americano, controlando en todo momento que la temperatura de fermentación no llegue a los 19ºC. Método batonnage durante, al menos, 4 meses.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('taste_note');
        $translation->setContent('Color amarillo paja-dorado brillante. En nariz es un vino rico y complejo en aromas. Destacan las flores arropadas por frutas blancas y una vez abierto, las notas tropicales y especiadas, así como aromas que provienen del roble, mezclados con sutiles notas de menta y miel. En boca destaca el equilibrio entre las frutas y los torrefactos junto con otras notas que provienen del roble. Untuoso y muy persistente.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('marriage');
        $translation->setContent('Arroz, pescado y carnes blancas.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('mix');
        $translation->setContent('100% White Grenache.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('vinification');
        $translation->setContent('Limited production of 5000 bottles. White wine fermented and aged in oak barrels. The grape comes from 65 years old vines, with yields of less than 1.5kg/vine, hand- harvested at its optimal degree of maturity using boxes. Fermented using the batonnage method, in new barrels made of French and American oak.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('taste_note');
        $translation->setContent('Bright golden hue. Rich and complex aroma, with flowery, fruity and spicy tones, as well as oaky touches with subtle notes of honey and mint. The palate has a nice balance between fruity and oaky notes. Very persistent.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('marriage');
        $translation->setContent('Rice, fish and poultry.');
        $product->addTranslation($translation);

        $manager->persist($product);

        ////////////////

        ////////////
        // DOLÇOS //
        ////////////
        $category = new Category();
        $category->setCode('00C-003');
        $category->setTitle('Dolços');
        $category->setImage1('dolcos.png');
        $category->setPosition(3);
        $category->setIsActive(true);

        $translation = new CategoryTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('Dulces');
        $category->addTranslation($translation);

        $translation = new CategoryTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('Sweets');
        $category->addTranslation($translation);

        $manager->persist($category);

        ////// DOLÇ MISTELA MERCE DE MENESCAL
        $product = new Product();
        $product->setCategory($category);
        $product->setCode('00D-007');
        $product->setName('Mistela');
        $product->setDegrees(15.5);
        $product->setType('dolç');
        $product->setVinification("La mistela és un <a href='http://ca.wikipedia.org/wiki/Vi_de_licor'>vi de licor</a> tradicional. Vi semifermentat de gust dolç i color fustós, elaborat amb most macerat amb alcohol vínic. La varietat que utilitzem és la Garnatxa blanca. El raïm és d'un grau alcohòlic volumètric probable mínim de 15vol. En la seva elaboració se separa el most flor del raïm i es macera afegint’hi alcohol vínic. Seguidament es remou diversos cops al dia, durant uns dies, per airejar-lo i deixar inactius els llevats. Acabada la maceració se separen els sòlids amb una premsa i s’hi afegeix alcohol fins assolir un grau alcohòlic volumètric adquirit entre 15% vol i 16% vol. La Mistela Mercè del Menescal, té un envelliment mínim de dos anys, un dels quals en envàs de fusta de roure.");
        $product->setTasteNote('');
        $product->setMarriage('Aperitius (foie, formatges, entrants freds), tot i que evidentment, el seu fort, degut al nivell tant alt de sucres són les postres.');
        $product->setImage1('mistelamercedemenescal.jpg');
        $product->setBottles(3000);
        $product->setMix('100% Garnatxa blanca.');
        $product->setPosition(1);
        $product->setIsActive(true);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('mix');
        $translation->setContent('100% Garnatxa blanca.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('vinification');
        $translation->setContent('La mistela es un vino de licor tradicional. Vino semifermentado de sabor dulce y color madera, elaborado con mosto macerado y alcohol vínico. La variedad que utilizamos es la Garnatxa blanca. La uva es de un grado alcohólico volumétrico probable mínimo de 15%vol. En su elaboración se separa el mosto flor de la uva y se macera añadiendo alcohol vínico. Seguidamente se remueve diariamente varias veces, durante algunos días, para airearlo y dejar inactivas las levaduras. Acabada la maceración se separan los sólidos con una prensa y se añade alcohol hasta alcanzar un grado alcohólico volumétrico adquirido entre 15% vol y 16% vol. La Mistela Mercè del Menescal, tiene un envejecimiento mínimo de dos años, uno de los cuales se realiza en recipiente de madera de roble.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('taste_note');
        $translation->setContent('');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('marriage');
        $translation->setContent('Aperitivos (foie, quesos, entrantes fríos), aunque evidentemente, debido al nivel tan alto de azúcares, su punto fuerte son los postres.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('mix');
        $translation->setContent('');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('vinification');
        $translation->setContent("The sweet wine is a traditional liqueur wine. Wine semifermentat sweet taste and color woods, made with marinated grape vinous alcohol. The variety we use is White Grenache. The grape is a likely minimum alcoholic strength 15vol. In its development separates the juice from the grapes are macerated afegint'hi vinous alcohol. Then stir several times a day for several days to aerate it and leave inactive yeast. After soaking separate the solids with a press and add alcohol to an alcoholic strength by volume reaching between 15 and 16% vol. The Favor of Mistela Menescal, is aged at least two years, and half of them in oak container.");
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('taste_note');
        $translation->setContent('');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('marriage');
        $translation->setContent('Appetizers (foie gras, cheese, cold starters), but obviously, its strong due to high sugar level as are the desserts.');
        $product->addTranslation($translation);

        $manager->persist($product);

        ////// DOLÇ AVUS
        $product = new Product();
        $product->setCategory($category);
        $product->setCode('00D-008');
        $product->setName('Avus');
        $product->setDegrees(15);
        $product->setType('dolç');
        $product->setVinification("El vi dolç natural és un <a href='http://ca.wikipedia.org/wiki/Vi_de_licor'>vi de licor</a> tradicional elaborat amb most de garnatxa negra d'elevada riquesa en sucres i amb el procés d'un <a href='http://ca.wikipedia.org/wiki/Vi_mut'>vi mut</a>. Es retarda la verema deixant sobremadurar el raïm al cep. Quan el most està fermentant, i abans que tot el sucre s'hagi transformat en alcohol, s'hi afegeix alcohol en una proporció de 5 a 10% del volum del most, aturant l'acció dels llevats i deixant una certa quantitat de sucre residual no fermentat. El most ha de tenir una riquesa natural en sucre superior a 250 g/l. Un cop macerat, es deposita en barriques de roure on començarà un procès d’envelliment d’entre 14 i 16 mesos, on la meitat del periode se li farà batonage a les barriques per aconseguir major untuositat i complexitat d’aromes.");
        $product->setTasteNote('');
        $product->setMarriage('Aperitius (foie, formatges), reduccions per acompanyaments de carn i postres.');
        $product->setImage1('dolsavus.jpg');
        $product->setBottles(3000);
        $product->setMix('100% Garnatxa negra.');
        $product->setPosition(2);
        $product->setIsActive(true);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('mix');
        $translation->setContent('100% Garnatxa negra.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('vinification');
        $translation->setContent('El vino dulce natural es un vino de licor tradicional, elaborado con mosto de garnatxa negra de elevada riqueza en azúcares. Se retrasa la vendimia dejando madurarlauvademaneranatural en la cepa. Cuando el mosto está fermentando y antes de que todo el azúcar se haya transformado en alcohol, se le añade una proporción del 5 al 10% de alcohol sobre el volumen del mosto, paralizando, de esta manera, la fermentación. El mosto debe tener una riqueza natural en azúcar superior a 250 g/l. Una vez macerado, se deposita en barricas de roble donde comenzará un proceso de envejecimiento de entre 14 y 16 meses. Durante un periodo entre 6 y 8 meses, realizaremos el batonnage a las barricas para conseguir mayor untuosidad y complejidad.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('taste_note');
        $translation->setContent('');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('marriage');
        $translation->setContent('Aperitivos (foie, quesos), reducciones para acompañar carnes y postres.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('mix');
        $translation->setContent('100% Red Grenache.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('vinification');
        $translation->setContent('The naturally sweet wine is a traditionalliquormade​​from wine grape Grenache high richness of sugar and the process of wine mute. Delayed harvest ripe grapes left on the vine. When the juice is fermenting, and before all the sugar has turned into alcohol, alcohol is added at a ratio of 5 to 10% of the volume of the juice, stopping the action of the yeast and leaving a certain amount of sugar residual non- fermented. The juice should be rich in natural sugar than 250 g/l. Once crushed, is deposited in oak barrels where it will begin a process of aging between 14 and 16 months, where half of the period you will be batonage the barrels to achieve greater smoothness and complexity of flavors.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('taste_note');
        $translation->setContent('');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('marriage');
        $translation->setContent('Appetizers (foie gras, cheeses), cuts of meat and accompaniments for dessert');
        $product->addTranslation($translation);

        $manager->persist($product);

        ////////////////

        /////////////
        // VERMUTS //
        /////////////
        $category = new Category();
        $category->setCode('00C-004');
        $category->setTitle('Vermuts');
        $category->setImage1('vermuts.png');
        $category->setPosition(4);
        $category->setIsActive(true);

        $translation = new CategoryTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('Vermuts');
        $category->addTranslation($translation);

        $translation = new CategoryTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('Vermouths');
        $category->addTranslation($translation);

        $manager->persist($category);

        ////// VERMUT MERCE DEL MENESCAL
        $product = new Product();
        $product->setCategory($category);
        $product->setCode('00D-009');
        $product->setName('Vermut');
        $product->setDegrees(15);
        $product->setType('');
        $product->setVinification('El vermut és un vi d’aperitiu molt típic per tot el món, però que concretament al nostre pais es dona una concentraciò important d’elaboradors a la província Tarragona. Habitualment, s’elabora amb vi blanc, vi licoròs, caramel i maceraciò amb herbes. Un cop passat el temps de maceraciò que requereix, el deixem reposar entre 3 i 4 mesos en barriques seminoves de roure, per tal que s’estabilitzin els aromes i el sabor.');
        $product->setTasteNote('');
        $product->setMarriage('Aperitius (foie, formatges, entrants freds).');
        $product->setImage1('vermutmercedemenescal.jpg');
        $product->setBottles(5000);
        $product->setPosition(1);
        $product->setIsActive(true);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('mix');
        $translation->setContent('');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('vinification');
        $translation->setContent('El vermut es un vino muy típico de aperitivo con una tradición extendida por todo el mundo, tradición que se mantiene y practica también aquí. Concretamente en nuestro país, existe una región con una concentración importante de elaboradores, se sitúa en la provincia de Tarragona. Habitualmente, se elabora con vino blanco, vino licoroso, caramelo y maceración con hierbas.... Una vez pasado el tiempo de maceración que requiere, hablamos de un periodo de reposo de entre 3 y 4 meses en barricas seminuevas de roble, se estabilizan los aromas y el sabor.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('taste_note');
        $translation->setContent('');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('marriage');
        $translation->setContent('Aperitivos salados (foie, quesos y entrantes fríos).');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('mix');
        $translation->setContent('');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('vinification');
        $translation->setContent('Vermouth aperitif wine is typical throughout the world, but specifically in our country there is a large concentration of manufacturers in the Tarragona province. Usually made ​​with white wine, wine licoròs, caramel and maceration of herbs.
Having spent time soaking required, the let stand 3 to 4 months-new oak barrels in order to stabilize the aroma and flavor.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('taste_note');
        $translation->setContent('');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('marriage');
        $translation->setContent('Appetizers (foie gras, cheese, cold starters).');
        $product->addTranslation($translation);

        $manager->persist($product);

        ////////////////

        ////////////
        // RANCIS //
        ////////////
        $category = new Category();
        $category->setCode('00C-005');
        $category->setTitle('Rancis');
        $category->setImage1('rancis.png');
        $category->setPosition(5);
        $category->setIsActive(true);

        $translation = new CategoryTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('Rancios');
        $category->addTranslation($translation);

        $translation = new CategoryTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('Musties');
        $category->addTranslation($translation);

        $manager->persist($category);

        ////// RANCI MERCE DEL MENESCAL
        $product = new Product();
        $product->setCategory($category);
        $product->setCode('00D-010');
        $product->setName('Mercè de Menescal');
        $product->setDegrees(13.5);
        $product->setType('');
        $product->setVinification('El vi ranci és un vi molt arrelat a les nostres terres. Elaborat amb Garnatxa Blanca 100%, és un vi d’alta graduació que deixem envellir en barriques velles de roure durant anys. Aquest procés d’envelliment, farà que el color agafi tonalitats d’un daurat molt intens i els aromes evolucionin fins notes de mel i especiades, envoltades de matissos de torrats. En boca, intens i sec. Els matissos de la garnatxa llargament oxidada són acompanyats per la intensitat de l’aroma que en desprèn.');
        $product->setTasteNote('');
        $product->setMarriage('Aperitius salats, reduccions en cuina i principalment per postres.');
        $product->setImage1('rancimercedemenescal.jpg');
        $product->setBottles(1000);
        $product->setMix('100% Garnatxa blanca.');
        $product->setPosition(1);
        $product->setIsActive(true);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('mix');
        $translation->setContent('100% Garnatxa blanca.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('vinification');
        $translation->setContent('El vino rancio, vi ranci como le llamamos nosotros, es un vino muy arraigado en nuestras tierras. Elaborado con Garnatxa Blanca 100%, es un vino de alta graduación que dejamos envejecer en barricas viejas de roble durante años. Este proceso de envejecimiento, hace que el color coja tonalidades de un dorado muy intenso y los aromas evolucionen hasta notas de miel y especiadas, rodeadas con matices tostados. En boca, intenso y seco. Los matices de la garnatxa largamente oxidada se acompañan por la intensidad del aroma que desprende.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('taste_note');
        $translation->setContent('');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('marriage');
        $translation->setContent('Aperitivos salados, reducciones en cocina y principalmente para postres.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('mix');
        $translation->setContent('');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('vinification');
        $translation->setContent('The old wine wine is deeply rooted in our land. Made from 100% Garnacha Blanca is a wine high in alcohol that we age old oak barrels for a minimum of 7-8 years. This aging process will take the color of golden hues and intense aromas evolved notes of honey and spices surrounded by toasty nuances. On the palate, intense and dry. The nuances of the oxidized long Grenache are accompanied by the intensity of the aroma that follows.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('taste_note');
        $translation->setContent('');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('marriage');
        $translation->setContent('Salty snacks, mainly to reductions in cooking and desserts.');
        $product->addTranslation($translation);

        $manager->persist($product);

        ////// RANCI LICOROS MERCE DE MENESCAL
        $product = new Product();
        $product->setCategory($category);
        $product->setCode('00D-011');
        $product->setName('Licorós Mercè de Menescal');
        $product->setDegrees(13.5);
        $product->setType('');
        $product->setVinification('');
        $product->setTasteNote('');
        $product->setMarriage('');
        $product->setImage1('vermutmercedemenescal.jpg');
        $product->setPosition(2);
        $product->setIsActive(false);

        $manager->persist($product);

        ////////////////

        ///////////////
        // BALSAMICS //
        ///////////////
        $category = new Category();
        $category->setCode('00C-006');
        $category->setTitle('Balsàmics');
        $category->setImage1('balsamics.png');
        $category->setPosition(6);
        $category->setIsActive(true);

        $translation = new CategoryTranslation();
        $translation->setLocale('es');
        $translation->setField('title');
        $translation->setContent('Balsámicos');
        $category->addTranslation($translation);

        $translation = new CategoryTranslation();
        $translation->setLocale('en');
        $translation->setField('title');
        $translation->setContent('Balsamics');
        $category->addTranslation($translation);

        $manager->persist($category);

        ////// BALSAM DE VINAGRE MERCE DEL MENESCAL
        $product = new Product();
        $product->setCategory($category);
        $product->setCode('00D-012');
        $product->setName('Bàlsam de vinagre');
        $product->setDegrees(4.5);
        $product->setType('');
        $product->setVinification('Un dels nostres productes més reconeguts. Elaborat per un procediment similar al vinagre balsàmic de Mòdena, envellint el vinagre durant un mínim de 4 anys en barriques de roure. Per la seva elaboració utilitzem most de vi concentrat per ebullició, vinagre tradicional envellit i madurat en botes de roure i altres elements derivats del vi, d’elaboració pròpia.');
        $product->setTasteNote('');
        $product->setMarriage("Tot tipus d'amanides, vinagretes, salses i inclús per reposteria.");
        $product->setImage1('balsamicmercedemenescal25.jpg');
        $product->setBottles(8000);
        $product->setPresentation('25cl, 50cl i 75cl');
        $product->setPosition(1);
        $product->setIsActive(true);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('mix');
        $translation->setContent('');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('vinification');
        $translation->setContent('Uno de nuestros productos más reconocidos. Elaborado con un procedimiento similar al del vinagre balsámico de Módena, envejeciendo el vinagre durante un mínimo de 4 años en barricas de roble. Para su elaboración utilizamos mosto de vino concentrado por ebullición, vinagre tradicional envejecido y madurado en barricas de roble y otros elementos derivados del vino, de elaboración propia.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('taste_note');
        $translation->setContent('');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('es');
        $translation->setField('marriage');
        $translation->setContent('Todo tipo de ensaladas, vinagretas, salsas e incluso para repostería.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('mix');
        $translation->setContent('');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('vinification');
        $translation->setContent('One of our most recognized products. Prepared by a procedure similar to balsamic vinegar from Modena, aging the wine for at least 4 years in oak barrels. Made for use by boiling concentrated grape wine, vinegar aged and matured in traditional oak barrels and other items made ​f​ rom wine, homemade.');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('taste_note');
        $translation->setContent('');
        $product->addTranslation($translation);

        $translation = new ProductTranslation();
        $translation->setLocale('en');
        $translation->setField('marriage');
        $translation->setContent('All kinds of salads, vinaigrettes, sauces, marinated meats and fish and even for pastries.');
        $product->addTranslation($translation);

        $manager->persist($product);

        $product = new Product();
        $product->setCategory($category);
        $product->setCode('00D-013');
        $product->setName('Bàlsam de vinagre 50cl');
        $product->setDegrees(13.5);
        $product->setType('');
        $product->setVinification('Texte llarg sobre la vinificació');
        $product->setTasteNote('Texte llarg sobre la nota de tast del vi');
        $product->setMarriage('Texte llarg sobre el maridatge del vi');
        $product->setImage1('balsamicmercedemenescal50.jpg');
        $product->setPosition(2);
        $product->setIsActive(false);

        $manager->persist($product);

        $product = new Product();
        $product->setCategory($category);
        $product->setCode('00D-014');
        $product->setName('Bàlsam de vinagre 75cl');
        $product->setDegrees(13.5);
        $product->setType('');
        $product->setVinification('Texte llarg sobre la vinificació');
        $product->setTasteNote('Texte llarg sobre la nota de tast del vi');
        $product->setMarriage('Texte llarg sobre el maridatge del vi');
        $product->setImage1('balsamicmercedemenescal75.jpg');
        $product->setPosition(3);
        $product->setIsActive(false);

        $manager->persist($product);

        $manager->flush();
    }
}
