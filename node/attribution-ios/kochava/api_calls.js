var request = require('request');
var async = require('async');
var db_insert_helper = require('./db_inserts/db_inserts');
var report_helper = require('./reports/reports');

var requestQueue = [];
var responseBody = [];

module.exports = {
    clear_queue: function() {
        requestQueue = [];
        responseBody = [];
    },
    
    enqueue_get_apps: function(parameters){
        var url = 'http://control.kochava.com/v1/cpi/get_apps'+
                '?account='+parameters.account+
                '&api_key='+parameters.api_key;
        
        var desc = 'App Summary:';
        queue_request(url, desc);            
    },

    enqueue_get_campaign_summary: function(parameters){
        var url = 'http://control.kochava.com/v1/cpi/get_campaign_summary'+
                '?account='+parameters.account+
                
                '&start_date='+parameters.start_date+
                '&end_date='+parameters.end_date+
                '&timezone=pst'+
                '&kochava_app_id='+parameters.app_id+
                
                '&api_key='+parameters.api_key;
        
        var desc = 'Campaign Summary:';
        queue_request(url, desc);
    },   
    
    enqueue_get_installs: function(parameters){
        var url = 'http://control.kochava.com/v1/cpi/get_installs'+
                '?account='+parameters.account+
                
                '&start_date='+parameters.start_date+
                '&end_date='+parameters.end_date+
                '&timezone=pst'+
                '&kochava_app_id='+parameters.app_id+
                
                '&campaign_id='+parameters.campaign_id+
                '&rtn_device_id_type=android_id,imei,udid,idfa,Kochava_device_id'+
                
                '&api_key='+parameters.api_key;
        
        var desc = 'Campaign Specific Installs:'+parameters.campaign_id;
        queue_request(url, desc);
    },
    
    enqueue_get_events: function(parameters){
        var url = 'http://control.kochava.com/v1/cpi/get_events'+
                '?account='+parameters.account+
                
                '&kochava_app_id='+parameters.app_id+
                '&format=json'+
                
                '&api_key='+parameters.api_key;

        var desc = 'Events:'+parameters.app_id;
        queue_request(url, desc);
    },    
    
    enqueue_get_event_data: function(parameters){
        var url = 'http://control.kochava.com/v1/cpi/get_event_data'+
                '?account='+parameters.account+
                
                '&kochava_app_id='+parameters.app_id+
                '&format=json'+
                
                '&date_start='+parameters.start_date+
                '&date_end='+parameters.end_date+
                '&event_name='+parameters.event_name+
                '&max_rows=10000'+
                '&detail=verbose'+
                
                '&api_key='+parameters.api_key;

        var desc = 'Event data:'+parameters.event_name;
        queue_request(url, desc);
    },    
    
    process_queue: function (parameters, sendResp, format){
        if (typeof sendResp === 'undefined') {
           sendResp = true;
        }
        
        async.parallel(requestQueue, function(){
            //console.log('finished all the requests');
            if(sendResp){
                parameters.callback(parameters.res, responseBody);
            }
            else
            {
                switch (format){
                    /*
                     * DB INSERT STATEMENTS
                     */
                    case 'get_campaign_summary_inserts':
                        parameters.callback(parameters.res, db_insert_helper.get_campaign_summary_inserts(responseBody, format));
                        break;    
                    case 'get_campaign_install_inserts':
                        parameters.callback(parameters.res, db_insert_helper.get_campaign_install_inserts(responseBody, format));
                        break;
                    case 'get_organic_install_event_inserts':
                        parameters.callback(parameters.res, db_insert_helper.get_organic_install_event_inserts(responseBody, parameters.app_id));
                        break;
                    case 'get_shop_event_inserts':
                        parameters.callback(parameters.res, db_insert_helper.get_shop_event_inserts(responseBody, format));
                        break;
                    case 'get_UNDERGROUND_event_inserts':
                    case 'get_DESERT_event_inserts':
                    case 'get_ISLAND_event_inserts':
                        parameters.callback(parameters.res, db_insert_helper.get_stage_event_inserts(responseBody, parameters.event_name));
                        break;
                    case 'get_REVENUE_event_inserts':
                        parameters.callback(parameters.res, db_insert_helper.get_REVENUE_event_inserts(responseBody, format));
                        break;
                    case 'get_LAUNCH_event_inserts':
                        parameters.callback(parameters.res, db_insert_helper.get_LAUNCH_event_inserts(responseBody, format));
                        break;
                    case 'get_LOG_SCREEN_event_inserts':
                        parameters.callback(parameters.res, db_insert_helper.get_LOG_SCREEN_event_inserts(responseBody, format));
                        break;
                    case 'get_free_coins_award_event_inserts':
                        parameters.callback(parameters.res, db_insert_helper.get_free_coins_award_event_inserts(responseBody, format));
                        break;
                        
                    /*
                     * Report Requests
                     */   
                    case 'get_campaign_summary_report':
                        parameters.callback(parameters.res, report_helper.get_campaign_summary_report(responseBody, format));
                        break;
                    case 'get_campaign_install_report':
                        parameters.callback(parameters.res, report_helper.get_campaign_install_report(responseBody, format));
                        break;
                    case 'get_shop_event_report':
                        parameters.callback(parameters.res, report_helper.get_shop_event_report(responseBody, format));
                        break;
                    case 'get_UNDERGROUND_event_report':
                    case 'get_DESERT_event_report':
                    case 'get_ISLAND_event_report':
                        parameters.callback(parameters.res, report_helper.get_stage_event_report(responseBody, parameters.event_name));
                        break;                        
                    case 'get_REVENUE_event_report':
                        parameters.callback(parameters.res, report_helper.get_REVENUE_event_report(responseBody, format));
                        break;
                }
            }
        },
        function(err){ console.log('WTF'); });
    },
};

function queue_request(url, desc) {
    requestQueue.push(function(callback){
        request(url, function(error, response, html){
            if (!error) {
                responseBody.push({'TableName':desc, 'Data': JSON.parse(response.body)});
                callback();
            }
            else
            {
                //console.log("Error in request for URL: "+url);
                callback();
            }
        });
    });        
}