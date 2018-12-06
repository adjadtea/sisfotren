/*
 * jQuery FlexTable v1.1.2
 * https://github.com/covistefan/flextable/
 *
 * Copyright 2018 COVI.DE (https://www.covi.de)
 * Lastchange 2018-04-10
 * Free to use under the GPLv2 and later license.
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Contributing author: Stefan Händler (https://github.com/covistefan/)
 * 
 */

var $ = jQuery.noConflict();

function flexTable(tableData, dataOptions) {
    
    var docalc = false;
    var owidth = Math.ceil(tableData.outerWidth());
    var wwidth = $(window).innerWidth(); if (dataOptions.debug && dataOptions.bt=='window') { console.log('t_' + owidth + '::w_' + wwidth); }
    var pwidth = tableData.parent().innerWidth(); if (dataOptions.debug && dataOptions.bt=='parent') { console.log('t_' + owidth + '::p_' + pwidth); }
    
    // remove older instances of list
    $('#flextable-' + tableData.attr('id')).remove();
    
    if (dataOptions.bt=='parent' && pwidth<owidth) {
        docalc = true;
        tableData.css('display', 'none');
        }
    else if (dataOptions.bt=='window' && (wwidth<dataOptions.bw || wwidth<owidth)) {
        docalc = true;
        tableData.css('display', 'none');
        }
    else {
        docalc = false;
        tableData.css('display', dataOptions.display);
        }
    
    if (docalc) {
        
        var headData = new Array();
        // finding all header cells
        tableData.find('th').each (function() {
            $(this).parent().attr('flextable', 'header')
            headData.push(this.innerHTML);
        });
        // counting header cells 
        var headCount = headData.length;
        // if no heading cells were found
        if (headCount==0) {
            // search for defined heading cells
            if (dataOptions.hcell!=''){
                tableData.find('td' + dataOptions.hcell).parent().attr('flextable', 'header');
                tableData.find('td' + dataOptions.hcell).each (function() {
                    headData.push(this.innerHTML);
                    // adding attr to holding element to prevent later data usage
                });
            }
            // search for element holding heading cells
            else if (dataOptions.hparent!='') {
                tableData.find(dataOptions.hparent).children().each (function() {
                    // adding header data to array
                    headData.push(this.innerHTML);
                    // adding attr to holding element to prevent later data usage
                    tableData.find(dataOptions.hparent).attr('flextable', 'header');
                });
            }
        }
        // recounting header cells
        var headCount = headData.length;
        if (dataOptions.debug) { console.log('header cell count: ' + headCount); }
        
        // running all rows (except the marked header cells
        cellData = new Array(); cellClass = new Array(); var cr = 0;
        tableData.find('tr').each (function(r) {
            if ($(this).attr('flextable')!='header') {
                cellData[cr] = new Array();
                cellClass[cr] = new Array();
                $(this).children('td').each (function(c) {
                    cellData[cr].push(this.innerHTML);
                    cellClass[cr].push(this.className);
                });
                cr++;
            }
        });
        
        // building final list
        var ul = $("<ul>"); 
        ul.attr('class', tableData.attr('class'));
        ul.addClass('flextable-list');
        ul.attr('id', 'flextable-'+tableData.attr('id'));
        for (var r = 0; r<cellData.length; r++) {
            for (var c = 0; c<cellData[r].length; c++) {
                if (dataOptions.header=='after') {
                    var li = "<li class='flextable-data'>" + cellData[r][c] + "</li><li class='flextable-head'>" + headData[c] + "</li>";
                    if (dataOptions.combine) { li = "<li class='flextable-row'><ul class='flextable-set'>" + li + "</ul></li>"; }
                    ul.append(li);
                }
                else if (dataOptions.header=='none') {
                    ul.append("<li class='flextable-data'>" + cellData[r][c] + "</li>");
                }
                else {
                    var li = "<li class='flextable-head'>" + headData[c] + "</li><li class='flextable-data " + cellClass[r][c] + "'>" + cellData[r][c] + "</li>";
                    if (dataOptions.combine) { li = "<li class='flextable-row'><ul class='flextable-set'>" + li + "</ul></li>"; }
                    ul.append(li);
                }
            }
            ul.append("<li class='flextable-spacer'></li>");
        }
        // inserting ul after table in DOM
        tableData.after(ul);
    }	
}

(function($) {
    $.fn.flextable = function(options) {
    var opts = $.extend({}, $.fn.flextable.defaults, options);
    if (opts.debug) { console.log('debug mode'); }
    return this.each(function() {
        var $this = $(this);
        $this.each(function(index){
            opts.display = $(this).css('display');
            if (opts.cm=='auto' || opts.cm=='resize') {
                var width = $(window).width();
                $(window).on('resize', function() {
                    if ($(window).width()!=width) {
                        flexTable($this, opts);
                    }
                });
            }
            flexTable($this, opts);
        });
    });
}
    
$.fn.flextable.defaults = {
	debug: false, // debug mode
	bt: 'parent', // BreakType 'parent' » parent element width, 'window' » based on window width
	bw: 768, // BreakWidth int » only with bt: 'window', if window width is lower then bw
	cm: 'auto', // CalcMode 'auto' » on load and on resize, 'load' » only on load
    hparent: '', // selector of parent holding header cells to get tablehead if not defined by thead » used if thead not found AND hcell is empty 
    hcell: '', // selector of cells to get tablehead if not defined by thead » used if thead not found 
    header: 'before', // showing tablehead information 'before' » add li with header data before data cell, 'after' » add li with header data after data cell, 'none' » ignore header data
    combine: false // display data as simple list, true » create a '<li><ul><li header></li><li data></li></ul></li>' set if header is included
    };
})(jQuery)
