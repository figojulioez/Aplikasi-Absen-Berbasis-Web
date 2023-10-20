function sendDataKaryawan () {
	return fetch('/api/karyawan/check?nama=' + document.getElementById('search').value + '&show=' + document.getElementById('show').value)
	.then( (e) => { if ( e.ok ) return e.json(); } )
	.then( (e) => {   return e.data; });
}

function sendData () {
	return fetch('/api/dataAbsensi/check?nama=' + document.getElementById('search').value + '&ket=' + document.getElementById('ket').value + '&show=' + document.getElementById('show').value )
	.then( (e) => { if ( e.ok ) return e.json(); } )
	.then( (e) => {   return e.data; });
}

function sendDataShift () {
	return fetch('api/dataShift/check?nama=' + document.getElementById('search').value + '&show=' + document.getElementById('show').value )
	.then( (e) => { if ( e.ok ) return e.json(); } )
	.then( (e) => {   return e.data; });
}