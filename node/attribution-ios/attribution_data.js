var request = require('request');
var kochava = require('./kochava_api');

module.exports = {
    get_campaign_summary: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                // This will access the DB...
                             
                kochava.clear_queue();
                
                // start with just the account number and the api_key
                parameters.account = '1843';
                parameters.api_key = 'A620E8F1-00FB-42F2-925B-6A754324976A';

                // specify a date range
                parameters.start_date = parameters.start;
                parameters.end_date = parameters.end;

                // loop through all the appropriate app_ids
                parameters.app_id = 'korune-guardian----android56099e61e7d7b';
                kochava.enqueue_get_campaign_summary(parameters);
          
                kochava.process_queue(parameters, false, 'Campaign Summary');
                break;
            }
        }
    },
    get_campaign_installs: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                // This will access the DB...
                             
                kochava.clear_queue();
                
                // start with just the account number and the api_key
                parameters.account = '1843';
                parameters.api_key = 'A620E8F1-00FB-42F2-925B-6A754324976A';

                // specify a date range
                parameters.start_date = parameters.start;
                parameters.end_date = parameters.end;

                // loop through all the appropriate app_ids
                parameters.app_id = 'korune-guardian----android56099e61e7d7b';
                
                // then for each campaign within the app pull campaign specific installs.
                // If you don't specify a campaign it pulls all active campaigns.
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

                kochava.process_queue(parameters, false, "Campaign Installs");
                break;
            }
        }
    },
    get_campaign_install_report: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                // This will access the DB...
                             
                kochava.clear_queue();
                
                // start with just the account number and the api_key
                parameters.account = '1843';
                parameters.api_key = 'A620E8F1-00FB-42F2-925B-6A754324976A';

                // specify a date range
                parameters.start_date = parameters.start;
                parameters.end_date = parameters.end;

                // loop through all the appropriate app_ids
                parameters.app_id = 'korune-guardian----android56099e61e7d7b';
                
                // then for each campaign within the app pull campaign specific installs.
                // If you don't specify a campaign it pulls all active campaigns.
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

                kochava.process_queue(parameters, false, "Campaign Install Report");
                break;
            }
        }
    },    
    get_shop_events: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                // This will access the DB...
                             
                kochava.clear_queue();
                
                // start with just the account number and the api_key
                parameters.account = '1843';
                parameters.api_key = 'A620E8F1-00FB-42F2-925B-6A754324976A';

                // specify a date range
                parameters.start_date = parameters.start;
                parameters.end_date = parameters.end;

                // loop through all the appropriate app_ids
                parameters.app_id = 'korune-guardian----android56099e61e7d7b';
                
                parameters.event_name = 'Shop Event';
                kochava.enqueue_get_event_data(parameters);
          
                kochava.process_queue(parameters);
                break;
            }
        }
    },
    get_UNDERGROUND_events: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                // This will access the DB...
                             
                kochava.clear_queue();
                
                // start with just the account number and the api_key
                parameters.account = '1843';
                parameters.api_key = 'A620E8F1-00FB-42F2-925B-6A754324976A';

                // specify a date range
                parameters.start_date = parameters.start;
                parameters.end_date = parameters.end;

                // loop through all the appropriate app_ids
                parameters.app_id = 'korune-guardian----android56099e61e7d7b';
                
                parameters.event_name = 'UNDERGROUND';
                kochava.enqueue_get_event_data(parameters);
          
                kochava.process_queue(parameters, false, 'UNDERGROUND');
                break;
            }
        }
    },
    get_DESERT_events: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                // This will access the DB...
                             
                kochava.clear_queue();
                
                // start with just the account number and the api_key
                parameters.account = '1843';
                parameters.api_key = 'A620E8F1-00FB-42F2-925B-6A754324976A';

                // specify a date range
                parameters.start_date = parameters.start;
                parameters.end_date = parameters.end;

                // loop through all the appropriate app_ids
                parameters.app_id = 'korune-guardian----android56099e61e7d7b';
                
                parameters.event_name = 'DESERT';
                kochava.enqueue_get_event_data(parameters);
          
                kochava.process_queue(parameters, false, 'DESERT');
                break;
            }
        }
    },
    get_ISLAND_events: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                // This will access the DB...
                             
                kochava.clear_queue();
                
                // start with just the account number and the api_key
                parameters.account = '1843';
                parameters.api_key = 'A620E8F1-00FB-42F2-925B-6A754324976A';

                // specify a date range
                parameters.start_date = parameters.start;
                parameters.end_date = parameters.end;

                // loop through all the appropriate app_ids
                parameters.app_id = 'korune-guardian----android56099e61e7d7b';
                
                parameters.event_name = 'ISLAND';
                kochava.enqueue_get_event_data(parameters);
          
                kochava.process_queue(parameters, false, 'ISLAND');
                break;
            }
        }
    },
    get_REVENUE_events: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                // This will access the DB...
                             
                kochava.clear_queue();
                
                // start with just the account number and the api_key
                parameters.account = '1843';
                parameters.api_key = 'A620E8F1-00FB-42F2-925B-6A754324976A';

                // specify a date range
                parameters.start_date = parameters.start;
                parameters.end_date = parameters.end;

                // loop through all the appropriate app_ids
                parameters.app_id = 'korune-guardian----android56099e61e7d7b';
                
                parameters.event_name = 'REVENUE';
                kochava.enqueue_get_event_data(parameters);
          
                kochava.process_queue(parameters, true, 'REVENUE');
                break;
            }
        }
    },
    get_REVENUE_events_report: function(parameters){
        switch (parameters.attributionService){
            case 'Kochava': 
            {
                // This will access the DB...
                             
                kochava.clear_queue();
                
                // start with just the account number and the api_key
                parameters.account = '1843';
                parameters.api_key = 'A620E8F1-00FB-42F2-925B-6A754324976A';

                // specify a date range
                parameters.start_date = parameters.start;
                parameters.end_date = parameters.end;

                // loop through all the appropriate app_ids
                parameters.app_id = 'korune-guardian----android56099e61e7d7b';
                
                parameters.event_name = 'REVENUE';
                kochava.enqueue_get_event_data(parameters);
          
                kochava.process_queue(parameters, false, 'REVENUE Report');
                break;
            }
        }
    },
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
/*
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
*/                    
                kochava.process_queue(parameters);
                break;
            }
        }
    },     
};
