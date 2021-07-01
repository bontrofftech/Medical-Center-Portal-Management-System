/**
* Philippine Provinces & Cities/Municipalities on HTML Dropdown
*
* @ version 1.0.0
* @ author Marvic R. Macalintal
*/
 var cities = {
	'Kakamega'  : [
'Matungu Constituency','Likuyani Constituency','Lugari Constituency','Malava Constituency','Lurambi Constituency',
'Navakholo Constituency',
'Mumias West Constituency',
'Mumias East Constituency',
'Matungu Constituency',
'Butere Constituency',
'Khwisero Constituency',
'Shinyalu Constituency',
'Ikolomani Constituency'
		],
	'Kisumu' : [
		'Kisumu West', 'Kisumu Central', 'Kisumu East', 'Seme', 'Muhoroni', 'Nyando','Nyakach'
		],
	'Bungoma' : [
		'Bumula', 'Kanduyi', 'Sirisia', 'Kabuchai', 'Kimilili Tongaren', 'Webuye West', 'Webuye East','Mt Elgon'
		],
	'Busia' : [
		'Bunyala', 'Matayos', 'Butula', 'Nambale', 'Samia', 'Teso North','Teso South.'
		],
	'Kajiado' : [
		'Kajiado Central', 'Kajiado North', 'Loitoktok', 'Isinya','Mashuuru.'
		],
	'Mombasa' : [
		'Mvita' , 'Jomvu' , 'Changamwe', 'Kisauni', 'Nyali','Likoni'
		],
	'Nairobi' : [
		'Embakasi West Sub County' ,'Kamukunji Sub County' ,'Kasarani Sub County ','Kibra Sub County' ,'Langata Sub County',' Makadara Sub County' ,'Mathare Sub County' ,'Roysambu Sub County' ,'Ruaraka Sub County',' Starehe Sub County','Westlands Sub County '
		],
	
 }

 var City = function() {

	this.p = [],this.c = [],this.a = [],this.e = {};
	window.onerror = function() { return true; }
	
	this.getProvinces = function() {
		for(let province in cities) {
			this.p.push(province);
		}
		return this.p;
	}
	this.getCities = function(province) {
		if(province.length==0) {
			console.error('Please input province name');
			return;
		}
		for(let i=0;i<=cities[province].length-1;i++) {
			this.c.push(cities[province][i]);
		}
		return this.c;
	}
	this.getAllCities = function() {
		for(let i in cities) {
			for(let j=0;j<=cities[i].length-1;j++) {
				this.a.push(cities[i][j]);
			}
		}
		this.a.sort();
		return this.a;
	}
	this.showProvinces = function(element) {
		var str = '<option selected disabled>Select Province</option>';
		for(let i in this.getProvinces()) {
			str+='<option>'+this.p[i]+'</option>';
		}
		this.p = [];		
		document.querySelector(element).innerHTML = '';
		document.querySelector(element).innerHTML = str;
		this.e = element;
		return this;
	}
	this.showCities = function(province,element) {
		var str = '<option selected disabled>Select City / Municipality</option>';
		var elem = '';
		if((province.indexOf(".")!==-1 || province.indexOf("#")!==-1)) {
			elem = province;
		}
		else {
			for(let i in this.getCities(province)) {
				str+='<option>'+this.c[i]+'</option>';
			}
			elem = element;
		}
		this.c = [];
		document.querySelector(elem).innerHTML = '';
		document.querySelector(elem).innerHTML = str;
		document.querySelector(this.e).onchange = function() {		
			var Obj = new City();
			Obj.showCities(this.value,elem);
		}
		return this;
	}
}
