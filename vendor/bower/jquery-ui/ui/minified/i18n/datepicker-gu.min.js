/* Hindi initialisation for the jQuery UI date picker plugin. */
/* Written by Michael Dawart. */
(function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define([ "../datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}(function( datepicker ) {

datepicker.regional['gu'] = {
	closeText: 'બંધ',
	prevText: 'પાછળ',
	nextText: 'આગળ',
	currentText: 'આજે',
	monthNames: ['જાન્યુઆરી','ફેબ્રુઆરી','માર્ચ','એપ્રિલ','મે','જૂન','જુલાઈ','ઓગસ્ટ','સપ્ટેમ્બર','ઓક્ટોબર','નવેમ્બર','ડિસેમ્બર'],
	monthNamesShort: ['જાન્યુ.','ફેબ્રુ.','માર્ચ','એપ્રિ.','મે','જૂન','જુલા.','ઓગ.','સપ્ટે.','ઓક્ટો.','નવે.','ડિસે.'],
	dayNames: ['રવિવાર','સોમવાર','મંગળવાર','બુધવાર','ગુરૂવાર','શુક્વાર','શનિવાર'],
	dayNamesShort: ['રવિ','સોમ','મંગળ','બુધ','ગુરૂ','શુક્ર','શનિ'],
	dayNamesMin: ['રવિ','સોમ','મંગળ','બુધ','ગુરૂ','શુક્ર','શનિ'],
	weekHeader: 'સપ્તાહ',
	dateFormat: 'dd/mm/yy',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''};
datepicker.setDefaults(datepicker.regional['gu']);

return datepicker.regional['gu'];

}));
