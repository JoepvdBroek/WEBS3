<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('products')->insert(array(
			'name'=>'Tandenborstel',
			'price'=>9.99,
			'shortDescription'=>'Van het merk Oral',
			'description'=>'Een elektische tandenborstel om glanzende tanden te krijgen.',
			'imageName'=>'tandenborstel.jpg',
			'category_id'=>'4',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('products')->insert(array(
			'name'=>'Barbie',
			'price'=>9.99,
			'shortDescription'=>'Een speelpop',
			'description'=>'Barbie is de gewilde meisjes speelpop.',
			'imageName'=>'barbie.jpg',
			'category_id'=>'6',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('products')->insert(array(
			'name'=>'Harry Potter en de steen der wijze',
			'price'=>9.99,
			'shortDescription'=>'Een goede thriller',
			'description'=>'Een spannend verhaal over potter tegen voldemort.',
			'imageName'=>'harry.jpg',
			'category_id'=>'5',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('products')->insert(array(
			'name'=>'NIVEA MEN Dagcrème',
			'price'=>9.99,
			'shortDescription'=>'Een speelpop',
			'description'=>'Nivea For Men Skin Energy Q10 Gezichtscrème voorziet je huid van nieuwe energie. De nieuwe, verbeterde formule bevat een dubbele hoeveelheid huideigen co-enzym Q10 die de cellen voorzien van langdurige energie. De vitamine E, pro-vitamine B5 en de speciale uva/uvb-filters versterken en beschermen de huid. Versterkt het herstelvermogen van de huid tegen dagelijkse stress en reactiveert het natuurlijke herstelproces. Trekt meteen in en voelt niet vet aan.',
			'imageName'=>'nivea.jpg',
			'category_id'=>'7',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('products')->insert(array(
			'name'=>'Goudkust',
			'price'=>9.99,
			'shortDescription'=>'Een speelpop',
			'description'=>'Ruim twee jaar geleden is Fleur voor de liefde naar Kroatië verhuisd. Nu Tibor haar ten huwelijk heeft gevraagd, is het sprookje compleet. Ze heeft haar drie beste vriendinnen Noa, Milou en Sanne uitgenodigd om alvast een paar dagen voor de bruiloft te komen en te genieten van het luxe leven aan de ‘goudkust’ van Kroatië. Maar langzaamaan beginnen ze aan de bedoelingen van Tibor te twijfelen. Waarom is hij zo vaak weg? Waarom wordt hij continu bijgestaan door twee bodyguards? Is dit echt Fleurs grote liefde? En dan wordt Fleur vlak voor de bruiloft opeens ontvoerd.',
			'imageName'=>'goudkust.jpg',
			'category_id'=>'5',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('products')->insert(array(
			'name'=>'Baby Born',
			'price'=>9.99,
			'shortDescription'=>'Een speelpop',
			'description'=>'De Baby born Interactieve pop heeft vele levensechte functies, die allemaal zonder batterijen functioneren. Ze kan drinken, eten, plassen, op het potje gaan, huilen, bewegen, in bad en slapen. Met de bijgeleverde accessoires kan je echt voor Baby born zorgen, net als een echte Baby. Ze is gekleed in een schattige roze rompertje met mutsje en wordt geleverd inclusief bord en lepel, speentje, luier en potje. Wat houdt het interactieve in? Een chip die in de pop zit, activeert verschillende andere Baby born producten (apart verkrijgbaar) die met batterij worden aangedreven. Baby born kan op die manier verschillende effecten zoals licht en geluid activeren in de accessoires zoals de cabrio of het paard.',
			'imageName'=>'babyborn.jpg',
			'category_id'=>'6',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('products')->insert(array(
			'name'=>'Gum Soft Picks - 80 stuks',
			'price'=>9.99,
			'shortDescription'=>'Een speelpop',
			'description'=>'De ragers zijn voorzien van rubberen haartjes die zorgen voor goede verwijdering van tandplaque en voedselresten. Geschikt voor mensen bij wie de ruimten tussen de tanden en kiezen iets groter zijn (middelgrote tussenruimten). GUM soft picks regular ragers verwijderen tandplaque effectief en masseren het tandvlees op milde wijze. 80 Soft Picks Regular per verpakking.',
			'imageName'=>'gumpicks.jpg',
			'category_id'=>'4',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('products')->insert(array(
			'name'=>'Listerine Total Care - 500 ml',
			'price'=>9.99,
			'shortDescription'=>'Een speelpop',
			'description'=>'Elke Listerine variant bevat de unieke combinatie van vier essentiële oliën, die:
			 - De ontwikkeling van tandplak vermindert
			 - Zorgt voor een langdurig frisse adem
			 - Geschikt is voor dagelijks gebruik en de mondflora niet verstoort
			 - Behoudt de goede conditie van het tandvlees
			 
			 LISTERINE Total Care: de meest geavanceerdeListerine.
			 Het heeft 6 voordelen voor een totale mondhygiëne. Het dringt door in tandplak, versterkt je tanden en houdt ze natuurlijk wit, houdt tandvlees gezond, helpt schadelijke bacteriën te verwijderen en geeft een frisse adem.',
			'imageName'=>'listerine.jpg',
			'category_id'=>'4',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('products')->insert(array(
			'name'=>'Poppen Buggy',
			'price'=>9.99,
			'shortDescription'=>'Een speelpop',
			'description'=>'Speelgoed buggy in vrolijk Lief! dessin. Opvouwbaar en met zonnedakje. Geschikt vanaf 3 jaar.',
			'imageName'=>'buggy.jpg',
			'category_id'=>'6',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('products')->insert(array(
			'name'=>'iPhone 3',
			'price'=>9.99,
			'shortDescription'=>'Een speelpop',
			'description'=>'De beste smartphone van zijn tijd',
			'imageName'=>'iphone3.jpg',
			'category_id'=>'10',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));

		DB::table('products')->insert(array(
			'name'=>'Samsung Galaxy Tab 3',
			'price'=>9.99,
			'shortDescription'=>'Een speelpop',
			'description'=>'De Samsung Galaxy Tab 3 Lite 7.0 inch is de perfecte reisgenoot. Van handig formaat om overal mee naartoe te nemen en toch van alle gemakken voorzien. 
 
				 Belangrijkste kenmerken van de Samsung Galaxy Tab 3 Lite 7.0 (T110):
				 7.0 inch scherm
				 8 GB opslaggeheugen, uitbreidbaar met 32 GB
				 Android 4.2
				 WiFi
				 2 jaar fabrieksgarantie',
			'imageName'=>'samsungtab3.jpg',
			'category_id'=>'9',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
		));




	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('products')->where('name', '=', 'Tandenborstel')->delete();
		DB::table('products')->where('name', '=', 'Barbie')->delete();
		DB::table('products')->where('name', '=', 'Harry Potter en de steen der wijze')->delete();
		DB::table('products')->where('name', '=', 'NIVEA MEN Dagcréme')->delete();
		DB::table('products')->where('name', '=', 'Goudkust')->delete();
		DB::table('products')->where('name', '=', 'Baby Born')->delete();
		DB::table('products')->where('name', '=', 'Gum Soft Picks - 80 stuks')->delete();
		DB::table('products')->where('name', '=', 'Listerine Total Care - 500 ml')->delete();
		DB::table('products')->where('name', '=', 'Poppen Buggy')->delete();
		DB::table('products')->where('name', '=', 'Samsung Galaxy Tab 3')->delete();
		DB::table('products')->where('name', '=', 'iPhone 3')->delete();
	}

}
