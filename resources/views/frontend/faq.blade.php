@extends('layouts.app')
@section('content')


<main class="main">
	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
		<div class="container">
			<h1 class="page-title">Frequently Ask Questions<span></span></h1>
		</div><!-- End .container -->
	</div><!-- End .page-header -->
	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item fw-bold active" aria-current="page">FAQs</li>
			</ol>
		</div><!-- End .container -->
	</nav><!-- End .breadcrumb-nav -->

	<div class="page-content pb-3">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="faqBox">
						<h2 class="title text-center mb-3">AVVATAR</h2>
						<div class="accordion accordion-flush" id="avvatarFaq">
							<div class="accordion-item">
								<h2 class="accordion-header" id="avvtarFirst-headingOne">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#avvtarFirst-collapseOne" aria-expanded="false" aria-controls="avvtarFirst-collapseOne">
										What does farm to shaker cup mean?
									</button>
								</h2>
								<div id="avvtarFirst-collapseOne" class="accordion-collapse collapse" aria-labelledby="avvtarFirst-headingOne" data-bs-parent="#avvatarFaq">
									<div class="accordion-body">
										<p>Farm to shaker cup explains the freshness of our products as the entire process from milking to packaging is completed within 24 hours.</p>
										<p>We have our own dairy farm at Manchar, where our cows are fed with healthy and sumptuous meals to ensure their well-being. Our cows are milked and the derived milk undergoes processing for cheese making and other dairy products. Further extraction of liquid, purification/ filtration, drying and final packaging is all carried out within 24 hours.</p>
										<p>Owing to this quick and untouched processing the Whey comes with excellent mix-ability while ensuring the amino acid profile is well retained.</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="avvtarTwo-headingTwo">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#avvtarTwo-collapseTwo" aria-expanded="false" aria-controls="avvtarTwo-collapseTwo">
										What are these cows fed?
									</button>
								</h2>
								<div id="avvtarTwo-collapseTwo" class="accordion-collapse collapse" aria-labelledby="avvtarTwo-headingTwo" data-bs-parent="#avvatarFaq">
									<div class="accordion-body">
										<p>Cows at our dairy farm are on a total meal plan, with specially grown high quality fodder.</p>
										<p>Veterinarian Nutritionists nutritionists ensure customized meals for our cows of different age groups. Cows are fed with green maize, corn silage, bran, alfalfa, pennisetum and chopped hay. This ensures more nutritious milk.</p>
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="faqBox">
						<h2 class="title text-center mb-3">Whey Protien</h2>
						<div class="accordion accordion-flush" id="wheyFaq">
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingOne">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
										What are the ingredients in Avvatar Absolute 100% Whey Protein?
									</button>
								</h2>
								<div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#wheyFaq">
									<div class="accordion-body">
										<p>Avvatar Absolute 100% Whey Protein is comprised of a blend of Whey Protein Isolate extracted from fresh cow’s milk. Additionally, it also contains natural flavors, acesulfame potassium (calorie free sugar substitute, stabilizer and sunflower lecithin).</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingTwo">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
										Who should consume Avvatar Absolute 100% Whey Protein?
									</button>
								</h2>
								<div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#wheyFaq">
									<div class="accordion-body">
										<p>Avvatar Absolute 100% Whey Protein can be consumed by anyone looking to meet their body’s protein demands. It is a great source of protein for vegetarians and individuals who have difficulty meeting the daily protein requirement through dietary (food) sources.</p>
										<p>Consuming the right amount of protein creates an ideal condition for muscle growth.</p>
										<p>It is recommended to consult your health/ nutrition consultant to understand your body’s exact requirement as per your fitness goal, body type, exercise regimen etc.</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingThree">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
										When should it be consumed?
									</button>
								</h2>
								<div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#wheyFaq">
									<div class="accordion-body">
										<p>Avvatar Absolute 100% Whey Protein gives best results when consumed immediately after workout as a post workout meal. This helps in quick repair and growth of broken muscles and a quick speedy recovery. This speedy recovery is a result of its natural high concentration of BCAA & Glutamine (amino acids).
										</p>
										<p>Alternatively, to meet the proteins needs of the day It can also be taken in:</p>
										<ul>
											<li>Pre workout meals to fuel the muscles during workout;</li>
											<li>Early morning to reduce the overnight muscles breakdown;</li>
											<li>Bed time to help sustained release of amino acids throughout the night.</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingFour">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
										How can it be consumed? What should be the temperature of milk/ water or beverage? Dilution proportion. Recipes to include?
									</button>
								</h2>
								<div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#wheyFaq">
									<div class="accordion-body">
										<p>Avvatar Absolute Whey Protein tastes best when mixed with milk. Alternatively, it can be combined with water as per your taste preferences. You can also consider mixing Avvatar Absolute Unflavored Whey Protein with your favorite drinks like lassi, fruit juices, milkshakes etc.
										</p>
										<p>You can also make your meals more nutritious by incorporating Unflavored Whey in your favorite recipes while making nutrition bars and pancakes. It can also be mixed in your breakfast cereal -Oats, Muesli etc.</p>
										<p>Avvatar Absolute Whey Protein has high mix-ability due to its freshness, it is best mixed with beverages at room temperatures. Do not mix Whey protein in a hot beverage as it can lead to alteration of original protein, affecting flavor and texture.</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingFive">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
										What flavors is it available in?
									</button>
								</h2>
								<div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#wheyFaq">
									<div class="accordion-body">
										<p>Avvatar Absolute 100% Whey Protein is available in 2 lip smacking flavors - Café Mocha Swirl and Belgian Chocolate that takes care of your daily protein needs.
										</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingSix">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
										What are the sources for the different flavors?
									</button>
								</h2>
								<div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#wheyFaq">
									<div class="accordion-body">
										<p>Avvatar Absolute 100% Whey Protein contains all-natural flavors that are derived from food sources.
										</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingSeven">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
										What is the quantity of protein per scoop?
									</button>
								</h2>
								<div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#wheyFaq">
									<div class="accordion-body">
										<p>Avvatar Absolute 100% Whey Protein has a serving size of 35g per scoop and contains 24g of high biological value whey protein in each serving.
										</p>
										<p>Note: It is very important to note the quality of protein along with the percentage of protein in each scoop may vary.</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingEight">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
										What is the shelf life?
									</button>
								</h2>
								<div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#wheyFaq">
									<div class="accordion-body">
										<p>Avvatar Absolute 100% Whey Protein is packed with freshness as the entire processing from milking to processing is carried out in 24 hours. It has a shelf life of 2 years.
										</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingNine">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNine" aria-expanded="false" aria-controls="flush-collapseNine">
										Is there any specification to storage?
									</button>
								</h2>
								<div id="flush-collapseNine" class="accordion-collapse collapse" aria-labelledby="flush-headingNine" data-bs-parent="#wheyFaq">
									<div class="accordion-body">
										<p>Avvatar Absolute 100% Whey Protein must be stored at room temperature, in a cool and dry place away from direct sunlight.
										</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingTen">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTen" aria-expanded="false" aria-controls="flush-collapseTen">
										Is the product Gluten-free, Sugar-free?
									</button>
								</h2>
								<div id="flush-collapseTen" class="accordion-collapse collapse" aria-labelledby="flush-headingTen" data-bs-parent="#wheyFaq">
									<div class="accordion-body">
										<p>Avvatar Absolute 100% Whey Protein does not contain any source of gluten and is manufactured in a gluten-free facility.
										</p>
										<p>Avvatar Absolute 100% Whey Protein doesn’t contain any added sugar; instead it has a non-calorie sweetener - Acesulfame Potassium.</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingEleven">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEleven" aria-expanded="false" aria-controls="flush-collapseEleven">
										If a whey protein concentrate is 80% protein, what is the other 20%?
									</button>
								</h2>
								<div id="flush-collapseEleven" class="accordion-collapse collapse" aria-labelledby="flush-headingEleven" data-bs-parent="#wheyFaq">
									<div class="accordion-body">
										<p>Whey is derived from Cows milk; hence 80% protein implies for the percentage of protein obtained from each scoop of powder. e.g. Every protein powder, whether it's whey, soy or something else, has moisture. In fact, 5% of the total formula is water. Rest 15% contains naturally occurring minerals, added flavors, carbohydrates & fats.
										</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="flush-headingTwelve">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwelve" aria-expanded="false" aria-controls="flush-collapseTwelve">
										Can people who are allergic or sensitive to milk use this product? Can people with lactose intolerance consume Avvatar Absolute 100% Whey Protein?
									</button>
								</h2>
								<div id="flush-collapseTwelve" class="accordion-collapse collapse" aria-labelledby="flush-headingTwelve" data-bs-parent="#wheyFaq">
									<div class="accordion-body">
										<p>If a person knows about their lactose tolerance it is suggested to consult a nutritionist/ health professional before using any whey protein as the lactose concentration in each serving will determine the tolerable limit.
										</p>
										<p>We will soon be launching our new product- Whey protein Protein isolate Isolate extracted by further purification and elimination of Lactose and fat molecules, making it more tolerable suitable for individuals with lactose intolerance or sensitivity towards to digest milk and milk products.</p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="faqBox">
						<h2 class="title text-center mb-3">Muscle Gainer</h2>
						<div class="accordion accordion-flush" id="avvatarFaq">
							<div class="accordion-item">
								<h2 class="accordion-header" id="muscleGainerFaqOne-headingOne">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#muscleGainerFaqOne-collapseOne" aria-expanded="false" aria-controls="muscleGainerFaqOne-collapseOne">
										What is the composition of Avvatar Advanced Muscle Gainer?
									</button>
								</h2>
								<div id="muscleGainerFaqOne-collapseOne" class="accordion-collapse collapse" aria-labelledby="muscleGainerFaqOne-headingOne" data-bs-parent="#avvatarFaq">
									<div class="accordion-body">
										<p><b><a href="https://www.avvatarindia.com/muscle-gainer" target="_blank">Avvatar Advanced Muscle Gainer</a></b> is a perfect blend of proteins and carbs, specially formulated to match the requirements of an individual looking for muscle gain with controlled fat levels. </p>
										<p>The major source of calories here is protein from high biological value whey and carbs sourced as a combination of complex maltodextrin and simple dextrose; enriched with 21 essential vitamins and minerals that take care of your daily needs for micronutrients. </p>
										<p>Our muscle gainer also contains Alkalized cocoa powder, Acesulfame Potassium and sunflower lecithin.</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="muscleGainerFaqTwo-headingTwo">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#muscleGainerFaqTwo-collapseTwo" aria-expanded="false" aria-controls="muscleGainerFaqTwo-collapseTwo">
										Who is Avvatar Advanced Muscle gainer ideal for?
									</button>
								</h2>
								<div id="muscleGainerFaqTwo-collapseTwo" class="accordion-collapse collapse" aria-labelledby="muscleGainerFaqTwo-headingTwo" data-bs-parent="#avvatarFaq">
									<div class="accordion-body">
										<p>Avvatar Advanced Muscle Gainer is a lean muscle gain formula with Protein -Carbohydrate ratio of 1:1. 1 scoop (60gm) of muscle gainer contains a high proportion of protein (25.5 gm) extracted from Whey Protein Concentrate and Casein making it an ideal combination of fast and slow-release protein. It has an equivalent quantity of carbohydrates in the form of maltodextrins and dextrose (not sucrose). Dextrose helps give a quick rush of energy and Maltodextrins helps for a sustained release of energy, hence taking care of energy needs immediately and until the next meal.</p>
										<p>Additionally, is enriched with 21 vital vitamins and minerals that also take care of the body’s micronutrient needs.</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="muscleGainerFaqThree-headingTwo">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#muscleGainerFaqThree-collapseTwo" aria-expanded="false" aria-controls="muscleGainerFaqThree-collapseTwo">
										How will Avvatar Advanced muscle gainer help me gain muscles?
									</button>
								</h2>
								<div id="muscleGainerFaqThree-collapseTwo" class="accordion-collapse collapse" aria-labelledby="muscleGainerFaqThree-headingTwo" data-bs-parent="#avvatarFaq">
									<div class="accordion-body">
										<p>Avvatar Advanced Muscle Gainer contains the ideal combination of carbohydrates and proteins that are continually required by the body to maintain a supply of nutrients for the growing muscles. </p>
										<p>When combined with the right kind of training the carbohydrates are utilized for providing energy and sparing the protein completely for muscle repair, recovery and growth. </p>
										<p>The perfect 1:1 ratio of protein: carbohydrates in Avvatar Advanced Muscle Gainer ensures that the body doesn’t bulk up with too much fat and focuses on muscle growth and definition.</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="muscleGainerFaqFour-headingTwo">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#muscleGainerFaqFour-collapseTwo" aria-expanded="false" aria-controls="muscleGainerFaqFour-collapseTwo">
										What is ideal time to consume Avvatar Advanced Muscle Gainer
									</button>
								</h2>
								<div id="muscleGainerFaqFour-collapseTwo" class="accordion-collapse collapse" aria-labelledby="muscleGainerFaqFour-headingTwo" data-bs-parent="#avvatarFaq">
									<div class="accordion-body">
										<p>Avvatar Advanced Muscle Gainer is a lean muscle gain formula and must be added to the diet to match high daily nutritional demands. Since the formulation contains best sourced carbohydrates, proteins, vitamins and minerals it forms an ideal pre-workout meal that can fuel and energize workout sessions. Additionally, it can also be consumed in-between meals and before bedtime.</p>
										<p>For best results consume 2-3 servings per day to match the high nutritional requirement.</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="muscleGainerFaqFive-headingTwo">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#muscleGainerFaqFive-collapseTwo" aria-expanded="false" aria-controls="muscleGainerFaqFive-collapseTwo">
										How many scoops must be introduced to achieve great results?
									</button>
								</h2>
								<div id="muscleGainerFaqFive-collapseTwo" class="accordion-collapse collapse" aria-labelledby="muscleGainerFaqFive-headingTwo" data-bs-parent="#avvatarFaq">
									<div class="accordion-body">
										<p>Ideally Avvatar Advanced Muscle Gainer is best added in pre workout meals, in between the main meals (Breakfast/ Lunch/ Dinner). For the best tasting shake mix 1 scoop (60gm) in 375 ml of low-fat milk or alternatively add it to your favorite drinks like lassi, fruit juice, milkshakes etc. </p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="muscleGainerFaqSix-headingTwo">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#muscleGainerFaqSix-collapseTwo" aria-expanded="false" aria-controls="muscleGainerFaqSix-collapseTwo">
										If a person has just started workouts can he immediately start consuming a muscle gainer?
									</button>
								</h2>
								<div id="muscleGainerFaqSix-collapseTwo" class="accordion-collapse collapse" aria-labelledby="muscleGainerFaqSix-headingTwo" data-bs-parent="#avvatarFaq">
									<div class="accordion-body">
										<p>Yes, muscle gainers are supplements with ideal quantities of carbohydrates, protein, vitamins and minerals that ensure high daily calorie needs are met. It helps bridge the gap between Intake and output in the body.</p>
										<p>In case of a mismatch between intake and output,there are higher chances of losing important muscle tissue and body weight. If you’re serious about muscle growth, you have to consider adding Avvatar Advanced Muscle Gainer and match the required intake of nutrients by adjusting the number of scoops on a daily basis.</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="muscleGainerFaqSeven-headingTwo">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#muscleGainerFaqSeven-collapseTwo" aria-expanded="false" aria-controls="muscleGainerFaqSeven-collapseTwo">
										Why is sugar added to Avvatar Advanced Muscle gainer?
									</button>
								</h2>
								<div id="muscleGainerFaqSeven-collapseTwo" class="accordion-collapse collapse" aria-labelledby="muscleGainerFaqSeven-headingTwo" data-bs-parent="#avvatarFaq">
									<div class="accordion-body">
										<p>Individuals aiming at muscle building require both fast and slow release carbohydrates for continuous growth of muscles in the body. Avvatar Advanced Muscle Gainer contains carbohydrates in the form of maltodextrins and dextrose (not Sucrose). Dextrose helps give a quick rush of energy and maltodextrins help with sustained release of energy, taking care of energy needs immediately and until the next meal. </p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="faqBox">
						<h2 class="title text-center mb-3">Buying & Returns</h2>
						<div class="accordion accordion-flush" id="avvatarFaq">
							<div class="accordion-item">
								<h2 class="accordion-header" id="buyingFaqOne-headingOne">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#buyingFaqOne-collapseOne" aria-expanded="false" aria-controls="buyingFaqOne-collapseOne">
										How can I return/ cancel my orders?
									</button>
								</h2>
								<div id="buyingFaqOne-collapseOne" class="accordion-collapse collapse" aria-labelledby="buyingFaqOne-headingOne" data-bs-parent="#avvatarFaq">
									<div class="accordion-body">
										<p>Please send an email to <a href="mailto:customercare@paragmilkfoods.com">customercare@paragmilkfoods.com </a> and our team will help you plan your returns/refunds.</p>
										<p>For cancellation of orders, if the order is placed on our website, you can contact us at <a href="mailto:customercare@paragmilkfoods.com">customercare@paragmilkfoods.com </a>
											If the order is placed on websites such as Amazon, Flipkart, their customer care process will help you with cancellations.
										</p>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="buyingFaqTwo-headingTwo">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#buyingFaqTwo-collapseTwo" aria-expanded="false" aria-controls="buyingFaqTwo-collapseTwo">
										How do I check the genuineness of the product?
									</button>
								</h2>
								<div id="buyingFaqTwo-collapseTwo" class="accordion-collapse collapse" aria-labelledby="buyingFaqTwo-headingTwo" data-bs-parent="#avvatarFaq">
									<div class="accordion-body">
										<p>Step 1 : - You will see the Authenticate Label on the Cap of the bottle. </p>
										<p>Step 2 : - Scratch the label on the lid to unveil the unique verification code. </p>
										<p>Step 3: - Go to the link <a href="https://www.avvatarindia.com/authenticate">https://www.avvatarindia.com/authenticate</a> enter the unique code, your email id &amp; mobile no &amp; click on Verify Now.</p>
										<p>You will come to know the genuineness of the product.</p>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div><!-- End .container -->

	</div>
</main>









@endsection
