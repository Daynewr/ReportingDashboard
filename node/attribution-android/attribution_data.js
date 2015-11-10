var request = require('request');
var kochava = require('./kochava/api_calls');

module.exports = {
 /*
 * DB INSERT STATEMENTS
 */
    get_campaign_summary_inserts: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                init(parameters);
                kochava.enqueue_get_campaign_summary(parameters);
                kochava.process_queue(parameters, false, 'get_campaign_summary_inserts');
                break;
            }
        }
    },
    get_campaign_install_inserts: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                init(parameters);
                parameters.campaign_id = 'korune-guardian----android56099e61e7d7b633540c568ccf';
                kochava.enqueue_get_installs(parameters);
                parameters.campaign_id = 'korune-guardian----android56099e61e7d7b9eca6bcdca6d1';
                kochava.enqueue_get_installs(parameters);
                parameters.campaign_id = 'korune-guardian----android56099e61e7d7b0c20afa4b403e';
                kochava.enqueue_get_installs(parameters);
                parameters.campaign_id = 'korune-guardian----android56099e61e7d7bce1cb5a02d607';
                kochava.enqueue_get_installs(parameters);
                parameters.campaign_id = 'korune-guardian----android56099e61e7d7b910bb0fd6cd5e';
                kochava.enqueue_get_installs(parameters);
                parameters.campaign_id = 'korune-guardian----android56099e61e7d7b';
                kochava.enqueue_get_installs(parameters);
                kochava.process_queue(parameters, false, "get_campaign_install_inserts");
                break;
            }
        }
    },
    get_shop_event_inserts: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                init(parameters);
                parameters.event_name = 'Shop Event';
                kochava.enqueue_get_event_data(parameters);
                kochava.process_queue(parameters, false, 'get_shop_event_inserts');
                break;
            }
        }
    },
    get_UNDERGROUND_event_inserts: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                init(parameters);
                parameters.event_name = 'UNDERGROUND';
                kochava.enqueue_get_event_data(parameters);
                kochava.process_queue(parameters, false, 'get_UNDERGROUND_event_inserts');
                break;
            }
        }
    },
    get_DESERT_event_inserts: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                init(parameters);
                parameters.event_name = 'DESERT';
                kochava.enqueue_get_event_data(parameters);
                kochava.process_queue(parameters, false, 'get_DESERT_event_inserts');
                break;
            }
        }
    },
    get_ISLAND_event_inserts: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                init(parameters);
                parameters.event_name = 'ISLAND';
                kochava.enqueue_get_event_data(parameters);
                kochava.process_queue(parameters, false, 'get_ISLAND_event_inserts');
                break;
            }
        }
    },
    get_REVENUE_event_inserts: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                init(parameters);
                parameters.event_name = 'REVENUE';
                kochava.enqueue_get_event_data(parameters);
                kochava.process_queue(parameters, false, 'get_REVENUE_event_inserts');
                break;
            }
        }
    },  
    get_LAUNCH_event_inserts: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                init(parameters);
                parameters.event_name = 'Launch';
                kochava.enqueue_get_event_data(parameters);
                kochava.process_queue(parameters, true, 'get_LAUNCH_event_inserts');
                break;
            }
        }
    },
    get_LOG_SCREEN_event_inserts: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                init(parameters);
                parameters.event_name = 'Launch';
                kochava.enqueue_get_event_data(parameters);
                kochava.process_queue(parameters, true, 'get_LOG_SCREEN_event_inserts');
                break;
            }
        }
    },
    get_free_coins_award_event_inserts: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                init(parameters);
                parameters.event_name = 'Launch';
                kochava.enqueue_get_event_data(parameters);
                kochava.process_queue(parameters, true, 'get_free_coins_award_event_inserts');
                break;
            }
        }
    },    
    
