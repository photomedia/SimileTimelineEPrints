/*586 items.  photography OR photographie.  primary item type: exhibition catalogues.  publishing date: 1900-.  exported 1-17-2013*/
$.get("e-artexte-photography.js",function(data) {
document.write('var timeline_data = {  \'dateTimeFormat\': \'iso8601\', events :');
document.write(data);
document.write('}');
});
