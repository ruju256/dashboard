<?php

class AdminController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	public function accessRules()
    {
    	$role = Yii::app()->user->getState('role');
    
    	if( $role  == 'admin'){
        	$arr = array('carouselItemRequest','createAlbumRequest','viewAlbum','addSenderData', 'updateForeignExchangeRate','sendMoney');
    	}else if( $role == 'user'){
        	$arr = array('');
        }
        else{
        	$arr = array('');
        }
            
    	return array(                   
            array('allow',
            	'actions'=>$arr,
                'users'=>array('@'),
                'message'=>'You do not have permission to view this page.',
                ),
            array('deny',
                'users'=>array('*'),
                'message'=>'You do not have permission to view this page.',
            ),
        );
    }

    public function actionViewAlbum($id){
    	$album = Albums::model()->findByPk($id);
    	if($album!=null){
    		$pageData = array('page'=>'album');
    		$this->render('//home/admin/album', $pageData);
    	}
    	echo "This Album does not exist.";
    	return;
    }

	public function actionCarouselItemRequest(){
		$error = "No data sent. Try again.";
		if(isset($_POST['carouselForm']) && !empty($_POST['carouselForm'])){
			$carousel = new Carousels;
			$carousel->title = $_POST['carouselForm']['title'];
			$carousel->description = $_POST['carouselForm']['description'];
			$carousel->img = $_POST['carouselForm']['img'];
			if($carousel->save()){
				echo json_encode(array('status'=>true));
				return;
			}
			$error = "Failed to save.";
		}
		echo json_encode(array('status'=>false, 'error'=>$error));
		return;
	}

	public function actionCreateAlbumRequest(){
		$error = "No data sent. Try again.";
		if(isset($_POST['albumForm']) && !empty($_POST['albumForm'])){
			$album = new Albums;
			$album->title = $_POST['albumForm']['title'];
			$album->description = $_POST['albumForm']['description'];
			$album->path = Yii::app()->baseUrl.'/protected/uploads/gallery/'.str_replace(" ","",$_POST['albumForm']['title']).'/'; 
			if($this->create_folder(str_replace(" ","",$_POST['albumForm']['title']))){
				if($album->save()){
					echo json_encode(array('status'=>true, 'album_id'=>$album->id));
					return;
				}
				$error = "Failed to save.";
			}
			$error = "Failed to create folder.";
			
		}
		echo json_encode(array('status'=>false, 'error'=>$error));
		return;
	}

	private function create_folder($folder_name){
		$folder_path = dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'gallery'.DIRECTORY_SEPARATOR.$folder_name;
		if(!file_exists($folder_path)){
			if(mkdir($folder_path)){
				return true;
			}
		}
		return false;
	}

	public function actionAddSenderData(){
		if(isset($_POST['sender']) && !empty($_POST['sender'])){
			$model = new Senders();
			$model->sender_name = $_POST['sender']['sender'];
			$model->sender_phone_no = $_POST['sender']['senderNo'];
			$model->amount = $_POST['sender']['amount'];
			$model->charges = $_POST['sender']['charges'];
			$model->receiver_name = $_POST['sender']['receiver'];
			$model->receiver_phone_no = $_POST['sender']['receiverNo'];
			$model->sender_country = $_POST['sender']['senderCountry'];
			$model->receiver_country = $_POST['sender']['receiverCountry'];

			

			if($model->save()){				
				$receiver = new Receivers();
				$receiver->sender_id = $model->id;
				$receiver->receiver_name = $_POST['sender']['receiver'];
				$receiver->receiver_phone_no = $_POST['sender']['receiverNo'];
				$receiver->amount = $_POST['sender']['amount'];
				$receiver->charges = $_POST['sender']['charges'];
				$receiver->sender_name = $_POST['sender']['sender'];
				$receiver->sender_phone_no = $_POST['sender']['senderNo'];
				$receiver->sender_country = $_POST['sender']['senderCountry'];
				$receiver->receiver_country = $_POST['sender']['receiverCountry'];
				$receiver->save();
				$this->redirect(Yii::app()->request->baseUrl.'/admin/home');				
			}else
			{
				echo("Saving Failed");
			}

		}
	}

	public function actionUpdateForeignExchangeRate(){		
		
		if(isset($_POST['forexRate']) && !empty($_POST['forexRate']))
		{
			$forex_rate = new ForexExchange();
			$forex_rate->rate = $_POST['forexRate']['rate'];

			//var_dump($forex_rate->rate); return;
			if($forex_rate->save()){

				echo "Information Successfully saved";
				
			}else{
				echo "Saving Information Failed";
			}
		}
	}

	public function actionSendMoney(){

		$countries = $this->getAllCountries();
		$pageData = array(
			'page'=>'home',
			'countries'=>$countries
		);

		$this->render("/home/admin/receiverPage", $pageData);
	}

	private function getAllCountries(){
		$countries = array(
							array("country" => "Afghanistan", "continent" => "Asia"),
							array("country" => "Ã…land Islands", "continent" => "Europe"),
							array("country" => "Albania", "continent" => "Europe"),
							array("country" => "Algeria", "continent" => "Africa"),
							array("country" => "American Samoa", "continent" => "Oceania"),
							array("country" => "Andorra", "continent" => "Europe"),
							array("country" => "Angola", "continent" => "Africa"),
							array("country" => "Anguilla", "continent" => "North America"),
							array("country" => "Antarctica", "continent" => "Antarctica"),
							array("country" => "Antigua and Barbuda", "continent" => "North America"),
							array("country" => "Argentina", "continent" => "South America"),
							array("country" => "Armenia", "continent" => "Asia"),
							array("country" => "Aruba", "continent" => "North America"),
							array("country" => "Australia", "continent" => "Oceania"),
							array("country" => "Austria", "continent" => "Europe"),
							array("country" => "Azerbaijan", "continent" => "Asia"),
							array("country" => "Bahamas", "continent" => "North America"),
							array("country" => "Bahrain", "continent" => "Asia"),
							array("country" => "Bangladesh", "continent" => "Asia"),
							array("country" => "Barbados", "continent" => "North America"),
							array("country" => "Belarus", "continent" => "Europe"),
							array("country" => "Belgium", "continent" => "Europe"),
							array("country" => "Belize", "continent" => "North America"),
							array("country" => "Benin", "continent" => "Africa"),
							array("country" => "Bermuda", "continent" => "North America"),
							array("country" => "Bhutan", "continent" => "Asia"),
							array("country" => "Bolivia", "continent" => "South America"),
							array("country" => "Bosnia and Herzegovina", "continent" => "Europe"),
							array("country" => "Botswana", "continent" => "Africa"),
							array("country" => "Bouvet Island", "continent" => "Antarctica"),
							array("country" => "Brazil", "continent" => "South America"),
							array("country" => "British Indian Ocean Territory", "continent" => "Asia"),
							array("country" => "Brunei Darussalam", "continent" => "Asia"),
							array("country" => "Bulgaria", "continent" => "Europe"),
							array("country" => "Burkina Faso", "continent" => "Africa"),
							array("country" => "Burundi", "continent" => "Africa"),
							array("country" => "Cambodia", "continent" => "Asia"),
							array("country" => "Cameroon", "continent" => "Africa"),
							array("country" => "Canada", "continent" => "North America"),
							array("country" => "Cape Verde", "continent" => "Africa"),
							array("country" => "Cayman Islands", "continent" => "North America"),
							array("country" => "Central African Republic", "continent" => "Africa"),
							array("country" => "Chad", "continent" => "Africa"),
							array("country" => "Chile", "continent" => "South America"),
							array("country" => "China", "continent" => "Asia"),
							array("country" => "Christmas Island", "continent" => "Asia"),
							array("country" => "Cocos (Keeling) Islands", "continent" => "Asia"),
							array("country" => "Colombia", "continent" => "South America"),
							array("country" => "Comoros", "continent" => "Africa"),
							array("country" => "Congo", "continent" => "Africa"),
							array("country" => "The Democratic Republic of The Congo", "continent" => "Africa"),
							array("country" => "Cook Islands", "continent" => "Oceania"),
							array("country" => "Costa Rica", "continent" => "North America"),
							array("country" => "Cote D'ivoire", "continent" => "Africa"),
							array("country" => "Croatia", "continent" => "Europe"),
							array("country" => "Cuba", "continent" => "North America"),
							array("country" => "Cyprus", "continent" => "Asia"),
							array("country" => "Czech Republic", "continent" => "Europe"),
							array("country" => "Denmark", "continent" => "Europe"),
							array("country" => "Djibouti", "continent" => "Africa"),
							array("country" => "Dominica", "continent" => "North America"),
							array("country" => "Dominican Republic", "continent" => "North America"),
							array("country" => "Ecuador", "continent" => "South America"),
							array("country" => "Egypt", "continent" => "Africa"),
							array("country" => "El Salvador", "continent" => "North America"),
							array("country" => "Equatorial Guinea", "continent" => "Africa"),
							array("country" => "Eritrea", "continent" => "Africa"),
							array("country" => "Estonia", "continent" => "Europe"),
							array("country" => "Ethiopia", "continent" => "Africa"),
							array("country" => "Falkland Islands (Malvinas)", "continent" => "South America"),
							array("country" => "Faroe Islands", "continent" => "Europe"),
							array("country" => "Fiji", "continent" => "Oceania"),
							array("country" => "Finland", "continent" => "Europe"),
							array("country" => "France", "continent" => "Europe"),
							array("country" => "French Guiana", "continent" => "South America"),
							array("country" => "French Polynesia", "continent" => "Oceania"),
							array("country" => "French Southern Territories", "continent" => "Antarctica"),
							array("country" => "Gabon", "continent" => "Africa"),
							array("country" => "Gambia", "continent" => "Africa"),
							array("country" => "Georgia", "continent" => "Asia"),
							array("country" => "Germany", "continent" => "Europe"),
							array("country" => "Ghana", "continent" => "Africa"),
							array("country" => "Gibraltar", "continent" => "Europe"),
							array("country" => "Greece", "continent" => "Europe"),
							array("country" => "Greenland", "continent" => "North America"),
							array("country" => "Grenada", "continent" => "North America"),
							array("country" => "Guadeloupe", "continent" => "North America"),
							array("country" => "Guam", "continent" => "Oceania"),
							array("country" => "Guatemala", "continent" => "North America"),
							array("country" => "Guernsey", "continent" => "Europe"),
							array("country" => "Guinea", "continent" => "Africa"),
							array("country" => "Guinea-bissau", "continent" => "Africa"),
							array("country" => "Guyana", "continent" => "South America"),
							array("country" => "Haiti", "continent" => "North America"),
							array("country" => "Heard Island and Mcdonald Islands", "continent" => "Antarctica"),
							array("country" => "Holy See (Vatican City State)", "continent" => "Europe"),
							array("country" => "Honduras", "continent" => "North America"),
							array("country" => "Hong Kong", "continent" => "Asia"),
							array("country" => "Hungary", "continent" => "Europe"),
							array("country" => "Iceland", "continent" => "Europe"),
							array("country" => "India", "continent" => "Asia"),
							array("country" => "Indonesia", "continent" => "Asia"),
							array("country" => "Iran", "continent" => "Asia"),
							array("country" => "Iraq", "continent" => "Asia"),
							array("country" => "Ireland", "continent" => "Europe"),
							array("country" => "Isle of Man", "continent" => "Europe"),
							array("country" => "Israel", "continent" => "Asia"),
							array("country" => "Italy", "continent" => "Europe"),
							array("country" => "Jamaica", "continent" => "North America"),
							array("country" => "Japan", "continent" => "Asia"),
							array("country" => "Jersey", "continent" => "Europe"),
							array("country" => "Jordan", "continent" => "Asia"),
							array("country" => "Kazakhstan", "continent" => "Asia"),
							array("country" => "Kenya", "continent" => "Africa"),
							array("country" => "Kiribati", "continent" => "Oceania"),
							array("country" => "Democratic People's Republic of Korea", "continent" => "Asia"),
							array("country" => "Republic of Korea", "continent" => "Asia"),
							array("country" => "Kuwait", "continent" => "Asia"),
							array("country" => "Kyrgyzstan", "continent" => "Asia"),
							array("country" => "Lao People's Democratic Republic", "continent" => "Asia"),
							array("country" => "Latvia", "continent" => "Europe"),
							array("country" => "Lebanon", "continent" => "Asia"),
							array("country" => "Lesotho", "continent" => "Africa"),
							array("country" => "Liberia", "continent" => "Africa"),
							array("country" => "Libya", "continent" => "Africa"),
							array("country" => "Liechtenstein", "continent" => "Europe"),
							array("country" => "Lithuania", "continent" => "Europe"),
							array("country" => "Luxembourg", "continent" => "Europe"),
							array("country" => "Macao", "continent" => "Asia"),
							array("country" => "Macedonia", "continent" => "Europe"),
							array("country" => "Madagascar", "continent" => "Africa"),
							array("country" => "Malawi", "continent" => "Africa"),
							array("country" => "Malaysia", "continent" => "Asia"),
							array("country" => "Maldives", "continent" => "Asia"),
							array("country" => "Mali", "continent" => "Africa"),
							array("country" => "Malta", "continent" => "Europe"),
							array("country" => "Marshall Islands", "continent" => "Oceania"),
							array("country" => "Martinique", "continent" => "North America"),
							array("country" => "Mauritania", "continent" => "Africa"),
							array("country" => "Mauritius", "continent" => "Africa"),
							array("country" => "Mayotte", "continent" => "Africa"),
							array("country" => "Mexico", "continent" => "North America"),
							array("country" => "Micronesia", "continent" => "Oceania"),
							array("country" => "Moldova", "continent" => "Europe"),
							array("country" => "Monaco", "continent" => "Europe"),
							array("country" => "Mongolia", "continent" => "Asia"),
							array("country" => "Montenegro", "continent" => "Europe"),
							array("country" => "Montserrat", "continent" => "North America"),
							array("country" => "Morocco", "continent" => "Africa"),
							array("country" => "Mozambique", "continent" => "Africa"),
							array("country" => "Myanmar", "continent" => "Asia"),
							array("country" => "Namibia", "continent" => "Africa"),
							array("country" => "Nauru", "continent" => "Oceania"),
							array("country" => "Nepal", "continent" => "Asia"),
							array("country" => "Netherlands", "continent" => "Europe"),
							array("country" => "Netherlands Antilles", "continent" => "North America"),
							array("country" => "New Caledonia", "continent" => "Oceania"),
							array("country" => "New Zealand", "continent" => "Oceania"),
							array("country" => "Nicaragua", "continent" => "North America"),
							array("country" => "Niger", "continent" => "Africa"),
							array("country" => "Nigeria", "continent" => "Africa"),
							array("country" => "Niue", "continent" => "Oceania"),
							array("country" => "Norfolk Island", "continent" => "Oceania"),
							array("country" => "Northern Mariana Islands", "continent" => "Oceania"),
							array("country" => "Norway", "continent" => "Europe"),
							array("country" => "Oman", "continent" => "Asia"),
							array("country" => "Pakistan", "continent" => "Asia"),
							array("country" => "Palau", "continent" => "Oceania"),
							array("country" => "Palestinia", "continent" => "Asia"),
							array("country" => "Panama", "continent" => "North America"),
							array("country" => "Papua New Guinea", "continent" => "Oceania"),
							array("country" => "Paraguay", "continent" => "South America"),
							array("country" => "Peru", "continent" => "South America"),
							array("country" => "Philippines", "continent" => "Asia"),
							array("country" => "Pitcairn", "continent" => "Oceania"),
							array("country" => "Poland", "continent" => "Europe"),
							array("country" => "Portugal", "continent" => "Europe"),
							array("country" => "Puerto Rico", "continent" => "North America"),
							array("country" => "Qatar", "continent" => "Asia"),
							array("country" => "Reunion", "continent" => "Africa"),
							array("country" => "Romania", "continent" => "Europe"),
							array("country" => "Russian Federation", "continent" => "Europe"),
							array("country" => "Rwanda", "continent" => "Africa"),
							array("country" => "Saint Helena", "continent" => "Africa"),
							array("country" => "Saint Kitts and Nevis", "continent" => "North America"),
							array("country" => "Saint Lucia", "continent" => "North America"),
							array("country" => "Saint Pierre and Miquelon", "continent" => "North America"),
							array("country" => "Saint Vincent and The Grenadines", "continent" => "North America"),
							array("country" => "Samoa", "continent" => "Oceania"),
							array("country" => "San Marino", "continent" => "Europe"),
							array("country" => "Sao Tome and Principe", "continent" => "Africa"),
							array("country" => "Saudi Arabia", "continent" => "Asia"),
							array("country" => "Senegal", "continent" => "Africa"),
							array("country" => "Serbia", "continent" => "Europe"),
							array("country" => "Seychelles", "continent" => "Africa"),
							array("country" => "Sierra Leone", "continent" => "Africa"),
							array("country" => "Singapore", "continent" => "Asia"),
							array("country" => "Slovakia", "continent" => "Europe"),
							array("country" => "Slovenia", "continent" => "Europe"),
							array("country" => "Solomon Islands", "continent" => "Oceania"),
							array("country" => "Somalia", "continent" => "Africa"),
							array("country" => "South Africa", "continent" => "Africa"),
							array("country" => "South Georgia and The South Sandwich Islands", "continent" => "Antarctica"),
							array("country" => "Spain", "continent" => "Europe"),
							array("country" => "Sri Lanka", "continent" => "Asia"),
							array("country" => "Sudan", "continent" => "Africa"),
							array("country" => "Suriname", "continent" => "South America"),
							array("country" => "Svalbard and Jan Mayen", "continent" => "Europe"),
							array("country" => "Swaziland", "continent" => "Africa"),
							array("country" => "Sweden", "continent" => "Europe"),
							array("country" => "Switzerland", "continent" => "Europe"),
							array("country" => "Syrian Arab Republic", "continent" => "Asia"),
							array("country" => "Taiwan, Province of China", "continent" => "Asia"),
							array("country" => "Tajikistan", "continent" => "Asia"),
							array("country" => "Tanzania, United Republic of", "continent" => "Africa"),
							array("country" => "Thailand", "continent" => "Asia"),
							array("country" => "Timor-leste", "continent" => "Asia"),
							array("country" => "Togo", "continent" => "Africa"),
							array("country" => "Tokelau", "continent" => "Oceania"),
							array("country" => "Tonga", "continent" => "Oceania"),
							array("country" => "Trinidad and Tobago", "continent" => "North America"),
							array("country" => "Tunisia", "continent" => "Africa"),
							array("country" => "Turkey", "continent" => "Asia"),
							array("country" => "Turkmenistan", "continent" => "Asia"),
							array("country" => "Turks and Caicos Islands", "continent" => "North America"),
							array("country" => "Tuvalu", "continent" => "Oceania"),
							array("country" => "Uganda", "continent" => "Africa"),
							array("country" => "Ukraine", "continent" => "Europe"),
							array("country" => "United Arab Emirates", "continent" => "Asia"),
							array("country" => "United Kingdom", "continent" => "Europe"),
							array("country" => "United States", "continent" => "North America"),
							array("country" => "United States Minor Outlying Islands", "continent" => "Oceania"),
							array("country" => "Uruguay", "continent" => "South America"),
							array("country" => "Uzbekistan", "continent" => "Asia"),
							array("country" => "Vanuatu", "continent" => "Oceania"),
							array("country" => "Venezuela", "continent" => "South America"),
							array("country" => "Viet Nam", "continent" => "Asia"),
							array("country" => "Virgin Islands, British", "continent" => "North America"),
							array("country" => "Virgin Islands, U.S.", "continent" => "North America"),
							array("country" => "Wallis and Futuna", "continent" => "Oceania"),
							array("country" => "Western Sahara", "continent" => "Africa"),
							array("country" => "Yemen", "continent" => "Asia"),
							array("country" => "Zambia", "continent" => "Africa"),
							array("country" => "Zimbabwe", "continent" => "Africa")

		); return $countries;
	}

	private function getAllCurrencies(){
		$currencies = array(
							array("currency"=>"United Arab Emirates dirham", "symbol"=>"AED"),
							array("currency"=>"Afghan afghani", "symbol"=>"AFN"),
							array("currency"=>"Albanian lek", "symbol"=>"ALL"),
							array("currency"=>"Armenian dram", "symbol"=>"AMD"),
							array("currency"=>"Netherlands Antillean guilder", "symbol"=>"ANG"),
							array("currency"=>"Angolan kwanza", "symbol"=>"AOA"),
							array("currency"=>"Argentine peso", "symbol"=>"ARS"),
							array("currency"=>"Australian dollar", "symbol"=>"AUD"),
							array("currency"=>"Aruban florin", "symbol"=>"AWG"),
							array("currency"=>"Azerbaijani manat", "symbol"=>"AZN"),
							array("currency"=>"Bosnia and Herzegovina convertible mark", "symbol"=>"BAM"),
							array("currency"=>"Barbados dollar", "symbol"=>"BBD"),
							array("currency"=>"Bangladeshi taka", "symbol"=>"BDT"),
							array("currency"=>"Bulgarian lev", "symbol"=>"BGN"),
							array("currency"=>"Bahraini dinar", "symbol"=>"BHD"),
							array("currency"=>"Burundian franc", "symbol"=>"BIF"),
							array("currency"=>"Bermudian dollar", "symbol"=>"BMD"),
							array("currency"=>"Brunei dollar", "symbol"=>"BND"),
							array("currency"=>"Boliviano", "symbol"=>"BOB"),
							array("currency"=>"Brazilian real", "symbol"=>"BRL"),
							array("currency"=>"Bahamian dollar", "symbol"=>"BSD"),
							array("currency"=>"Bhutanese ngultrum", "symbol"=>"BTN"),
							array("currency"=>"Botswana pula", "symbol"=>"BWP"),
							array("currency"=>"New Belarusian ruble", "symbol"=>"BYN"),
							array("currency"=>"Belarusian ruble", "symbol"=>"BYR"),
							array("currency"=>"Belize dollar", "symbol"=>"BZD"),
							array("currency"=>"Canadian dollar", "symbol"=>"CAD"),
							array("currency"=>"Congolese franc", "symbol"=>"CDF"),
							array("currency"=>"Swiss franc", "symbol"=>"CHF"),
							array("currency"=>"Unidad de Fomento", "symbol"=>"CLF"),
							array("currency"=>"Chilean peso", "symbol"=>"CLP"),
							array("currency"=>"Renminbi|Chinese yuan", "symbol"=>"CNY"),
							array("currency"=>"Colombian peso", "symbol"=>"COP"),
							array("currency"=>"Costa Rican colon", "symbol"=>"CRC"),
							array("currency"=>"Cuban convertible peso", "symbol"=>"CUC"),
							array("currency"=>"Cuban peso", "symbol"=>"CUP"),
							array("currency"=>"Cape Verde escudo", "symbol"=>"CVE"),
							array("currency"=>"Czech koruna", "symbol"=>"CZK"),
							array("currency"=>"Djiboutian franc", "symbol"=>"DJF"),
							array("currency"=>"Danish krone", "symbol"=>"DKK"),
							array("currency"=>"Dominican peso", "symbol"=>"DOP"),
							array("currency"=>"Algerian dinar", "symbol"=>"DZD"),
							array("currency"=>"Egyptian pound", "symbol"=>"EGP"),
							array("currency"=>"Eritrean nakfa", "symbol"=>"ERN"),
							array("currency"=>"Ethiopian birr", "symbol"=>"ETB"),
							array("currency"=>"Euro", "symbol"=>"EUR"),
							array("currency"=>"Fiji dollar", "symbol"=>"FJD"),
							array("currency"=>"Falkland Islands pound", "symbol"=>"FKP"),
							array("currency"=>"Pound sterling", "symbol"=>"GBP"),
							array("currency"=>"Georgian lari", "symbol"=>"GEL"),
							array("currency"=>"Ghanaian cedi", "symbol"=>"GHS"),
							array("currency"=>"Gibraltar pound", "symbol"=>"GIP"),
							array("currency"=>"Gambian dalasi", "symbol"=>"GMD"),
							array("currency"=>"Guinean franc", "symbol"=>"GNF"),
							array("currency"=>"Guatemalan quetzal", "symbol"=>"GTQ"),
							array("currency"=>"Guyanese dollar", "symbol"=>"GYD"),
							array("currency"=>"Hong Kong dollar", "symbol"=>"HKD"),
							array("currency"=>"Honduran lempira", "symbol"=>"HNL"),
							array("currency"=>"Croatian kuna", "symbol"=>"HRK"),
							array("currency"=>"Haitian gourde", "symbol"=>"HTG"),
							array("currency"=>"Hungarian forint", "symbol"=>"HUF"),
							array("currency"=>"Indonesian rupiah", "symbol"=>"IDR"),
							array("currency"=>"Israeli new shekel", "symbol"=>"ILS"),
							array("currency"=>"Indian rupee", "symbol"=>"INR"),
							array("currency"=>"Iraqi dinar", "symbol"=>"IQD"),
							array("currency"=>"Iranian rial", "symbol"=>"IRR"),
							array("currency"=>"Icelandic króna", "symbol"=>"ISK"),
							array("currency"=>"Jamaican dollar", "symbol"=>"JMD"),
							array("currency"=>"Jordanian dinar", "symbol"=>"JOD"),
							array("currency"=>"Japanese yen", "symbol"=>"JPY"),
							array("currency"=>"Kenyan shilling", "symbol"=>"KES"),
							array("currency"=>"Kyrgyzstani som", "symbol"=>"KGS"),
							array("currency"=>"Cambodian riel", "symbol"=>"KHR"),
							array("currency"=>"Comoro franc", "symbol"=>"KMF"),
							array("currency"=>"North Korean won", "symbol"=>"KPW"),
							array("currency"=>"South Korean won", "symbol"=>"KRW"),
							array("currency"=>"Kuwaiti dinar", "symbol"=>"KWD"),
							array("currency"=>"Cayman Islands dollar", "symbol"=>"KYD"),
							array("currency"=>"Kazakhstani tenge", "symbol"=>"KZT"),
							array("currency"=>"Lao kip", "symbol"=>"LAK"),
							array("currency"=>"Lebanese pound", "symbol"=>"LBP"),
							array("currency"=>"Sri Lankan rupee", "symbol"=>"LKR"),
							array("currency"=>"Liberian dollar", "symbol"=>"LRD"),
							array("currency"=>"Lesotho loti", "symbol"=>"LSL"),
							array("currency"=>"Libyan dinar", "symbol"=>"LYD"),
							array("currency"=>"Moroccan dirham", "symbol"=>"MAD"),
							array("currency"=>"Moldovan leu", "symbol"=>"MDL"),
							array("currency"=>"Malagasy ariary", "symbol"=>"MGA"),
							array("currency"=>"Macedonian denar", "symbol"=>"MKD"),
							array("currency"=>"Myanmar kyat", "symbol"=>"MMK"),
							array("currency"=>"Mongolian tögrög", "symbol"=>"MNT"),
							array("currency"=>"Macanese pataca", "symbol"=>"MOP"),
							array("currency"=>"Mauritanian ouguiya", "symbol"=>"MRO"),
							array("currency"=>"Mauritian rupee", "symbol"=>"MUR"),
							array("currency"=>"Maldivian rufiyaa", "symbol"=>"MVR"),
							array("currency"=>"Malawian kwacha", "symbol"=>"MWK"),
							array("currency"=>"Mexican peso", "symbol"=>"MXN"),
							array("currency"=>"Mexican Unidad de Inversion", "symbol"=>"MXV"),
							array("currency"=>"Malaysian ringgit", "symbol"=>"MYR"),
							array("currency"=>"Mozambican metical", "symbol"=>"MZN"),
							array("currency"=>"Namibian dollar", "symbol"=>"NAD"),
							array("currency"=>"Nigerian naira", "symbol"=>"NGN"),
							array("currency"=>"Nicaraguan córdoba", "symbol"=>"NIO"),
							array("currency"=>"Norwegian krone", "symbol"=>"NOK"),
							array("currency"=>"Nepalese rupee", "symbol"=>"NPR"),
							array("currency"=>"New Zealand dollar", "symbol"=>"NZD"),
							array("currency"=>"Omani rial", "symbol"=>"OMR"),
							array("currency"=>"Panamanian balboa", "symbol"=>"PAB"),
							array("currency"=>"Peruvian Sol", "symbol"=>"PEN"),
							array("currency"=>"Papua New Guinean kina", "symbol"=>"PGK"),
							array("currency"=>"Philippine peso", "symbol"=>"PHP"),
							array("currency"=>"Pakistani rupee", "symbol"=>"PKR"),
							array("currency"=>"Polish złoty", "symbol"=>"PLN"),
							array("currency"=>"Paraguayan guaraní", "symbol"=>"PYG"),
							array("currency"=>"Qatari riyal", "symbol"=>"QAR"),
							array("currency"=>"Romanian leu", "symbol"=>"RON"),
							array("currency"=>"Serbian dinar", "symbol"=>"RSD"),
							array("currency"=>"Russian ruble", "symbol"=>"RUB"),
							array("currency"=>"Rwandan franc", "symbol"=>"RWF"),
							array("currency"=>"Saudi riyal", "symbol"=>"SAR"),
							array("currency"=>"Solomon Islands dollar", "symbol"=>"SBD"),
							array("currency"=>"Seychelles rupee", "symbol"=>"SCR"),
							array("currency"=>"Sudanese pound", "symbol"=>"SDG"),
							array("currency"=>"Swedish krona", "symbol"=>"SEK"),
							array("currency"=>"Singapore dollar", "symbol"=>"SGD"),
							array("currency"=>"Saint Helena pound", "symbol"=>"SHP"),
							array("currency"=>"Sierra Leonean leone", "symbol"=>"SLL"),
							array("currency"=>"Somali shilling", "symbol"=>"SOS"),
							array("currency"=>"Surinamese dollar", "symbol"=>"SRD"),
							array("currency"=>"South Sudanese pound", "symbol"=>"SSP"),
							array("currency"=>"São Tomé and Príncipe dobra", "symbol"=>"STD"),
							array("currency"=>"Salvadoran colón", "symbol"=>"SVC"),
							array("currency"=>"Syrian pound", "symbol"=>"SYP"),
							array("currency"=>"Swazi lilangeni", "symbol"=>"SZL"),
							array("currency"=>"Thai baht", "symbol"=>"THB"),
							array("currency"=>"Tajikistani somoni", "symbol"=>"TJS"),
							array("currency"=>"Turkmenistani manat", "symbol"=>"TMT"),
							array("currency"=>"Tunisian dinar", "symbol"=>"TND"),
							array("currency"=>"Tongan paʻanga", "symbol"=>"TOP"),
							array("currency"=>"Turkish lira", "symbol"=>"TRY"),
							array("currency"=>"Trinidad and Tobago dollar", "symbol"=>"TTD"),
							array("currency"=>"New Taiwan dollar", "symbol"=>"TWD"),
							array("currency"=>"Tanzanian shilling", "symbol"=>"TZS"),
							array("currency"=>"Ukrainian hryvnia", "symbol"=>"UAH"),
							array("currency"=>"Ugandan shilling", "symbol"=>"UGX"),
							array("currency"=>"United States dollar", "symbol"=>"USD"),
							array("currency"=>"Uruguay Peso en Unidades Indexadas", "symbol"=>"UYI"),
							array("currency"=>"Uruguayan peso", "symbol"=>"UYU"),
							array("currency"=>"Uzbekistan som", "symbol"=>"UZS"),
							array("currency"=>"Venezuelan bolívar", "symbol"=>"VEF"),
							array("currency"=>"Vietnamese đồng", "symbol"=>"VND"),
							array("currency"=>"Vanuatu vatu", "symbol"=>"VUV"),
							array("currency"=>"Samoan tala", "symbol"=>"WST"),
							array("currency"=>"Central African CFA franc", "symbol"=>"XAF"),
							array("currency"=>"East Caribbean dollar", "symbol"=>"XCD"),
							array("currency"=>"West African CFA franc", "symbol"=>"XOF"),
							array("currency"=>"CFP franc", "symbol"=>"XPF"),
							array("currency"=>"Yemeni rial", "symbol"=>"YER"),
							array("currency"=>"South African rand", "symbol"=>"ZAR"),
							array("currency"=>"Zambian kwacha", "symbol"=>"ZMW"),
							array("currency"=>"Zimbabwean dollar", "symbol"=>"ZWL")

					); return $currencies;
					    
		}
	
}