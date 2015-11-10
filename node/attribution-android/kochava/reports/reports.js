var request = require('request');
var async = require('async');

var requestQueue = [];
var responseBody = [];

module.exports = {

    get_campaign_summary_report: function(responseBody, format){
        var counters = initCounters();
        return buildCountersBuffer(counters);
    },

    get_campaign_install_report: function(responseBody, format){
        var counters = initCounters();

        responseBody.forEach(function (element){
            element.Data.forEach(function (element, index, array){
                counters[element.creative]++;
            });
        });

        return buildCountersBuffer(counters);
    },

    get_shop_event_report: function(responseBody, format){
        var counters = initCounters();
        return buildCountersBuffer(counters);
    },
    
    get_stage_event_report: function(responseBody, format){
        var buffer = '';
        var counters = [];
        for (var i = 0; i < 13; i++){
            counters.push({ 'StartedLevel': 0,
                            'PortalReached': 0, 
                            'Completelevelwithhint': 0,
                            'BoughtPowerUp': 0, 
                            'BoughtSkip': 0, 
                            'BoughtUndo': 0, 
                            'BoughtHint': 0});
        }

        responseBody[0].Data.forEach(function (element, index, array){
            switch (element.action) {
                case 'Started Level':
                    counters[element.level-1].StartedLevel++;
                    break;
                case 'Portal Reached':
                    counters[element.level-1].PortalReached++;
                    break;
                case 'Complete level with hint':
                    counters[element.level-1].Completelevelwithhint++;
                    break;
                case 'Bought PowerUp': 
                    counters[element.level-1].BoughtPowerUp++;
                    break;
                case 'Bought Skip': 
                    counters[element.level-1].BoughtSkip++;
                    break;
                case 'Bought Undo':
                    counters[element.level-1].BoughtUndo++;
                    break;
                case 'Bought Hint': 
                    counters[element.level-1].BoughtHint++;
                    break;
           }
        });

        for (var i = 0; i < 13; i++){
            buffer += counters[i].StartedLevel+'<br>';
            buffer += counters[i].PortalReached+'<br>';
            buffer += counters[i].Completelevelwithhint+'<br>';
            buffer += counters[i].BoughtPowerUp+'<br>';
            buffer += counters[i].BoughtSkip+'<br>';
            buffer += counters[i].BoughtUndo+'<br>';
            buffer += counters[i].BoughtHint+'<br>';
        }

        return buildCountersBuffer(counters);
    },
    
    get_REVENUE_event_report: function(responseBody, format){
        var counters = initCounters();

        responseBody[0].Data.forEach(function (element){
            if(element.att_crea){
                counters[element.att_crea]++;
            }
            else if(element.dev_id) {
                counters['organic']++;
            }
        });

        return buildCountersBuffer(counters);
    },
};

function initCounters(){
    return { 
            'organic' : 0,
            '94195788976' : 0,
            '94195830376' : 0, 
            '94195832416' : 0,
            '94195838656' : 0, 
            '94195839256' : 0,
            '94195839376' : 0,
            '94195839496' : 0,
            '94195839616' : 0,
            '94195840576' : 0, 
            '94195840696' : 0, 
            '94195840816' : 0,
            '94195840936' : 0,
            '94195850776' : 0,
            '94195850896' : 0,
            '94195851016' : 0,
            '94195851136' : 0,
            '94195851256' : 0,
            '94195851376' : 0,
            '94195851496' : 0,
            '94195851616' : 0,
            '94195851736' : 0,
            '94195851856' : 0,
            '94195851976' : 0,
            '94195852096' : 0,
            '94195852216' : 0,
            '94195852336' : 0,
            '94195852456' : 0,
            '94195852576' : 0,
            '94195852696' : 0,
            '94195852816' : 0,
            '94195852936' : 0,
            '94195853056' : 0,
            '1': 0
        };
}

function buildCountersBuffer(counters){
    var buffer = '';
    buffer += counters['organic']+'<br>';
    buffer += counters['94195788976']+'<br>';
    buffer += counters['94195830376']+'<br>';
    buffer += counters['94195832416']+'<br>';
    buffer += counters['94195838656']+'<br>';
    buffer += counters['94195839256']+'<br>';
    buffer += counters['94195839376']+'<br>';
    buffer += counters['94195839496']+'<br>';
    buffer += counters['94195839616']+'<br>';
    buffer += counters['94195840576']+'<br>';
    buffer += counters['94195840696']+'<br>';
    buffer += counters['94195840816']+'<br>';
    buffer += counters['94195840936']+'<br>';
    buffer += counters['94195850776']+'<br>';
    buffer += counters['94195850896']+'<br>';
    buffer += counters['94195851016']+'<br>';
    buffer += counters['94195851136']+'<br>';
    buffer += counters['94195851256']+'<br>';
    buffer += counters['94195851376']+'<br>';
    buffer += counters['94195851496']+'<br>';
    buffer += counters['94195851616']+'<br>';
    buffer += counters['94195851736']+'<br>';
    buffer += counters['94195851856']+'<br>';
    buffer += counters['94195851976']+'<br>';
    buffer += counters['94195852096']+'<br>';
    buffer += counters['94195852216']+'<br>';
    buffer += counters['94195852336']+'<br>';
    buffer += counters['94195852456']+'<br>';
    buffer += counters['94195852576']+'<br>';
    buffer += counters['94195852696']+'<br>';
    buffer += counters['94195852816']+'<br>';
    buffer += counters['94195852936']+'<br>';
    buffer += counters['94195853056']+'<br>';
    buffer += counters['1']+'<br>';
    return buffer;
}