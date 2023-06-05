const start = document.getElementById('start');
const end = document.getElementById('end');

start.addEventListener('change', function() {
if (start.value) end.min = start.value;
end.value = start.value;
end.type = "date";
}, false);


const arrive = document.getElementById('arrive');
const depart = document.getElementById('depart');

arrive.addEventListener('change', function() {
if (arrive.value & depart.value=== "") depart.value = arrive.value;
}, false);