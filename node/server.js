var fs = require('fs');
var express = require('express');
var cheerio = require('cheerio');
var gcloud = require('gcloud')({
  projectId: 'spyr-apps-llc-92119',
  keyFilename: './SPYR APPS LLC-5446e5f5441c.json'
});

var attribution = require('./attribution_data');

// view JS files;
var index = require ('./views/index');


var app     = express();

function sendResponse(res, body){
    res.send(body);
}

app.get('/', function(req, res){
    var response = '';
    
    response += index.present_index_page();
    
    res.send(response);
});

app.get('/get_app_data', function(req, res){
    var requestCount = 0;
    var responseBody = [];
    
    var parameters = {};

    // initialize the parameters object with universal details.
    parameters.requestCount = requestCount;
    parameters.responseBody = responseBody;
    parameters.callback = sendResponse;
    parameters.res = res;

    // SQL Query to get the starting data set... App specific records
    
    // foreach App 
    parameters.app_name = 'Rune Guardia - Android';
    parameters.attributionService = 'Kochava';
    parameters.attributionServiceid = '1';
    parameters.mediationService = 'Fyber';
    parameters.googleAnalyticsPropertyId = 'UA-61965663-6';
    parameters.googlePlayBundleId = 'com.spyrapps.runeguardian';
    //...
    attribution.get_attribution_data(parameters);

    //mediation.get_mediation_data(parameters);
});

app.get('/doMagic', function(req, res){

    var storage = gcloud.storage();

    var bucket = storage.bucket('pubsite_prod_rev_11836435519349885476');

    // list all file
    bucket.getFiles(function(err, files, nextQuery) {
        for(var i = 0; i<files.length; i++ ){
            if (files[i].metadata.name.toString().search(/installs.*runeguardian.*overview/i) != -1) {
                console.log(files[i].metadata.name);
                //bucket.file(files[i].metadata.name).download({destination: 'GooglePlayFiles/'+files[i].metadata.name}, function(err) {
                //    if(err) console.log(err);
                //});
                bucket.file(files[i].metadata.name).createReadStream()
                .on('error', function(err) {})
                .on('response', function(response) {
                  // Server connected and responded with the specified status and headers.
                 })
                .on('end', function() {
                  // The file is fully downloaded.
                });
                //.pipe(fs.createWriteStream(localFilename));

                break;
            }
        }
    }); 
});

app.listen('8081')
console.log('App is listening on port 8081');
module.exports = app; 	



/*
app.get('/scrape', function(req, res){
	// Let's scrape Anchorman 2
	url = 'http://www.imdb.com/title/tt0116483/';

	request(url, function(error, response, html){
		if(!error){
			var $ = cheerio.load(html);

			var title, release, rating;
			var json = { title : "", release : "", rating : ""};

			$('.header').filter(function(){
		        var data = $(this);
		        title = data.children().first().text();
		        release = data.children().last().children().text();

		        json.title = title;
		        json.release = release;
	        })

	        $('.star-box-giga-star').filter(function(){
	        	var data = $(this);
	        	rating = data.text();

	        	json.rating = rating;
	        })
		}

		fs.writeFile('output.json', JSON.stringify(json, null, 4), function(err){
        	console.log('File successfully written! - Check your project directory for the output.json file');
                })

        res.send('Check your console!')
	})
});
*/
