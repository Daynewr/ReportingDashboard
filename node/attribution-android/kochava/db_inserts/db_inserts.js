var request = require('request');
var async = require('async');

var requestQueue = [];
var responseBody = [];

module.exports = {
    get_campaign_summary_inserts: function(responseBody, format){
        var buffer = '';
        responseBody[0].Data.forEach(function (element, index, array){
            buffer += "call add_kochava_campaign_summary('"+
                    element.date+"','"+
                    element.campaign_name+"','"+
                    element.campaign_id+"','"+
                    element.network+"','"+
                    //element.impressions+"','"+
                    "0','"+
                    element.click_duplicates+"','"+
                    element.clicks+"','"+
                    element.matched_installs+"','"+
                    element.spend+"','"+
                    element.tracking_url+"');"+
                    "<br>";
        });
        return buffer;
    },
    get_campaign_install_inserts: function(responseBody, format){
        var buffer = '';
        responseBody.forEach(function (element){
            element.Data.forEach(function (element, index, array){
            buffer += "call add_kochava_campaign_installs('"+
                    element.matched_by+"','"+
                    element.matched_on+"','"+
                    element.site_id+"','"+
                    element.network_id+"','"+
                    element.network_name+"','"+
                    element.campaign_name+"','"+
                    element.campaign_id+"','"+
                    element.tracker_id+"','"+
                    element.tracker_name+"','"+
                    element.campaign_real_name+"','"+
                    element.creative+"','"+
                    element.click_date+"','"+
                    element.install_date+"','"+
                    element.bid_id+"','"+
                    element.bid_price+"','"+
                    element.cpi_price+"','"+
                    element.device_ver+"','"+
                    element.country_code+"','"+
                    element.click_id+"','"+
                    element.android_id+"','"+
                    element.imei+"','"+
                    element.udid+"','"+
                    element.idfa+"','"+
                    element.kochava_device_id+"');"+
                    "<br>";
            });
        });

        return buffer;
    },
   get_shop_event_inserts: function(responseBody, format){
        var buffer = '';
        return buffer;
    }, 
   get_stage_event_inserts: function(responseBody, format){
        var buffer = '';
        return buffer;
    }, 
   get_REVENUE_event_inserts: function(responseBody, format){
        var buffer = '';
        return buffer;
    }, 
};