/*
 * Report Requests
 */
    get_campaign_summary_report: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                init(parameters);
                kochava.enqueue_get_campaign_summary(parameters);
                kochava.process_queue(parameters, false, 'get_campaign_summary_report');
                break;
            }
        }
    },
    get_campaign_install_report: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                init(parameters);
                parameters.campaign_id = 'korune-guardian----android56099e61e7d7b633540c568ccf';
                kochava.enqueue_get_installs(parameters);
                parameters.campaign_id = 'korune-guardian----android56099e61e7d7b9eca6bcdca6d1';
                kochava.enqueue_get_installs(parameters);
                parameters.campaign_id = 'korune-guardian----android56099e61e7d7b0c20afa4b403e';
                kochava.enqueue_get_installs(parameters);
                parameters.campaign_id = 'korune-guardian----android56099e61e7d7bce1cb5a02d607';
                kochava.enqueue_get_installs(parameters);
                parameters.campaign_id = 'korune-guardian----android56099e61e7d7b910bb0fd6cd5e';
                kochava.enqueue_get_installs(parameters);
                parameters.campaign_id = 'korune-guardian----android56099e61e7d7b';
                kochava.enqueue_get_installs(parameters);
                kochava.process_queue(parameters, false, "get_campaign_install_report");
                break;
            }
        }
    },
    get_shop_event_report: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                init(parameters);
                parameters.event_name = 'Shop Event';
                kochava.enqueue_get_event_data(parameters);
                kochava.process_queue(parameters, false, 'get_shop_event_report');
                break;
            }
        }
    },
    get_UNDERGROUND_event_report: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                init(parameters);
                parameters.event_name = 'UNDERGROUND';
                kochava.enqueue_get_event_data(parameters);
                kochava.process_queue(parameters, false, 'get_UNDERGROUND_event_report');
                break;
            }
        }
    },
    get_DESERT_event_report: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                init(parameters);
                parameters.event_name = 'DESERT';
                kochava.enqueue_get_event_data(parameters);
                kochava.process_queue(parameters, false, 'get_DESERT_event_report');
                break;
            }
        }
    },
    get_ISLAND_event_report: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                init(parameters);
                parameters.event_name = 'ISLAND';
                kochava.enqueue_get_event_data(parameters);
                kochava.process_queue(parameters, false, 'get_ISLAND_event_report');
                break;
            }
        }
    },    
    get_REVENUE_event_report: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                init(parameters);
                parameters.event_name = 'REVENUE';
                kochava.enqueue_get_event_data(parameters);
                kochava.process_queue(parameters, false, 'get_REVENUE_event_report');
                break;
            }
        }
    },
    
    /*
    get_attribution_data: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                // This will access the DB...
                             
                kochava.clear_queue();
                
                // start with just the account number and the api_key
                parameters.account = '1843';
                parameters.api_key = 'A620E8F1-00FB-42F2-925B-6A754324976A';
                kochava.enqueue_get_apps(parameters);

                // specify a date range
                parameters.start_date = parameters.start;
                parameters.end_date = parameters.end;

                // loop through all the appropriate app_ids
                parameters.app_id = 'korune-guardian----android56099e61e7d7b';
                kochava.enqueue_get_campaign_summary(parameters);

                    // then for each campaign within the app pull campaign specific installs.
                    // If you don't specify a campaign it pulls all active campaigns.
                    parameters.campaign_id = 'korune-guardian----android56099e61e7d7b633540c568ccf';
                    kochava.enqueue_get_installs(parameters);

                    parameters.campaign_id = 'korune-guardian----android56099e61e7d7b9eca6bcdca6d1';
                    kochava.enqueue_get_installs(parameters);

                    parameters.campaign_id = 'korune-guardian----android56099e61e7d7b0c20afa4b403e';
                    kochava.enqueue_get_installs(parameters);

                    parameters.campaign_id = 'korune-guardian----android56099e61e7d7b';
                    kochava.enqueue_get_installs(parameters);
                    
                kochava.enqueue_get_events(parameters);

                    parameters.event_name = 'UNDERGROUND';
                    kochava.enqueue_get_event_data(parameters);

                    parameters.event_name = 'DESERT';
                    kochava.enqueue_get_event_data(parameters);

                    parameters.event_name = 'ISLAND';
                    kochava.enqueue_get_event_data(parameters);

                    parameters.event_name = 'FACEBOOK';
                    kochava.enqueue_get_event_data(parameters);

                    parameters.event_name = 'Launch';
                    kochava.enqueue_get_event_data(parameters);

                    parameters.event_name = 'LogScreen';
                    kochava.enqueue_get_event_data(parameters);

                    parameters.event_name = 'Shop Event';
                    kochava.enqueue_get_event_data(parameters);

                    parameters.event_name = '_Install';
                    kochava.enqueue_get_event_data(parameters);
 
                    parameters.event_name = 'free_coins_award';
                    kochava.enqueue_get_event_data(parameters);

                    parameters.event_name = 'REVENUE';
                    kochava.enqueue_get_event_data(parameters);
                   
                kochava.process_queue(parameters);
                break;
            }
        }
    },   
    */
};

function init(parameters){
    kochava.clear_queue();

    // start with just the account number and the api_key
    parameters.account = '1843';
    parameters.api_key = 'A620E8F1-00FB-42F2-925B-6A754324976A';

    // specify a date range
    parameters.start_date = parameters.start;
    parameters.end_date = parameters.end;

    // loop through all the appropriate app_ids
    parameters.app_id = 'korune-guardian----android56099e61e7d7b';    
}