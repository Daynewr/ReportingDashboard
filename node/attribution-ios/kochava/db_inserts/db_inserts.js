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
    get_organic_install_event_inserts: function(responseBody, app_id){
        var buffer = '';
        
        responseBody[0].Data.forEach(function (element, index, array){
            if(element.eng_acqu == false){
                buffer += "call add_kochava_campaign_installs('"+
                        "Organic','"+
                        "Organic','"+
                        "Organic','"+
                        "','"+
                        "Organic','"+
                        app_id+"_Organic','"+
                        app_id+"_Organic','"+
                        "','"+
                        "Organic','"+
                        "Organic','"+
                        "','"+
                        element.eve_date+"','"+
                        element.eve_date+"','"+
                        "Organic','"+
                        "','"+
                        "','"+
                        element.device_ver+"','"+
                        element.country_code+"','"+
                        element.click_id+"','"+
                        element.android_id+"','"+
                        element.imei+"','"+
                        element.udid+"','"+
                        element.idfa+"','"+
                        element.dev_id+"');"+
                        "<br>";
            }
        });

        return buffer;
    },
    get_shop_event_inserts: function(responseBody, format){
        var buffer = '';
        responseBody[0].Data.forEach(function (element, index, array){
            buffer += "call add_kochava_shop_event('"+
                    element.dev_id+"','"+
                    element.att_camp+"','"+
                    element.att_caid+"','"+
                    element.att_tier+"','"+
                    element.att_trac+"','"+
                    element.att_netw+"','"+
                    element.att_site+"','"+
                    element.att_crea+"','"+
                    element.dev_type+"','"+
                    element.dev_os+"','"+
                    element.eng_acqu+"','"+
                    element.eng_sess+"','"+
                    element.eng_dura+"','"+
                    element.geo_code+"','"+
                    element.geo_city+"','"+
                    element.eve_time+"','"+
                    element.eve_date+"','"+
                    element.eve_data+"','"+
                    element.eve_sum+"','"+
                    element.adid+"','"+
                    element.mac+"','"+
                    element.odin+"','"+
                    element.android_id+"','"+
                    element.action+"','"+
                    element.label+"','"+
                    element.coins+"','"+
                    element.status+"');"+
                    "<br>";
        });
        return buffer;
    }, 
   get_stage_event_inserts: function(responseBody, format){
        var buffer = '';
        responseBody[0].Data.forEach(function (element, index, array){
            buffer += "call add_kochava_stage_event('"+
                    format+"','"+
                    element.dev_id+"','"+
                    element.att_camp+"','"+
                    element.att_caid+"','"+
                    element.att_tier+"','"+
                    element.att_trac+"','"+
                    element.att_netw+"','"+
                    element.att_site+"','"+
                    element.att_crea+"','"+
                    element.dev_type+"','"+
                    element.dev_os+"','"+
                    element.eng_acqu+"','"+
                    element.eng_sess+"','"+
                    element.eng_dura+"','"+
                    element.geo_code+"','"+
                    element.geo_city+"','"+
                    element.eve_time+"','"+
                    element.eve_date+"','"+
                    element.eve_data+"','"+
                    element.eve_sum+"','"+
                    element.adid+"','"+
                    element.mac+"','"+
                    element.odin+"','"+
                    element.android_id+"','"+
                    element.action+"','"+
                    element.level+"');"+
                    "<br>";
        });
        return buffer;
    }, 
   get_REVENUE_event_inserts: function(responseBody, format){
        var buffer = '';
        responseBody[0].Data.forEach(function (element, index, array){
            buffer += "call add_kochava_revenue_event('"+
                    element.dev_id+"','"+
                    element.att_camp+"','"+
                    element.att_caid+"','"+
                    element.att_tier+"','"+
                    element.att_trac+"','"+
                    element.att_netw+"','"+
                    element.att_site+"','"+
                    element.att_crea+"','"+
                    element.dev_type+"','"+
                    element.dev_os+"','"+
                    element.eng_acqu+"','"+
                    element.eng_sess+"','"+
                    element.eng_dura+"','"+
                    element.geo_code+"','"+
                    element.geo_city+"','"+
                    element.eve_time+"','"+
                    element.eve_date+"','"+
                    element.eve_data+"','"+
                    element.eve_sum+"','"+
                    element.adid+"','"+
                    element.mac+"','"+
                    element.odin+"','"+
                    element.android_id+"','"+
                    element.action+"');"+
                    "<br>";
        });
        return buffer;
    }, 
    
    get_LAUNCH_event_inserts: function(responseBody, format){
        var buffer = '';
        responseBody[0].Data.forEach(function (element, index, array){
            buffer += "call add_kochava_launch_event('"+
                    element.dev_id+"','"+
                    element.att_camp+"','"+
                    element.att_caid+"','"+
                    element.att_tier+"','"+
                    element.att_trac+"','"+
                    element.att_netw+"','"+
                    element.att_site+"','"+
                    element.att_crea+"','"+
                    element.dev_type+"','"+
                    element.dev_os+"','"+
                    element.eng_acqu+"','"+
                    element.eng_sess+"','"+
                    element.eng_dura+"','"+
                    element.geo_code+"','"+
                    element.geo_city+"','"+
                    element.eve_time+"','"+
                    element.eve_date+"','"+
                    element.eve_data+"','"+
                    element.eve_sum+"','"+
                    element.adid+"','"+
                    element.mac+"','"+
                    element.odin+"','"+
                    element.android_id+"');"+
                    "<br>";
        });
        return buffer;
    },
    
    get_LOG_SCREEN_event_inserts: function(responseBody, format){
        var buffer = '';
        responseBody[0].Data.forEach(function (element, index, array){
            buffer += "call add_kochava_revenue_event('"+
                    element.dev_id+"','"+
                    element.att_camp+"','"+
                    element.att_caid+"','"+
                    element.att_tier+"','"+
                    element.att_trac+"','"+
                    element.att_netw+"','"+
                    element.att_site+"','"+
                    element.att_crea+"','"+
                    element.dev_type+"','"+
                    element.dev_os+"','"+
                    element.eng_acqu+"','"+
                    element.eng_sess+"','"+
                    element.eng_dura+"','"+
                    element.geo_code+"','"+
                    element.geo_city+"','"+
                    element.eve_time+"','"+
                    element.eve_date+"','"+
                    element.eve_data+"','"+
                    element.eve_sum+"','"+
                    element.adid+"','"+
                    element.mac+"','"+
                    element.odin+"','"+
                    element.android_id+"','"+
                    element.screen+"');"+
                    "<br>";
        });
        return buffer;
    },
    
    get_free_coins_award_event_inserts: function(responseBody, format){
        var buffer = '';
        responseBody[0].Data.forEach(function (element, index, array){
            buffer += "call add_kochava_revenue_event('"+
                    element.dev_id+"','"+
                    element.att_camp+"','"+
                    element.att_caid+"','"+
                    element.att_tier+"','"+
                    element.att_trac+"','"+
                    element.att_netw+"','"+
                    element.att_site+"','"+
                    element.att_crea+"','"+
                    element.dev_type+"','"+
                    element.dev_os+"','"+
                    element.eng_acqu+"','"+
                    element.eng_sess+"','"+
                    element.eng_dura+"','"+
                    element.geo_code+"','"+
                    element.geo_city+"','"+
                    element.eve_time+"','"+
                    element.eve_date+"','"+
                    element.eve_data+"','"+
                    element.eve_sum+"','"+
                    element.adid+"','"+
                    element.mac+"','"+
                    element.odin+"','"+
                    element.android_id+"');"+
                    "<br>";
        });
        return buffer;
    }
};